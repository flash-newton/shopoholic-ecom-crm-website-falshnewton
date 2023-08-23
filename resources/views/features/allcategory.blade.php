@extends('layouts.app')

@section('content')
<div class="container">
  
          <div class="row">
            <div class="">
              <h4 class="pagetitle text-uppercase">Categories</h4>
              <p class="pagedescription">Select the Correct Catorgory to Explore</p>
              <hr/>
            </div>
          </div>
          <div class="row">
          
            @foreach ($cat as $c)
            <div class="col-md-3">
                <a href="/products/{{$c->id}}"><div class="card">
                  <div class="mybody">
                    <div class="imgbox">
                      @if ($c->cat_img)
                      <img src="../uploads/category/{{$c->cat_img}}" alt="">
                      @else
                      <img src="../slider/grocery.png" alt="">
                      @endif
                        
                    </div>
                    <div class="textbox">
                        <div class=" card-title cat_count">{{$c->products->count()}}</div>
                    </div>
                  </div>
                  <div class="card-title cat_name">{{$c->name}}</div>
                </div>
                </a>
              </div>
                
            @endforeach

         
</div>
@endsection

@section('mycss')

<link rel="stylesheet" href="../css/features/allcat.css">
    
@endsection