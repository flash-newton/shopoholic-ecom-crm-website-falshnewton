<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MyWelcomeController extends Controller
{
    public function index(){
        return view('mywelcomepage');
    }
}
