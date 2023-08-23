<?php

namespace App\Http\Livewire\Admin\Users;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class Main extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $search = '';
    public $filter = '';

    public function render()
    {
        $sq = User::query();
        
        if ($this->filter == '1') {
            $sq->where('role', 1);
        } elseif ($this->filter == '0') {
            $sq->where('role', 0);
        }


        $user = $sq->where('name','like','%'.$this->search.'%')->whereNotIn('role', [2])->orderBy('id','DESC')->paginate(10);

        return view('livewire.admin.users.main',['user'=>$user]);
    }
}
