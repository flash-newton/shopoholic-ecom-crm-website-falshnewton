<?php

namespace App\Http\Livewire\Feature\Cart;

use App\Models\Cart;
use Livewire\Component;

class Main extends Component
{
    public $cart;
    public $total;

    public function minCount($cart_id){
        $cart_stats = Cart::where('id',$cart_id)->where('user_id',auth()->user()->id)->first();
        if($cart_stats){
            if($cart_stats->product_count>1){
                $cart_stats->decrement('product_count');
            }
            
        }
    }
    public function incCount($cart_id){
        $cart_stats = Cart::where('id',$cart_id)->where('user_id',auth()->user()->id)->first();
        if($cart_stats){
            if($cart_stats->product_count<=$cart_stats->product->stock);
            $cart_stats->increment('product_count');
        }
    }

    public function delCartItem($cart_id){
        $removeItem = Cart::where('user_id',auth()->user()->id)->where('id',$cart_id)->first();

        if($removeItem){
            $removeItem->delete();
            $this->emit('cartUpdated');
        }
    }




    public function render()
    {
        $this->total=0;
        $this->cart = Cart::where('user_id',auth()->user()->id)->get();
        foreach($this->cart as $c){
            $this->total+=($c->product->sold_price * $c->product_count);
        }
        return view('livewire.feature.cart.main',['cart'=>$this->cart]);
    }
}
