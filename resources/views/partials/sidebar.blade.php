<style>
  .sidebar-nav ul .sidebar-item.selected>.sidebar-link, .sidebar-nav ul .sidebar-item.selected>.sidebar-link.active, .sidebar-nav ul .sidebar-item>.sidebar-link.active {
  background-color: #fff;
  color: black;
}
.sidebar-nav {
  ul {
    .sidebar-item {
      .sidebar-link {
        &:hover {
          background-color: rgba($primary, 0.1);
          color: black;

          &.has-arrow::after {
            border-color: $primary;
          }
        }
      }
      }
      }
</style>
<aside class="left-sidebar" style="background-color: #79AC78" >
    <!-- Sidebar scroll-->
    <div>
      <div class="brand-logo d-flex align-items-center justify-content-between">
        <a href="#" class="text-nowrap logo-img">
          <img src="{{ asset('assets/images/logos/logo.png') }}" width="180" alt="" />
        </a>
      </div>
      <!-- Sidebar navigation-->
      <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
        <ul id="sidebarnav">
          <li class="nav-small-cap">
            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
            <span class="hide-menu">Beranda</span>
          </li>
          <li class="sidebar-item">
            <a class="sidebar-link {{ Request::is('dashboard') ? 'active' : '' }}" href="/dashboard" aria-expanded="false">
              <span>
                <i class="ti ti-layout-dashboard"></i>
              </span>
              <span class="hide-menu">Dashboard</span>
            </a>
          </li>
          @can('admin')
              
          <li class="nav-small-cap">
            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
            <span class="hide-menu">Data</span>
          </li>
          <li class="sidebar-item">
            <a class="sidebar-link {{ Request::is('users*') ? 'active' : '' }}" href="/users" aria-expanded="false">
              <span>
                <i class="ti ti-users"></i>
              </span>
              <span class="hide-menu">Kelola Pengguna</span>
            </a>
          </li>
          @endcan
          <li class="sidebar-item">
            <a class="sidebar-link {{ Request::is('asets*') ? 'active' : '' }}" href="/asets" aria-expanded="false">
              <span>
                <i class="ti ti-tools"></i>
              </span>
              <span class="hide-menu">Kelola Aset</span>
            </a>
          </li>
          <li class="nav-small-cap">
            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
            <span class="hide-menu">Transaksi</span>
          </li>
          <li class="sidebar-item">
            <a class="sidebar-link{{ Request::is('/peminjaman') ? 'active' : '' }}" href="/peminjaman" aria-expanded="false">
              <span>
                <i class="ti ti-scan"></i>
              </span>
              <span class="hide-menu">Peminjaman</span>
            </a>
          </li>
          <li class="sidebar-item">
            <a class="sidebar-link{{ Request::is('/pengembalian') ? 'active' : '' }}" href="/pengembalian" aria-expanded="false">
              <span>
                <i class="ti ti-barcode"></i>
              </span>
              <span class="hide-menu">Pengembalian</span>
            </a>
          </li>
          <li class="sidebar-item">
            <a class="sidebar-link{{ Request::is('/riwayat') ? 'active' : '' }}" href="/riwayat" aria-expanded="false">
              <span>
                <i class="ti ti-history"></i>
              </span>
              <span class="hide-menu">Riwayat</span>
            </a>
          </li>

        </ul>

      </nav>
      <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
  </aside>