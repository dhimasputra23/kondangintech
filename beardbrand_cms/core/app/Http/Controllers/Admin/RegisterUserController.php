<?php

namespace App\Http\Controllers\Admin;

use App\OrderItem;
use App\Packageorder;
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

        $notification = array(
            'messege' => $user->username.' status update successfully!',
            'alert' => 'success'
        );
        return redirect()->back()->with('notification', $notification);

    }

    public function delete($id){
        $user = User::find($id);
        $bills = Billpaid::where('user_id', $id)->get();
        $orderItems = OrderItem::where('user_id', $id)->get();
        $packageOrders = Packageorder::where('user_id', $id)->get();

        foreach ($bills as $bill){
            $bill->delete();
        }
        foreach ($orderItems as $orderItem){
            $orderItem->delete();
        }
        foreach ($packageOrders as $packageOrder){
            $packageOrder->delete();
        }

        @unlink('assets/front/img/' . $user->photo);
        $user->delete();


        $notification = array(
            'messege' => 'User Deleted successfully!',
            'alert' => 'success'
        );
        return redirect()->back()->with('notification', $notification);

    }
}
