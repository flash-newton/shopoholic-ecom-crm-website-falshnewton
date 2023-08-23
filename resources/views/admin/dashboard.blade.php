@extends('layouts.customAdmin')

@section('content')
<main id="main" class="main">
    <div class="pagetitle">
       <h1>Dashboard</h1>
     
    </div>
    <div class="row col-12 myrow">
      <div class="statbox sales  card col-md-3 mb-3">
         <div class="card-body">
            <h5 class="stattitle card-title">Sales <span>| Total</span></h5>
            <div class="d-flex align-items-center">
               <div class="round card-icon rounded-circle d-flex align-items-center justify-content-center"> <i class="bi bi-cart"></i></div>
               <div class="ps-3">
                  <h6 class="statcount">Rs. {{$totalsales}}</h6>
                  <span class="moredet small pt-1 fw-bold">More details-></span>
               </div>
            </div>
         </div>
      </div>

      <div class="statbox customers  card col-md-3 mb-3">
         <div class="card-body">
            <h5 class="stattitle card-title">Customers</h5>
            <div class="d-flex align-items-center">
               <div class="round card-icon rounded-circle d-flex align-items-center justify-content-center"> <i class="bi bi-person-fill"></i></div>
               <div class="ps-3">
                  <h6 class="statcount">{{$totalcustomers}}</h6>
                  <span class="moredet small pt-1 fw-bold">More details-></span>
               </div>
            </div>
         </div>
      </div>

      <div class="statbox product card col-md-3 mb-3">
         <div class="card-body">
            <h5 class="stattitle card-title">Products</h5>
            <div class="d-flex align-items-center">
               <div class="round card-icon rounded-circle d-flex align-items-center justify-content-center"> <i class="bi bi-shop"></i></div>
               <div class="ps-3">
                  <h6 class="statcount">{{$totalproducts}}</h6>
                  <span class="moredet small pt-1 fw-bold">More details-></span>
               </div>
            </div>
         </div>
      </div>

      <div class="statbox order  card col-md-3 mb-3">
         <div class="card-body">
            <h5 class="stattitle card-title">Orders<span>| Total</span></h5>
            <div class="d-flex align-items-center">
               <div class="round card-icon rounded-circle d-flex align-items-center justify-content-center"> <i class="bi bi-truck"></i></div>
               <div class="ps-3">
                  <h6 class="statcount">{{$totalorders}}</h6>
                  <span class="moredet small pt-1 fw-bold">More details-></span>
               </div>
            </div>
         </div>
      </div>


      
    </div>
   
    <div class="row chartrow">
      <div class="card col-6 ">
         <div class="card-body">
             <h5 class="card-title">Weekly Sales Analytics</h5>
             <canvas id="lineChart" style="max-height: 400px; display: block; box-sizing: border-box; height: 224px; width: 449px;" width="898" height="448"></canvas>
             <script>
                 document.addEventListener("DOMContentLoaded", () => {
                     const x = @json($xline);
                     const myuser = @json($data_user);
                     const myorder = @json($data_order);
                     const myitem = @json($data_item);
     
                     new Chart(document.querySelector('#lineChart'), {
                         type: 'line',
                         data: {
                             labels: x,
                             datasets: [{
                                 label: 'New Users',
                                 data: myuser,
                                 fill: false,
                                 borderColor: 'rgb(214, 13, 33)',
                                 tension: 0.1
                             }, 
                             {
                                 label: 'Orders Made',
                                 data: myorder,
                                 fill: false,
                                 borderColor: 'rgb(55, 163, 31)',
                                 tension: 0.1
                             },
                             {
                                 label: 'Units sold',
                                 data: myitem,
                                 fill: false,
                                 borderColor: 'rgb(252, 169, 3)',
                                 tension: 0.1
                             }
                           ]
                         },
                         options: {
                             scales: {
                                 y: {
                                     beginAtZero: true
                                 }
                             }
                         }
                     });
                 });
             </script>
         </div>
     </div>

     <div class="card col-5">
      <div class="card-body">
         <h5 class="card-title">Top Products</h5>
         <canvas id="barChart" style="max-height: 400px; display: block; box-sizing: border-box; height: 224px; width: 449px;" width="898" height="448"></canvas>
         <script>document.addEventListener("DOMContentLoaded", () => {

               const prods = @json($prods);
               const soldcount = @json($soldcount);

               const showprod = prods.map(prod => {
               const maxLength = 8;
                  return prod.length > maxLength ? prod.substring(0, maxLength) + '...' : prod;
               });
                

            new Chart(document.querySelector('#barChart'), {
              type: 'bar',
              data: {
               labels: showprod,
               datasets: [{
                     label: 'Top Products',
                      data: soldcount,
                  backgroundColor: [
                    'rgba(232, 79, 94)',
                    'rgba(235, 166, 47)',
                    'rgba(60, 179, 36)',
                    'rgba(75, 192, 192 )',
                    'rgba(54, 162, 235)',
                  
                  ],
                  borderColor: [
                    'rgb(184, 37, 51)',
                    'rgb(230, 100, 25)',
                    'rgb(39, 122, 22',
                    'rgb(75, 192, 192)',
                    'rgb(54, 162, 235)',
                 
                  ],
                  borderWidth: 1
                }]
              },
              options: {
                scales: {
                  y: {
                    beginAtZero: true
                  }
                }
              }
            });
            });
         </script> 
      </div>
   </div>





    </div>


    

    
  




</main>
@endsection
@section('mycss')
    <link rel="stylesheet" href="../css/admin/dashboard.css">
@endsection