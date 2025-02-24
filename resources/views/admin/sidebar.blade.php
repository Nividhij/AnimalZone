<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{URL::TO('/')}}/admin/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">{{ config('app.name') }}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{URL::TO('/')}}/admin/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ Auth::user()->name }}</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          
          <li class="nav-item">
            <a href="pages/widgets.html" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                Categories
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('admin.category.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Main Category</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.subcategory.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Sub Category</p>
                </a>
              </li>
             
            </ul>
          </li>
             
          <li class="nav-item">
            <a href="{{ route('admin.categoryatr.index')}}" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Attribute
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{route('admin.product.index')}}" class="nav-link">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <!-- <i class="fa-solid fa-paw"></i>
               -->
              <p>
                Products
              </p>
            </a>
          </li>

          
          <li class="nav-item">
            <a href="{{route('admin.productlist.index')}}" class="nav-link">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <!-- <i class="fa-solid fa-paw"></i>
               -->
              <p>
                Products List
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{route('admin.banner.list')}}" class="nav-link">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <!-- <i class="fa-solid fa-paw"></i>
               -->
              <p>
                Banner
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('city.show')}}" class="nav-link">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <!-- <i class="fa-solid fa-paw"></i>
               -->
              <p>
                City
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="" class="nav-link">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <!-- <i class="fa-solid fa-paw"></i>
               -->
              <p>
                Enquiry
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('enquiries.list')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Enquiries</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route ('enquiries.confirmlist')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Confirm Enquiry</p>
                </a>
              </li>
             
            </ul>
          </li>

          
          
          <li class="nav-item">
            <a href="{{route('logout')}}" class="nav-link">
                <!-- <i class="nav-icon fas fa-tachometer-alt"></i> -->
                <i class="nav-icon fas fa-solid fa-right-from-bracket"></i>
              <p>
                Logout
              </p>
            </a>
          </li>

          
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    
    <!-- /.sidebar -->
  </aside>