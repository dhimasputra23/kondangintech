<?php

namespace App\Http\Controllers\Payment\Product;

use App\Product;
use App\Language;
use App\Shipping;
use App\OrderItem;
use Omnipay\Omnipay;
use PayPal\Api\Item;
use App\Emailsetting;
use App\ProductOrder;
use PayPal\Api\Payer;
use PayPal\Api\Amount;
use App\PaymentGatewey;
use PayPal\Api\Payment;
use PayPal\Api\ItemList;
use Illuminate\Support\Str;
use PayPal\Api\Transaction;
use PayPal\Rest\ApiContext;
use Illuminate\Http\Request;
use PayPal\Api\RedirectUrls;
use Illuminate\Support\Carbon;
use PayPal\Api\PaymentExecution;
use Barryvdh\DomPDF\Facade\Pdf;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use PayPal\Auth\OAuthTokenCredential;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

class PaypalController extends Controller
{
    private $_api_context;
    public function __construct()
    {
        $data = PaymentGatewey::whereKeyword('paypal')->first();
        $paydata = $data->convertAutoData();

//        $paypal_conf = \Config::get('paypal');
//        $paypal_conf['client_id'] = $paydata['client_id'];
//        $paypal_conf['secret'] = $paydata['client_secret'];
//        $paypal_conf['settings']['mode'] = $paydata['sandbox_check'] == 1 ? 'sandbox' : 'live';
//        $this->_api_context = new ApiContext(
//            new OAuthTokenCredential(
//                $paypal_conf['client_id'],
//                $paypal_conf['secret']
//            )
//        );
//        $this->_api_context->setConfig($paypal_conf['settings']);
        $this->gateway = Omnipay::create('PayPal_Rest');
        $this->gateway->setClientId($paydata['client_id']);
        $this->gateway->setSecret($paydata['client_secret']);
        $this->gateway->setTestMode(true);
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
                    'messege' =>  $product->title . ' stock not available',
                    'alert' => 'error'
                );
                return redirect()->back()->with('notification', $notification);
            }
            $total  += $product->current_price * $item['qty'];
        }


        $shippig_charge = 0;
        if ($request->shipping_charge != 0) {
            $shipping = Shipping::where('cost', $request->shipping_charge)->first();
            $shipping_charge = $shipping->cost;
        } else {
            $shipping_charge = 0;
        }

        $total = round($total + $shipping_charge, 2);


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
                'billing_zip' => 'required',
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

        $cancel_url = action('Payment\Product\PaypalController@paycancle');
        $notify_url = route('product.payment.notify');


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

        try{
            $response = $this->gateway->purchase(array(
                'amount' => $total,
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
        return view('front.success.product');
    }


    public function notify(Request $request)
    {


        $success_url = action('Payment\Product\PaypalController@payreturn');
        $cancel_url = action('Payment\Product\PaypalController@paycancle');

        if (Session::has('cart')) {
            $cart = Session::get('cart');
        } else {
            return redirect($cancel_url);
        }

        if (empty($request['PayerID']) || empty($request['token'])) {
            return redirect($cancel_url);
        }

        $transaction = $this->gateway->completePurchase(array(
            'payer_id' => $request['PayerID'],
            'transactionReference' => $request['paymentId'],
        ));

        $response = $transaction->send();

        if ($response->isSuccessful()) {
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
            $data['order']  = $order;
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
                    // die($e->getMessage());
                }
            }

            Session::forget('cart');
            Session::forget('order_data');
            Session::forget('input');
            return redirect($success_url);
        }

        $notification = array(
            'messege' => 'Payment Cancelled.',
            'alert' => 'error'
        );
        return redirect()->back()->with('notification', $notification);
    }
}
