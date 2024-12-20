<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Notification;
use Auth;
use Mail;
use App\Mail\OrderStatusMail;

class OrderController extends Controller
{
    public function order_list(){
        $data['getRecords'] = Order::getRecord();
        $data['header_title'] = 'Orders';
        return view('admin.order_pages.order_list', $data)->with('no', 1);
    }

    public function order_view($id, Request $request){
        if(!empty($request->noti_id)){
            Notification::UpdateReadNoti($request->noti_id);
        }
        $data['getRecords'] = Order::getSingle($id);
        $data['header_title'] = 'Order Details';
        return view('admin.order_pages.order_detail', $data)->with('no', 1);
    }

    public function order_status(Request $request){
        $getOrder = Order::getSingle($request->order_id);
        $getOrder->status = $request->status;
        $getOrder->save();
        Mail::to($getOrder->email)->send(new OrderStatusMail($getOrder));

        $user_id = 1;
        $url = url('/order_view/'.$getOrder->id);
        $message = "Order Status Updated #".$getOrder->order_number;
        Notification::insertRecord($user_id, $url, $message);

        $json['message'] = "Status successfully updated";
        if($request->status == 0){
            toast('Order status: Pending','question')->autoClose(5000)->width('20rem');
        }
        if($request->status == 1){
            toast('Order status: Inprogress','')->autoClose(5000)->width('20rem');
        }
        if($request->status == 2){
            toast('Order status: Delivered','')->autoClose(5000)->width('20rem');
        }
        if($request->status == 3){
            toast('Order status: Completed','success')->autoClose(5000)->width('20rem');
        }
        if($request->status == 4){
            toast('Order status: Cancelled','success')->autoClose(5000)->width('20rem');
        }


        echo json_encode($json);
    }


}
