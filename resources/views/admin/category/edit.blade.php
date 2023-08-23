@extends('layouts.customAdmin')

@section('content')
<main id="main" class="main">
    <div class="pagetitle">
       <h1>Edit Category</h1>
       <nav>
          <ol class="breadcrumb">
             <li class="breadcrumb-item"><a href="index.html">Category</a></li>
             <li class="breadcrumb-item active">Edit Category</li>
          </ol>
       </nav>
    </div>



    <div class="container">
        <div class="card col-md-11 mycardbody">
            <div class="row justify-content-center">

                <div class="col-md-4">
        
                      <div class="">
              
                          <div class="card-body">
                            <div catimgbox>
                                <label for="cat_img">
                                    @if($cat->cat_img)
                                    <img class="catimg avatar" src="../uploads/category/{{$cat->cat_img}}" alt="">
                                    @else
                                    <img class="catimg avatar" src="../slider/gallery.png" alt="">
                                    @endif
                                </label>
                                
                            </div>
                            

                              
                              
                          </div>
                      </div>
            
                </div>
                <div class="col-md-8">
                  <div class=" mx-1">
                    
                      <div class="">
              
                          <div class="card-body">
                              <h5 class="card-title addcattitle ">Edit Category <a href="{{url('admin/category')}}" class=" mybtn float-end " >View All Categories</a> </h5>

                              <hr/>
                              <form action="{{url('/category-update/'.$cat->id.'')}}" method="POST" enctype="multipart/form-data">
                                  @csrf
                                  @method('PUT')
                              <div class="row mb-3">
                                  <div><label for="name" class="col-sm-6 col-form-label">Category Name</label></div>
                                  <div class="col-sm-12 myform"> <input type="text" name="name" class="form-control" value="{{$cat->name}}"></div>
                               </div>
                               <input type="file" class="file-upload" name="cat_img" id="cat_img" for="cat_img" hidden  />
                               
                               <button type="submit" class="btn addbtn float-end">ADD</button>
                              </form>
                              
                          </div>
                      </div>
      
                  </div>
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
<link rel="stylesheet" href="../css/admin/addcat.css">    
@endsection