<header class="main-header">
  <!-- Logo -->
  <a href="{{ route('admin.index') }}" class="logo">
    <!-- mini logo for sidebar mini 50x50 pixels -->
    <span class="logo-mini"><b>M</b>L</span>
    <!-- logo for regular state and mobile devices -->
    <span class="logo-lg"><b>Machine</b>L</span>
  </a>
  <!-- Header Navbar: style can be found in header.less -->
  <nav class="navbar navbar-static-top">
    <!-- Sidebar toggle button-->
    <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
      <span class="sr-only">Toggle navigation</span>
    </a>

    <div class="navbar-custom-menu">
      <ul class="nav navbar-nav">
        <li class="dropdown">
        @guest
          <li class="dropdown-toggle" data-toggle="dropdown">
            <li><a href="{{ route('login') }}">Login</a></li>
            <li><a href="{{ route('register') }}">Register</a></li>
          </li>
        @else
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">{{ Auth::user()->name }} <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            @can('manage_users')
            <li><a class="fa fa-cog fa-lg" href="#"> 设置</a></li>
            @endcan
            <li><a class="fa fa-user fa-lg" href="{{route('profile')}}"> 个人中心</a></li>
            <li>
                <a class="fa fa-sign-out fa-lg" href="{{route('logout')}}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">退出</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
            </li>
          </ul>
        </li>
        @endguest
        <!-- Control Sidebar Toggle Button -->
        <li>
          <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
        </li>
      </ul>
    </div>
  </nav>
</header>
