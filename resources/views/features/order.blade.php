@extends('layouts.app')

@section('content')

<div class="py-3 py-md-md-5">
    <div class="container ">
        <div class="row">
            <div class="col-md-12">
                <div class="shadow bg-white p-3">
                    <h4 class="text-primary">
                        Order Reciept
                        <a href="/myorders" class="btn btn-danger btn-sm float-end">Back</a>
                    </h4>
                    <hr>
                    <div class="row">
                        <div class="col-md-6">
                            <h5>Client Details</h5>
                            <hr>
                            <h6>Name : {{$ord->user->name}}</h6>
                            <h6>Email : {{$ord->user->email}}</h6>
                            <h6>Address : {{$ord->address}}</h6>
                            <h6>Phone : {{$ord->phone}}</h6>
                        </div>
                        <div class="col-md-6">
                            <h5>Order Details</h5>
                            <hr>
                            <h6>Ref No :{{$ord->ref_no}}</h6>
                            <h6>Date : {{$ord->created_at}}</h6>
                            <h6>Total :</h6>
                            <h6>Status : <span class="{{$ord->status=='Delivered' ? 'greenstat': 'yellowstat'}}">{{$ord->status}}</span></h6>
                        </div>
                    </div>
                    <br>
                    <h5>Order Item Details</h5>
                    <hr>
                    <div class="table-responsive">
                        <table class="table ">
                            <thead>
                                <th>ID</th>
                                <th>Product</th>
                                <th>Name</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Total</th>
                            </thead>
                            <tbody>
                                @php
                                    $orderTotal=0;   
                                @endphp
                                @foreach ($ord->items as $o)
                                    <tr class="rows">
                                        <td width="10%">{{$o->id}}</td>

                                        <td width="10%">
                                            <img src="../uploads/products/{{$o->product->prod_img}}" style="width: 50px; height: 50px" alt="">
                                         </td>

                                        <td>{{$o->product->name}}</td>
                                        <td width="10%">{{$o->price}}</td>
                                        <td width="15%">{{$o->prod_count}}</td>
                                        <td width="15%">{{$o->prod_count*$o->price}}</td>
                                        @php
                                        $orderTotal+= $o->prod_count*$o->price;   
                                        @endphp
                                    </tr>
                                @endforeach
                                <tr>
                                    <td  ></td>
                                    <td  ></td>
                                    <td  ></td>
                                    <td  ></td>
                                    <td ><h6 style="font-weight: 600">Final Total</h6></td>
                                    <td ><h6 style="font-weight: 600">{{$orderTotal}}</h6></td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="arrows">
                           
                        </div>
                    </div>
                 
                </div>
            </div>
        </div>
    </div>
</div>


@endsection

@section('mycss')
<link rel="stylesheet" href="../css/admin/order.css">

    
@endsection