@extends('layouts.customAdmin')

@section('content')
<main id="main" class="main">
   
    <div class="card col-md-11">
        <div class="myheading">
            <a href="{{url('admin/products')}}" class="btn mybtn float-start" >Back</a>
            <h5 class="card-title">Edit Product Details</h5>
        </div>
        @if ($errors->any())
            <div class="alert alert-warning">
                @foreach ($errors->all() as $er)
                    <div>{{$er}}</div>
                @endforeach
            </div>
        @endif
        <form action="{{url('product-update/'.$prod->id.'')}}"   method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
        <div class="card-body row">
            <div class="col-md-6">
                <div class="col-md-12 imgbox d-flex justify-content-center align-items-center">
                    <label for="prod_img"><div class="aspect-ratio-1-5-1 imgframe" style="max-width: 270px;">
                        @if ($prod->prod_img != NULL)
                        <img src="../uploads/products/{{$prod->prod_img}}" alt="" class="img-fluid avatar">
                        @else
                        <img src="../bookplaceholder.png" alt="" class="img-fluid avatar">
                        @endif
                     
                    </div></label>
                </div>
                <div class="col-12 text-center btnbox"> <button type="submit" class="btn btn-primary">Update Product</button> </div>
            </div>
            
            <div class="col-md-6 ">
                <div class="col-md-12">
                    <div class="row g-3 myform">
                       <div class="col-12"> 
                        <label for="name" class="form-label">Product Name</label> 
                        <input type="text" class="form-control" name="name" id="name" value="{{$prod->name}}">
                    </div>
                       <div class="col-12">
                         <label for="description" class="form-label"> Samll Description</label> 
                         <textarea class="form-control" id="description" name="description" style="height: 60px;">{{$prod->description}}</textarea>
                        </div>
                       <div class="col-md-4"> 
                        <label for="actual_price" class="form-label">Price</label> 
                        <input type="text" class="form-control" name="actual_price" id="actual_price" inputmode="numeric" pattern="[0-9]*" oninput="this.value = this.value.replace(/[^0-9]/g, '');" value="{{$prod->actual_price}}">
                    </div>
                       <div class="col-md-4"> 
                        <label for="stock" class="form-label">Stock</label> 
                        <input type="text" class="form-control" name="stock" id="stock" inputmode="numeric" pattern="[0-9]*" oninput="this.value = this.value.replace(/[^0-9]/g, '');" value="{{$prod->stock}}">
                    </div>
                    <div class="col-md-4"> 
                        <label for="discount" class="form-label">Discount</label> 
                        <select name="discount" class="form-control" id="" value="{{$prod->discount}}">
                            <option value="0" {{ old('discount', $prod->discount) == 0 ? 'selected' : '' }}>none</option>
                            <option value="10" {{ old('discount', $prod->discount) == 10 ? 'selected' : '' }}>10%</option>
                            <option value="15" {{ old('discount', $prod->discount) == 15 ? 'selected' : '' }}>15%</option>
                            <option value="25" {{ old('discount', $prod->discount) == 25 ? 'selected' : '' }}>25%</option>
                            <option value="50" {{ old('discount', $prod->discount) == 50 ? 'selected' : '' }}>50%</option>
                   </select>
                    </div>
                       <div class="col-md-6"> 
                        <label for="category_id" class="form-label">Category</label> 
                        <select name="category_id" class="form-control" id="" >
                            @foreach ($cat as $c)
                                <option value="{{$c->id}}"  {{$c->id == $prod->category_id ? 'selected':''}}>{{$c->name}}</option>
                                
                            @endforeach
                       </select>
                       </div>
                       <div class="col-md-6"> 
                        <label for="sub_category" class="form-label">Sub Category</label> 
                        <select name="sub_category"  class="form-control" id="">
                        @foreach ($genre as $g)
                            <option value="{{$g->name}}" {{$g->name == $prod->sub_category ? 'selected':''}}>{{$g->name}}</option>
                            
                        @endforeach
                        </select>
                        </div>
                       <input type="file" class="file-upload" name="prod_img" id="prod_img" hidden  />

                    </form>
                </div>
            </div>

            
        </div>
    </div>
</main>
    
<script>
   window.addEventListener('DOMContentLoaded', function() {
    var readURL = function(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                document.querySelector('.avatar').setAttribute('src', e.target.result);
            };
            reader.readAsDataURL(input.files[0]);
        }
    };
    
    var fileUpload = document.querySelector('.file-upload');
    fileUpload.addEventListener('change', function() {
        readURL(this);
    });
});
</script>

@endsection
@section('mycss')
<link rel="stylesheet" href="../css/addproduct.css">    
@endsection