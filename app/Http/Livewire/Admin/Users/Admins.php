<?php

namespace App\Http\Livewire\Admin\Users;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Hash;

class Admins extends Component
{
    protected $listeners = ['delConfirmed' => 'delAdmin'];
    public $admin_id;
    public $name, $lname, $email, $address, $phone, $password;

    public function rules(){
        return [
            'name' => ['required', 'string', 'max:255'],
            'lname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
            'phone' => ['nullable', 'regex:/^[0-9]{10}$/'],
            'address' => ['nullable', 'string', 'max:255'],
        ];
    }

    public function resetIn(){
        $this->name = NULL;
        $this->lname = NULL;
        $this->email = NULL;
        $this->address = NULL;
        $this->phone =NULL;
        $this->password = NULL;

    }
    public function saveAdmin(){
        $data = $this->validate();
        User::create([
            'name'=>$this->name,
            'lname'=>$this->lname,
            'email'=>$this->email,
            'address'=>$this->address,
            'phone'=>$this->phone,
            'role'=>1,
            'password' => Hash::make($data['password']),
        ]);
            

        session()->flash('message','New Admin created');
        $this->resetIn();
    }

    public function getAdminId($id){
        $this->admin_id=$id;
        $this->dispatchBrowserEvent('showdelConfirm');
    }

    public function delAdmin(){
        $admin_id = User::findOrFail($this->admin_id);
        $admin_id->delete();
        $this->dispatchBrowserEvent('Admindeleted');
    }

    public function render()
    {
        $admin = User::where('role','1')->get();
        return view('livewire.admin.users.admins',['admin'=>$admin]);
    }
}
