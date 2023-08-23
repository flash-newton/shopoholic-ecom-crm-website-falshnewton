<?php

namespace App\Http\Livewire\Feature\Product;

use App\Models\Cart;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Details extends Component
{
    public $cat;
    public $prod;
    public $prod_stock;
    public $item_count=1;

    public function add(){
        if($this->item_count<$this->prod_stock){
            $this->item_count++;
        }
       
    }
    public function subtract(){
        if($this->item_count>1){
            $this->item_count--;
        }
        
    }

    public function cartAdd($prod_id){

        if(Auth::check()){
            if($this->prod->where('id',$prod_id)->where('status','0')->exists()){
                
                if(Cart::where('user_id',auth()->user()->id)->where('product_id',$prod_id)->exists()){
                    
                }
                else{
                    Cart::create([
                        'user_id'=> auth()->user()->id,
                        'product_id'=> $prod_id,
                        'product_count'=> $this->item_count
                    ]);
                    $this->item_count = 1;
                    $this->emit('cartUpdated');
                }
            }
            else{
                dd('product not found');
            }
        }
        else{
            session()->flash('message','Pls login first mate');
        }
    }

    public function mount($cat,$prod){
        $this->cat = $cat;
        $this->prod = $prod;
        $this->prod_stock = $this->prod->stock;
    }
    public function render()
    {
        return view('livewire.feature.product.details',['cat'=>$this->cat,'prod'=>$this->prod]);
    }
}
