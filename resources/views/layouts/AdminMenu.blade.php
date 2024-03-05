<!-- Main Sidebar Container -->
<style type="text/css">
    .nav-link.active{
          background-color: #d11409 !important;
    }
    .nav-link:hover{
          background-color: #d11409 !important;
    }
  </style>
  <aside class="main-sidebar sidebar-dark-primary">
    <!-- Brand Logo -->
  <center>
    <span class="logo-icon font-weight-light mr-2">

      <img src="{{ asset('homeweb/images/Logo-main.png')}}" alt="AdminLTE Logo" style="width: 50%;">

    </span>
  </center>
  <!-- <a href="/admin-dashboard" class="brand-link text-center">

        <span class="logo-icon font-weight-light mr-2"><img src="{{ asset('admin/img/logo/logo2.png')}}" style="width: 100px;"> </span>
        <span class="brand-text font-weight-light"><img src="{{ asset('admin/img/logo/giro-kab-logo-text.svg')}}" style="width: 130px;" > </span> -->
      <!-- </a> -->


    <!-- Sidebar -->

<style>
    .sidebar .nav-item i{
        margin-right: 15px;
    }
</style>

    <div class="sidebar" style="overflow-y: hidden;">

       <!-- <div class="user-panel mt-3 pb-3 mb-3 d-flex active">
          <div class="image">
            <img src="{{ asset('admin/img/'.Auth::guard('admin')->user()->profile_image)}}" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
            <a href="/admin-profile" class="d-block" style="color:white;">{{ Auth::guard('admin')->user()->name}}</a>
          </div>
        </div>  -->

   <!--
       <div class="form-inline" style="background-color:#6100ff;">
          <div class="input-group" data-widget="sidebar-search" style="background-color:#6100ff;">
            <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
            <div class="input-group-append">
              <button class="btn btn-sidebar">
                <i class="fas fa-search fa-fw"></i>
              </button>
            </div>
          </div>
        </div> -->

      <!-- Sidebar Menu -->


      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false" >
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

               <li class="nav-item" >
                @if($header=='Dashboard')
                <a href="/admin-dashboard" class="nav-link active" style="color: white;">
                @else
                <a href="/admin-dashboard" class="nav-link" style="color: white;">
                @endif
                <i class="fas fa-home"></i>
                  <p>
                    Dashboard

                  </p>
                </a>
              </li>

              <li class="nav-item" >
                @if($header=='ban')
                <a href="/banner" class="nav-link active" style="color: white;">
                @else
                <a href="/banner" class="nav-link" style="color: white;">
                @endif
                <i class="fas fa-images"></i>           <p>
                    Banner
                  </p>
                </a>
              </li>



          <li class="nav-item" >
                @if($header=='Descat')
                <a href="/disease-category" class="nav-link active" style="color: white;">
                @else
                <a href="/disease-category" class="nav-link" style="color: white;">
                @endif
                <i class="fas fa-boxes"></i>
                  <p>
                    Disease Category
                  </p>
                </a>
              </li>

              <li class="nav-item" >
                @if($header=='Dis')
                <a href="/disease" class="nav-link active" style="color: white;">
                @else
                <a href="/disease" class="nav-link" style="color: white;">
                @endif
                <i class="fas fa-tablets"></i>
                  <p>
                    Disease
                  </p>
                </a>
              </li>

              <li class="nav-item" >
                @if($header=='ProdCat')
                <a href="/product-category" class="nav-link active" style="color: white;">
                @else
                <a href="/product-category" class="nav-link" style="color: white;">
                @endif
                <i class="fas fa-boxes"></i>
                  <p>
                    Product Category
                  </p>
                </a>
              </li>


              <li class="nav-item" >
                @if($header=='Prod')
                <a href="/products" class="nav-link active" style="color: white;">
                @else
                <a href="/products" class="nav-link" style="color: white;">
                @endif
                <i class="nav-icon fas fa-th"></i>
                  <p>
                    Products
                  </p>
                </a>
              </li>

              <li class="nav-item" >
                @if($header=='order')
                <a href="/orders" class="nav-link active" style="color: white;">
                @else
                <a href="/orders" class="nav-link" style="color: white;">
                @endif
                <i class="fas fa-list"></i>
                  <p>
                    Orders
                  </p>
                </a>
              </li>






      <li class="nav-item">
        @if($header=='Settings')
            <a href="#" class="nav-link active" style="color: white;">

              @else

  <a href="#" class="nav-link" style="color: white;">
              @endif
              <i class="nav-icon fa fa-cog"></i>
              <p>
                Settings

                <i class="fas fa-angle-left right"></i>

              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/change-password" class="nav-link" style="color: white;">
                  <i class="far fa-circle nav-icon"></i>
                  <p> Change Password</p>

                </a>

              </li>
              <li class="nav-item">
                <a href="{{ route('admin.logout')}}" class="nav-link" style="color: white;">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Logout</p>
                  <span class="badge badge-info right" style="background-color: green;"></span>
                </a>

              </li>

            </ul>
          </li>

          <br><br>




        </ul>
      </nav>
      <br><br> <br>    <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
