<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use Illuminate\Support\Facades\File;
use App\Models\Category;
use App\Models\Genre;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){
        return view('admin.product.viewproduct');
    }
    public function create(){

        $cat = Category::all();
        $genre = Genre::all();

        return view('admin.product.addform',compact('cat','genre'));
    }

    public function store(ProductRequest $request){
        $data = $request->validated();
        $mypic = 'empty';
        $price = $data['actual_price'];

        $cat = Category::findOrFail($data['category_id']);

        if($request->hasFile('prod_img')){
            $file = $request->file('prod_img');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('uploads/products/',$filename);
            $mypic = $filename;
        }
        else{
            $mypic = null;
        }

        if($data['discount']>0){
            $discount = 100 - $data['discount'];
            $sold_price = (int) $price * ($discount/100);
        }
        else{
            $sold_price = $price;
        }
        $cat->products()->create([
            'name'=>$data['name'],
            'description'=>$data['description'],
            'actual_price'=>$price,
            'sold_price'=>$sold_price,
            'discount'=>$data['discount'],
            'category_id'=>$data['category_id'],
            'stock'=>$data['stock'],
            'sub_category' => $data['sub_category'],
            'prod_img'=>$mypic,

        ]);
        
        return redirect('/admin/products');

    }

    public function checkDetails($id){
        $prod = Product::findOrFail($id);
        return view('admin.product.productdetails',['prod'=>$prod]);
    }

    public function remove($id){
        $product = Product::findOrFail($id);
        $product->delete();
        session()->flash('message','Product deleted');

        return redirect('/admin/products');
    }

    public function getEdit($id){
        $prod = Product::findOrFail($id);
    
        $cat = Category::all();
        $genre = Genre::all();
        return view('admin.product.editform',['prod'=>$prod,'cat'=>$cat,'genre'=>$genre]);
    }

    public function update(ProductRequest $request, $id){
        $data = $request->validated();
        $mypic = 'empty';
        $price = $data['actual_price'];

        $prod = Product::where('id',$id)->first();

        if($request->hasFile('prod_img')){

            $prev = 'uploads/products/'.$prod->prod_img;
            if (File::exists($prev)){
                File::delete($prev);
            }

            $file = $request->file('prod_img');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('uploads/products/',$filename);
            $mypic = $filename;
        }
        else{
            $mypic = null;
        }

        if($data['discount']>0){
            $discount = 100 - $data['discount'];
            $sold_price = intval($price * ($discount / 100));
        }
        else{
            $sold_price = $price;
        }

        $prod->update([
            'name'=>$data['name'],
            'description'=>$data['description'],
            'actual_price'=>$price,
            'sold_price'=>$sold_price,
            'discount'=>$data['discount'],
            'category_id'=>$data['category_id'],
            'stock'=>$data['stock'],
            'sub_category' => $data['sub_category'],
            'prod_img'=>$mypic,
        ]);
        
        return redirect('/admin/products');
        
    }

}
