<?php

namespace App\Http\Controllers\Payment\Paybill;

use App\Billpaid;
use App\Helpers\Helper;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Packageorder;
use App\Package;
use Omnipay\Omnipay;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Emailsetting;
use Illuminate\Support\Str;
use Carbon\Carbon;
use App\PaymentGatewey;
use App\Setting;
use App\User;
use Illuminate\Support\Facades\Auth;
use PayPal\{
    Api\Item,
    Api\Payer,
    Api\Amount,
    Api\Payment,
    Api\ItemList,
    Rest\ApiContext,
    Api\Transaction,
    Api\RedirectUrls,
    Api\PaymentExecution,
    Auth\OAuthTokenCredential
};

use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class PaypalController extends Controller
{

    private $_api_context;
    public function __construct()
    {
        $data = PaymentGatewey::whereKeyword('paypal')->first();
        $paydata = $data->convertAutoData();
//        $paypal_conf = Config::get('paypal');
//        $paypal_conf['client_id'] = $paydata['client_id'];
//        $paypal_conf['secret'] = $paydata['client_secret'];
//        $paypal_conf['settings']['mode'] = $paydata['sandbox_check'] == 1 ? 'sandbox' : 'live';
//
//        $this->_api_context = new ApiContext(new OAuthTokenCredential(
//            $paypal_conf['client_id'],
//            $paypal_conf['secret']
//        ));
//
//        $this->_api_context->setConfig($paypal_conf['settings']);
        $this->gateway = Omnipay::create('PayPal_Rest');
        $this->gateway->setClientId($paydata['client_id']);
        $this->gateway->setSecret($paydata['client_secret']);
        $this->gateway->setTestMode(true);
    }




    public function store(Request $request)
    {
    
      
    
        $input = $request->all();
        Session::put('package_data', $input);

        $title = \Carbon\Carbon::now()->format('M Y').", This month bill paid. Package name: ".$request->packagename;


        $cancel_url = action('Payment\Paybill\PaypalController@paycancle');
        $notify_url = route('paybill.payment.notify');

        $packageId = Auth::user()->activepackage;
        $package = Package::find($packageId);

        $totalBill = 0;

        if($package->discount_price){
            $totalBill = $package->discount_price;
        }else{
            $totalBill = $package->price;
        }
        Session::put('totalPayBillPrice', $totalBill);
        Session::put('activeBillPackageId', $packageId);

        try{
            $response = $this->gateway->purchase(array(
                'amount' => $totalBill,
                'currency' => 'USD',
                'returnUrl' => $notify_url,
                'cancelUrl' => $cancel_url
            ))->send();
            if ($response->isRedirect()) {
                if ($response->redirect()) {
                    /** redirect to paypal **/
                    return Redirect::away($response->redirect());
                }else{
                    return $response->getMessage();
                }
            }
        }catch (\Throwable $th){
            $notification = array(
                'messege' => 'Payment Cancelled.',
                'alert' => 'error'
            );
            return redirect()->back()->with('notification', $notification);
        }
        $notification = array(
            'messege' => 'Payment Cancelled.',
            'alert' => 'error'
        );
        return redirect()->back()->with('notification', $notification);
    }

    public function paycancle()
    {
        $notification = array(
            'messege' => 'Payment Cancelled.',
            'alert' => 'error'
        );
        return redirect()->back()->with('notification', $notification);
    }

    public function payreturn()
    {
        return view('front.success.package');
    }


    public function notify(Request $request)
    {

        $success_url = action('Payment\Paybill\PaypalController@payreturn');
        $cancel_url = action('Payment\Paybill\PaypalController@paycancle');

        $totalBill = Session::get('totalPayBillPrice');
        $packageId = Session::get('activeBillPackageId');

        if (empty($request['PayerID']) || empty($request['token'])) {
            return redirect($cancel_url);
        }
        $transaction = $this->gateway->completePurchase(array(
            'payer_id' => $request['PayerID'],
            'transactionReference' => $request['paymentId'],
        ));
        $response = $transaction->send();

        if ($response->isSuccessful()) {


            $order  = new Billpaid();

            $order['package_cost'] = $totalBill;
            $order['currency_code'] = 'USD';
            $order['currency_sign'] = "$";
            $order['attendance_id'] = Str::random(12);
            $order['payment_status'] = "Completed";
            $order['txn_id'] = Str::random(12);
            $order['user_id'] = Auth::user()->id;
            $order['package_id'] = $packageId;
            $order['yearmonth'] = \Carbon\Carbon::now()->format('m-Y');
            $order['fulldate'] = \Carbon\Carbon::now()->format('M d, Y');
            $order['method'] = 'Paypal';
            $order['status'] = 0;
            $order->save();
            $order_id = $order->id;

            $package_id = $order->package_id;
            $package = Package::find($package_id);

            // sending datas to view to make invoice PDF
            $fileName = Str::random(4) . time() . '.pdf';
            $path = 'assets/front/invoices/bill/' . $fileName;
            $data['bill'] = $order;
            $data['package'] = $package;
            $data['user'] = Auth::user();
            $pdf = Pdf::loadView('pdf.bill', $data)->save($path);

            Billpaid::where('id', $order_id)->update([
                'invoice_number' => $fileName
            ]);

                // Send Mail to Buyer
            $mail = new PHPMailer(true);
            $user = Auth::user();

            $em = Emailsetting::first();

            if ($em->is_smtp == 1) {
                try {
                    $mail->isSMTP();
                    $mail->Host       = $em->smtp_host;
                    $mail->SMTPAuth   = true;
                    $mail->Username   = $em->smtp_user;
                    $mail->Password   = $em->smtp_pass;
                    $mail->SMTPSecure = $em->email_encryption;
                    $mail->Port       = $em->smtp_port;

                    //Recipients
                    $mail->setFrom($em->from_email, $em->from_name);
                    $mail->addAddress($user->email, $user->name);

                    // Attachments
                    $mail->addAttachment('assets/front/invoices/bill/' . $fileName);

                    // Content
                    $mail->isHTML(true);
                    $mail->Subject = "Bill Paid";
                    $mail->Body    = 'Hello <strong>' . $user->name . '</strong>,<br/>Your bill was paid successfully. We have attached an invoice in this mail.<br/>Thank you.';

                    $mail->send();
                } catch (Exception $e) {
                    // die($e->getMessage());
                }
            } else {
                try {
                    //Recipients
                    $mail->setFrom($em->from_mail, $em->from_name);
                    $mail->addAddress($user->email, $user->name);

                    // Attachments
                    $mail->addAttachment('assets/front/invoices/bill/' . $fileName);

                    // Content
                    $mail->isHTML(true);
                    $mail->Subject = "Bill Paid";
                    $mail->Body    = 'Hello <strong>' . $user->name . '</strong>,<br/>Your bill was paid successfully. We have attached an invoice in this mail.<br/>Thank you.';

                    $mail->send();
                } catch (Exception $e) {
                    // die($e->getMessage());
                }
            }

            Session::forget('totalPayBillPrice');
            Session::forget('activeBillPackageId');

            return redirect($success_url);
        }

        $notification = array(
            'messege' => 'Payment Cancelled.',
            'alert' => 'error'
        );
        return redirect()->back()->with('notification', $notification);
    }
}
