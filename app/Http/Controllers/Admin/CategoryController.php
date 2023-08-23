<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\Http\Requests\AddCategoryRequest;

class CategoryController extends Controller
{
    public function index(){
        return view('admin.category.main');
    }

    public function create(){
        return view('admin.category.create');
    }

    public function store(AddCategoryRequest $request){
        $data = $request->validated();

        if($request->hasFile('cat_img')){
            $file = $request->file('cat_img');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('uploads/category/',$filename);
            $mypic = $filename;
        }
        else{
            $mypic = null;
        }

        $cat = new Category();
        $cat->name = $data['name'];
        $cat->cat_img = $mypic;

        $cat->save();

        return redirect('admin/category-add')->with('message','Category added');
    }

    public function edit($cat){
        $cat = Category::findOrFail($cat);
        return view('admin.category.edit',['cat'=>$cat]);
    }

    public function update(AddCategoryRequest $request,$category){
        $data = $request->validated();
        $cat = Category::findORFail($category);

        if($request->hasFile('cat_img')){

            $prev = 'uploads/category/'.$cat->cat_img;
            if (File::exists($prev)){
                File::delete($prev);
            }

            $file = $request->file('cat_img');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('uploads/category/',$filename);
            $mypic = $filename;
        }
        else{
            $mypic = null;
        }

        
        $cat->name = $data['name'];
        $cat->cat_img = $mypic;
        $cat->update();

        return redirect('admin/category')->with('message','Edit success');
    }
}
