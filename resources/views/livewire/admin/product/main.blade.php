<div>
    <div class="card">
        <div class=" mytitle card-body">
            <h5 class="mytitle card-title">Products Summary
                <span class="float-end"> 
                    <input placeholder="Search for product" class="form-control" type="search" wire:model='search' name="" id="">
                </span>
            </h5>
            <hr/>
            
        </div>
        <div class="card-body">
            <table class="table">
               <thead>
                  <tr>
                     <th scope="col">Product</th>
                     <th scope="col">Name</th>
                     <th scope="col">Price</th>
                     <th scope="col">Stock</th>
                     <th scope="col">Units sold</th>
                     <th scope="col">Status</th>
                  </tr>
               </thead>
               <tbody>
                    @foreach ($prod as $p)
                    <tr class="myrow">
                        <td ><img src="../uploads/products/{{$p->prod_img}}" style="width: 50px; height: 50px;"></td>
                        <td scope="row"><a href="{{url('product-details/'.$p->id.'')}}">{{$p->name}}</a></td>
                        <td>{{$p->actual_price}}</td>
                        <td>{{$p->stock}}</td>
                        <td>{{$p->soldcount}}</td>
                        <td >
                            <div class="status {{$p->status == '0' ? 'Available':'Shelved'}} ">{{$p->status == '0' ? 'Available':'Shelved'}}
                            </div>
                        </td>
                     </tr>
                        
                    @endforeach
                 
               </tbody>
            </table>
            <div class="paginationstuff">
                {{$prod->links()}}
            </div>
         </div>

    </div>
    


</div>
