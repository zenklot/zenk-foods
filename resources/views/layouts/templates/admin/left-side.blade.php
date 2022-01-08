  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('admin.index') }}" class="brand-link">
      <h1 class="text-white brand-image img-circle elevation-3" ><i class="fa fa-utensils" style="opacity: .8"></i></h1>
      <span class="brand-text font-weight-light fs-3">ZenkFood</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('/img/profile/default.png') }}" class="img-circle elevation-2" alt="User Image" />
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ auth()->user()->nama_user }}</a>
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
                Management
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a  href="/admin/users" class="nav-link {{ Request::is('admin/users*') ? 'active' : ''}}">
                  <i class="fas fa-users nav-icon green"></i>
                  <p>Users</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/admin/roles" class="nav-link {{ Request::is('admin/roles*') ? 'active' : ''}}">
                  <i class="fas fa-layer-group nav-icon blue"></i>
                  <p>Roles</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/admin/permissions" class="nav-link {{ Request::is('admin/permission*') ? 'active' : ''}}">
                  <i class="fas fa-key nav-icon red"></i>
                  <p>Permissions</p>
                </a>
              </li>
            </ul>
          </li>
          
          <li class="nav-item">
            <form action="{{ route('logout.perform') }}" method="post">
              @csrf
              <div class="nav-link">
                <i class="nav-icon fas fa-sign-out-alt"></i>
                <button type="submit" class="fw-bold" style="{background: none;
                  color: inherit;
                  border: none;
                  font: inherit;
                  outline: inherit;
                  background-color: #343A40;
                  padding-right: 80px;                  
                  cursor: pointer;}">
                  Log Out
                </button>
              </div>
            </form>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>