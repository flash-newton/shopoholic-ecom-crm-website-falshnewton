<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta content="width=device-width, initial-scale=1.0" name="viewport">
      <title>Shopoholic</title>
      <link rel="icon" type="image/x-icon" href="../shoplogo.ico" />
      <meta name="robots" content="noindex, nofollow">
      <meta content="" name="description">
      <meta content="" name="keywords">
      <meta name="csrf-token" content="{{ csrf_token() }}">
      <link href="assets/img/favicon.png" rel="icon">
      <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
      <link href="https://fonts.gstatic.com" rel="preconnect">
      <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
      
      
      <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
      <link href="../assets/css/bootstrap-icons.css" rel="stylesheet">
      <link href="../assets/css/boxicons.min.css" rel="stylesheet">
      <link href="../assets/css/quill.snow.css" rel="stylesheet">
      <link href="../assets/css/quill.bubble.css" rel="stylesheet">
      <link href="../assets/css/remixicon.css" rel="stylesheet">
      <link href="../assets/css/simple-datatables.css" rel="stylesheet">

   
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
      <link href="../assets/css/style.css" rel="stylesheet">
      <link rel="stylesheet" href="../css/sidepanel.css"> 
      <link rel="stylesheet" href="../css/header.css">
      @yield('mycss')
      @livewireStyles
   </head>
   <body>
    @include('layouts.header')
    @include('layouts.sidebar')
    @yield('content')

    <!--<footer id="footer" class="footer">
        <div class="copyright"> &copy; Copyright <strong><span>Compnay Name</span></strong>. All Rights Reserved</div>
        <div class="credits"> with love <a href="https://freeetemplates.com/">FreeeTemplates</a></div>
     </footer>-->
     <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>  
     <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Bootstrap JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
       <script src="../assets/js/apexcharts.min.js"></script>
       <script src="../assets/js/bootstrap.bundle.min.js"></script>
       <script src="../assets/js/chart.min.js"></script>
       <script src="../assets/js/echarts.min.js"></script>
       <script src="../assets/js/quill.min.js"></script>
       <script src="../assets/js/simple-datatables.js"></script>
       <script src="../assets/js/tinymce.min.js"></script>
       <script src="../assets/js/validate.js"></script>
       <script src="../assets/js/main.js"></script> 
      
   
       <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

       <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<script>
    $(document).ready(function(){
       toastr.options = {
          'progressBar':'true',
          'positionClass':'toast-top-right'
       }
    });
 
 </script>



       <script>
         @if(session('message'))
               toastr.success('{{ session('message') }}');
         @endif
         @if(session('error'))
               toastr.error('{{ session('error') }}');
         @endif
        </script>
     
       @stack('script')
       
       @livewireScripts
       
       
   </body>

</html>
