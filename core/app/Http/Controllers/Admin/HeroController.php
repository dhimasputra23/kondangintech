<?php

namespace App\Http\Controllers\Admin;

use Session;
use App\About;
use App\Language;
use App\Sectiontitle;
use Illuminate\Http\Request;
use Mews\Purifier\Facades\Purifier;
use App\Http\Controllers\Controller;

class HeroController extends Controller
{
    public $lang;
    public function __construct()
    {
        $this->lang = Language::where('is_default',1)->first();
    }

    public function hero(Request $request){
        
        $lang = Language::where('code', $request->language)->first()->id;
     
        // $abouts = About::where('language_id', $lang)->orderBy('id', 'DESC')->get();
        $saectiontitle = Sectiontitle::where('language_id', $lang)->first();
        
        return view('admin.hero.index', compact('saectiontitle'));
    }

    

    public function herocontent(Request $request, $id){
        
        $request->validate([
            'hero_title' => 'required',
            'hero_subtitle' => 'required',
            'hero_image' => 'mimes:jpeg,jpg,png',
        ]);
        $hero_title = Sectiontitle::where('language_id', $id)->first();

         if($request->hasFile('hero_image')){
            @unlink('assets/kondangintech-landing/img/'. $hero_title->hero_image);
            $file = $request->file('hero_image');
            $extension = $file->getClientOriginalExtension();
            $hero_image = time().rand().'.'.$extension;
            $file->move('assets/kondangintech-landing/img/', $hero_image);

            $hero_title->hero_image = $hero_image;
        }

        $hero_title->hero_title = $request->hero_title;
        $hero_title->hero_subtitle = Purifier::clean($request->hero_subtitle);
        $hero_title->save();

        $notification = array(
            'messege' => 'Hero Content Updated successfully!',
            'alert' => 'success'
        );
        return redirect(route('admin.hero').'?language='.$this->lang->code)->with('notification', $notification);
    }
}