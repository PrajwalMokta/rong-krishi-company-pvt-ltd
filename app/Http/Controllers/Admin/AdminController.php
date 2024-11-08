<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Hash;
use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use Mail;
use App\Mail\RegisterMail;

class AdminController extends Controller
{
    public function index(){
        $data['header_title'] = "Dashboard";
        $data['total_orders'] = Order::getTotalOrder();
        $data['today_orders'] = Order::getTodayOrder();
        $data['total_amount'] = Order::getTotalAmount();
        $data['today_amount'] = Order::getTodayAmount();
        $data['get_admin'] = User::getAdmins();
        $data['total_admin'] = User::getTotalAdmin();
        $data['get_customer'] = User::getCustomer();
        $data['total_customer'] = User::getTotalCustomer();
        $data['today_customer'] = User::getTodayCustomer();
        $data['total_product'] = Product::getTotalProduct();
        $data['today_product'] = Product::getTodayProduct();
        $data['recent_product'] = Product::getRecentProduct();
        $data['latest_order'] = Order::getLatestOrder();
        return view('admin.layouts.dashboard', $data)->with('no', 1);
    }

    public function admin_list(){
        $data['getRecords'] = User::getAdmin();
        $data['header_title'] = 'Admin';
        return view('admin.admin_pages.admin_list', $data)->with('no', 1);
    }

    public function admin_add(){
        $data['header_title'] = 'Admin-Add';
        return view('admin.admin_pages.admin_add', $data);
    }

    public function insert_admin(Request $request){
        request()->validate([
            'email' => 'required|email|unique:users'
        ]);
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->password = Hash::make($request->password);
        $user->status = $request->status;
        $user->is_admin = 1;
        $user->save();

        Mail::to($user->email)->send(new RegisterMail($user));
        return redirect('/admin_list')->with('success',"Admin Created Successfully!
        Please check your email for the verification message to complete the process.
        If you don’t receive the email, check your spam or junk folder. ");
    }

    public function edit_admin($id){
        $data['getRecords'] = User::getSingle($id);
        $data['header_title'] = 'Admin-Edit';
        return view('admin.admin_pages.admin_edit', $data);
    }

    public function update_edit_admin($id, Request $request){
        request()->validate([
            'email' => 'required|email|unique:users,email,'.$id
        ]);
        $user = User::getSingle($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->address = $request->address;
        if(!empty($request->password)){
            $user->password = Hash::make($request->password);
        }
        $user->status = $request->status;
        $user->is_admin = 1;
        $user->save();
        return redirect('/admin_list')->with('success',"Admin updated  successfully!!!");
    }
    public function delete_admin($id){
        $user = User::getSingle($id);
        $user->is_delete = 1;
        $user->save();
        return redirect('/admin_list')->with('success',"Admin deleted  successfully!!!");
    }
}