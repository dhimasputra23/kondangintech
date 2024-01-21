<?php

namespace App\Http\Controllers\Admin;

use Session;
use App\About;
use App\FeatureSecond;
use App\FeatureThird;
use App\Language;
use App\Sectiontitle;
use Illuminate\Http\Request;
use Mews\Purifier\Facades\Purifier;
use App\Http\Controllers\Controller;
use App\Value;

class FeatureController extends Controller
{
    public $lang;
    public function __construct()
    {
        $this->lang = Language::where('is_default',1)->first();
    }

    public function feature1(Request $request){
        
        $lang = Language::where('code', $request->language)->first()->id;
     
        // $values = Value::where('language_id', $lang)->orderBy('id', 'DESC')->get();
        $saectiontitle = Sectiontitle::where('language_id', $lang)->first();
        
        return view('admin.feature-1.index', compact('saectiontitle'));
    }

    public function feature2(Request $request){
        
        $lang = Language::where('code', $request->language)->first()->id;
     
        $featuresSecond = FeatureSecond::where('language_id', $lang)->orderBy('id', 'DESC')->get();
        $saectiontitle = Sectiontitle::where('language_id', $lang)->first();
        
        return view('admin.feature-2.index', compact('featuresSecond','saectiontitle'));
    }

    public function feature3(Request $request){
        
        $lang = Language::where('code', $request->language)->first()->id;
     
        $featuresThird = FeatureThird::where('language_id', $lang)->orderBy('id', 'DESC')->get();
        $saectiontitle = Sectiontitle::where('language_id', $lang)->first();
        
        return view('admin.feature-3.index', compact('featuresThird','saectiontitle'));
    }

    // Add slider Category
    public function feature2add(){
        return view('admin.feature-2.add');
    }
    public function feature3add(){
        return view('admin.feature-3.add');
    }

    // Store slider Category
    public function feature2store(Request $request){

        $request->validate([
            'name' => 'required',
            'language_id' => 'required',
            'status' => 'required|max:150',
            'description' => 'required',
            // 'image' => 'mimes:jpeg,jpg,png',
        ]);
        $feature_second = new FeatureSecond();

        //  if($request->hasFile('image')){
        //     $file = $request->file('image');
        //     $extension = $file->getClientOriginalExtension();
        //     $image = time().rand().'.'.$extension;
        //     $file->move('assets/kondangintech-landing/img/', $image);

        //     $value->image = $image;
        // }
        $feature_second->language_id = $request->language_id;
        $feature_second->status = $request->status;
        $feature_second->name = $request->name;
        $feature_second->description = Purifier::clean($request->description);
        $feature_second->save();

        $notification = array(
            'messege' => 'Feature-2 Feature Added successfully!',
            'alert' => 'success'
        );
        return redirect()->back()->with('notification', $notification);
    }
    public function feature3store(Request $request){

        $request->validate([
            'name' => 'required',
            'language_id' => 'required',
            'status' => 'required|max:150',
            'description' => 'required',
            'image' => 'mimes:jpeg,jpg,png',
        ]);
        $feature_third = new FeatureThird();

        if($request->hasFile('image')){
             $file = $request->file('image');
             $extension = $file->getClientOriginalExtension();
             $image = time().rand().'.'.$extension;
             $file->move('assets/kondangintech-landing/img/', $image);

             $feature_third->image = $image;
         }
        $feature_third->language_id = $request->language_id;
        $feature_third->status = $request->status;
        $feature_third->name = $request->name;
        $feature_third->description = Purifier::clean($request->description);
        $feature_third->save();

        $notification = array(
            'messege' => 'Feature-3 Feature Added successfully!',
            'alert' => 'success'
        );
        return redirect()->back()->with('notification', $notification);
    }

    // slider Category Delete
    public function feature2delete($id){

        $feature_second = FeatureSecond::find($id);
        $feature_second->delete();

        return back();
    }
    public function feature3delete($id){

        $feature_third = FeatureThird::find($id);
        $feature_third->delete();

        return back();
    }

    // slider Category Edit
    public function feature2edit($id){

        $feature_second = FeatureSecond::find($id);
        return view('admin.feature-2.edit', compact('feature_second'));

    }
    public function feature3edit($id){

        $feature_third = FeatureThird::find($id);
        return view('admin.feature-3.edit', compact('feature_third'));

    }

    // Update slider Category
    public function feature2update(Request $request, $id){
        
        $id = $request->id;
        $request->validate([
            'language_id' => 'required',
            'status' => 'required|max:150',
            'name' => 'required',
            'description' => 'required',
            // 'image' => 'mimes:jpeg,jpg,png',
        ]);

        $feature_second = FeatureSecond::find($id);
        /* if($request->hasFile('image')){
            @unlink('assets/kondangintech-landing/img/'. $value->image);
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $image = time().rand().'.'.$extension;
            $file->move('assets/kondangintech-landing/img/', $image);

            $value->image = $image;
        } */
        $feature_second->language_id = $request->language_id;
        $feature_second->status = $request->status;
        $feature_second->name = $request->name;
        $feature_second->description = ($request->description);
        $feature_second->save();
        // $value->update($request->all());

        $notification = array(
            'messege' => 'Feature-2 Feature Updated successfully!',
            'alert' => 'success'
        );
        return redirect(route('admin.feature2').'?language='.$this->lang->code)->with('notification', $notification);
    }
    public function feature3update(Request $request, $id){
        
        $id = $request->id;
        $request->validate([
            'language_id' => 'required',
            'status' => 'required|max:150',
            'name' => 'required',
            'description' => 'required',
            'image' => 'mimes:jpeg,jpg,png',
        ]);

        $feature_third = FeatureThird::find($id);
        if($request->hasFile('image')){
            @unlink('assets/kondangintech-landing/img/'. $feature_third->image);
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $image = time().rand().'.'.$extension;
            $file->move('assets/kondangintech-landing/img/', $image);

            $feature_third->image = $image;
        }
        $feature_third->language_id = $request->language_id;
        $feature_third->status = $request->status;
        $feature_third->name = $request->name;
        $feature_third->description = ($request->description);
        $feature_third->save();
        // $value->update($request->all());

        $notification = array(
            'messege' => 'Feature-3 Feature Updated successfully!',
            'alert' => 'success'
        );
        return redirect(route('admin.feature3').'?language='.$this->lang->code)->with('notification', $notification);
    }

    public function feature1content(Request $request, $id){
        
        $request->validate([
            'feature_first_title' => 'required',
            // 'value_subtitle' => 'required',
            'feature_first_image' => 'mimes:jpeg,jpg,png',
        ]);
        $feature_first = Sectiontitle::where('language_id', $id)->first();

         if($request->hasFile('feature_first_image')){
            @unlink('assets/kondangintech-landing/img/'. $feature_first->feature_first_image);
            $file = $request->file('feature_first_image');
            $extension = $file->getClientOriginalExtension();
            $feature_first_image = time().rand().'.'.$extension;
            $file->move('assets/kondangintech-landing/img/', $feature_first_image);

            $feature_first->feature_first_image = $feature_first_image;
        }

        $feature_first->feature_first_title = $request->feature_first_title;
        $feature_first->feature_first_subtitle = $request->feature_first_subtitle;
        $feature_first->save();

        $notification = array(
            'messege' => 'Feature 1 Content Updated successfully!',
            'alert' => 'success'
        );
        return redirect(route('admin.feature1').'?language='.$this->lang->code)->with('notification', $notification);
    }

    public function feature2content(Request $request, $id){
        
        $request->validate([
            'feature_second_title' => 'required',
            // 'value_subtitle' => 'required',
            'feature_second_image' => 'mimes:jpeg,jpg,png',
        ]);
        $feature_second = Sectiontitle::where('language_id', $id)->first();

         if($request->hasFile('feature_second_image')){
            @unlink('assets/kondangintech-landing/img/'. $feature_second->feature_second_image);
            $file = $request->file('feature_second_image');
            $extension = $file->getClientOriginalExtension();
            $feature_second_image = time().rand().'.'.$extension;
            $file->move('assets/kondangintech-landing/img/', $feature_second_image);

            $feature_second->feature_second_image = $feature_second_image;
        }

        $feature_second->feature_second_title = $request->feature_second_title;
        $feature_second->feature_second_subtitle = Purifier::clean($request->feature_second_subtitle);
        $feature_second->save();

        $notification = array(
            'messege' => 'Feature 2 Content Updated successfully!',
            'alert' => 'success'
        );
        return redirect(route('admin.feature2').'?language='.$this->lang->code)->with('notification', $notification);
    }
    public function feature3content(Request $request, $id){
        
        $request->validate([
            'feature_third_title' => 'required',
            // 'value_subtitle' => 'required',
            'feature_third_image' => 'mimes:jpeg,jpg,png',
        ]);
        $feature_third = Sectiontitle::where('language_id', $id)->first();

         if($request->hasFile('feature_third_image')){
            @unlink('assets/kondangintech-landing/img/'. $feature_third->feature_third_image);
            $file = $request->file('feature_third_image');
            $extension = $file->getClientOriginalExtension();
            $feature_third_image = time().rand().'.'.$extension;
            $file->move('assets/kondangintech-landing/img/', $feature_third_image);

            $feature_third->feature_third_image = $feature_third_image;
        }

        $feature_third->feature_third_title = $request->feature_third_title;
        $feature_third->feature_third_subtitle = Purifier::clean($request->feature_third_subtitle);
        $feature_third->save();

        $notification = array(
            'messege' => 'Feature 3 Content Updated successfully!',
            'alert' => 'success'
        );
        return redirect(route('admin.feature3').'?language='.$this->lang->code)->with('notification', $notification);
    }
}