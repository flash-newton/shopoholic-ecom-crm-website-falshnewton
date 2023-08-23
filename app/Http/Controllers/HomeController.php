<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $cat = Category::all()->take(6);

        $prod=Product::latest()->take(4)->get();
        $popular = Product::orderBy('soldcount', 'desc')->take(4)->get();
   
        return view('home',['cat'=>$cat,'prod'=>$prod,'popular'=>$popular]);
    }
}
