<div class="main-navbar shadow-sm sticky-top">
    <div class="top-navbar">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-2 my-auto d-none d-sm-none d-md-block d-lg-block">
                    <div class="logobox">
                        <img class="logoimg" src="../slider/shoplogo.png" alt=""> 
                        <div class="logotitle"><a href="/"><h5 class="brand-name">SHOPOHOLIC</h5></a></div>
                    </div>  
                </div>
                <div class="col-md-1 my-auto">
                    <!--<form role="search">
                        <div class="input-group">
                            <input type="search" placeholder="Search your product" class="form-control" />
                            <button class="btn bg-white" type="submit">
                                <i class="fa fa-search"></i>
                            </button>
                        </div>
                    </form> -->
                </div>
                <div class="col-md-9 my-auto">
                    <ul class="nav justify-content-end">
                        <li class="nav-item linkbtn ">
                            <a class="nav-link" href="{{url('/home')}}">
                                <i class="bi bi-house-door-fill"></i> Home
                            </a>
                        </li>

                        <li class="nav-item linkbtn ">
                            <a class="nav-link" href="/categories/all">
                                <i class="bi bi-file-earmark-richtext"></i> Catorgories
                            </a>
                        </li>
                        
                        <li class="nav-item linkbtn">
                            <a class="nav-link " href="/mycart">
                                <i class="bi bi-cart-fill"></i> Cart @livewire('feature.cart.count')
                            </a>
                        </li>
                        <li class="nav-item  linkbtn">
                            <a class="nav-link" href="/myorders">
                                <i class="bi bi-archive-fill"></i> MyOrders
                            </a>
                        </li>
                        <li class="nav-item ">
                            <div class="nav-link" >
                                ||
                            </div>
                        </li>

                        @guest
                        @if (Route::has('login'))
                            <li class="nav-item ">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                        @endif

                        @if (Route::has('register'))
                            <li class="nav-item ">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else
                    @can('isAdmin')
                    <li class="nav-item ">
                        <a class="nav-link logsbtn" href="/admin/dashboard">
                         Dashboard
                        </a>
                    </li>
   
                    @endcan

                    

                    <li class="nav-item dropdown ">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fa fa-user"></i>{{ Auth::user()->name }}
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="/myprofile"><i class="fa fa-user"></i> Profile</a></li>
                        <li><a class="dropdown-item" href="/myorders"><i class="fa fa-list"></i> My Orders</a></li>
                       
                        <li><a class="dropdown-item" href="/mycart"><i class="fa fa-shopping-cart"></i> My Cart</a></li>
                        <li><a  class="dropdown-item " href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                          document.getElementById('logout-form').submit();">
                                          <i class="fa fa-heart"></i>
                             {{ __('Logout') }}
                         </a></li>
                         <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                        </ul>
                    </li>
                        
                    @endguest



                        
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <a class="navbar-brand d-block d-sm-block d-md-none d-lg-none" href="#">
                Funda Ecom
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse ben" id="navbarSupportedContent">
                <!--<ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">All Categories</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">New Arrivals</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Featured Products</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Electronics</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Fashions</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Accessories</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Appliances</a>
                    </li>
                </ul>-->
            </div>
        </div>
    </nav>
</div>