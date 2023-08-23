@extends('layouts.customAdmin')

@section('content')
<main id="main" class="main">
   
    <div class="card col-md-11">
        <div class="myheading">
            <a href="{{url('admin/products')}}" class="btn mybtn float-start" style="color: white" >Back</a>
            <h5 class="card-title">Product Details</h5>
        </div>
        
        <div class="card-body row">
            <div class="col-md-6">
                <div class="col-md-12 imgbox d-flex justify-content-center align-items-center">
                    <label for="prod_img"><div class="aspect-ratio-1-5-1 imgframe" style="max-width: 270px;">
                        @if ($prod->prod_img)
                        <img src="../uploads/products/{{$prod->prod_img}}" alt="" class="img-fluid avatar">
                        @else
                        <img src="../bookplaceholder.png" alt="" class="img-fluid avatar">
                        @endif
                        
                    </div></label>
                </div>
                <div class="col-12 text-center"> 
                    <div class="stat">Product ID : {{$prod->id}}</div>
                </div>
            </div>
            <div class="col-md-6 ">
                <div class="col-md-12">
                    <div class="row g-3 myform">
                        
                       <div class="col-12"> 
                        <div class="stat">Product Name :  {{$prod->name}}</div>
                    </div>
                       <div class="col-12">
                        <div class="stat">Product Description : {{$prod->description}}</div>
                        </div>
                       <div class="col-md-4"> 
                        <p class="stat">Price</p> 
                        <p >{{$prod->actual_price}}</p>
                    </div>
                       <div class="col-md-4"> 
                        <p class="stat">Selling Pirce</p> 
                        <p >{{$prod->sold_price}}</p>
                    </div>
                    <div class="col-md-4"> 
                        <p class="stat">Discount</p> 
                        <p >{{$prod->discount}}</p>  
                    </div>
                    <div class="col-md-6"> 
                        <p class="stat">Current Stock</p> 
                        <p >{{$prod->discount}}</p>  
                    </div>
                    <div class="col-md-6"> 
                        <p class="stat">Units Sold</p> 
                        <p >{{$prod->soldcount}}</p>  
                    </div>
                       <div class="col-md-6"> 
                        <div class="stat">Category :  {{$prod->category->name}}</div>
                      
                       </div>
                       <div class="col-md-6"> 
                        <div class="stat">Sub Category : {{$prod->sub_category}}</div>
                        </div>
                        <div class="col-md-12">
                        <div class="col-12 text-center btnbox">
                             <a href="{{url('product-edit/'.$prod->id.'')}}" class="btn editbtn tablebtn editbtn">Edit Product</a>
                             <a href="{{url('product-delete/'.$prod->id.'')}}" class="btn deletebtn tablebtn editbtn">Delete Product</a>
                            </div>
                        </div>
                </div>
            </div>

            
        </div>
    </div>
</main>
    
@endsection
@section('mycss')
<link rel="stylesheet" href="../css/addproduct.css">   
<link rel="stylesheet" href="../css/admin/theproduct.css">

@endsection