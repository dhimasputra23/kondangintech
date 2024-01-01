<?php

namespace App\Http\Controllers\Payment\Product;

use App\{Models\Setting};
use App\Traits\StripeCheckout;
use App\Helpers\Helper;
use App\Models\Product;
use App\Models\Currency;
use App\Models\Shipping;
use Illuminate\Http\Request;
use App\Models\PaymentGatewey;
use PHPMailer\PHPMailer\Exception;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Session;

class StripeController extends Controller
{
    use StripeCheckout {
        StripeCheckout::__construct as private __stripeConstruct;
    }
    public function __construct()
    {
        $this->__stripeConstruct();
    }

    public function store(Request $request)
    {
        if (!Session::has('cart')) {
            return view('errors.404');
        }
        if (Session::has('currency')) {
            $curr = Currency::find(Session::get('currency'));
        } else {
            $curr = Currency::where('is_default', '=', 1)->first();
        }

        $available_currency = array(
            'USD',
            'AED',
            'AFN',
            'ALL',
            'AMD',
            'ANG',
            'AOA',
            'ARS',
            'AUD',
            'AWG',
            'AZN',
            'BAM',
            'BBD',
            'BDT',
            'BGN',
            'BIF',
            'BMD',
            'BND',
            'BOB',
            'BRL',
            'BSD',
            'BWP',
            'BZD',
            'CDF',
            'CAD',
            'CHF',
            'CLP',
            'CNY',
            'COP',
            'CRC',
            'CVE',
            'CZK',
            'DJF',
            'DKK',
            'DOP',
            'DZD',
            'EGP',
            'ETB',
            'EUR',
            'FJD',
            'FKP',
            'GBP',
            'GEL',
            'GIP',
            'GMD',
            'GNF',
            'GTQ',
            'GYD',
            'HKD',
            'HNL',
            'HRK',
            'HTG',
            'HUF',
            'IDR',
            'ILS',
            'INR',
            'ISK',
            'JMD',
            'JPY',
            'KES',
            'KGS',
            'KHR',
            'KMF',
            'KRW',
            'KYD',
            'KZT',
            'LAK',
            'LBP',
            'LKR',
            'LRD',
            'LSL',
            'MAD',
            'MDL',
            'MGA',
            'MKD',
            'MMK',
            'MNT',
            'MOP',
            'MRO',
            'MUR',
            'MVR',
            'MWK',
            'MXN',
            'MYR',
            'MZN',
            'NAD',
            'NGN',
            'NIO',
            'NOK',
            'NPR',
            'NZD',
            'PAB',
            'PEN',
            'PGK',
            'PHP',
            'PKR',
            'PLN',
            'PYG',
            'QAR',
            'RON',
            'RSD',
            'RUB',
            'RWF',
            'SAR',
            'SBD',
            'SCR',
            'SEK',
            'SGD',
            'SHP',
            'SLL',
            'SOS',
            'SRD',
            'STD',
            'SZL',
            'THB',
            'TJS',
            'TOP',
            'TRY',
            'TTD',
            'TWD',
            'TZS',
            'UAH',
            'UGX',
            'UYU',
            'UZS',
            'VND',
            'VUV',
            'WST',
            'XAF',
            'XCD',
            'XOF',
            'XPF',
            'YER',
            'ZAR',
            'ZMW'
        );

        if (!in_array($curr->name, $available_currency)) {
            return redirect()->back()->with('warning', 'Invalid Currency For Stripe.');
        }

        if (isset($request->is_ship)) {
            $request->validate([
                'shipping_name' => 'required',
                'shipping_email' => 'required',
                'shipping_number' => 'required',
                'shipping_address' => 'required',
                'shipping_country' => 'required',
                'shipping_state' => 'required',
                'shipping_zip_code' => 'required',
                'billing_name' => 'required',
                'billing_email' => 'required',
                'billing_number' => 'required',
                'billing_address' => 'required',
                'billing_country' => 'required',
                'billing_state' => 'required',
            ]);
        } else {
            $request->validate([
                'billing_name' => 'required',
                'billing_email' => 'required',
                'billing_number' => 'required',
                'billing_address' => 'required',
                'billing_country' => 'required',
                'billing_state' => 'required',
            ]);
        }

        $input = $request->all();

        $payment = null;
        $payment = $this->stripeSubmit($input);


        if ($payment['status']) {
            return redirect()->away($payment['link']);
        } else {
            Session::put('message', $payment['message']);
            return redirect()->route('front.checkout.cancle');
        }

    }
    public function paymentRedirect(Request $request)
    {
        $responseData = $request->all();
        if (isset($responseData['session_id'])) {
            $payment = $this->stripeNotify($responseData);
            if($payment['status']){
                return redirect()->route('product.payment.return');
            }else{
                Session::put('message', $payment['message']);
                return redirect()->route('product.payment.cancle');
            }
        }
        /*  elseif (Session::has('order_payment_id')) {
              $payment = $this->paypalNotify($responseData);
              if ($payment['status']) {
                  return redirect()->route('front.checkout.success');
              } else {
                  Session::put('message', $payment['message']);
                  return redirect()->route('front.checkout.cancle');
              }
          }*/
        else {
            return redirect()->route('front.checkout.cancle');
        }
    }
}
