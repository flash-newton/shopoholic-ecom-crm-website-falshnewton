<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    public function index(){

        $today=Carbon::now();

        return view('admin.order.allOrders');
    }

    

    public function show($id){
        $order = Order::where('id',$id)->first();

        if($order){
            return view('admin.order.viewOrder',['ord'=>$order]);
        }
        else{
            return redirect('/admin/all-orders');
        }
    }
}
