<?php

namespace App\Http\Livewire\Feature\Cart;

use App\Models\Cart;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Count extends Component
{
    public $cartcount;

    protected $listeners = ['cartUpdated'=> 'cartCheck'];

    public function cartCheck(){
        if(Auth::check()){
            return $this->cartcount = Cart::where('user_id',auth()->user()->id)->count();
        }
        else{
            $this->cartcount = 0;
        }
    }

    public function render()
    {
        $this->cartcount = $this->cartCheck();
        return view('livewire.feature.cart.count',['count'=>$this->cartcount]);
    }
}
