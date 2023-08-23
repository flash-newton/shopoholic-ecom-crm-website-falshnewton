<div>
   <div class="py-3  bg-light">
      <div class="cartcontainer">
  
          <div class="row">
            <div class="col-md-4 ">
               <h4 class="carttexttitle">My Cart</h4>
               <img class="cartwp" src="../slider/cartwp.jpg" alt="">
               <div class="row">
                  <div >
                     <div class="cartcountext">Current Cart Count : <span>{{$cart->count()}}</span> </div>
                  </div>
                  <div>
                     <hr>
                     <div class="p-1">
                        <h4>Total : <span class="float-end">{{$total}}</span></h4>
                     </div>
                     <hr>
                     <a href="/home" class="btn btn-success float-start">Continue Shopping</a>
                     @if ($total==0)
                     <button disabled class="checkdisabled btn btn-warning float-end">Checkout</button>  
                     @else
                     <a href="/checkout" class="btn btn-warning float-end">Checkout</a>    
                     @endif
                     
                  </div>
               </div>
               
            </div>
              <div class="col-md-8 ">
                  <div class="shopping-cart">

                      <div class="mycarthead d-none d-sm-none d-mb-block d-lg-block">
                          <div class="row">
                              <div class="col-md-5">
                                  <h4 class="tbtitle">Products</h4>
                              </div>
                              <div class="col-md-1">
                                  <h4 class="tbtitle">Price</h4>
                              </div>
                              <div class="col-md-2">
                                  <h4 class="tbtitle">Quantity</h4>
                              </div>
                              <div class="col-md-2">
                                 <h4 class="tbtitle">Total</h4>
                             </div>
                              <div class="col-md-2">
                                  <h4 class="tbtitle">Remove</h4>
                              </div>
                          </div>
                      </div>
                      @forelse ($cart as $ct)
                          @if($ct->product)
                          <div class="cart-item">
                           <div class="row">
                               <div class="col-md-5 my-auto">
                                   <a href="/{{$ct->product->category->name}}/{{$ct->product->id}}">
                                       <label class="product-name">
                                           <img src="../uploads/products/{{$ct->product->prod_img}}" style="width: 50px; height: 50px" alt="">
                                           {{$ct->product->name}}
                                       </label>
                                   </a>
                               </div>
                               <div class="col-md-1 my-auto">
                                   <label class="price">{{$ct->product->sold_price}} </label>
                               </div>
                               <div class="col-md-2 col-7 my-auto">
                                   <div class="quantity">
                                       <div class="input-group">
                                           <button type="button" wire:loading.attr="disabled" wire:click="minCount({{$ct->id}})" class=" btn1">-</button>
                                           <input type="text" readonly value="{{$ct->product_count}}" class="input-quantity" />
 
                                           <button type="button" wire:loading.attr="disabled"  wire:click="incCount({{$ct->id}})" class=" btn1">+</button>
                                       </div>
                                   </div>
                               </div>
                               <div class="col-md-2 my-auto">
                                 <label class="price">{{$ct->product->sold_price * $ct->product_count}} </label>
                             </div>
                               <div class="col-md-2 col-5 my-auto">
                                   <div class="remove">
                                       <button type="button" wire:loading.attr="disabled" wire:click="delCartItem({{$ct->id}})" class="btn btn-danger btn-sm">
                                          <span wire:loading.remove wire:target="delCartItem({{$ct->id}})">
                                             <i class="fa fa-trash"></i> Remove
                                          </span>
                                          <span wire:loading wire:target="delCartItem({{$ct->id}})">
                                             <i class="fa fa-trash"></i> Removing
                                          </span>
                                           
                                       </button>
                                   </div>
                               </div>
                           </div>
                       </div>
                       @endif
                      @empty
                          <div>Im sorry but your Cart is empty</div>
                      @endforelse
                      
                      
                     
                              
                  </div>
              </div>
          </div>

      </div>
  </div>
</div>
