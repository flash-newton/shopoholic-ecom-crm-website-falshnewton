

<div>

    <div class="row">
        <div class="col-md-3">
            <!-- Side panel -->
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title sectiontitle">Sub-Categories</h5>
                    <ul class="list-group">
                        @foreach($cat->genres as $it)
                        <li class="list-group-item">
                            <label class="sidetext d-block">
                                <input class="form-check-input me-1" wire:model="subInputs" type="checkbox" value="{{$it->name}}" >
                                {{$it->name}}
                            </label>
                        </li>
                        @endforeach
                       
                    </ul>
                 </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title sectiontitle">Price</h5>
                    <ul class="list-group">
                        <li class="list-group-item">
                            <label class="sidetext d-block">
                                <input class=" form-check-input me-1" wire:model="priceInputs" type="radio" value="high-to-low" >
                                High-to-Low
                            </label>
                        </li>
                        <li class="list-group-item">
                            <label class="sidetext d-block">
                                <input class="form-check-input me-1" wire:model="priceInputs" type="radio" value="low-to-high" >
                                Low-to-High
                            </label>
                        </li>
                       
                    </ul>
                 </div>
            </div>
        </div>
        <div class="col-md-9">
            <!-- Main content -->
            <div class="card bigcard">
                <div class="row">
                    <div class="">
                      <h4 class="pagetitle text-uppercase">{{$cat->name}}</h4>
                      <p class="pagedescription">Select the Product You Desire</p>
                      <hr/>
                    </div>
                  </div>
                  <div class="row">

                    @forelse ($prod as $p)
                    <div class="col-md-4">
                        <div class="card prodcard">
                          <div class="mybody">
                            <div class="imgbox">
                            @php
                                $ispopular = $p->popular();
                            @endphp

                            @if ($p->stock == '0')
                                <p class="status">Out of stock</p>
                            @elseif($ispopular) 
                            <p class="status toppick">Top pick</p>                           
                            @endif
                                <div class="mytitle">{{$p->name}}</div>
                                <img src="../uploads/products/{{$p->prod_img}}" alt="">
                            </div>
                            <div class="textbox">
                                <div class="description">{{$p->description}}</div>
                                <div class="pricebox">
                                    <div class="price">
                                        Rs {{$p->sold_price}}
                                        @if($p->discount>0)
                                        <span class="discount">{{$p->discount}}% OFF</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                          </div>
                          <a href="/{{$cat->name}}/{{$p->id}}">
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
