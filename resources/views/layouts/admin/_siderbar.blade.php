<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- search form -->
    <form action="#" method="get" class="sidebar-form">
      <div class="input-group">
        <input type="text" name="q" class="form-control" placeholder="Search...">
        <span class="input-group-btn">
              <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
              </button>
            </span>
      </div>
    </form>
    <!-- /.search form -->
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu" data-widget="tree">
      <li class="header">导航栏</li>
      <!--项目-->
      <li class="active treeview">
          <a href="#">
            <i class="fa fa-th-list"></i> <span>存量经营</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="active treeview">
              <a href="#"><i class="fa fa-circle-o"></i> 数据更新
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="{{route('table')}}"><i class="fa fa-circle-o"></i> 数据</a></li>
                <li><a href="{{route('pic')}}"><i class="fa fa-circle-o"></i>图</a></li>
                <li class="treeview">
                  <a href="#"><i class="fa fa-circle-o"></i> Wiki
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                  </a>
                  <ul class="treeview-menu">
                    <li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>
                    <li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>
                  </ul>
                </li>
              </ul>
            </li>
          </ul>
        </li>
      @can('manage_users')
      <!--用户-->
      <li class="header">系统管理</li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-gear"></i><span>用户与权限</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="{{route('users.index')}}"><i class="fa fa-user"></i>用户</a></li>
          <li><a href="{{route('roles.index')}}"><i class="fa fa-cubes"></i>角色</a></li>
          <li><a href="{{route('permissions.index')}}"><i class="fa fa-key"></i>权限</a></li>
        </ul>
      </li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-gears"></i> <span>Dashboard</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li class="active"><a href="{{route('home')}}"><i class="fa fa-circle-o"></i> Dashboard v1</a></li>
          <li><a href="#"><i class="fa fa-circle-o"></i> Dashboard v2</a></li>
        </ul>
      </li>
      @endcan

      <li class="header">标签</li>
      <li><a href="http://layer.layui.com/"><i class="fa fa-circle-o text-red"></i> <span>layer</span></a></li>
      <li><a href="{{route('test.icons')}}"><i class="fa fa-circle-o text-yellow"></i> <span>icons</span></a></li>
      <li><a href="#"><i class="fa fa-circle-o text-aqua"></i> <span>Information</span></a></li>
    </ul>
  </section>
  <!-- /.sidebar -->
</aside>
