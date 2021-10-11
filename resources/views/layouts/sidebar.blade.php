<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
       
        <div class="info">
          <a href="#" class="d-block"><h5>Chokin Blog Assignment</h5></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu">
          
        @if(Auth::user()->role == 2)
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
               Users
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('users.registered') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Registered Users</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('users.new') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>New User</p>
                </a>
              </li>
            </ul>
          </li>
          @endif
          <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-sticky-note"></i>
              <p>
               Blogs
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('posts.all') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>All Blog Posts</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('posts.new') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>New Blog Post</p>
                </a>
              </li>
            </ul>
          </li>
          @if(Auth::user()->role == 2)
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-list-alt"></i>
              <p>
               Post Categories
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('categories.all') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>All Post Categories</p>
                </a>
              </li>
              
            </ul>
          </li>
          @endif
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>