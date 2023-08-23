<div>

    <div class="py-3 py-md-5 bg-light">
        <div class="container">
            <div class="row">
                <div class="col-md-5 mt-3">
                    <div class="bg-white border">
                        <a href="/products/{{$prod->category->id}}" class="backbtn">Back to categories</a>
                        <img src="../uploads/products/{{$prod->prod_img}}" class="w-100" alt="Img">
                    </div>
                </div>
                <div class="col-md-7 mt-3">
                    <div class="product-view">
                        <h4 class="product-name">
                          <span class="prodtitle">{{$prod->name}}</span>
                            
                            @if($prod->stock == 0)
                            <label class="label-stock bg-warning">Out of Stock</label>
                            @else
                            <label class="label-stock bg-success">In Stock</label>
                            @endif
                            
                        </h4>
                        <hr>
                        <p class="product-path">
                            {{$prod->category->name}} @if($prod->sub_category)/ {{$prod->sub_category}} @endif/ {{$prod->name}}
                        </p>
                        <div>
                            <span class="selling-price">Rs. {{$prod->sold_price}}</span>
                            @if($prod->discount>0)
                            <span class="original-price">{{$prod->actual_price}}</span>
                            <span class="discount">{{$prod->discount}}% OFF</span>
                            @endif
                            
                        </div>
                        <div class="mt-2">
                            <div class="input-group">
                                <span class="btn btn1 btn2" wire:click="subtract" ><i class="fa fa-minus"></i>-</span>
                                <input type="text" readonly value="{{$this->item_count}}" class="input-quantity" />
                                <span class="btn btn1 btn2" wire:click="add" ><i class="fa fa-plus"></i>+</span>
                            </div>
                        </div>
                        <div class="mt-2">
                            <button type="button" wire:click="cartAdd({{$prod->id}})" class="btn btn1"> <i class="fa fa-shopping-cart"></i> Add To Cart</button>
                            
                        </div>
                        <div class="mt-3">
                            <hr>
                            <h5 class="mb-0">About</h5>
                            <p>
                                {{$prod->description}}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 mt-3">
                  
                </div>
            </div>
        </div>
    </div>
</div>
