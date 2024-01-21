<?php

namespace App\Http\Controllers\Admin;

use App\Client;
use App\Funfact;
use App\Language;
use App\Sectiontitle;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ClientsController extends Controller
{
    public $lang;
    public function __construct()
    {
        $this->lang = Language::where('is_default',1)->first();
    }

    public function clients(Request $request){
        $lang = Language::where('code', $request->language)->first()->id;

        $clients = Client::where('language_id', $lang)->orderBy('id', 'DESC')->get();
        $saectiontitle = Sectiontitle::where('language_id', $lang)->first();

        return view('admin.clients.index', compact('clients', 'saectiontitle'));
    }

    public function add(){
        return view('admin.clients.add');
    }

    public function store(Request $request){

      
        $request->validate([
            /* 'icon' => 'required|mimes:jpeg,jpg,png', */
            'language_id' => 'required',
            'logo' => 'required|mimes:jpeg,jpg,png',
            'name' => 'required|max:255',
            // 'value' => 'required',
        ]);

        $client = new Client();

        if($request->hasFile('logo')){
            $file = $request->file('logo');
            $extension = $file->getClientOriginalExtension();
            $icon = time().rand().'.'.$extension;
            $file->move('assets/kondangintech-landing/img/', $icon);

            $client->logo = $icon;
        }
        
        // $client->icon = $request->icon;
        $client->language_id = $request->language_id;
        $client->name = $request->name;
        $client->status = $request->status;
        // $client->value = $request->value;
        $client->save();

        $notification = array(
            'messege' => 'Client Added successfully!',
            'alert' => 'success'
        );
        return redirect()->back()->with('notification', $notification);
    }

    public function edit($id){

        $client = Client::find($id);
        return view('admin.clients.edit', compact('client'));

    }

    public function update(Request $request, $id){


        $client = Client::findOrFail($id);

         $request->validate([
            /* 'icon' => 'mimes:jpeg,jpg,png', */
            'language_id' => 'required',
            'logo' => 'mimes:jpeg,jpg,png',
            'name' => 'required|max:255',
            // 'value' => 'required',
        ]);

        if($request->hasFile('logo')){
            @unlink('assets/kondangintech-landing/img/'. $client->logo);
            $file = $request->file('logo');
            $extension = $file->getClientOriginalExtension();
            $icon = time().rand().'.'.$extension;
            $file->move('assets/kondangintech-landing/img/', $icon);

            $client->logo = $icon;
        }

        $client->language_id = $request->language_id;
        $client->name = $request->name;
        $client->status = $request->status;
        $client->save();

        $notification = array(
            'messege' => 'Client Updated successfully!',
            'alert' => 'success'
        );
        return redirect(route('admin.clients').'?language='.$this->lang->code)->with('notification', $notification);
    }

    public function delete($id){

        $client = Client::find($id);
        @unlink('assets/kondangintech-landing/img/'. $client->logo);
        $client->delete();

        return back();
    }

    public function clientscontent(Request $request, $id){
        
        $request->validate([
            'clients_title' => 'required|string',
            'clients_image' => 'mimes:jpeg,jpg,png',
        ]);

        $clients_title = Sectiontitle::where('language_id', $id)->first();
        $clients_title->clients_title = $request->clients_title;
        if($request->hasFile('clients_image')){
            @unlink('assets/kondangintech-landing/img/'. $clients_title->clients_image);
            $file = $request->file('clients_image');
            $extension = $file->getClientOriginalExtension();
            $clients_image = time().rand().'.'.$extension;
            $file->move('assets/kondangintech-landing/img/', $clients_image);

            $clients_title->clients_image = $clients_image;
        }

        $clients_title->save();

        $notification = array(
            'messege' => 'Clients Content Updated successfully!',
            'alert' => 'success'
        );
        return redirect(route('admin.clients').'?language='.$this->lang->code)->with('notification', $notification);
    }

}
