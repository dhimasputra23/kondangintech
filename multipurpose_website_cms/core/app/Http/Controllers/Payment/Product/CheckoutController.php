<?php

namespace App\Http\Controllers\Payment\Product;


use App\Http\Controllers\Controller;
use App\Traits\StripeCheckout;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
class CheckoutController extends Controller
{
    use StripeCheckout {
        StripeCheckout::__construct as private __stripeConstruct;
    }

    public function __construct()
    {
        $this->__stripeConstruct();
    }
//    public function paymentRedirect(Request $request)
//    {
//        dd("hello");
//        $responseData = $request->all();
//         $payment = $this->stripeNotify($responseData);
//        if (isset($responseData['session_id'])) {
//            $payment = $this->stripeNotify($responseData);
//            if($payment['status']){
//                return redirect()->route('front.checkout.success');
//            }else{
//                Session::put('message', $payment['message']);
//                return redirect()->route('front.checkout.cancle');
//            }
//
//        }
//      /*  elseif (Session::has('order_payment_id')) {
//            $payment = $this->paypalNotify($responseData);
//            if ($payment['status']) {
//                return redirect()->route('front.checkout.success');
//            } else {
//                Session::put('message', $payment['message']);
//                return redirect()->route('front.checkout.cancle');
//            }
//        }*/
//        else {
//            return redirect()->route('front.checkout.cancle');
//        }
//    }
}