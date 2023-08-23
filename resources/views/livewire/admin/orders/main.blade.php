<div>
    <div>

        <div class="card">
            <div class=" mytitle card-body">
                <h5 class="mytitle card-title">All Order Details 
                    <span class="float-end">
                        
                        <div class="duration-options">
                            <span style="color: white"> Show orders for :</span>
                            <select wire:model="duration">
                                <option value="0">All</option>
                                <option value="1">Today</option>
                                <option value="7">Last 7 Days</option>
                            </select>
                        </div>
                    </span>
                </h5>
                <hr/>
                
            </div>
            <div class="card-body">
                <table class="table">
                   <thead>
                      <tr>
                        <th scope="col">Order Id</th>
                        <th scope="col">Reference No.</th>
                        <th scope="col">Customer Name</th>
                        <th scope="col">Date</th>
                        <th scope="col">Status</th>
                        <th scope="col">More Details</th>
                      </tr>
                   </thead>
                   <tbody>
                        @foreach ($ord as $o)
                        <tr class="rows">
                            <td>{{$o->id}}</td>
                            <td>{{$o->ref_no}}</td>
                            <td>{{$o->user->name}}</td>
                            <td>{{$o->created_at->format('Y-m-d')}}</td>
                            <td><a href="#" class="{{$o->status=='Delivered' ? 'greenstat': 'yellowstat'}}" wire:click="changestatus({{$o->id}})">{{$o->status}}</a></td>
                            <td><a href="{{url('/admin-order/'.$o->id.'')}}" class="btn tablebtn editbtn">View</a></td>
                        </tr>
                            
                        @endforeach
                     
                   </tbody>
                </table>
                <div class="paginationstuff">
                    {{$ord->links()}}
                </div>
             </div>
    
        </div>
        



    </div>
</div>
