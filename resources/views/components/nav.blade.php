<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
  </div>

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      <li class="nav-item">
        <a class="nav-link" data-widget="navbar-search" href="#" role="button">
          <i class="fas fa-search"></i>
        </a>
        <div class="navbar-search-block">
          <form class="form-inline">
            <div class="input-group input-group-sm">
              <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                  <i class="fas fa-search"></i>
                </button>
                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
      </li>

      <!-- Messages Dropdown Menu -->

      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-user"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <div class="dropdown-divider"></div>
          <a href="/profile" class="dropdown-item">
            <i class="fas fa-store mr-2"></i> Profile
            
          </a>
          <div class="dropdown-divider"></div>
          <a href="{{route ('actionLogout')}}" class="dropdown-item">
            <i class="fas fa-lock mr-2"></i> Logout
          </a>
      
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Puspiptek</span>
    </a>


      <!-- Sidebar -->
      <div class="sidebar">

<!-- Sidebar Menu -->
<nav class="mt-2">
  <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
    <!-- Add icons to the links using the .nav-icon class
         with font-awesome or any other icon font library -->
    <li class="nav-item menu-open">
      <a href="/dashboard" class="nav-link active">
        <i class="nav-icon fas fa-tachometer-alt"></i>
        <p>
          Dashboard
        </p>
      </a>
    </li>
    <li class="nav-header"> Data Master</li>
    <li class="nav-item">
      <a href="{{route ('admin.index')}}" class="nav-link">
        <i class="nav-icon fas fa-user"></i>
        <p>
          Data Admin
        </p>
      </a>
    </li>
    <li class="nav-item">
      <a href="{{route ('produk.index')}}" class="nav-link">
        <i class="nav-icon fas fa-database"></i>
        <p>
          Data Barang
        </p>
      </a>
    </li>
    <li class="nav-item">
      <a href="{{route ('kategori.index')}}" class="nav-link">
        <i class="nav-icon fas fa-archive"></i>
        <p>
          Kategori
        </p>
      </a>
    </li>
  
    <li class="nav-item">
      <a href="{{route ('profile.index')}}" class="nav-link">
        <i class="nav-icon fas fa-store"></i>
        <p>
          Profil
        </p>
      </a>
    </li>
    <li class="nav-item">
      <a href="{{route ('banner.index')}}" class="nav-link">
        <i class="nav-icon fas fa-photo-video"></i>
        <p>
          Banner
        </p>
      </a>
    </li>
  </ul>
</nav>
<!-- /.sidebar-menu -->
</div>
<!-- /.sidebar -->
</aside>