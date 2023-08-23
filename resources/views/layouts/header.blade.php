<header id="header" class="header fixed-top d-flex align-items-center">
    <div class="d-flex align-items-center justify-content-between"> <a href="/admin/dashboard" class="logo d-flex align-items-center"> <img src="../slider/shoplogo.png" alt=""> <span class="d-none d-lg-block titlemain">Shopoholic</span> </a> <i class="bi bi-list toggle-sidebar-btn"></i></div>
    <div class="search-bar">
       
    </div>
    <nav class="header-nav ms-auto">
       <ul class="d-flex align-items-center">
          <li class="nav-item d-block d-lg-none"> <a class="nav-link nav-icon search-bar-toggle " href="#"> <i class="bi bi-search"></i> </a></li>
         
          <li class="nav-item">
            <a href="/home" class="btn btn-primary websitebtn">Go to website</a> 
          </li>
          <li class="nav-item dropdown pe-3">
             <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">  
               <i class="bi bi-person-lines-fill color-white"></i>
               <span class="myprof d-none d-md-block dropdown-toggle ps-2">{{auth()->user()->name}}</span> </a>
             <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                <li class="dropdown-header ">
                   <h6>{{auth()->user()->email}}</h6>
                   <span>{{auth()->user()->role == 3 ? 'SuperAdmin':'Admin'}}</span>
                </li>
                <li>
                   <hr class="dropdown-divider">
                </li>
                <li> <a class="dropdown-item d-flex align-items-center" href="/myprofile"> <i class="bi bi-person"></i> <span>My Profile</span> </a></li>
                <li>
                   <hr class="dropdown-divider">
                </li>
                
                  
                </li>
                <li> <a class="dropdown-item d-flex align-items-center" href="{{ route('logout') }}" onclick="event.preventDefault();
                  document.getElementById('logout-form').submit();"> <i class="bi bi-box-arrow-right"></i> <span>{{ __('Logout') }}</span> </a>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                     @csrf
                 </form>
               </li>

             </ul>
          </li>
       </ul>
    </nav>
 </header>
 <div>
   