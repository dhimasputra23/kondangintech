<?php

namespace App\Http\Controllers\Payment\Product;


use App\Product;
use App\Shipping;
use App\OrderItem;
use Carbon\Carbon;
use App\Emailsetting;
use App\ProductOrder;
use App\Helpers\Helper;
use App\PaymentGatewey;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Session;
use Cartalyst\Stripe\Laravel\Facades\Stripe;

class StripeController extends Controller
{
    public function __construct()
    {
        //Set Spripe Keys
        $data = PaymentGatewey::whereKeyword('stripe')->first();
        $paydata =$data->convertAutoData();
        Config::set('services.stripe.key', $paydata["key"]);
        Config::set('services.stripe.secret', $paydata["secret"]);
    }


    public function store(Request $request)
    {


        if (!Session::has('cart')) {
            return view('errors.404');
        }

        $cart = Session::get('cart');

        $total = 0;
        foreach ($cart as $id => $item) {
            $product = Product::findOrFail($id);
            if ($product->stock < $item['qty']) {
                $notification = array(
                    'messege' => $product->title . ' stock not available',
                    'alert' => 'error'
                );
                return redirect()->back()->with('notification', $notification);
            }
            $total  += $product->current_price * $item['qty'];
        }
        $shippig_charge = 0;
        if ($request->shipping_charge != 0) {
            $shipping = Shipping::where('cost', $request->shipping_charge)->first();
            $shippig_charge = $shipping->cost;
        } else {
            $shippig_charge = 0;
        }


        $total = round($total + $shippig_charge, 2);
        
        $title = 'Product Checkout';



        if(isset($request->is_ship)){
            $request->validate([
                'shipping_name' => 'required',
                'shipping_email' => 'required',
                'shipping_number' => 'required',
                'shipping_address' => 'required',
                'shipping_country' => 'required',
                'shipping_city' => 'required',
                'shipping_zip' => 'required',
                'billing_name' => 'required',
                'billing_email' => 'required',
                'billing_number' => 'required',
                'billing_address' => 'required',
                'billing_country' => 'required',
                'billing_city' => 'required',
                'billing_zip' => 'required'
            ]);
        }else{
            $request->validate([
                'billing_name' => 'required',
                'billing_email' => 'required',
                'billing_number' => 'required',
                'billing_address' => 'required',
                'billing_country' => 'required',
                'billing_city' => 'required',
                'billing_zip' => 'required',

            ]);
        }

        $input = $request->all();

        $order['user_id'] = Auth::user()->id;

        $order['billing_name'] = $request->billing_name;
        $order['billing_email'] = $request->billing_email;
        $order['billing_address'] = $request->billing_address;
        $order['billing_city'] = $request->billing_city;
        $order['billing_country'] = $request->billing_country;
        $order['billing_number'] = $request->billing_number;
        $order['billing_zip'] = $request->billing_zip;

        $order['shipping_name'] = $request->shipping_name;
        $order['shipping_email'] = $request->shipping_email;
        $order['shipping_address'] = $request->shipping_address;
        $order['shipping_city'] = $request->shipping_city;
        $order['shipping_country'] = $request->shipping_country;
        $order['shipping_number'] = $request->shipping_number;
        $order['shipping_zip'] = $request->shipping_zip;

        $order['total'] = $total;
        $order['shipping_charge'] = round($shippig_charge, 2);
        $order['method'] = 'Stripe';
        $order['currency_code'] = 'USD';
        $order['order_number'] = Str::random(4). time();
        $order['payment_status'] = 'Completed';
        $order['txnid'] = Str::random(12);
        $order['charge_id'] = Str::random(12);

        $order['billing_name'] = $input['billing_name'];

        Session::put('order_data', $order);
        Session::put('input', $input);

        $stripe = new \Stripe\StripeClient(Config::get('services.stripe.secret'));

        try {
            $notify_url = route('stripe.product.redirect') . '?session_id={CHECKOUT_SESSION_ID}';

            $response = $stripe->checkout->sessions->create([
                'success_url' => $notify_url,
                'customer_email' => $request->billing_email,
                'payment_method_types' => ['card'],

                'line_items' => [
                    [
                        'price_data' => [
                            'product_data' => [
                                'name' => "Total amount to pay.",
                            ],
                            'unit_amount' => 100 * $total,
                            'currency' => 'USD',
                        ],
                        'quantity' => 1
                    ],
                ],

                'mode' => 'payment',
                'allow_promotion_codes' => false,
            ]);

            return redirect()->away($response['url']);

        } catch (Exception $e) {
            $notification = array(
                'messege' => 'Payment Cancelled.',
                'alert' => 'error'
            );
            return redirect()->back()->with('notification', $notification);
        }
    }


    public function stripeNotify($resData){
        $stripe = new \Stripe\StripeClient(Config::get('services.stripe.secret'));
        $response = $stripe->checkout->sessions->retrieve($resData['session_id']);

        if ($response['payment_status'] == 'paid' && $response['status'] == 'complete') {

            $order_data = Session::get('order_data');
            $input = Session::get('input');

            $order = new ProductOrder();
            $order['user_id'] = $order_data['user_id'];
            $order['billing_name'] = $order_data['billing_name'];
            $order['billing_email'] = $order_data['billing_email'];
            $order['billing_address'] = $order_data['billing_address'];
            $order['billing_city'] = $order_data['billing_city'];
            $order['billing_country'] = $order_data['billing_country'];
            $order['billing_number'] = $order_data['billing_number'];
            $order['billing_zip'] = $order_data['billing_zip'];

            $order['shipping_name'] = $order_data['shipping_name'];
            $order['shipping_email'] = $order_data['shipping_email'];
            $order['shipping_address'] = $order_data['shipping_address'];
            $order['shipping_city'] = $order_data['shipping_city'];
            $order['shipping_country'] = $order_data['shipping_country'];
            $order['shipping_number'] = $order_data['shipping_number'];
            $order['shipping_zip'] = $order_data['shipping_zip'];

            $order['total'] = $order_data['total'];
            $order['shipping_charge'] = $order_data['shipping_charge'];
            $order['method'] = $order_data['method'];
            $order['currency_code'] = $order_data['currency_code'];
            $order['order_number'] = $order_data['order_number'];
            $order['payment_status'] = $order_data['payment_status'];
            $order['txnid'] = $order_data['txnid'];
            $order['charge_id'] = $order_data['charge_id'];
            $order->save();
            $order_id = $order->id;

            $carts = Session::get('cart');
            $products = [];
            $qty = [];
            foreach ($carts as $id => $item) {
                $qty[] = $item['qty'];
                $products[] = Product::findOrFail($id);
            }
            foreach ($products as $key => $product) {
                OrderItem::insert([
                    'product_order_id' => $order_id,
                    'product_id' => $product->id,
                    'user_id' => Auth::user()->id,
                    'title' => $product->title,
                    'qty' => $qty[$key],
                    'price' => $product->current_price,
                    'previous_price' => $product->previous_price,
                    'image' => $product->image,
                    'short_description' => $product->short_description,
                    'description' => $product->description,
                    'created_at' => Carbon::now()
                ]);
            }
            foreach ($carts as $id => $item) {
                $product = Product::findOrFail($id);
                $stock = $product->stock - $item['qty'];
                Product::where('id', $id)->update([
                    'stock' => $stock
                ]);
            }
            $fileName = Str::random(4) . time() . '.pdf';
            $path = 'assets/front/invoices/product/' . $fileName;
            $data['order'] = $order;
            $pdf = Pdf::loadView('pdf.product', $data)->save($path);
            ProductOrder::where('id', $order_id)->update([
                'invoice_number' => $fileName
            ]);
            // Send Mail to Buyer
            $mail = new PHPMailer(true);
            $user = Auth::user();

            $em = Emailsetting::first();

            if ($em->is_smtp == 1) {
                try {
                    $mail->isSMTP();
                    $mail->Host = $em->smtp_host;
                    $mail->SMTPAuth = true;
                    $mail->Username = $em->smtp_user;
                    $mail->Password = $em->smtp_pass;
                    $mail->SMTPSecure = $em->email_encryption;
                    $mail->Port = $em->smtp_port;

                    //Recipients
                    $mail->setFrom($em->from_email, $em->from_name);
                    $mail->addAddress($user->email, $user->name);

                    // Attachments
                    $mail->addAttachment('assets/front/invoices/product/' . $fileName);

                    // Content
                    $mail->isHTML(true);
                    $mail->Subject = "Order placed for Product";
                    $mail->Body = 'Hello <strong>' . $user->name . '</strong>,<br/>Your order has been placed successfully. We have attached an invoice in this mail.<br/>Thank you.';

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
                    $mail->Body = 'Hello <strong>' . $user->name . '</strong>,<br/>Your order has been placed successfully. We have attached an invoice in this mail.<br/>Thank you.';

                    $mail->send();
                } catch (Exception $e) {
                    // die($e->getMessage());
                }
            }

            Session::forget('cart');
            Session::forget('order_data');
            Session::forget('input');
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
