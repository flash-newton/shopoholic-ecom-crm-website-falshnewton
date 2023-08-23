@extends('layouts.app')

@section('content')
<div class="mycontainer col-7 mx-auto">

    <div class="card">
        <div class="card-title text-center mytitlecard">
            <a href="/admin/all-users" class="float-start backbtn"><i class="bi bi-chevron-double-left"></i><span>Back</span> </a> 
            User profile
        </div>
        
        <div class="card-body pt-3">
            
           <div class=" pt-2">
                <div class="mainbox">
                    <div class="profilebox col-5">
                        <div class="roletext {{$user->role == '0'? 'cust':'admin'}}">{{$user->role == '0'? 'Customer':'Admin'}}</div>
                        <img src="../slider/profile.png" alt="Profile">
                        @if($user->role == '0')
                        <a href="/admin/del-account/{{$user->id}}" class="delbtn" type="button">Delete account</a>
                        @endif
                    </div>

                    <div class="col-7 textbox">
                        <h4>Details</h4>
                        <hr>
                        <div class="row">
                       
                           <div class="col-lg-6  label ">First Name : </div>
                           <div class="col-lg-6 col-md-8">{{$user->name}}</div>
                           
                        </div>
                        <div class="row">
                           <div class="col-lg-6 col-md-4 label">Last Name :</div>
                           <div class="col-lg-6 col-md-8">{{$user->lname}}</div>
                        </div>
                        <div class="row">
                           <div class="col-lg-6 col-md-4 label">Email :</div>
                           <div class="col-lg-6 col-md-8">{{$user->email}}</div>
                        </div>
                        <div class="row">
                           <div class="col-lg-6 col-md-4 label">Phone Number :</div>
                           <div class="col-lg-6 col-md-8">{{$user->phone}}</div>
                        </div>
                        <div class="row">
                           <div class="col-lg-6 col-md-4 label">Address :</div>
                           <div class="col-lg-6 col-md-8">{{$user->address}}</div>
                        </div>
                        @if ($user->role == '0')
                        <div class="row">
                           <div class="col-lg-6 col-md-4 label">Total spent :</div>
                           <div class="col-lg-6 col-md-8">Rs. {{$user->sales->totalsales}}</div>
                        </div>
                        @endif
                 
                        
                     

                    </div>

                </div>
                

                
              </div>



         




           
           </div>
        </div>
     </div>
   
</div>


</div>
@endsection

@section('mycss')


    <link rel="stylesheet" href="../css/features/account.css">
@endsection