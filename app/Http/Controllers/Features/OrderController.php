<?php

namespace App\Http\Controllers\Features;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    public function index(){

        $orders = Order::where('user_id',auth()->user()->id)->orderBy('created_at','DESC')->paginate(9);
        return view('features.myorders',['ord'=>$orders]);
    }

    public function show($id){
        $order = Order::where('user_id',auth()->user()->id)->where('id',$id)->first();
        if($order){
            return view('features.order',['ord'=>$order]);
        }
        else{
            return redirect('/home');
        }
        
    }
}
