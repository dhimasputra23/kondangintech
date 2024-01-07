<?php

namespace App\Http\Controllers\Admin;

use Session;
use App\About;
use App\Language;
use App\Sectiontitle;
use Illuminate\Http\Request;
use Mews\Purifier\Facades\Purifier;
use App\Http\Controllers\Controller;
use App\Value;

class ValueController extends Controller
{
    public $lang;
    public function __construct()
    {
        $this->lang = Language::where('is_default',1)->first();
    }

    public function value(Request $request){
        
        $lang = Language::where('code', $request->language)->first()->id;
     
        $values = Value::where('language_id', $lang)->orderBy('id', 'DESC')->get();
        $saectiontitle = Sectiontitle::where('language_id', $lang)->first();
        
        return view('admin.value.index', compact('values','saectiontitle'));
    }

    // Add slider Category
    public function add(){
        return view('admin.value.add');
    }

    // Store slider Category
    public function store(Request $request){

        $request->validate([
            'name' => 'required',
            'language_id' => 'required',
            'status' => 'required|max:150',
            'description' => 'required',
            'image' => 'mimes:jpeg,jpg,png',
        ]);
        $value = new Value();

         if($request->hasFile('image')){
            // @unlink('assets/kondangintech-landing/img/'. $value_title->image);
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $image = time().rand().'.'.$extension;
            $file->move('assets/kondangintech-landing/img/', $image);

            $value->image = $image;
        }
        $value->language_id = $request->language_id;
        $value->status = $request->status;
        $value->name = $request->name;
        $value->description = Purifier::clean($request->description);
        $value->save();

        $notification = array(
            'messege' => 'Value Feature Added successfully!',
            'alert' => 'success'
        );
        return redirect()->back()->with('notification', $notification);
    }

    // slider Category Delete
    public function delete($id){

        $value = Value::find($id);
        $value->delete();

        return back();
    }

    // slider Category Edit
    public function edit($id){

        $value = Value::find($id);
        return view('admin.value.edit', compact('value'));

    }

    // Update slider Category
    public function update(Request $request, $id){
        
        $id = $request->id;
        $request->validate([
            'language_id' => 'required',
            'status' => 'required|max:150',
            'name' => 'required',
            'description' => 'required',
            'image' => 'mimes:jpeg,jpg,png',
        ]);

        $value = Value::find($id);
        if($request->hasFile('image')){
            @unlink('assets/kondangintech-landing/img/'. $value->image);
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $image = time().rand().'.'.$extension;
            $file->move('assets/kondangintech-landing/img/', $image);

            $value->image = $image;
        }
        $value->language_id = $request->language_id;
        $value->status = $request->status;
        $value->name = $request->name;
        $value->description = Purifier::clean($request->description);
        $value->save();
        // $value->update($request->all());

        $notification = array(
            'messege' => 'Value Feature Updated successfully!',
            'alert' => 'success'
        );
        return redirect(route('admin.value').'?language='.$this->lang->code)->with('notification', $notification);
    }

    public function valuecontent(Request $request, $id){
        
        $request->validate([
            'value_title' => 'required',
            // 'value_subtitle' => 'required',
            'value_image' => 'mimes:jpeg,jpg,png',
        ]);
        $value_title = Sectiontitle::where('language_id', $id)->first();

         if($request->hasFile('value_image')){
            @unlink('assets/kondangintech-landing/img/'. $value_title->value_image);
            $file = $request->file('value_image');
            $extension = $file->getClientOriginalExtension();
            $value_image = time().rand().'.'.$extension;
            $file->move('assets/kondangintech-landing/img/', $value_image);

            $value_title->value_image = $value_image;
        }

        $value_title->value_title = $request->value_title;
        $value_title->value_subtitle = Purifier::clean($request->value_subtitle);
        $value_title->save();

        $notification = array(
            'messege' => 'value Content Updated successfully!',
            'alert' => 'success'
        );
        return redirect(route('admin.value').'?language='.$this->lang->code)->with('notification', $notification);
    }
}