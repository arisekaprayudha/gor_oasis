<!-- sidebar menu: : style can be found in sidebar.less -->
<ul class="sidebar-menu" data-widget="tree">
      {{-- <li class="{{ Request::is('search') || request()->is('search/*') ? 'active' : "" }}"><a href="{{ url('search') }}"><i class="fa fa-circle-o"></i>Searching</a></li> --}}
      <li class="{{ Request::is('dashboard') || request()->is('dashboard/*') ? 'active' : "" }}"><a href="{{ url('dashboard') }}"><i class="fa fa-circle-o"></i>Histori Request</a></li>
      <li class="{{ Request::is('arsip') || request()->is('arsip/*') ? 'active' : "" }}"><a href="{{ url('arsip') }}"><i class="fa fa-circle-o"></i>Arsip</a></li>
      @if(auth()->user()->role()->where('nameRole', '=', 'Admin')->exists())
      {{-- <li class="treeview {{ Request::is('unitkerja*') || Request::is('klasifikasi*') || Request::is('index*') || Request::is('user*') || Request::is('role*') ? 'active' : "" }}">
        <a href="#">
          <i class="fa"></i> <span>Setting</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu"> --}}
          <li class="{{ request()->is('unitkerja') || request()->is('unitkerja/*') ? 'active' : "" }}"><a href="/unitkerja"><i class="fa fa-circle-o"></i>Unit Kerja</a></li>
          <li class="{{ request()->is('klasifikasi') || request()->is('klasifikasi/*') ? 'active' : "" }}"><a href="/klasifikasi"><i class="fa fa-circle-o"></i>Klasifikasi</a></li>
          <li class="{{ request()->is('index') || request()->is('index/*') ? 'active' : "" }}"><a href="/index"><i class="fa fa-circle-o"></i>Index</a></li>
          <li class="{{ request()->is('user') || request()->is('user/*') ? 'active' : "" }}"><a href="/user"><i class="fa fa-circle-o"></i>User</a></li>
          <li class="{{ request()->is('role') || request()->is('role/*') ? 'active' : "" }}"><a href="/role"><i class="fa fa-circle-o"></i>Role</a></li>
          {{-- <li class="{{ request()->is('permission') || request()->is('permission/*') ? 'active' : "" }}"><a href="/permission"><i class="fa fa-circle-o"></i>Permission</a></li> --}}
        {{-- </ul>
      </li> --}}

      @endif
    

    </ul>