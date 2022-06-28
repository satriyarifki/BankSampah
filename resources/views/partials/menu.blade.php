<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3 " id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0" href="#" target="_blank">
        <span class="ms-1 font-weight-bold"><h4>Bank Sampah </h4></span>
      </a>
    </div>
    <hr class="horizontal dark mt-0">
    <div class="collapse navbar-collapse  w-auto  max-height-vh-100 h-100" id="sidenav-collapse-main">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link {{ request()->is("admin") ? "active" : "" }}" href="{{ route("home") }}">
            <div class="icon icon-shape icon-sm shadow border-radius-md bg-primary text-center me-2 d-flex align-items-center justify-content-center">
              <i class="fas fa-fw fa-tachometer-alt"></i>
            </div>
            <span class="nav-link-text ms-1">{{ trans('global.dashboard') }}</span>
          </a>
        </li>
        @if(file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php')))
            @can('profile_password_edit')
                <li class="nav-item">
                <a class="nav-link {{ request()->is('profile/password') || request()->is('profile/password/*') ? 'active' : '' }}" href="{{ route('profile.password.edit') }}">
                    <div class="icon icon-shape icon-sm shadow border-radius-md bg-primary text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fa-fw fas fa-key c-sidebar-nav-icon"></i>
                    </div>
                    <span class="nav-link-text ms-1">{{ trans('global.change_password') }}</span>
                </a>
                </li>
            @endcan
        @endif
        
        <li class="nav-item">
          <a class="nav-link  " href="#" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
            <div class="icon icon-shape icon-sm shadow border-radius-md bg-primary text-center me-2 d-flex align-items-center justify-content-center">
                <i class="c-sidebar-nav-icon fas fa-fw fa-sign-out-alt"></i>
            </div>
            <span class="nav-link-text ms-1">{{ trans('global.logout') }}</span>
          </a>
        </li>

        @can('user_management_access')
          <li class="nav-item mt-3">
            <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">{{ trans('cruds.userManagement.title') }}</h6>
          </li>
          @can('permission_access')
            <li class="nav-item">
              <a href="{{ route("admin.permissions.index") }}" class="nav-link {{ request()->is("admin/permissions") || request()->is("admin/permissions/*") ? "active" : "" }}">
                <div class="icon icon-shape icon-sm shadow border-radius-md bg-primary text-center me-2 d-flex align-items-center justify-content-center">
                  <i class="fa-fw fas fa-unlock-alt c-sidebar-nav-icon"></i>
                </div>
                <span class="nav-link-text ms-1">{{ trans('cruds.permission.title') }}</span>
              </a>
            </li>
          @endcan
          @can('role_access')
            <li class="nav-item">
              <a href="{{ route("admin.roles.index") }}" class="nav-link {{ request()->is("admin/roles") || request()->is("admin/roles/*") ? "active" : "" }}">
                <div class="icon icon-shape icon-sm shadow border-radius-md bg-primary text-center me-2 d-flex align-items-center justify-content-center">
                  <i class="fa-fw fas fa-briefcase c-sidebar-nav-icon"></i>
                </div>
                <span class="nav-link-text ms-1">{{ trans('cruds.role.title') }}</span>
              </a>
            </li>
          @endcan
          @can('user_access')
            <li class="nav-item">
              <a href="{{ route("admin.users.index") }}" class="nav-link {{ request()->is("admin/users") || request()->is("admin/users/*") ? "active" : "" }}">
                <div class="icon icon-shape icon-sm shadow border-radius-md bg-primary text-center me-2 d-flex align-items-center justify-content-center">
                  <i class="fa-fw fas fa-user c-sidebar-nav-icon"></i>
                </div>
                <span class="nav-link-text ms-1">{{ trans('cruds.user.title') }}</span>
              </a>
            </li>
          @endcan
          @can('transaksi_access')
            <li class="nav-item">
              <a href="{{ route("admin.transaksis.index") }}" class="nav-link {{ request()->is("admin/transaksis") || request()->is("admin/transaksis/*") ? "active" : "" }}">
                <div class="icon icon-shape icon-sm shadow border-radius-md bg-primary text-center me-2 d-flex align-items-center justify-content-center">
                  <i class="fa-fw fas fa-shopping-basket c-sidebar-nav-icon"></i>
                </div>
                <span class="nav-link-text ms-1">Transaksi</span>
              </a>
            </li>
          @endcan
          @can('penyetor_access')
            <li class="nav-item">
              <a href="{{ route("admin.penyetors.index") }}" class="nav-link {{ request()->is("admin/penyetors") || request()->is("admin/penyetors/*") ? "active" : "" }}">
                <div class="icon icon-shape icon-sm shadow border-radius-md bg-primary text-center me-2 d-flex align-items-center justify-content-center">
                  <i class="fa-fw fas fa-user-tag c-sidebar-nav-icon"></i>
                </div>
                <span class="nav-link-text ms-1">Penyetor</span>
              </a>
            </li>
          @endcan
          @can('pengepul_access')
            <li class="nav-item">
              <a href="{{ route("admin.pengepuls.index") }}" class="nav-link {{ request()->is("admin/pengepuls") || request()->is("admin/pengepuls/*") ? "active" : "" }}">
                <div class="icon icon-shape icon-sm shadow border-radius-md bg-primary text-center me-2 d-flex align-items-center justify-content-center">
                  <i class="fa-fw fas fa-people-carry c-sidebar-nav-icon"></i>
                </div>
                <span class="nav-link-text ms-1">Pengepul</span>
              </a>
            </li>
          @endcan

        @endcan
        @can('user')
          <li class="nav-item mt-3">
            <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">User Access</h6>
          </li>
          @can('penyetor')
            <li class="nav-item">
              <a href="{{ route("penyetor.transaksis.index") }}" class="nav-link {{ request()->is("penyetor/transaksis") || request()->is("penyetor/transaksis/*") ? "active" : "" }}">
                <div class="icon icon-shape icon-sm shadow border-radius-md bg-primary text-center me-2 d-flex align-items-center justify-content-center">
                  <i class="fa-fw fas fa-shopping-basket c-sidebar-nav-icon"></i>
                </div>
                <span class="nav-link-text ms-1">Transaksi</span>
              </a>
            </li>
          @endcan
          @can('penyetor')
            <li class="nav-item">
              <a href="{{ route("penyetor.progress.index") }}" class="nav-link {{ request()->is("penyetor/progress") || request()->is("penyetor/progress/*") ? "active" : "" }}">
                <div class="icon icon-shape icon-sm shadow border-radius-md bg-primary text-center me-2 d-flex align-items-center justify-content-center">
                  <i class="fa-fw fas fa-user c-sidebar-nav-icon"></i>
                </div>
                <span class="nav-link-text ms-1">Progress</span>
              </a>
            </li>
          @endcan
          @can('pengepul')
            <li class="nav-item">
              <a href="{{ route("pengepul.transaksis.index") }}" class="nav-link {{ request()->is("pengepul/transaksis") || request()->is("pengepul/transaksis/*") ? "active" : "" }}">
                <div class="icon icon-shape icon-sm shadow border-radius-md bg-primary text-center me-2 d-flex align-items-center justify-content-center">
                  <i class="fa-fw fas fa-shopping-basket c-sidebar-nav-icon"></i>
                </div>
                <span class="nav-link-text ms-1">Transaksi</span>
              </a>
            </li>
          @endcan
        @endcan
      </ul>
    </div>
  </aside>