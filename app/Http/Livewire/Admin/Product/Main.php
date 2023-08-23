<?php

namespace App\Http\Livewire\Admin\Product;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class Main extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $search = '';


    public function render()
    {
        $prod = Product::where('name','like','%'.$this->search.'%')->orderBy('id','DESC')->paginate(10);
        return view('livewire.admin.product.main',['prod'=>$prod]);
    }
}
