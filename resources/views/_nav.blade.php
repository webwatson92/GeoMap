  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light fidex-top">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="{{route('dashboard')}}" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{route('dashboard')}}" class="nav-link">Acceuil</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <form action="{{ route('logout') }}" method="POST" hidden>
                                     @csrf                                
                                </form>
        <a class="nav-link active" style="color:#fff" href="{{ route('logout') }}" data-toggle="modal" data-target="#logoutModal" onclick="event.preventDefault(); this.previousElementSibling.submit();">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    @lang('Déconnexion')
                                </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

   <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{route('dashboard')}}" class="brand-link">
      <img src="{{URL::to('img/logo_lofty.png')}}" alt="logo Lofty solution" class="brand-image elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">{{config('app.name')}}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{URL::to('img/photo/avatar.png')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{Auth::user()->name}}</a>
        </div>
      </div>
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Tableau de bord
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
          </li>
          <li class="nav-item">
                <a href="{{route('index.magso')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>MAG SOCIETARIAT</p>
                </a>
          </li>
          <li class="nav-item">
                <a href="pages/forms/general.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>MAG STOCK</p>
                </a>
              </li>
          <li class="nav-item">
                <a href="pages/forms/general.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>MAG VENTE</p>
                </a>
              </li>
           <li class="nav-item">
                <a href="pages/forms/general.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>MAG IMMO</p>
                </a>
              </li>
          
              <li class="nav-item">
                <a href="pages/forms/general.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>MAG COMPTA</p>
                </a>
              </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

