@extends('layouts.customAdmin')

@section('content')
<main id="main" class="main">
    <div class="pagetitle">
       <h1>Manage Products</h1>
       <nav>

          <ol class="breadcrumb">
             <li class="breadcrumb-item"><a href="index.html">Products</a></li>
             <li class="breadcrumb-item active">View Productss</li>
          </ol>
       </nav>
    </div>
    <div>
        @livewire('admin.product.main')
    </div>

</main>
@endsection
@section('mycss')
<link rel="stylesheet" href="../css/table.css">    
@endsection