@extends('layouts.app')

@section('content')
<div class="mycontainer">

   @livewire('feature.cart.main')
</div>

@endsection

@section('mycss')
<link rel="stylesheet" href="../css/features/mycart.css"> 
    
@endsection