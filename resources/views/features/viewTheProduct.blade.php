@extends('layouts.app')

@section('content')
<div class="mycontainer">

    @livewire('feature.product.details',['cat'=>$cat,'prod'=>$prod])
</div>

@endsection

@section('mycss')

<link rel="stylesheet" href="../css/features/theproduct.css">  
    
@endsection