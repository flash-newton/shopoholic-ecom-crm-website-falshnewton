@extends('layouts.app')

@section('content')
<div class="mycontainer ">
    <div class="row">
        <div class="col-md-10 mx-auto ">
            <div class="card">
                <div class="bluebox">
                    <div class="card-title name-title">Popular Categories</div>
                    <div class="card-body row">
                        @foreach ($cat as $c)
                        <div class="col-md-2">
                            <a href="/products/{{$c->id}}"><div class="catcard">
                              <div class="mybody">
                                <div class="imgbox">
                                  @if ($c->cat_img)
                                    <img src="../uploads/category/{{$c->cat_img}}" alt="">
                                  @else
                                    <img src="../slider/grocery.png" alt="">
                                  @endif   
                                </div>
                                <div class="card-title cat_name">{{$c->name}}</div>
                              </div>
                              
                            </div>
                            </a>
                          </div>
                            
                        @endforeach
                    </div>
                </div>
                
                <div class="yellowbox">
                    <div class="card bigcard secondcard">
                        <div class="row">
                            <div class="">
                              <h4 class="pagetitle text-uppercase">New Releases</h4>
                             
                              <hr/>
                            </div>
                          </div>
                          <div class="row">
        
                            @forelse ($prod as $p)
                            <div class="col-md-3">
                                <div class="card prodcard">
                                  <div class="mybody">
                                    <div class="prodimgbox">
                                        <p class="status">New</p>
                                        <div class="prodmytitle">{{$p->name}}</div>
                                        <img src="../uploads/products/{{$p->prod_img}}" alt="">
                                    </div>
                                    <div class="textbox">
                                     
                                        <div class="pricebox">
                                            <div class="price">Rs {{$p->sold_price}}</div>
                                        </div>
                                    </div>
                                  </div>
                                  <a href="/{{$p->category->name}}/{{$p->id}}">
                                  <div class="cartbtn">
                                    Add to Bucket
                                    </div>
                                </a>
                                </div>
                                
                              </div>
                                  
                              @empty 
                              
                              <div class="pagedescription">No products in following Category</div>
                            @endforelse
        
                            
        
        
                          </div>
                    </div>


                    <div class="card bigcard ">
                      <div class="row">
                          <div class="">
                            <h4 class="pagetitle text-uppercase">Popular Products</h4>
                           
                            <hr/>
                          </div>
                        </div>
                        <div class="row">
      
                          @forelse ($popular as $p)
                          <div class="col-md-3">
                              <div class="card prodcard">
                                <div class="mybody">
                                  <div class="prodimgbox">
                                      <p class="status topstatus">Top picks</p>
                                      <div class="prodmytitle">{{$p->name}}</div>
                                      <img src="../uploads/products/{{$p->prod_img}}" alt="">
                                  </div>
                                  <div class="textbox">
                                   
                                      <div class="pricebox">
                                          <div class="price">Rs {{$p->sold_price}}</div>
                                      </div>
                                  </div>
                                </div>
                                <a href="/{{$p->category->name}}/{{$p->id}}">
                                <div class="cartbtn">
                                  Add to Bucket
                                  </div>
                              </a>
                              </div>
                              
                            </div>
                                
                            @empty 
                            
                            <div class="pagedescription">No products in following Category</div>
                          @endforelse
      
                          
      
      
                        </div>
                  </div>

                </div>
                
            </div>
        </div>
    </div>
</div>
@endsection

@section('mycss')


<link rel="stylesheet" href="../css/user/home.css">
    
@endsection