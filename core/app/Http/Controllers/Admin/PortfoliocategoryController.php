<?php

namespace App\Http\Controllers\Admin;

use Session;
use App\Blog;
use App\Language;
use App\Bcategory;
use App\Helpers\Helper;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Portfolio;
use App\Portfoliocategory;

class PortfoliocategoryController extends Controller
{
    public $lang;
    public function __construct()
    {
        $this->lang = Language::where('is_default', 1)->first();
    }

    public function portfoliocategory(Request $request)
    {
        $lang = Language::where('code', $request->language)->first()->id;

        $portfoliocategories = Portfoliocategory::where('language_id', $lang)->orderBy('id', 'desc')->get();
        return view('admin.portfolio.portfolio-category.index', compact('portfoliocategories'));
    }

    // Add Blog Category
    public function add()
    {
        return view('admin.portfolio.portfolio-category.add');
    }

    // Store Blog Category
    public function store(Request $request)
    {
        $slug = Helper::make_slug($request->name);
        $portfoliocategories = Portfoliocategory::select('slug')->get();

        $request->validate([
            'name' => [
                'required',
                'unique:portfoliocategories,name',
                'max:150',
                function ($attribute, $value, $fail) use ($slug, $portfoliocategories) {
                    foreach ($portfoliocategories as $portfoliocategory) {
                        if ($portfoliocategory->slug == $slug) {
                            return $fail('Title already taken!');
                        }
                    }
                }
            ],
            'status' => 'required',
        ]);

        $portfoliocategory = new Portfoliocategory();

        $portfoliocategory->language_id = $request->language_id;
        $portfoliocategory->name = $request->name;
        $portfoliocategory->slug = $slug;
        $portfoliocategory->status = $request->status;
        $portfoliocategory->save();


        $notification = array(
            'messege' => 'Portfolio Category Added successfully!',
            'alert' => 'success'
        );
        return redirect()->back()->with('notification', $notification);
    }

    // Blog Category Delete
    public function delete($id)
    {

        $portfoliocategory = Portfoliocategory::find($id);
        $portfolios = Portfolio::where('portfoliocategory_id', $id)->get();
        foreach ($portfolios as $data) {

            $data->delete();
        }
        $portfoliocategory->delete();

    }

    // Blog Category Edit
    public function edit($id)
    {

        $portfoliocategory = Portfoliocategory::find($id);
        return view('admin.portfolio.portfolio-category.edit', compact('portfoliocategory'));
    }

    // Blog Skill Category
    public function update(Request $request, $id)
    {
     
        $slug = Helper::make_slug($request->name);
        $portfoliocategories = Portfoliocategory::select('slug')->get();
        $portfoliocategory = Portfoliocategory::findOrFail($id);

        $request->validate([
            'name' => [
                'required',
                'max:150',
                function ($attribute, $value, $fail) use ($slug, $portfoliocategories, $portfoliocategory) {
                    foreach ($portfoliocategories as $serv) {
                        if ($portfoliocategory->slug != $slug) {
                            if ($serv->slug == $slug) {
                                return $fail('Title already taken!');
                            }
                        }
                    }
                },
                'unique:portfoliocategories,name,'.$id
            ],
            'status' => 'required',
        ]);

        $portfoliocategory = Portfoliocategory::find($id);
        $portfoliocategory->name = $request->name;
        $portfoliocategory->status = $request->status;
        $portfoliocategory->slug = $slug;
        $portfoliocategory->save();

        $notification = array(
            'messege' => 'Portfolio Category Updated successfully!',
            'alert' => 'success'
        );
        return redirect(route('admin.portfoliocategory').'?language='.$this->lang->code)->with('notification', $notification);
    }
}
