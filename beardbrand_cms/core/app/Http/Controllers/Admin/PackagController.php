<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Package;
use App\Sectiontitle;
use App\Language;
use Session;

class PackagController extends Controller
{
   public $lang;
    public function __construct()
    {
        $this->lang = Language::where('is_default',1)->first();
    }

    public function package(Request $request){
        $lang = Language::where('code', $request->language)->first()->id;
     
        $packages = Package::where('language_id', $lang)->orderBy('id', 'DESC')->get();
        
        $saectiontitle = Sectiontitle::where('language_id', $lang)->first();
        return view('admin.package.index', compact('packages', 'saectiontitle'));
    }

    // Add slider Category
    public function add(){
        return view('admin.package.add');
    }

    // Store slider Category
    public function store(Request $request){
        

        $request->validate([
            'name' => 'required|max:150',
            'language_id' => 'required',
            'image' => 'mimes:jpeg,jpg,png',
            // 'time' => 'required|max:150',
            'feature' => 'required',
            'price' => 'numeric',
            'discount_price' => 'numeric',
            // 'start_price' => 'numeric',
            // 'end_price' => 'numeric',
            'status' => 'required|max:150',
        ]);

        $package = new Package();
        if($request->hasFile('image')){
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $image = time().rand().'.'.$extension;
            $file->move('assets/kondangintech-landing/img/', $image);

            $package->image = $image;
        }
 
        $package->language_id = $request->language_id;
        $package->status = $request->status;
        $package->name = $request->name;
        // $package->time = $request->time;
        $package->feature = $request->feature;
        $package->price = $request->price;
        $package->discount_price = $request->discount_price;
        $package->start_price = $request->start_price;
        $package->end_price = $request->end_price;
        $package->save();

        // Package::create($request->all());

        

        $notification = array(
            'messege' => 'Package Added successfully!',
            'alert' => 'success'
        );
        return redirect()->back()->with('notification', $notification);
    }

    // slider Category Delete
    public function delete($id){

        $Package = Package::find($id);
        @unlink('assets/kondangintech-landing/img/'. $Package->image);
        $Package->delete();

        return back();
    }

    // slider Category Edit
    public function edit($id){

        $package = Package::find($id);
        return view('admin.package.edit', compact('package'));

    }

    // Update slider Category
    public function update(Request $request, $id){

        $id = $request->id;
        $request->validate([
            'name' => 'required|max:150',
            'language_id' => 'required',
            'image' => 'mimes:jpeg,jpg,png',
            // 'time' => 'required|max:150',
            'feature' => 'required',
            'price' => 'numeric',
            'discount_price' => 'numeric',
            // 'start_price' => 'numeric',
            // 'end_price' => 'numeric',
            'status' => 'required|max:150',
        ]);

        $package = Package::find($id);
        if($request->hasFile('image')){
            @unlink('assets/kondangintech-landing/img/'. $package->image);
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $image = time().rand().'.'.$extension;
            $file->move('assets/kondangintech-landing/img/', $image);

            $package->image = $image;
        }
        $package->language_id = $request->language_id;
        $package->status = $request->status;
        $package->name = $request->name;
        // $package->time = $request->time;
        $package->feature = $request->feature;
        $package->price = $request->price;
        $package->discount_price = $request->discount_price;
        $package->start_price = $request->start_price;
        $package->end_price = $request->end_price;
        $package->save();
        

        $notification = array(
            'messege' => 'Package Updated successfully!',
            'alert' => 'success'
        );
        return redirect(route('admin.package').'?language='.$this->lang->code)->with('notification', $notification);;
    }

        public function plancontent(Request $request, $id){
        
        $request->validate([
            'plan_title' => 'required',
            'plan_subtitle' => 'required',
            'pricing_bg' => 'mimes:jpeg,jpg,png',
        ]);
      
        $plan_title = Sectiontitle::where('language_id', $id)->first();

        if($request->hasFile('pricing_bg')){
            @unlink('assets/front/img/'. $plan_title->pricing_bg);
            $file = $request->file('pricing_bg');
            $extension = $file->getClientOriginalExtension();
            $pricing_bg = time().rand().'.'.$extension;
            $file->move('assets/front/img/', $pricing_bg);

            $plan_title->pricing_bg = $pricing_bg;

        }
    
        $plan_title->plan_title = $request->plan_title;
        $plan_title->plan_subtitle = $request->plan_subtitle;
        $plan_title->save();
        

        $notification = array(
            'messege' => 'Pricing Plan Content Updated successfully!',
            'alert' => 'success'
        );
        return redirect(route('admin.package').'?language='.$this->lang->code)->with('notification', $notification);
    }

}
