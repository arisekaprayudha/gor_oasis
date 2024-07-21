<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

  <li class="nav-item {{ request()->is("bobot") || request()->is("testing")? "menu-open" : "" }} ">
  <a href="{{ url('dashboard') }}" class="nav-link nav-dropdown-toggle {{ request()->is("bobot") || request()->is("testing")? "active" : "" }}">
  <i class="nav-icon fas fa-tachometer-alt"></i>
  <p>
  Dashboard
  <i class="right fas fa-angle-left"></i>
  </p>
  </a>
  <ul class="nav nav-treeview ">
  <li class="nav-item ">
  <a href="#" class="nav-link">
  <i class="far fa-circle nav-icon"></i>
  <p>Jadwal</p>
  </a>
  </li>
  <li class="nav-item ">
  <a href="/testing" class="nav-link {{ request()->is('testing') || request()->is('testing/*') ? 'active' : "" }}">
  <i class="far fa-circle nav-icon"></i>
  <p>Nilai</p>
  </a>
  </li>
  </ul>
  </li>
  <li class="nav-item">
  <a href="#" class="nav-link">
  <i class="nav-icon fas fa-chart-pie"></i>
  <p>
  Setting
  <i class="right fas fa-angle-left"></i>
  </p>
  </a>
  <ul class="nav nav-treeview">
  <li class="nav-item">
  <a href="/jadwal" class="nav-link {{ request()->is('jadwal') || request()->is('jadwal/*') ? 'active' : "" }}">
  <i class="far fa-circle nav-icon"></i>
  <p>Jadwal</p>
  </a>
  </li>
  <li class="nav-item">
  <a href="/nilai" class="nav-link {{ request()->is('nilai') || request()->is('nilai/*') ? 'active' : "" }}">
  <i class="far fa-circle nav-icon"></i>
  <p>Nilai</p>
  </a>
  </li>
</li>
<li class="nav-item">
<a href="/bobot" class="nav-link {{ request()->is('bobot') || request()->is('bobot/*') ? 'active' : "" }}" >
<i class="far fa-circle nav-icon"></i>
<p>Bobot</p>
</a>
</li>
  {{-- <li class="nav-item">
  <a href="pages/charts/chartjs.html" class="nav-link">
  <i class="far fa-circle nav-icon"></i>
  <p>Profile</p>
  </a>
  </li> --}}
  <li class="nav-item">
    <a href="/group" class="nav-link {{ request()->is('group') || request()->is('group/*') ? 'active' : "" }}">
    <i class="far fa-circle nav-icon"></i>
    <p>Group</p>
    </a>
  </li>
  <li class="nav-item">
  <a href="/user" class="nav-link {{ request()->is('user') || request()->is('user/*') ? 'active' : "" }}">
  <i class="far fa-circle nav-icon"></i>
  <p>User</p>
  </a>
  </li>
  <li class="nav-item">
  <a href="pages/charts/uplot.html" class="nav-link">
  <i class="far fa-circle nav-icon"></i>
  <p>Role</p>
  </a>
  </li>
  </ul>
  </li>
  <li class="nav-item">
  <a href="logout" class="nav-link">
   <p>
   <i class="fas fa-fw fa-sign-out-alt nav-icon">
  
  </i>
  </p><p>Keluar</p>
  <p></p>
  </a>
  </li>
  </ul>
  