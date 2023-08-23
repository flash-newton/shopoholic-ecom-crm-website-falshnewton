@extends('layouts.customAdmin')

@section('content')
<main id="main" class="main">
   
    <div class="card col-md-11">
        <div class="myheading">
            <a href="{{url('admin/products')}}" class="btn mybtn float-start" >Back</a>
            <h5 class="card-title">Add A Product</h5>
        </div>
        @if ($errors->any())
            <div class="alert alert-warning">
                @foreach ($errors->all() as $er)
                    <div>{{$er}}</div>
                @endforeach
            </div>
        @endif
        <form action="{{url('admin/product-add')}}"   method="POST" enctype="multipart/form-data">
            @csrf
        <div class="card-body row">
            <div class="col-md-6">
                <div class="col-md-12 imgbox d-flex justify-content-center align-items-center">
                    <label for="prod_img"><div class="aspect-ratio-1-5-1 imgframe" style="max-width: 270px;">
                        <img src="../bookplaceholder.png" alt="" class="img-fluid avatar">
                    </div></label>
                </div>
                <div class="col-12 text-center btnbox"> <button type="submit" class="btn btn-primary">Register Product</button> </div>
            </div>
            
            <div class="col-md-6 ">
                <div class="col-md-12">
                    <div class="row g-3 myform">
                       <div class="col-12"> 
                        <label for="name" class="form-label">Product Name</label> 
                        <input type="text" class="form-control" name="name" id="name">
                    </div>
                       <div class="col-12">
                         <label for="description" class="form-label"> Small Description</label> 
                         <textarea class="form-control" id="description" name="description" style="height: 60px;"></textarea>
                        </div>
                       <div class="col-md-4"> 
                        <label for="actual_price" class="form-label">Price</label> 
                        <input type="text" class="form-control" name="actual_price" id="actual_price" inputmode="numeric" pattern="[0-9]*" oninput="this.value = this.value.replace(/[^0-9]/g, '');">
                    </div>
                       <div class="col-md-4"> 
                        <label for="stock" class="form-label">Stock</label> 
                        <input type="text" class="form-control" name="stock" id="stock" inputmode="numeric" pattern="[0-9]*" oninput="this.value = this.value.replace(/[^0-9]/g, '');">
                    </div>
                    <div class="col-md-4"> 
                        <label for="discount" class="form-label">Discount</label> 
                        <select name="discount" class="form-control" id="">
                            <option value="0">none</option>
                            <option value="10">10%</option>
                            <option value="15">15%</option>
                            <option value="25">25%</option>
                            <option value="50">50%</option>
                   </select>
                    </div>
                       <div class="col-md-6"> 
                        <label for="category_id" class="form-label">Category</label> 
                        <select name="category_id" class="form-control" id="">
                            @foreach ($cat as $c)
                                <option value="{{$c->id}}">{{$c->name}}</option>
                                
                            @endforeach
                       </select>
                       </div>
                       <div class="col-md-6"> 
                        <label for="sub_category" class="form-label">Sub Category</label> 
                        <select name="sub_category"  class="form-control" id="">
                        @foreach ($genre as $g)
                            <option value="{{$g->name}}">{{$g->name}}</option>
                            
                        @endforeach
                        </select>
                        </div>
                       <input type="file" class="file-upload" name="prod_img" id="prod_img" for="prod_img" hidden  />

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