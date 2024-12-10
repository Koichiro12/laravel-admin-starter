 <!-- Sidebar -->
 <div class="sidebar" data-background-color="dark">
    <div class="sidebar-logo">
      <!-- Logo Header -->
      <div class="logo-header" data-background-color="dark">
        <a href="{{route('dashboard')}}" class="logo">
          <img
            src="{{asset('/')}}assets/img/kaiadmin/logo_light.svg"
            alt="navbar brand"
            class="navbar-brand"
            height="20"
          />
        </a>
        <div class="nav-toggle">
          <button class="btn btn-toggle toggle-sidebar">
            <i class="gg-menu-right"></i>
          </button>
          <button class="btn btn-toggle sidenav-toggler">
            <i class="gg-menu-left"></i>
          </button>
        </div>
        <button class="topbar-toggler more">
          <i class="gg-more-vertical-alt"></i>
        </button>
      </div>
      <!-- End Logo Header -->
    </div>
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
      <div class="sidebar-content">
        <ul class="nav nav-secondary">
            <li class="nav-item {{ url()->current() == route('dashboard') ? 'active' : '' }}">
                <a href="{{route('dashboard')}}">
                  <i class="fas fa-compass"></i>
                  <p>Dashboard</p>
                </a>
              </li>
          
          
          <li class="nav-section">
            <span class="sidebar-mini-icon">
              <i class="fa fa-ellipsis-h"></i>
            </span>
            <h4 class="text-section">Lainnya</h4>
          </li>
          
          <li class="nav-item {{ url()->current() == route('pengguna.index') ? 'active' : '' }}">
            <a href="{{route('pengguna.index')}}">
              <i class="fas fa-user"></i>
              <p>Pengguna</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('logout')}}" class="a-confirm">
              <i class="fas fa-power-off"></i>
              <p>Log Out</p>
            </a>
          </li>
        </ul>
      </div>
    </div>
  </div>
  <!-- End Sidebar -->