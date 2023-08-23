<?php

namespace App\Http\Livewire\Feature\Product;

use App\Models\Product;
use Livewire\Component;

class Main extends Component
{
    public $prod;
    public $cat;
    public $subInputs=[];
    public $priceInputs=[];


    protected $queryString = ['subInputs','priceInputs'];

    public function mount($cat){

        $this->cat = $cat;
    }




    public function render()
    {
        $this->prod=Product::where('category_id',$this->cat->id)
                            ->when($this->subInputs, function($qs){
                                $qs->whereIn('sub_category',$this->subInputs);
                            })
                            ->when($this->priceInputs, function($qs){

                                $qs->when($this->priceInputs == 'high-to-low', function($qs2){
                                    $qs2->orderBy('sold_price','DESC');
                                })
                                ->when($this->priceInputs == 'low-to-high', function($qs2){
                                    $qs2->orderBy('sold_price','ASC');
                                });
                            })
                            ->where('status','0')
                            ->get();

        return view('livewire.feature.product.main',['prod'=>$this->prod,'cat'=>$this->cat]);
    }


    

    
}


