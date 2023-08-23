@extends('layouts.customAdmin')

@section('content')
<main id="main" class="main">
    <div class="pagetitle">
       <h1>Genres</h1>
       
    </div>
    <div>
      @livewire('admin.genre.index')


    </div>

</main>
@endsection
@section('mycss')
<link rel="stylesheet" href="../css/table.css">  
  <link rel="stylesheet" href="../css/admin/genre.css">
  
@endsection