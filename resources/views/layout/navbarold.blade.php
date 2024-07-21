<!-- sidebar menu: : style can be found in sidebar.less -->
<ul class="sidebar-menu" data-widget="tree">
    <li class="{{ Request::is('dashboard') || request()->is('dashboard/*') ? 'active' : "" }}"><a href="{{ url('dashboard') }}"><i class="fa fa-circle-o"></i><span >Dashboard</span></a></li>
    <li class="{{ Request::is('testing') || request()->is('testing/*') ? 'active' : "" }}"><a href="{{ url('testing') }}"><i class="fa fa-circle-o"></i><span >Data Testing</span></a></li>
  
        <li class="{{ request()->is('training') || request()->is('training/*') ? 'active' : "" }}"><a href="/training"><i class="fa fa-circle-o"></i><span >Data Training</span></a></li>
        <li class="{{ request()->is('klasifikasi') || request()->is('klasifikasi/*') ? 'active' : "" }}"><a href="/klasifikasi"><i class="fa fa-circle-o"></i><span >Hasil Prediksi</span></a></li>
      
        <li class="treeview {{ Request::is('user*') ? 'active' : "" }}">
          <a href="#">
            <i class="fa"></i> <span>Setting</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
        <li class="{{ request()->is('user') || request()->is('user/*') ? 'active' : "" }}"><a href="/user"><i class="fa fa-circle-o"></i><span style="font-weight: bold; color : white">User</span></a></li>
      </ul>
    </li>
  
  
  </ul>
  
 