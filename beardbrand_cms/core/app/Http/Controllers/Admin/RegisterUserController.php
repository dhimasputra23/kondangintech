<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\Package;
use App\Billpaid;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Response;

class RegisterUserController extends Controller
{
    public function index()
    {
        $users = User::paginate(10);
        return view('admin.register_user.index',compact('users'));
    }

    public function view($id)
    {
       
        $user = User::findOrFail($id);
        $package = Package::find($user->activepackage);
        $bills = Billpaid::with('user', 'package')->where('user_id', $id)->orderBy('id', 'DESC')->paginate(10);

    
        return view('admin.register_user.details',compact('user','package', 'bills'));

    }

    public function package_buy(){
        $activeusers = User::whereNotNull('activepackage')->get();
        return view('admin.register_user.package-buy', compact('activeusers'));
    }

    public function package_not_buy(){
        $dactiveusers = User::where('activepackage', NULL)->get();

        return view('admin.register_user.package-not-buy', compact('dactiveusers'));
    }


    public function userban(Request $request)
    {

        $user = User::findOrFail($request->user_id);
        $user->update([
            'status' => $request->status,
        ]);

        Session::flash('success', $user->username.' status update successfully!');
        return back();



    }
}
