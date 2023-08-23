<aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">
       <li class="sidenav nav-item"> <a class="nav-link collapsed" href="{{url('admin/dashboard')}}"> <i class="bi bi-grid"></i> <span>Dashboard</span> </a></li>
       <li class="sidenav nav-item">
         <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#"> <i class="bi bi-layout-text-window-reverse"></i><span>Categories</span><i class="bi bi-chevron-down ms-auto"></i> </a>
         <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
            <li> <a href="{{url('admin/category')}}"> <i class="bi bi-circle"></i><span>View Categories</span> </a></li>
            <li> <a href="{{url('admin/category-add')}}"> <i class="bi bi-circle"></i><span>Add Category</span> </a></li>
            <li> <a href="{{url('admin/genre')}}"> <i class="bi bi-circle"></i><span>Sub-Categories</span> </a></li>
         </ul>
      </li>
      <li class="sidenav nav-item">
         <a class="nav-link collapsed" data-bs-target="#books-nav" data-bs-toggle="collapse" href="#"> <i class="bi bi-layout-text-window-reverse"></i><span>Products</span><i class="bi bi-chevron-down ms-auto"></i> </a>
         <ul id="books-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
            <li> <a href="{{url('admin/products')}}"> <i class="bi bi-circle"></i><span>Manage Products</span> </a></li>
            <li> <a href="{{url('admin/product-add')}}"> <i class="bi bi-circle"></i><span>Add Product</span> </a></li>
         </ul>
      </li>

      <li class="sidenav nav-item">
         <a class="nav-link collapsed" data-bs-target="#orders" data-bs-toggle="collapse" href="#"> <i class="bi bi-layout-text-window-reverse"></i><span>Sales</span><i class="bi bi-chevron-down ms-auto"></i> </a>
         <ul id="orders" class="nav-content collapse " data-bs-parent="#sidebar-nav">
            <li> <a href="{{url('admin/all-orders')}}"> <i class="bi bi-circle"></i><span>All Orders</span> </a></li>
           
         </ul>
      </li>


      <li class="sidenav nav-item">
         <a class="nav-link collapsed" data-bs-target="#users" data-bs-toggle="collapse" href="#"> <i class="bi bi-layout-text-window-reverse"></i><span>Users</span><i class="bi bi-chevron-down ms-auto"></i> </a>
         <ul id="users" class="nav-content collapse " data-bs-parent="#sidebar-nav">
            <li> <a href="{{url('admin/all-users')}}"> <i class="bi bi-circle"></i><span>All users</span> </a></li>
            
           
         </ul>
      </li>
      @can('isSuperAdmin')
      <li class="sidenav nav-item"> <a class="nav-link collapsed" href="{{url('admin/admins')}}"> <i class="bi bi-grid"></i> <span>Administrators</span> </a></li>
      <li class="sidenav nav-item">
      @endcan
      



       
    </ul>
 </aside>