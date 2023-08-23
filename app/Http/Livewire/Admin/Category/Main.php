<?php

namespace App\Http\Livewire\Admin\Category;

use App\Models\Category;
use Livewire\Component;
use Livewire\WithPagination;

class Main extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    protected $listeners = ['delConfirmed' => 'delCat'];

    public $catId;

    public function deleteCat($catId){
        $this->catId = $catId;
        $this->dispatchBrowserEvent('showdelConfirm');
    }

    public function delCat(){
        $cat = Category::findOrFail($this->catId);
        $cat->delete();
        $this->dispatchBrowserEvent('Catdeleted');
    }

    public function render()
    {
        $cat = Category::orderBy('id','DESC')->paginate(10);
        return view('livewire.admin.category.main',['cat'=>$cat]);
    }
}
