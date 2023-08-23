@extends('layouts.customAdmin')

@section('content')
<main id="main" class="main">
    <div class="pagetitle">
       <h1>Sales</h1>
       <nav>

          <ol class="breadcrumb">
             <li class="breadcrumb-item"><a href="index.html">Category</a></li>
             <li class="breadcrumb-item active">View All Orders</li>
          </ol>
       </nav>
    </div>

    @livewire('admin.orders.main')
   

</main>
@endsection
@section('mycss')
<link rel="stylesheet" href="../css/table.css">    
<link rel="stylesheet" href="../css/admin/order.css">
@endsection