<?php

namespace App\Http\Controllers\Features;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class DisplayController extends Controller
{
    public function viewAllCategory(){

        $cat = Category::where('status',0)->get();

        return view('features.allcategory',['cat'=>$cat]);
    }

    public function viewProducts($cat_id){

        $cat = Category::where('id',$cat_id)->first();

        if ($cat){
            return view('features.viewproducts',['cat'=>$cat]);
        }
        else{
            return redirect()->back();
        }
        
    }

    public function viewTheProduct($cat_name,$prod_id){

        $cat = Category::where('name',$cat_name)->first();

        if($cat){
            $prod = $cat->products()->where('id',$prod_id)->where('status','0')->first();

            return view('features.viewTheProduct',['cat'=>$cat,'prod'=>$prod]);
        }
    }


    public function showCheckout(){
        return view('features.checkout');
    }

    public function viewThanku(){
        //return view('features.thanku'); ***need to finish UI

        return redirect('/home')->with('message','Order successfully placed !');
    }
}
