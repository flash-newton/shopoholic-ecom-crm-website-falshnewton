@extends('layouts.app')

@section('content')
<div class="mycontainer">

   @livewire('feature.checkout.main')
</div>

@endsection

@section('mycss')
<link rel="stylesheet" href="../css/features/checkout.css"> 
    
@endsection