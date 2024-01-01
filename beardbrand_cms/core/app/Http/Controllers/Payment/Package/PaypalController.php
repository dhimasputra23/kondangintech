<?php

namespace App\Http\Controllers\Payment\Package;

use App\Billpaid;
use App\Helpers\Helper;
use App\Package;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Packageorder;
use Omnipay\Omnipay;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use Illuminate\Support\Str;
use App\Emailsetting;
use Carbon\Carbon;
use App\PaymentGatewey;
use App\Setting;
use App\User;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;
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

        $title = "Package name: ".$request->packagename." & ".\Carbon\Carbon::now()->format('M Y').", this month bill has paid.";



        $cancel_url = action('Payment\Package\PaypalController@paycancle');
        $notify_url = route('package.payment.notify');

        $packageId = $request->packageid;
        $package = Package::find($packageId);

        $totalPackagePrice = 0;

        if($package->discount_price){
            $totalPackagePrice = $package->discount_price;
        }else{
            $totalPackagePrice = $package->price;
        }

        Session::put('totalPackagePrice', $totalPackagePrice);
        Session::put('activeBuyId', $packageId);

        try{
            $response = $this->gateway->purchase(array(
                'amount' => $totalPackagePrice,
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

        $success_url = action('Payment\Package\PaypalController@payreturn');
        $cancel_url = action('Payment\Package\PaypalController@paycancle');

        $totalPackagePrice = Session::get('totalPackagePrice');
        $activeBuyId = Session::get('activeBuyId');

        if (empty($request['PayerID']) || empty($request['token'])) {
            return redirect($cancel_url);
        }
        $transaction = $this->gateway->completePurchase(array(
            'payer_id' => $request['PayerID'],
            'transactionReference' => $request['paymentId'],
        ));
        $response = $transaction->send();


        if ($response->isSuccessful()) {

            $package_data = Session::get('package_data');

            $already_purchased = Packageorder::where('user_id', Auth::user()->id)->first();

            if($already_purchased){
                $order = $already_purchased;
            }else{
                $order  = new Packageorder();
            }
            $order['package_cost'] =  $totalPackagePrice;
            $order['currency_code'] = 'USD';
            $order['currency_sign'] = "$";
            $order['attendance_id'] = Str::random(4) . time();
            $order['payment_status'] = "Completed";
            $order['txn_id'] = Str::random(12);
            $order['user_id'] = Auth::user()->id;
            $order['package_id'] = $activeBuyId;
            $order['method'] = 'Paypal';
            $order['status'] = 0;
            $order->save();
            $order_id = $order->id;
            $package_id = $order->package_id;
            $package = Package::find($package_id);

            $paybill  = new Billpaid();

            $paybill['package_cost'] =  $totalPackagePrice;
            $paybill['currency_code'] = 'USD';
            $paybill['currency_sign'] = "$";
            $paybill['attendance_id'] =  Str::random(4) . time();
            $paybill['payment_status'] = "Completed";
            $paybill['txn_id'] = Str::random(12);
            $paybill['user_id'] = Auth::user()->id;
            $paybill['package_id'] = $activeBuyId;
            $paybill['yearmonth'] = \Carbon\Carbon::now()->format('m-Y');
            $paybill['fulldate'] = \Carbon\Carbon::now()->format('M d, Y');
            $paybill['method'] = 'Paypal';
            $paybill['status'] = 0;
            $paybill->save();

            $user = User::where('id', Auth::user()->id)->first();
            $user->activepackage = $package_data['packageid'];
            $user->save();


            // sending datas to view to make invoice PDF
            $fileName = Str::random(4) . time() . '.pdf';
            $path = 'assets/front/invoices/package/' . $fileName;
            $data['order'] = $order;
            $data['bill'] = $paybill;
            $data['package'] = $package;
            $data['user'] = Auth::user();
            $pdf = Pdf::loadView('pdf.package', $data)->save($path);

            Packageorder::where('id', $order_id)->update([
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
                    $mail->addAttachment('assets/front/invoices/package/' . $fileName);

                    // Content
                    $mail->isHTML(true);
                    $mail->Subject = "Order placed for Package";
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
                    $mail->addAttachment('assets/front/invoices/package/' . $fileName);

                    // Content
                    $mail->isHTML(true);
                    $mail->Subject = "Order placed for Package";
                    $mail->Body    = 'Hello <strong>' . $user->name . '</strong>,<br/>Your bill was paid successfully. We have attached an invoice in this mail.<br/>Thank you.';

                    $mail->send();
                } catch (Exception $e) {
                    // die($e->getMessage());
                }
            }

            return view('front.success.package');
        }
        return redirect($cancel_url);
    }
}
