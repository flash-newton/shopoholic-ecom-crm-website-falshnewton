@extends('layouts.customAdmin')

@section('content')
<main id="main" class="main">
    <div class="pagetitle">
       <h1>Categories</h1>
       <nav>

          <ol class="breadcrumb">
             <li class="breadcrumb-item"><a href="index.html">Category</a></li>
             <li class="breadcrumb-item active">View Categories</li>
          </ol>
       </nav>
    </div>
    <div>
        @livewire('admin.category.main')
    </div>

</main>
@endsection
@section('mycss')
<link rel="stylesheet" href="../css/table.css">  

@endsection