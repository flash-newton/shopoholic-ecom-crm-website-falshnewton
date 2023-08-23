<?php

namespace App\Http\Livewire\Admin\Genre;

use App\Models\Category;
use App\Models\Genre;
use Livewire\Component;

class Index extends Component
{
    protected $listeners = ['delConfirmed' => 'delSubCat'];

    public $catId;
    public $gID;
    public $name, $category_id;

    public function rules(){
        return ['name'=>'required','category_id'=>'required'];
    }
    public function resetIn(){
        $this->name = NULL;
        $this->category_id = NULL;
    }

    public function saveGenre(){
        $data = $this->validate();
        Genre::create(['name'=>$this->name,'category_id'=>$this->category_id]);
        session()->flash('message','Genre added');
        $this->resetIn();
    }

    public function getSubCat($gID){
        $this->gID=$gID;
        $this->dispatchBrowserEvent('showdelConfirm');
    }

    public function delSubCat(){
        $g = Genre::findOrFail($this->gID);
        $g->delete();
        $this->dispatchBrowserEvent('Catdeleted');
    }
   

    public function render()
    {
        $genres = Genre::orderBy('id','DESC')->get();
        $cat = Category::where('status','0')->get();
        return view('livewire.admin.genre.index',['genres'=>$genres,'cat'=>$cat]);
    }
}
