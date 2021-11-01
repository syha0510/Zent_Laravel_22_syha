
<div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="/backend/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block">
            {{-- {{  Illuminate\Support\Facades\Auth::user()->name }} --}}
            {{ auth()->user()->name }}
        </a>
      </div>
    </div>

    <!-- SidebarSearch Form -->
    <div class="form-inline">
      <div class="input-group" data-widget="sidebar-search">
        <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-sidebar">
            <i class="fas fa-search fa-fw"></i>
          </button>
        </div>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
          <li class="nav-item">
          <a href="{{route('backend.dashboard.index')}}" class="nav-link">
              <i class="nav-icon far fa-calendar-alt"></i>
              <p>
              Trang chủ
              </p>
          </a>
          </li>
        <li class="nav-header">Quản lý chung</li>
        <li class="nav-item @if (request()->routeIs('backend.posts.*'))
          menu-open
        @endif">
          <a href="#2" class="nav-link">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Quản lý bài viết
              <i class="fas fa-angle-left right"></i>

            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{route('backend.posts.create')}}" class="nav-link @if (request()->routeIs('backend.posts.create'))
                active
              @endif ">
                <i class="far fa-circle nav-icon"></i>
                <p>Tạo mới bài viết</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{route('backend.posts.list')}}" class="nav-link @if (request()->routeIs('backend.posts.list'))
                active
              @endif ">
                <i class="far fa-circle nav-icon"></i>
                <p>Danh sách bài viết</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-header">Hệ thống</li>
        {{-- user --}}
        <li class="nav-item">
          <a href="#2" class="nav-link">
            <i class="nav-icon fas fa-user"></i>
            <p>
              Quản lý người dùng
              <i class="fas fa-angle-left right"></i>

            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{route('backend.users.create')}}" class="nav-link @if (request()->routeIs('backend.users.create'))
                active
              @endif  ">
                <i class="far fa-circle nav-icon"></i>
                <p>Tạo mới người dùng</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{route('backend.users.list')}}" class="nav-link @if (request()->routeIs('backend.users.list'))
                active
              @endif ">
                <i class="far fa-circle nav-icon"></i>
                <p>Danh sách người dùng</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{route('backend.users.delete')}}" class="nav-link @if (request()->routeIs('backend.users.delete'))
                active
              @endif ">
                <i class="far fa-circle nav-icon"></i>
                <p>Danh sách người dùng bị xóa </p>
              </a>
            </li>
            
          </ul>
          
        </li>

        {{-- category --}}

        <li class="nav-item">
          <a href="#2" class="nav-link">
            <i class="nav-icon fas fa-bookmark"></i>
            <p>
              Quản lý danh mục
              <i class="fas fa-angle-left right"></i>

            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{route('backend.categories.create')}}" class="nav-link @if (request()->routeIs('backend.categories.create'))
                active
              @endif  ">
                <i class="far fa-circle nav-icon"></i>
                <p>Tạo mới danh mục</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{route('backend.categories.list')}}" class="nav-link @if (request()->routeIs('backend.categories.list'))
                active
              @endif ">
                <i class="far fa-circle nav-icon"></i>
                <p>Danh sách danh mục</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{route('backend.categories.delete')}}" class="nav-link @if (request()->routeIs('backend.categories.delete'))
                active
              @endif ">
                <i class="far fa-circle nav-icon"></i>
                <p>Danh sách danh mục bị xóa</p>
              </a>
            </li>
            
          </ul>
          
        </li>
        <li class="nav-item">
          <a href="#2" class="nav-link">
            <i class="nav-icon fas fa-wrench"></i>
            <p>
              Quản lý vai trò
              <i class="fas fa-angle-left right"></i>

            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{route('backend.roles.create')}}" class="nav-link @if (request()->routeIs('backend.roles.create'))
                active
              @endif  ">
                <i class="far fa-circle nav-icon"></i>
                <p>Tạo mới vai trò</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{route('backend.roles.list')}}" class="nav-link @if (request()->routeIs('backend.roles.list'))
                active
              @endif ">
                <i class="far fa-circle nav-icon"></i>
                <p>Danh sách vai trò </p>
              </a>
            </li>
            
          </ul>
          
        </li>
        <li class="nav-item">
          <a href="#2" class="nav-link">
            <i class="nav-icon fas fa-cog"></i>
            <p>
              Quản lý permission
              <i class="fas fa-angle-left right"></i>

            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{route('backend.users.create')}}" class="nav-link @if (request()->routeIs('backend.users.create'))
                active
              @endif  ">
                <i class="far fa-circle nav-icon"></i>
                <p>Tạo mới permission</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{route('backend.users.list')}}" class="nav-link @if (request()->routeIs('backend.users.list'))
                active
              @endif ">
                <i class="far fa-circle nav-icon"></i>
                <p>Danh sách permission</p>
              </a>
            </li>
            
          </ul>
          
        </li>
        <li class="nav-item">
          <a href="#2" class="nav-link">
            <i class="nav-icon fas fa-cog"></i>
            <p>
              Quản lý logs
              <i class="fas fa-angle-left right"></i>

            </p>
          </a>
          <ul class="nav nav-treeview">
            {{-- <li class="nav-item">
              <a href="" class="nav-link @if (request()->routeIs('backend.users.create'))
                active
              @endif  ">
                <i class="far fa-circle nav-icon"></i>
                <p>Tạo mới logs</p>
              </a>
            </li> --}}
            <li class="nav-item">
              <a href="http://myweb.dev.com/log-viewer" class="nav-link  ">
                <i class="far fa-circle nav-icon"></i>
                <p>Danh sách logs</p>
              </a>
            </li>
            
          </ul>
          
        </li>
      </ul>
      
    </nav>
    <!-- /.sidebar-menu -->
  </div>