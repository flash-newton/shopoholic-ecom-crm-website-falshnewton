<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UserUpdateRequest;

class ProfileController extends Controller
{
    public function index(){
        $u = auth()->user();
        return view('features.users.profile',['u'=>$u]);
    }

    public function update(UserUpdateRequest $request , $id){
    
        $user = User::findOrFail($id);
        if ($request){
            $user->update([
                'name' => $request->name,
                'lname' => $request->lname,
                'phone' => $request->phone,
                'address' => $request->address,
            ]);

             
        }
        return redirect('/myprofile')->with('message','Userdata successfully updated');;
    }

    public function pwdchange(Request $request ){
        $request->validate([
            'c_password' => ['required', 'string', 'min:8'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $pwdcheck =Hash::check($request->c_password, auth()->user()->password);
        if($pwdcheck){
            User::findOrFail(auth()->user()->id)->update([
                'password'=>Hash::make($request->password),
            ]);
          return redirect()->back()->with('message','Password change successful');
        }
        else{
            return redirect()->back()->with('error','Password change failed');
        }
    }
}
