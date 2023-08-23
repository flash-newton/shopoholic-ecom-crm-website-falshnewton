<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class Userscontroller extends Controller
{
    public function index(){
        return view('admin.users.allusers');
    }

    public function viewadmins(){
        return view('admin.users.admin');
    }

    public function show($id){
        $user = User::where('id',$id)->first();
        return view('features.users.account', ['user'=>$user]);
    }

    public function deluser($id){
        $user = User::findOrFail($id);
        if($user){
            $user->delete();
            return redirect('/admin/all-users');
        }
        return redirect('/admin/dashbaord');
    }
}
