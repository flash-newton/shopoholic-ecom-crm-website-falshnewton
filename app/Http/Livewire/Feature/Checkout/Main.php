<?php

namespace App\Http\Livewire\Feature\Checkout;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Orderitems;
use App\Models\Usersales;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Illuminate\Support\Str;

class Main extends Component
{
    public $orderTotal;
    public $cartdata;
    public $itemcount;
    public $phone;
    public $address;

    public function rules(){
        return [
            'phone'=>'required|max:11|min:10',
            'address'=>'required'
    ];
    }

    public function mount(){
        $this->phone= auth()->user()->phone;
        $this->address= auth()->user()->address;
    }

    public function confirmOrder(){
        $clean =$this->storeOrder();
        if($clean){
            Cart::where('user_id',auth()->user()->id)->delete();
            return redirect("/order-confirmation");
        }
        else{

        }
      
    }


    public function storeOrder(){
        $this->validate();
        $c_user = auth()->user()->id;
        $order = Order::create([
            'ref_no'=>'ref'.$c_user.Str::random(10),
            'user_id'=>$c_user,
            'phone'=>$this->phone,
            'address'=>$this->address,
            'status'=>'In progress'
        ]);

        foreach($this->cartdata as $cart){
            $order_item = Orderitems::create([
                'orders_id'=>$order->id,
                'product_id'=>$cart->product_id,
                'prod_count'=>$cart->product_count,
                'price'=>$cart->product->sold_price
            ]);
            $cart->product()->where('id',$cart->product_id)->decrement('stock',$cart->product_count);
            $cart->product()->where('id',$cart->product_id)->increment('soldcount',$cart->product_count);   
        }
        Usersales::where('users_id',auth()->user()->id)->increment('totalsales',$this->orderTotal);
        return $order;
    }

    public function render()
    {
        

        $this->orderTotal=0;
        $this->itemcount = 0;
        $this->cartdata = Cart::where('user_id',auth()->user()->id)->get();
        foreach($this->cartdata as $ct){
            $this->orderTotal+=($ct->product->sold_price * $ct->product_count);
            $this->itemcount+=1*$ct->product_count;
        }


        return view('livewire.feature.checkout.main');
    }
}
