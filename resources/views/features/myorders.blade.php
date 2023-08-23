@extends('layouts.app')

@section('content')

<div class="py-3 py-md-md-5">
    <div class="container ">
        <div class="row">
            <div class="col-md-12">
                <div class="shadow bg-white p-3">
                    <h4 class="tabletitle ">My Orders</h4>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <th>Order Id</th>
                                <th>Reference No.</th>
                                <th>Username</th>
                                <th>Date</th>
                                <th>Status</th>
                                <th>More Details</th>
                            </thead>
                            <tbody>
                                @forelse ($ord as $o)
                                    <tr class="rows">
                                        <td>{{$o->id}}</td>
                                        <td>{{$o->ref_no}}</td>
                                        <td>{{$o->user_id}}</td>
                                        <td>{{$o->created_at->format('Y-m-d')}}</td>
                                        <td ><span class="{{$o->status=='Delivered' ? 'greenstat': 'yellowstat'}}">{{$o->status}}</span></td>
                                        <td><a href="{{url('/order/'.$o->id.'')}}" class="btn tablebtn editbtn">View</a></td>
                                    </tr>
                                @empty
                                    <td colspan="7">Im sorry but no orders have currently been made</td>
                                @endforelse
                            </tbody>
                        </table>
                        <div class="arrows">
                            {{$ord->links()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection

@section('mycss')

<link rel="stylesheet" href="../css/features/myorder.css">
<link rel="stylesheet" href="../css/table.css">
    
@endsection