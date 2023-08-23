<div>
    <div class="card recent-sales overflow-auto">
                           
        <div class="card-body">
           <h5 class="card-title">User Details 
            <span class="filters float-end"> 
                <select wire:model="filter" class="form-select">
                    <option value="">All</option>
                    <option value="1">Admins</option>
                    <option value="0">Customers</option>
                </select>
                <input placeholder="Search for user" class="form-control" type="search" wire:model='search' name="" id="">
            </span>
        </h5>
           <div class="dataTable-wrapper dataTable-loading no-footer sortable searchable fixed-columns">
            <div class="dataTable-container">
                <table class="table ">
              <thead>
                 <tr>
                    <th scope="col">ID</th>
                     <th scope="col">Name</th>
                     <th scope="col">Email</th>
                     <th scope="col">Role</th>
                     <th scope="col">Account created on</th>
                
                </tr>
              </thead>
              <tbody>
                @foreach ($user as $u)
                    <tr class="myrow">
                        <td>{{$u->id}}</td>
                        <td><a href="/userprofile/{{$u->id}}">{{$u->name}}</a></td>
                        <td>{{$u->email}}</td>
                        <td><span class="{{$u->role == '0' ? 'cust':'admin'}}">{{$u->role == '0' ? 'Customer':'Admin'}}</span></td>
                        <td>{{$u->created_at}}</td>
                     </tr>
                        
                    @endforeach
               
                   
            </tbody>
           </table>
           <div class="pages">
            {{$user->links()}}
        </div>
        </div>
    </div>
        </div>
     </div>
</div>
