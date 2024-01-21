<?php

namespace App\Http\Controllers\Admin;

use Session;
use App\Blog;
use App\Language;
use App\Bcategory;
use App\Client;
use App\Sectiontitle;
use App\Helpers\Helper;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Mews\Purifier\Facades\Purifier;
use App\Http\Controllers\Controller;
use App\Portfolio;
use App\Portfoliocategory;
use App\Portfolioimage;

class PortfolioController extends Controller
{
    public $lang;
    public function __construct()
    {
        $this->lang = Language::where('is_default', 1)->first();
    }

    public function portfolio(Request $request){
        $lang = Language::where('code', $request->language)->first()->id;

        $portfolios = Portfolio::where('language_id', $lang)->orderBy('id', 'DESC')->get();

        $saectiontitle = Sectiontitle::where('language_id', $lang)->first();
      
        return view('admin.portfolio.index', compact('portfolios', 'saectiontitle'));
    }

    public function portfolio_get_category($id){

        $portfoliocategories = Portfoliocategory::where('status', 1)->where('language_id', $id)->get();
        // $output = '';

        // foreach($portfoliocategories as $portfoliocategory){
        //     $output .= '<option value="'.$portfoliocategory->id.'">'.$portfoliocategory->name.'</option>';
        // }
        return $portfoliocategories;
    }
    public function portfolio_get_client($id){

        $clients = Client::where('status', 1)->where('language_id', $id)->get();
        // $output = '';

        // foreach($clients as $client){
        //     $output .= '<option value="'.$client->id.'">'.$client->name.'</option>';
        // }
        return $clients;
    }

    // Add Blog 
    public function add(){
        $portfoliocategories = $this->portfolio_get_category($this->lang->id);
        $clients = $this->portfolio_get_client($this->lang->id);

        return view('admin.portfolio.add', compact('portfoliocategories','clients'));
    }

    

    // Store Blog 
    public function store(Request $request){

        $slug = Helper::make_slug($request->title);
        $portfolios = Portfolio::select('slug')->get();
   

        $request->validate([
            // 'main_image' => 'required|mimes:jpeg,jpg,png',
            'images.*' => 'image|required|mimes:jpeg,png,jpg|max:2048',
            'title' => [
                'required',
                'unique:portfolios,title',
                'max:255',
                function($attribute, $value, $fail) use ($slug, $portfolios){
                    foreach($portfolios as $portfolio){
                        if($portfolio->slug == $slug){
                            return $fail('Title already taken!');
                        }
                    }
                }
            ],
            'language_id' => 'required',
            'portfoliocategory_id' => 'required',
            'client_id' => 'required',
            'project_date' => 'required',
            'project_url' => 'required',
            'content' => 'required',
            'status' => 'required',
            
        ]);


        $portfolio = new Portfolio();

        /* if($request->hasFile('main_image')){

            $file = $request->file('main_image');
            $extension = $file->getClientOriginalExtension();
            $main_image = time().rand().'.'.$extension;
            $file->move('assets/kondangintech-landing/img/', $main_image);

            $portfolio->main_image = $main_image;
        }
 */

        $portfolio->title = $request->title;
        $portfolio->language_id = $request->language_id;
        $portfolio->portfoliocategory_id = $request->portfoliocategory_id;
        $portfolio->client_id = $request->client_id;
        $portfolio->project_date = $request->project_date;
        $portfolio->project_url = $request->project_url;
        $portfolio->slug = $slug;
        $portfolio->status = $request->status;
        $portfolio->content = Purifier::clean($request->content);

        $portfolio->save();
        foreach ($request->file('images') as $image) {
            // Proses penyimpanan gambar, misalnya dengan menggunakan Storage atau intervention/image package
            $imageName = time() .rand().'.'. $image->getClientOriginalExtension();
            $image->move('assets/kondangintech-landing/img/', $imageName);

            // Simpan nama gambar ke database sesuai kebutuhan Anda
            Portfolioimage::create(['image_path' => $imageName,'portfolio_id'=>$portfolio->id]);
        }

        $notification = array(
            'messege' => 'Portfolio Added successfully!',
            'alert' => 'success'
        );
        return redirect()->back()->with('notification', $notification);

    }

    // Blog  Delete
    public function delete($id){

        $portfolio = Portfolio::find($id);
        $images = Portfolioimage::where('portfolio_id',$portfolio->id)->get();
        foreach ($images as $image) {
            @unlink('assets/kondangintech-landing/img/'. $image->image_path);
            $image->delete();
            
        }
        $portfolio->delete();
        return back();
    }

    // Blog  Edit
    public function edit($id){
       
        $portfolio = Portfolio::findOrFail($id);
        $portfolio_lan = $portfolio->language_id;
       
        $portfoliocategories = Portfoliocategory::where('status', 1)->where('language_id', $portfolio_lan)->get();
        $clients = Client::where('status', 1)->where('language_id', $portfolio_lan)->get();
        $images = Portfolioimage::where('portfolio_id',$portfolio->id)->get();
        
        return view('admin.portfolio.edit', compact('portfoliocategories', 'portfolio','clients','images'));

    }

    // Blog Update
    public function update(Request $request, $id){

        $slug = Helper::make_slug($request->title);
        $portfolios = Portfolio::select('slug')->get();
        $portfolio = Portfolio::findOrFail($id);

        $request->validate([
            // 'images.*' => 'image|mimes:jpeg,png,jpg|max:2048',
            'title' => [
                'required',
                'max:255',
                function($attribute, $value, $fail) use ($slug, $portfolios, $portfolio){
                    foreach($portfolios as $prtfl){
                        if($portfolio->slug != $slug){
                            if($prtfl->slug == $slug){
                                return $fail('Title already taken!');
                            }
                        }
                    }
                },
                'unique:portfolios,title,'.$id
            ],
            'language_id' => 'required',
            'portfoliocategory_id' => 'required',
            'client_id' => 'required',
            'project_date' => 'required',
            'project_url' => 'required',
            'content' => 'required',
            'status' => 'required',

        ]);

        // if($request->hasFile('main_image')){
        //     @unlink('assets/kondangintech-landing/img/'. $portfolio->main_image);

        //     $file = $request->file('main_image');
        //     $extension = $file->getClientOriginalExtension();
        //     $main_image = time().rand().'.'.$extension;
        //     $file->move('assets/kondangintech-landing/img/', $main_image);

        //     $portfolio->main_image = $main_image;
            
        // }
        if ($request->file('images')) {
            $images = Portfolioimage::where('portfolio_id',$portfolio->id)->get();
            foreach ($images as $image) {
                @unlink('assets/kondangintech-landing/img/'. $image->image_path);
                $image->delete();
                // Proses penyimpanan gambar, misalnya dengan menggunakan Storage atau intervention/image package
            }
            foreach ($request->file('images') as $image) {
                // Proses penyimpanan gambar, misalnya dengan menggunakan Storage atau intervention/image package
                $imageName = time() .rand().'.'. $image->getClientOriginalExtension();
                $image->move('assets/kondangintech-landing/img/', $imageName);

                // Simpan nama gambar ke database sesuai kebutuhan Anda
                Portfolioimage::create(['image_path' => $imageName,'portfolio_id'=>$portfolio->id]);
            }
        }
        
        

        $portfolio->title = $request->title;
        $portfolio->language_id = $request->language_id;
        $portfolio->portfoliocategory_id = $request->portfoliocategory_id;
        $portfolio->client_id = $request->client_id;
        $portfolio->project_date = $request->project_date;
        $portfolio->project_url = $request->project_url;
        $portfolio->slug = $slug;
        $portfolio->status = $request->status;
        $portfolio->content = Purifier::clean($request->content);

        $portfolio->save();
    
        

        $notification = array(
            'messege' => 'Portfolio Updated successfully!',
            'alert' => 'success'
        );

        return redirect(route('admin.portfolio').'?language='.$this->lang->code)->with('notification', $notification);

    }

    public function portfoliocontent(Request $request, $id){
        
        $request->validate([
            'portfolio_title' => 'required',
            'portfolio_subtitle' => 'required'
        ]);
        // dd($request->all());
        $portfolio_title = Sectiontitle::where('language_id', $id)->first();


        $portfolio_title->portfolio_title = $request->portfolio_title;
        $portfolio_title->portfolio_subtitle = $request->portfolio_subtitle;
        $portfolio_title->save();

        $notification = array(
            'messege' => 'Portfolio Content Updated successfully!',
            'alert' => 'success'
        );
        return redirect(route('admin.portfolio').'?language='.$this->lang->code)->with('notification', $notification);
    }
}
