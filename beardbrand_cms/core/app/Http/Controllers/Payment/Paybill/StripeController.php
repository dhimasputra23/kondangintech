<?php

namespace App\Http\Controllers\Payment\Paybill;

use App\Billpaid;
use App\Classes\GeniusMailer;
use App\Models\UserSubscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use Illuminate\Support\Str;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Emailsetting;
use App\Http\Controllers\Controller;
use App\Package;
use App\PaymentGatewey;
use App\Models\Setting;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;

class StripeController extends Controller
{

    public function __construct()
    {
        $data = PaymentGatewey::whereKeyword('stripe')->first();
        $paydata = $data->convertAutoData();
        Config::set('services.stripe.key',  $paydata['key']);
        Config::set('services.stripe.secret', $paydata['secret']);
    }


    public function store(Request $request){
            $stripe = new \Stripe\StripeClient(Config::get('services.stripe.secret'));

            $packageId = Auth::user()->activepackage;
            $package = Package::find($packageId);

            $totalBill = 0;

            if($package->discount_price){
                $totalBill = $package->discount_price;
            }else{
                $totalBill = $package->price;
            }



            try{
                $input = $request->all();
                Session::put('totalBill', $totalBill);
                Session::put('activePackageId', $packageId);

                $notify_url = route('stripe.paybill.redirect') . '?session_id={CHECKOUT_SESSION_ID}';
                $response = $stripe->checkout->sessions->create([
                    'success_url' => $notify_url,
                    'customer_email' => Auth::user()->email,
                    'payment_method_types' => ['card'],
                    'line_items' => [
                        [
                            'price_data' => [
                                'product_data' => [
                                    'name' => "Total amount to pay.",
                                ],
                                'unit_amount' => 100 * $totalBill,
                                'currency' => 'USD',
                            ],
                            'quantity' => 1
                        ],
                    ],
                    'mode' => 'payment',
                    'allow_promotion_codes' => false,
                ]);
                return redirect()->away($response['url']);
            }catch (Exception $e){
                $notification = array(
                    'messege' => 'Payment Cancelled.',
                    'alert' => 'error'
                );
                return redirect()->back()->with('notification', $notification);
            }
    }


    public function stripeNotify($resData)
    {
        $stripe = new \Stripe\StripeClient(Config::get('services.stripe.secret'));
        $response = $stripe->checkout->sessions->retrieve($resData['session_id']);

        if ($response['payment_status'] == 'paid' && $response['status'] == 'complete') {

            $totalBill = Session::get('totalBill');
            $packageId = Session::get('activePackageId');

            $order  = new Billpaid();
            $order['package_cost'] =   $totalBill;
            $order['currency_code'] = 'USD';
            $order['currency_sign'] = "$";
            $order['attendance_id'] = Str::random(4).time();
            $order['payment_status'] = "Completed";
            $order['txn_id'] = Str::random(12);
            $order['user_id'] = Auth::user()->id;
            $order['package_id'] = $packageId;
            $order['yearmonth'] = \Carbon\Carbon::now()->format('m-Y');
            $order['fulldate'] = \Carbon\Carbon::now()->format('M d, Y');
            $order['method'] = 'Stripe';
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
            Session::forget('totalBill');
            Session::forget('activePackageId');
            return [
                'status' => true
            ];
        }else{
            return [
                'status' => false,
                'message' => 'Payment Failed'
            ];
        }
    }

    public function paymentRedirect(Request $request){
        $responseData = $request->all();
        if (isset($responseData['session_id'])) {
            $payment = $this->stripeNotify($responseData);
            if($payment['status']){
                return view('front.success.product');
            }else{
                $notification = array(
                    'messege' => 'Payment Cancelled.',
                    'alert' => 'error'
                );
                return redirect()->back()->with('notification', $notification);
            }
        }else {
            $notification = array(
                'messege' => 'Payment Cancelled.',
                'alert' => 'error'
            );
            return redirect()->back()->with('notification', $notification);
        }
    }
}