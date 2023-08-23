<div>
    <div class="py-3  bg-light">
        <div class="cartcontainer col-md-8 ">
            <h4 class="carttexttitle">Confirm Order</h4>
            <div class="row">
              <div class="col-md-6 ">
                 
                 <img class="cartwp" src="../slider/checkout.jpg" alt="">
                 <div class="row">
                    <div >
                       <div class="cartcountext">Current Cart Count : <span>{{$itemcount}}</span> </div>
                    </div>
                    <div>
                       <hr>
                       <div class="p-1">
                          <h4>Total :<span class="float-end">Rs. {{$orderTotal}} </span></h4>
                       </div>
                    </div>
                 </div>
                 
              </div>
                <div class="col-md-6 ">
                    <div>
                        <div class="card-body">
                           <form>
                            <div class="card mycard">
                            <div class="row ">
                                <div class="col-md-3 ">
                                    <img class="cartwp" src="../slider/profile.png" alt="">
                                </div>
                                <div class="col-md-9 ">
                                    <input type="text" class=" form-control userdetails" value="{{auth()->user()->name}}" id="inputText">
                                    <input type="email" class="form-control userdetails" value="{{auth()->user()->email}}" id="inputEmail">
                                </div>

                            </div>
                        </div>
                        <div class="card detailscard">
                            <div class="row mb-3">
                                <label for="phone" class="col-sm-12 col-form-label">Phone number</label>
                                <div class="col-sm-10 "> <input type="text" wire:model.defer="phone" class="float-start form-control" id="inputText"></div>
                                @error('phone')
                                    <small class="text-danger">{{$message}}</small>
                                @enderror
                             </div>
                             <div class="row mb-3">
                                <label for="address" class="col-sm-12 col-form-label">Address</label>
                                <div class="col-sm-10"> 
                                    <textarea id="address" class="form-control"  wire:model.defer="address" >{{auth()->user()->address}}</textarea>
                                    @error('address')
                                    <small class="text-danger">{{$message}}</small>
                                    @enderror
                                </div>
                             </div>
                        </div>
                              
                              <button type="button" wire:loading.attr="disabled" wire:click="confirmOrder" class="btn btn-warning">
                                <span wire:loading.remove wire:target="confirmOrder">
                                    Confirm Order
                                </span>
                                <span wire:loading wire:target="confirmOrder">
                                    Confirming Order...
                                </span>
                               
                            </button>
                           </form>
                        </div>
                     </div>
                </div>
            </div>
  
        </div>
    </div>
</div>
