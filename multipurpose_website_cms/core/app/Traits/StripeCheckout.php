<?php

namespace App\Traits;

use App\Models\Emailsetting;
use App\Models\Order;
use App\Models\Setting;
use App\Helpers\Helper;
use App\Models\Product;
use App\Models\Currency;
use App\Models\Shipping;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\PaymentGatewey;
use Illuminate\Support\Facades\Auth;
use PHPMailer\PHPMailer\Exception;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Session;
use PHPMailer\PHPMailer\PHPMailer;
use Illuminate\Support\Str;

trait StripeCheckout
{

    public function __construct()
    {
        $data = PaymentGatewey::whereKeyword('stripe')->first();
        $paydata = $data->convertAutoData();
        Config::set('services.stripe.key',  $paydata['key']);
        Config::set('services.stripe.secret', $paydata['secret']);
    }


    public function stripeSubmit($input)
    {

        $cart = Session::get('cart');

        foreach ($cart as $id => $item) {
            $product = Product::findOrFail($id);

            if ($product->stock < $item['qty']) {
                return redirect()->back()->with('warning', 'Title : '.$product->title.'. Stock Not Available',);
            }
        }


        $setting = Setting::first();

        $chargess = Shipping::findOrFail($input['shipping_charge']);

        $chargess->cost = Helper::showPrice($chargess->cost);

        $input['shipping_charge'] = json_encode($chargess, true);

        $new_shipping_charge = json_decode($input['shipping_charge'], true);

        $final_shipping_charge = $new_shipping_charge['cost'];



        $total = Helper::Total($final_shipping_charge);


        $stripe = new \Stripe\StripeClient(Config::get('services.stripe.secret'));

        $order['txn_id'] = Str::random(12);
        $order['cart'] = json_encode($cart, true);
        $user = Auth::user();
        $order['user_info'] = json_encode($user, true);
        $order['user_id'] = $user->id;
        $order['method'] = 'Stripe';
        $order['order_number'] = Str::random(8);
        $order['payment_status'] = 1;
        $order['order_status'] = 0;
        $order['shipping_charge_info'] = $input['shipping_charge'];
        $order['total'] =  $total;
        $order['qty'] = count($cart);

        $order['currency_name'] = $input['currency_code'];
        $order['currency_sign'] =  $input['currency_sign'];
        $order['currency_value'] =  $input['currency_value'];

        $order['shipping_name'] =  $input['shipping_name'];
        $order['shipping_email'] =  $input['shipping_email'];
        $order['shipping_address'] =  $input['shipping_address'];
        $order['shipping_number'] =  $input['shipping_number'];
        $order['shipping_country'] =  $input['shipping_country'];
        $order['shipping_state'] =  $input['shipping_state'];
        $order['shipping_zip'] =  $input['shipping_zip_code'];
        $order['shipping_state'] =  $input['shipping_state'];

        $order['billing_name'] =  $input['billing_name'];
        $order['billing_email'] =  $input['billing_email'];
        $order['billing_number'] =  $input['billing_number'];
        $order['billing_address'] =  $input['billing_address'];
        $order['billing_country'] =  $input['billing_country'];
        $order['billing_state'] =  $input['billing_state'];
        $order['billing_zip'] =  $input['billing_zip_code'];
        $order['billing_state'] =  $input['billing_state'];
        $order['created_at'] =  Carbon::now();

        Session::put('order_data', $order);
        try{
            $notify_url = route('stripe.payment.redirect') . '?session_id={CHECKOUT_SESSION_ID}';
            $response = $stripe->checkout->sessions->create([
                'success_url' => $notify_url,
                'customer_email' => $input['billing_email'],
                'payment_method_types' => ['card'],

                'line_items' => [
                    [
                        'price_data' => [
                            'product_data' => [
                                'name' => "Total amount to pay.",
                            ],
                            'unit_amount' => 100 * $total,
                            'currency' => $input['currency_code'],
                        ],
                        'quantity' => 1
                    ],
                ],

                'mode' => 'payment',
                'allow_promotion_codes' => false,
            ]);
            return [
                'status' => true,
                'link' => $response['url']
            ];
        }catch (Exception $e){
            return [
                'status' => false,
                'message' => $e->getMessage()
            ];
        }
    }


    public function stripeNotify($resData){

        $stripe = new \Stripe\StripeClient(Config::get('services.stripe.secret'));
        $response = $stripe->checkout->sessions->retrieve($resData['session_id']);

        if ($response['payment_status'] == 'paid' && $response['status'] == 'complete') {

            $cart = Session::get('cart');

            $order_data = Session::get('order_data');
            $order = new Order();

            $order['txn_id'] = $order_data['txn_id'];
            $order['cart'] = $order_data['cart'];
            $order['user_info'] = $order_data['user_info'];
            $order['user_id'] = $order_data['user_id'];
            $order['method'] = $order_data['method'];
            $order['order_number'] = $order_data['order_number'];
            $order['payment_status'] = $order_data['payment_status'];
            $order['order_status'] = $order_data['order_status'];
            $order['shipping_charge_info'] = $order_data['shipping_charge_info'];
            $order['total'] =  $order_data['total'];
            $order['qty'] = $order_data['qty'];

            $order['currency_name'] = $order_data['currency_name'];
            $order['currency_sign'] =  $order_data['currency_sign'];
            $order['currency_value'] =  $order_data['currency_value'];

            $order['shipping_name'] =  $order_data['shipping_name'];
            $order['shipping_email'] =  $order_data['shipping_email'];
            $order['shipping_address'] =  $order_data['shipping_address'];
            $order['shipping_number'] =  $order_data['shipping_number'];
            $order['shipping_country'] =  $order_data['shipping_country'];
            $order['shipping_state'] =  $order_data['shipping_state'];
            $order['shipping_zip'] =  $order_data['shipping_zip'];
            $order['shipping_state'] =  $order_data['shipping_state'];

            $order['billing_name'] =  $order_data['billing_name'];
            $order['billing_email'] =  $order_data['billing_email'];
            $order['billing_number'] =  $order_data['billing_number'];
            $order['billing_address'] =  $order_data['billing_address'];
            $order['billing_country'] =  $order_data['billing_country'];
            $order['billing_state'] =  $order_data['billing_state'];
            $order['billing_zip'] =  $order_data['billing_zip'];
            $order['billing_state'] =  $order_data['billing_state'];
            $order['created_at'] =  $order_data['created_at'];

            $order->save();
            $order_id = $order->id;


            foreach ($cart as $id => $item) {
                $product = Product::findOrFail($id);
                $stock = $product->stock - $item['qty'];
                Product::where('id', $id)->update([
                    'stock' => $stock
                ]);
            }

            $fileName = Str::random(4) . time() . '.pdf';
            $path = 'assets/front/invoices/product/' . $fileName;
            $data['order']  = $order;
            $pdf = Pdf::loadView('pdf.product', $data)->save($path);


            Order::where('id', $order_id)->update([
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
                    $mail->addAttachment('assets/front/invoices/product/' . $fileName);

                    // Content
                    $mail->isHTML(true);
                    $mail->Subject = "Order placed for Product";
                    $mail->Body    = 'Hello <strong>' . $user->name . '</strong>,<br/>Your order has been placed successfully. We have attached an invoice in this mail.<br/>Thank you.';

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
                    $mail->addAttachment('assets/front/invoices/product/' . $fileName);

                    // Content
                    $mail->isHTML(true);
                    $mail->Subject = "Order placed for Product";
                    $mail->Body    = 'Hello <strong>' . $user->name . '</strong>,<br/>Your order has been placed successfully. We have attached an invoice in this mail.<br/>Thank you.';

                    $mail->send();
                } catch (Exception $e) {
                }
            }


            Session::forget('cart');
            Session::forget('order_data');

            return [
                'status' => true
            ];
        } else {
            return [
                'status' => false,
                'message' => 'Payment Failed'
            ];
        }
    }
}
