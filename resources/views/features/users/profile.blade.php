@extends('layouts.app')

@section('content')
<div class="mycontainer col-7 mx-auto">
    <div class="card">
        <div class="card-title text-center mytitlecard">User profile</div>
        <div class="card-body pt-3">
           <ul class="nav nav-tabs nav-tabs-bordered">
              <li class="nav-item"> <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Overview</button></li>

              <li class="nav-item"> <button class="nav-link " data-bs-toggle="tab" data-bs-target="#profile-edit">Edit Profile</button></li>
          
              <li class="nav-item"> <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password">Change Password</button></li>
           </ul>

           <div class="tab-content pt-2">
              <div class="tab-pane fade profile-overview active show" id="profile-overview">
                <div class="mainbox">
                    <div class="profilebox col-5">
                        <img src="../slider/profile.png" alt="Profile">
                        <div class="roletext">{{$u->role == '1'? 'Admin':'Customer'}}</div>
                    </div>
                    <div class="col-7 textbox">
                      
                        <div class="row">
                       
                           <div class="col-lg-6  label ">First Name :</div>
                           <div class="col-lg-6 col-md-8">{{$u->name}}</div>
                           
                        </div>
                        <div class="row">
                           <div class="col-lg-6 col-md-4 label">Last Name :</div>
                           <div class="col-lg-6 col-md-8">{{$u->lname}}</div>
                        </div>
                        <div class="row">
                           <div class="col-lg-6 col-md-4 label">Email :</div>
                           <div class="col-lg-6 col-md-8">{{$u->email}}</div>
                        </div>
                        <div class="row">
                           <div class="col-lg-6 col-md-4 label">Phone Number :</div>
                           <div class="col-lg-6 col-md-8">{{$u->phone}}</div>
                        </div>
                        <div class="row">
                           <div class="col-lg-6 col-md-4 label">Address :</div>
                           <div class="col-lg-6 col-md-8">{{$u->address}}</div>
                        </div>
                        @if($u->role == '0')
                        <div class="row">
                           <div class="col-lg-6 col-md-4 label">Total Spent :</div>
                           <div class="redtext col-lg-6 col-md-8">Rs. {{$u->sales->totalsales}}</div>
                        </div>
                        @endif
                        
                     

                    </div>

                </div>
                

                
              </div>



              <div class="tab-pane fade profile-edit pt-3 " id="profile-edit">
                 <form action="/profile-update/{{$u->id}}" method="POST">
                   @csrf
                   @method('PUT')
                    <div class="row mb-3">
                       <label for="name" class="col-md-4 col-lg-3 col-form-label">First Name</label>
                       <div class="col-md-8 col-lg-9"> <input name="name" type="text" class="form-control" id="name" value="{{$u->name}}"></div>
                       @error('name')
                       <span class="invalid-feedback" role="alert">
                           <strong>{{ $message }}</strong>
                       </span>
                       @enderror
                    </div>
                 
                    <div class="row mb-3">
                       <label for="lname" class="col-md-4 col-lg-3 col-form-label">Last name</label>
                       <div class="col-md-8 col-lg-9"> <input name="lname" type="text" class="form-control" id="lname" value="{{$u->lname}}"></div>
                       @error('lname')
                       <span class="invalid-feedback" role="alert">
                           <strong>{{ $message }}</strong>
                       </span>
                       @enderror
                    </div>
                    <div class="row mb-3">
                        <label for="email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                        <div class="col-md-8 col-lg-9"> <input readonly name="email" type="email" class="form-control" id="email" value="{{$u->email}}"></div>
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                     </div>

                     <div class="row mb-3">
                        <label for="phone" class="col-md-4 col-lg-3 col-form-label">Phone</label>
                        <div class="col-md-8 col-lg-9"> <input inputmode="tel" name="phone" type="text" class="form-control" id="phone" value="{{$u->phone}}"></div>
                        @error('phone')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                     </div>
                    <div class="row mb-3">
                       <label for="address" class="col-md-4 col-lg-3 col-form-label">Address</label>
                       <div class="col-md-8 col-lg-9"> <input name="address" type="text" class="form-control" id="address" value="{{$u->address}}"></div>
                       @error('address')
                       <span class="invalid-feedback" role="alert">
                           <strong>{{ $message }}</strong>
                       </span>
                       @enderror
                    </div>
                  
                    <div class="text-center"> <button type="submit" class="btn btn-primary">Save Changes</button></div>
                 </form>
              </div>
            




              <div class="tab-pane fade pt-3" id="profile-change-password">
                @if(session('message'))
                <h5 class="alert alert-successs">{{session('message')}}</h5>
                @endif
                @if($errors->any())
                <h5 class="alert alert-danger">Password change failed</h5>
                @endif
                 <form action="/passwordchange" method="POST">
                    @csrf
                    <div class="row mb-3">
                       <label for="c_password" class="col-md-4 col-lg-3 col-form-label">Current Password</label>
                       <div class="col-md-8 col-lg-9"> <input name="c_password" type="password" class="form-control" id="c_password"></div>
                    </div>
                    <div class="row mb-3">
                       <label for="password" class="col-md-4 col-lg-3 col-form-label">New Password</label>
                       <div class="col-md-8 col-lg-9"> <input name="password" type="password" class="form-control" id="password"></div>
                    </div>
                    <div class="row mb-3">
                       <label for="password_confirmation" class="col-md-4 col-lg-3 col-form-label">Re-enter New Password</label>
                       <div class="col-md-8 col-lg-9"> <input name="password_confirmation" type="password" class="form-control" id="password_confirmation"></div>
                    </div>
                    <div class="text-center"> <button type="submit" class="btn btn-primary">Change Password</button></div>
                 </form>
              </div>
           </div>
        </div>
     </div>
   
</div>

@endsection

@section('mycss')


    <link rel="stylesheet" href="../css/features/profile.css">
@endsection