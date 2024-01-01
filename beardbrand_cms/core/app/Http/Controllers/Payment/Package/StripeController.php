<?php

namespace App\Http\Controllers\Payment\Package;

use App\User;
use App\Package;
use App\Billpaid;
use Carbon\Carbon;
use App\Emailsetting;
use App\Packageorder;
use App\Helpers\Helper;
use App\PaymentGatewey;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Cartalyst\Stripe\Laravel\Facades\Stripe;

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

        $packageId = $request->packageid;
        $package = Package::find($packageId);

        $totalPackagePrice = 0;

        if($package->discount_price){
            $totalPackagePrice = $package->discount_price;
        }else{
            $totalPackagePrice = $package->price;
        }


        $stripe = new \Stripe\StripeClient(Config::get('services.stripe.secret'));

            try{
                Session::put('totalPackagePrice', $totalPackagePrice);
                Session::put('activeBuyId', $packageId);

                $notify_url = route('stripe.package.redirect') . '?session_id={CHECKOUT_SESSION_ID}';
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
                                'unit_amount' => 100 * $totalPackagePrice,
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

            $totalPackagePrice = Session::get('totalPackagePrice');
            $packageId = Session::get('activeBuyId');

            $already_purchased = Packageorder::where('user_id', Auth::user()->id)->first();

            if($already_purchased){
                $order = $already_purchased;
            }else{
                $order  = new Packageorder();
            }

            $order['package_cost'] = $totalPackagePrice;
            $order['currency_code'] = 'USD';
            $order['currency_sign'] = "$";
            $order['attendance_id'] = Str::random(4).time();
            $order['payment_status'] = "Completed";
            $order['txn_id'] = Str::random(12);
            $order['user_id'] = Auth::user()->id;
            $order['package_id'] = $packageId;
            $order['method'] = 'Stripe';
            $order['status'] = 0;
            $order->save();
            $order_id = $order->id;
            $package_id = $order->package_id;
            $package = Package::find($package_id);

            $paybill  = new Billpaid();

            $paybill['package_cost'] =  $totalPackagePrice;
            $paybill['currency_code'] = 'USD';
            $paybill['currency_sign'] = "$";
            $paybill['attendance_id'] = Str::random(4).time();
            $paybill['payment_status'] = "Completed";
            $paybill['txn_id'] = Str::random(12);
            $paybill['user_id'] = Auth::user()->id;
            $paybill['package_id'] = $packageId;
            $paybill['yearmonth'] = \Carbon\Carbon::now()->format('m-Y');
            $paybill['fulldate'] = \Carbon\Carbon::now()->format('M d, Y');
            $paybill['method'] = 'Stripe';
            $paybill['status'] = 0;
            $paybill->save();
            $bill_id = $paybill->id;

            $user = User::where('id', Auth::user()->id)->first();
            $user->activepackage = $packageId;
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

            Session::forget('totalPackagePrice');
            Session::forget('activeBuyId');
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