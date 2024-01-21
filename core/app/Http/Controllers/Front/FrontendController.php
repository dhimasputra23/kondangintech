<?php

namespace App\Http\Controllers\Front;
use App\Faq;
use Session;
use App\Blog;
use App\Team;
use App\About;
use App\Branch;
use App\Slider;
use App\Social;
use App\Package;
use App\Service;
use App\Billpaid;
use App\Language;
use App\Bcategory;
use App\Client;
use App\Daynamicpage;
use App\Mediazone;
use App\Emailsetting;
use App\Offerprovide;
use App\Packageorder;
use App\Sectiontitle;
use App\Entertainment;
use App\FeatureSecond;
use App\FeatureThird;
use App\Funfact;
use App\PaymentGatewey;
use App\Helpers\MailSend;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Portfolio;
use App\Portfoliocategory;
use App\Portfolioimage;
use App\Product;
use App\Testimonial;
use App\Value;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;

class FrontendController extends Controller
{


    // Home Page Funtions
    /* public function index(){
        if (session()->has('lang')) {
            $currlang = Language::where('code', session()->get('lang'))->first();
        } else {
            $currlang = Language::where('is_default', 1)->first();
        }
       
        $data['sliders'] = Slider::where('status',1)->where('language_id', $currlang->id)->get();
        $data['abouts'] = About::where('status',1)->where('language_id', $currlang->id)->get();
        $data['sectionInfo'] = Sectiontitle::where('language_id', $currlang->id)->first();
        $data['plans'] = Package::where('status',1)->where('language_id', $currlang->id)->get();
        $data['offers'] = Offerprovide::where('status',1)->where('language_id', $currlang->id)->get();
        $data['services'] = Service::where('status',1)->where('language_id', $currlang->id)->limit(6)->get();
        $data['blogs'] = Blog::where('status', 1)->where('language_id', $currlang->id)->orderBy('id', 'DESC')->limit(3)->get();
        $data['testimonials'] = Testimonial::where('language_id', $currlang->id)->orderBy('id', 'DESC')->get();
        $data['funfacts'] = Funfact::where('language_id', $currlang->id)->orderBy('id', 'DESC')->get();
        
        
        return view('front.index', $data);
    } */

   // Email Sends  Funtions
    public function sendmail(Request $request) {

        $request->validate([
          'name' => 'required',
          'email' => 'required|email',
          'subject' => 'required',
          'message' => 'required'
        ]);

        $about =  About::first();
        $from = $request->email;
        $to = $about->mail;
        $subject = $request->subject;
        $message = $request->message;

        $headers = "From: $request->name <$from> \r\n";
        $headers .= "Reply-To: $request->name <$from> \r\n";
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

        @mail($to, $subject, $message, $headers);

        $notification = array(
            'messege' => 'Email sent successfully!',
            'alert' => 'success'
        );
        return redirect()->back()->with('notification', $notification);

    }



    //Faq page
    public function faq() {
         if (session()->has('lang')) {
            $currlang = Language::where('code', session()->get('lang'))->first();
        } else {
            $currlang = Language::where('is_default', 1)->first();
        }

        $faqs = Faq::where('status', 1)->where('language_id', $currlang->id)->get();
        return view('front.faq', compact('faqs'));
    }

    //About page
    public function about() {
         if (session()->has('lang')) {
            $currlang = Language::where('code', session()->get('lang'))->first();
        } else {
            $currlang = Language::where('is_default', 1)->first();
        }

        $data['abouts'] = About::where('status',1)->where('language_id', $currlang->id)->get();
        $data['sectionInfo'] = Sectiontitle::where('language_id', $currlang->id)->first();
        $data['offers'] = Offerprovide::where('status',1)->where('language_id', $currlang->id)->get();
        $data['funfacts'] = Funfact::where('language_id', $currlang->id)->orderBy('id', 'DESC')->get();

        return view('front.about', $data);
    }

    //service page
    public function service() {
         if (session()->has('lang')) {
            $currlang = Language::where('code', session()->get('lang'))->first();
        } else {
            $currlang = Language::where('is_default', 1)->first();
        }

        $data['services'] = Service::where('status',1)->where('language_id', $currlang->id)->get();

        return view('front.service', $data);
    }

    public function service_details($slug){
        if (session()->has('lang')) {
            $currlang = Language::where('code', session()->get('lang'))->first();
        } else {
            $currlang = Language::where('is_default', 1)->first();
        }

        $data['service'] = Service::where('slug', $slug)->where('language_id', $currlang->id)->firstOrFail();
        $data['all_services'] = Service::where('status', 1)->where('language_id', $currlang->id)->orderBy('id', 'DESC')->get();

        return view('front.service-details', $data);
    }

    //package page
    public function package() {
         if (session()->has('lang')) {
            $currlang = Language::where('code', session()->get('lang'))->first();
        } else {
            $currlang = Language::where('is_default', 1)->first();
        }

        $data['plans'] = Package::where('status',1)->where('language_id', $currlang->id)->get();

        return view('front.package', $data);
    }

    //packagecheckout page
    public function packagecheckout($id){
         if (session()->has('lang')) {
            $currlang = Language::where('code', session()->get('lang'))->first();
        } else {
            $currlang = Language::where('is_default', 1)->first();
        }

        $data['packagedetails'] = Package::where('id', $id)->where('language_id', $currlang->id)->first();
        $data['gateways'] = PaymentGatewey::where('status',1)->get();
        $data['already_purchased'] = Packageorder::where('user_id', Auth::user()->id)->first();

        return view('front.packagecheckout', $data);
    }

    //media page
    public function media() {
         if (session()->has('lang')) {
            $currlang = Language::where('code', session()->get('lang'))->first();
        } else {
            $currlang = Language::where('is_default', 1)->first();
        }

        $data['entertainments'] = Entertainment::where('status',1)->where('language_id', $currlang->id)->get();
        $data['mediazones'] = Mediazone::where('status',1)->where('language_id', $currlang->id)->get();
        $data['sectionInfo'] = Sectiontitle::where('language_id', $currlang->id)->first();

        return view('front.media', $data);
    }

    //branch page
    public function branch() {
        if (session()->has('lang')) {
            $currlang = Language::where('code', session()->get('lang'))->first();
        } else {
            $currlang = Language::where('is_default', 1)->first();
        }

        $data['branches'] = Branch::where('language_id', $currlang->id)->where('status',1)->get();

        return view('front.branch', $data);
    }

    //team page
    public function team() {
         if (session()->has('lang')) {
            $currlang = Language::where('code', session()->get('lang'))->first();
        } else {
            $currlang = Language::where('is_default', 1)->first();
        }

        $data['teams'] = Team::where('language_id', $currlang->id)->where('status',1)->orderBy('id', 'DESC')->paginate(6);

        return view('front.team', $data);
    }

    //contact page
    public function contact() {
         if (session()->has('lang')) {
            $currlang = Language::where('code', session()->get('lang'))->first();
        } else {
            $currlang = Language::where('is_default', 1)->first();
        }

        $data['sectionInfo'] = Sectiontitle::where('language_id', $currlang->id)->first();
        $data['socials'] = Social::all();

        return view('front.contact', $data);
    }
    public function contactSubmit(Request $request){
         
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'subject' => 'required|string',
            'message' => 'required|string',
        ]);
       
        // Login Section
        $name = $request->name;
        $fromemail = $request->email;
        $subject = $request->subject;
        $mail = new PHPMailer(true);
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
                $mail->setFrom($fromemail, $name);
                $mail->addAddress($em->from_email, $em->from_name);

                // Content
                $mail->isHTML(true);
                $mail->Subject = $subject;
                $mail->Body    = "Name: ".$name."</br>Email: ".$fromemail."</br>Message: ".$request->message;

                $mail->send();
            } catch (Exception $e) {
                // die($e->getMessage());
            }
        } else {
            try {
                //Recipients
                $mail->setFrom($fromemail, $name);
                $mail->addAddress($em->from_email, $em->from_name);


                // Content
                $mail->isHTML(true);
                $mail->Subject = $subject;
                $mail->Body    = "Name: ".$name."</br>Email: ".$fromemail."</br>Message: ".$request->message;

                $mail->send();
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }


         $notification = array(
            'messege' => 'Mail send successfully',
            'alert' => 'success'
        );
        return redirect()->back()->with('notification', $notification);

    }
    //billpay page
    public function billpay() {
         if (session()->has('lang')) {
            $currlang = Language::where('code', session()->get('lang'))->first();
        } else {
            $currlang = Language::where('is_default', 1)->first();
        }

        $user = Auth::user();
        $data['packagedetails'] = Package::where('id', $user->activepackage)->first();
        $data['gateways'] = PaymentGatewey::where('status',1)->get();
        $data['billpayed'] = Billpaid::where('user_id', Auth::user()->id)->where('yearmonth', \Carbon\Carbon::now()->format('m-Y'))->first();

        return view('front.billpay', $data);
        
    }
 



    // Blog Page  Funtion
    /* public function blogs(Request $request){

        if (session()->has('lang')) {
            $currlang = Language::where('code', session()->get('lang'))->first();
        } else {
            $currlang = Language::where('is_default', 1)->first();
        }

        
        $category = $request->category;
        $catid = null;
        if (!empty($category)) {
            $data['category'] = Bcategory::where('slug', $category)->firstOrFail();
            $catid = $data['category']->id;
        }

        $term = $request->term;
        $month = $request->month;
        $year = $request->year;
        $bcategories = Bcategory::where('status', 1)->where('language_id', $currlang->id)->orderBy('id', 'DESC')->get();

        $latestblogs = Blog::where('status', 1)->where('language_id', $currlang->id)->orderBy('id', 'DESC')->limit(4)->get();

        $blogs = Blog::where('status', 1)->where('language_id', $currlang->id)
                        ->when($catid, function ($query, $catid) {
                            return $query->where('bcategory_id', $catid);
                        })
                        ->when($term, function ($query, $term) {
                            return $query->where('title', 'like', '%'.$term.'%');
                        })
                        ->orderBy('id', 'DESC')->paginate(6);

        return view('front.blogs', compact('blogs', 'bcategories', 'latestblogs'));
    } */

    // Blog Details  Funtion
    // public function blogdetails($slug) {

    //     if (session()->has('lang')) {
    //         $currlang = Language::where('code', session()->get('lang'))->first();
    //     } else {
    //         $currlang = Language::where('is_default', 1)->first();
    //     }

    //     $blog = Blog::where('slug', $slug)->where('language_id', $currlang->id)->firstOrFail();
    //     $latestblogs = Blog::where('status', 1)->where('language_id', $currlang->id)->orderBy('id', 'DESC')->limit(4)->get();
    //     $bcategories = Bcategory::where('status', 1)->where('language_id', $currlang->id)->orderBy('id', 'DESC')->get();
       
    //     return view('front.blogdetails', compact('blog', 'bcategories', 'latestblogs'));
    // }

    // Front Daynamic Page Function
    public function front_dynamic_page($slug){
        if (session()->has('lang')) {
            $currlang = Language::where('code', session()->get('lang'))->first();
        } else {
            $currlang = Language::where('is_default', 1)->first();
        }
        
        $front_daynamic_page = Daynamicpage::where('slug', $slug)->where('language_id', $currlang->id)->firstOrFail();

        return view('front.daynamicpage', compact('front_daynamic_page'));
    }

    // Speed Test
    public function speed(){
        return view('front.speed');
    }

    // Change Language
    public function changeLanguage($lang)
    {

        session()->put('lang', $lang);
        app()->setLocale($lang);

        return redirect()->route('front.index');
    }


    /* Start Kondangin Tech Front Controller */
    // Home Page Funtions
    public function index(){
        if (session()->has('lang')) {
            $currlang = Language::where('code', session()->get('lang'))->first();
        } else {
            $currlang = Language::where('is_default', 1)->first();
        }
       
        $data['sliders'] = Slider::where('status',1)->where('language_id', $currlang->id)->get();
        $data['abouts'] = About::where('status',1)->where('language_id', $currlang->id)->get();
        $data['values'] = Value::where('status',1)->where('language_id', $currlang->id)->get();
        $data['featuresSecond'] = FeatureSecond::where('status',1)->where('language_id', $currlang->id)->get();
        $data['featuresThird'] = FeatureThird::where('status',1)->where('language_id', $currlang->id)->get();
        $data['sectionInfo'] = Sectiontitle::where('language_id', $currlang->id)->first();
        $data['plans'] = Package::where('status',1)->where('language_id', $currlang->id)->get();
        $data['offers'] = Offerprovide::where('status',1)->where('language_id', $currlang->id)->get();
        $data['services'] = Service::where('status',1)->where('language_id', $currlang->id)->limit(6)->get();
        $data['blogs'] = Blog::where('status', 1)->where('language_id', $currlang->id)->orderBy('id', 'DESC')->limit(3)->get();
        $data['testimonials'] = Testimonial::where('language_id', $currlang->id)->orderBy('id', 'DESC')->get();
        $data['funfacts'] = Funfact::where('language_id', $currlang->id)->orderBy('id', 'DESC')->get();
        $data['faqs'] = Faq::where('status',1)->where('language_id', $currlang->id)->get();
        $data['teams'] = Team::where('status',1)->where('language_id', $currlang->id)->orderBy('id', 'DESC')->get();
        $data['clients'] = Client::where('language_id', $currlang->id)->orderBy('id', 'DESC')->get();
        $data['portfolios'] =  DB::select(DB::raw("SELECT p.*, pi.image_path, pc.name as category_name, pc.slug as category_slug, c.name as client_name 
        FROM `portfolios` p
        LEFT JOIN (
            SELECT portfolio_id, MAX(image_path) AS image_path
            FROM `portfolioimages`
            GROUP BY portfolio_id
        ) pi ON p.id = pi.portfolio_id
        LEFT JOIN portfoliocategories pc ON p.portfoliocategory_id = pc.id
        LEFT JOIN clients c ON p.client_id = c.id
        ORDER BY p.id DESC;"));
        // dd($data['portfolios']);
        $data['portfoliocategories'] = Portfoliocategory::where('language_id', $currlang->id)->orderBy('id', 'DESC')->get();
        
        
        return view('kondangintech-landing.index', $data);
    }
    public function blogs(Request $request){

        if (session()->has('lang')) {
            $currlang = Language::where('code', session()->get('lang'))->first();
        } else {
            $currlang = Language::where('is_default', 1)->first();
        }

        
        $category = $request->category;
        $catid = null;
        if (!empty($category)) {
            $data['category'] = Bcategory::where('slug', $category)->firstOrFail();
            $catid = $data['category']->id;
        }

        // $tag = $request->tag?$request->tag:null;

        $term = $request->term;
        $month = $request->month;
        $year = $request->year;
        $bcategories = Bcategory::where('status', 1)->where('language_id', $currlang->id)->orderBy('id', 'DESC')->get();
        foreach ($bcategories as $key => $bcategory) {
            $bcategory["count"] = Blog::where('status', 1)->where('language_id', $currlang->id)->where('bcategory_id',$bcategory->id)->count();
        }
        $latestblogs = Blog::where('status', 1)->where('language_id', $currlang->id)->orderBy('id', 'DESC')->limit(4)->get();
        $allTags = Blog::all()->flatMap->allTags->unique()->toArray();
        $latestTags = array_slice(array_reverse($allTags), 0, 10);

        $blogs = Blog::where('status', 1)->where('language_id', $currlang->id)
                        ->when($catid, function ($query, $catid) {
                            return $query->where('bcategory_id', $catid);
                        })
                        ->when($term, function ($query, $term) {
                            return $query->where('title', 'like', '%'.$term.'%');
                        })->when($request->has('tag'), function ($query) use ($request) {
                            // Menambahkan kondisi where untuk memeriksa keberadaan tag dalam kolom tags
                            return $query->where('tags', 'like', '%' . $request->tag . '%');
                        })->when($request->has('term'), function ($query) use ($request) {
                            return $query->where('title', 'like', '%' . $request->term . '%');
                        })                  
                        ->orderBy('id', 'DESC')->paginate(6);

        return view('kondangintech-landing.blog', compact('blogs', 'bcategories', 'latestblogs','latestTags'));
    }
    public function blogdetails($slug) {

        if (session()->has('lang')) {
            $currlang = Language::where('code', session()->get('lang'))->first();
        } else {
            $currlang = Language::where('is_default', 1)->first();
        }

        $blog = Blog::where('slug', $slug)->where('language_id', $currlang->id)->firstOrFail();
        $latestblogs = Blog::where('status', 1)->where('language_id', $currlang->id)->orderBy('id', 'DESC')->limit(5)->get();
        $allTags = Blog::all()->flatMap->allTags->unique()->toArray();
        $latestTags = array_slice(array_reverse($allTags), 0, 10);
        $bcategories = Bcategory::where('status', 1)->where('language_id', $currlang->id)->orderBy('id', 'DESC')->get();
        foreach ($bcategories as $key => $bcategory) {
            $bcategory["count"] = Blog::where('status', 1)->where('language_id', $currlang->id)->where('bcategory_id',$bcategory->id)->count();
        }
        return view('kondangintech-landing.blog-single', compact('blog', 'bcategories', 'latestblogs','latestTags'));
    }
    public function portfoliodetails($slug) {

        if (session()->has('lang')) {
            $currlang = Language::where('code', session()->get('lang'))->first();
        } else {
            $currlang = Language::where('is_default', 1)->first();
        }

        $portfolio = Portfolio::where('slug', $slug)->where('language_id', $currlang->id)->firstOrFail();
        $images = Portfolioimage::where('portfolio_id',$portfolio->id)->get();
        return view('kondangintech-landing.portfolio-details', compact('portfolio', 'images'));
    }
    
    /* End Kondangin Tech Front Controller */
    
}