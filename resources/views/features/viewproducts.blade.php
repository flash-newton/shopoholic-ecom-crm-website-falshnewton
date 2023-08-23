@extends('layouts.app')

@section('content')
<div class="mycontainer">

    @livewire('feature.product.main', ['cat' => $cat])
</div>

@endsection

@section('mycss')

<link rel="stylesheet" href="../css/features/products.css">
<link rel="stylesheet" href="../css/features/addproduct.css">  
    
@endsection