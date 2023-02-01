<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{asset('/')}}admin/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>{{Auth::User()->name}}</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
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
        <li class="header">MAIN NAVIGATION</li>
        <li class="">
          <a href="{{url('/admin/dashboard')}}">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>

        </li>



        <li class="treeview">
          <a href="#">
            <i class="fa fa-edit"></i> <span>Category</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{route('category.create')}}"><i class="fa fa-circle-o"></i>Add Category</a></li>
            <li><a href="{{route('category.list')}}"><i class="fa fa-circle-o"></i>Manage Category</a></li>
          </ul>
        </li>


        <li class="treeview">
            <a href="#">
              <i class="fa fa-pie-chart"></i>
              <span>Tag</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="{{route('tag.create')}}"><i class="fa fa-circle-o"></i> Add Tag</a></li>
              <li><a href="{{route('tag.list')}}"><i class="fa fa-circle-o"></i>Manage Tag</a></li>
            </ul>
          </li>


          <li class="treeview">
            <a href="#">
              <i class="fa fa-laptop"></i>
              <span>Post</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="{{route('post.create')}}"><i class="fa fa-circle-o"></i> Add Post</a></li>
              <li><a href="{{route('post.list')}}"><i class="fa fa-circle-o"></i>Manage Post</a></li>
            </ul>
          </li>

      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
