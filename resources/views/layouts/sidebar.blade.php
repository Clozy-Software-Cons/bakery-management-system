 <!-- Sidebar -->
 <ul class="navbar-nav bg-gradient-dark sidebar sidebar-dark accordion" id="accordionSidebar">

     <!-- Sidebar - Brand -->
     <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('dashboard') }}">
         <img src="{{ asset('assets/img/png logo.png') }}" alt="" width="50%"><br>
     </a>

     <!-- Divider -->
     <hr class="sidebar-divider my-0">

     <!-- Nav Item - Dashboard -->
     <li class="nav-item">
         <a class="nav-link" href="{{ route('dashboard') }}">
             <i class="fas fa-fw fa-tachometer-alt"></i>
             <span>Dashboard</span></a>
     </li>

     <!-- Nav Item - Pages Collapse Menu -->
     <li class="nav-item">
         <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#product_collape"
             aria-expanded="true" aria-controls="collapseTwo">
             <i class="fas fa-archive"></i>
             <span>Product</span>
         </a>
         <div id="product_collape" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
             <div class="bg-white py-2 collapse-inner rounded">
                 <a class="collapse-item" href="{{ route('products.page.create') }}"><i class="fa fa-plus mx-2"></i>New Product</a>
                 <a class="collapse-item" href="{{ route('products.page.index') }}"><i class="fa fa-table mx-2"></i>Product List</a>
             </div>
         </div>
     </li>

     <!-- Divider -->
     <hr class="sidebar-divider">

     <!-- Heading -->
     <div class="sidebar-heading">
         Orders
     </div>

     <!-- Nav Item - Pages Collapse Menu -->
     <li class="nav-item">
         <a class="nav-link collapsed" href="javascript:void(0)" data-toggle="collapse" data-target="#collapseTwo"
             aria-expanded="true" aria-controls="collapseTwo">
             <i class="far fa-sticky-note"></i>
             <span>Order</span>
         </a>
         <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
             <div class="bg-white py-2 collapse-inner rounded">
                 <a class="collapse-item" href="{{ route('product_orders.create') }}"><i class="fa fa-plus mx-2"></i>New Order</a>
                 <a class="collapse-item" href="{{ route('product_orders.index') }}"><i class="fa fa-table mx-2"></i>Order List</a>
             </div>
         </div>
     </li>

     <!-- Divider -->
     <hr class="sidebar-divider">

     <!-- Nav Item - Charts -->
     <li class="nav-item">
         <a class="nav-link" href="javascript:void(0)">
             <i class="fas fa-fw fa-chart-area"></i>
             <span>Charts</span></a>
     </li>

     <!-- Sidebar Toggler (Sidebar) -->
     <div class="text-center d-none d-md-inline">
         <button class="rounded-circle border-0" id="sidebarToggle"></button>
     </div>

 </ul>
