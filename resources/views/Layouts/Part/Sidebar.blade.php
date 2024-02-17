<style>
.blink {
 animation: blinkMe 2s linear infinite;
}
@keyframes blinkMe {
 0% {
  opacity: 0;
 }
 50% {
  opacity: 1;
 }
 100% {
  opacity: 0;
 }
}
</style>

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-secondary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ url('/dashboard') }}" class="brand-link blink">
        <img src="{{ asset('Assets/logo/logo_amik.png') }}" alt="Logo Amik" class="brand-image img-circle elevation-3" style="opacity: .8">

      <span class="brand-text font-weight-light">SISKEU AMIK</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('Admin_lte/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">

        </div>
        <div class="info">
          <a href="#" class="d-block">{{ auth()->user()->name }}</a>
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
               <li class="nav-item" >
                <a href="{{ url('/dashboard') }}" class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}">
                  <i class="nav-icon fas fa-tachometer-alt"></i>
                  <p>
                    Dashboard
                  </p>
                </a>
              </li>
              <li class="nav-header border-bottom border-light-subtle">KEUANGAN</li>

              <li class="nav-item">
                    <a href="#" class="nav-link {{ Request::is('dashboard/posts') ? 'active' : '' }}">
                      <i class="far fa-solid fa-money-check-dollar nav-icon"></i>
                      <p>Data Transaksi
                        <i class="right fas fa-angle-left"></i>
                      </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                          <a href="pages/charts/chartjs.html" class="nav-link {{ Request::is('dashboard/posts') ? 'active' : '' }}">
                            <i class="far fa-solid fa-arrow-down nav-icon"></i>
                            <p>Pemasukan</p>
                          </a>
                        </li>
                        <li class="nav-item">
                          <a href="pages/charts/flot.html" class="nav-link {{ Request::is('dashboard/posts') ? 'active' : '' }}">
                            <i class="far fa-solid fa-arrow-up nav-icon"></i>
                            <p>Pengeluaran</p>
                          </a>
                        </li>
                    </ul>
                  </li>

                  <li class="nav-item">
                    <a href="{{ route('kategori.index') }}" class="nav-link {{ Request::is('dashboard/kategori') ? 'active' : '' }}">
                      <i class="far fa-solid fa-list nav-icon"></i>
                      <p>Data Kategori</p>
                    </a>
                  </li>

                  <li class="nav-item">
                    <a href="#" class="nav-link {{ Request::is('dashboard/slideshow') ? 'active' : '' }}">
                      <i class="far fa-solid fa-money-bills nav-icon"></i>
                      <p>Hutang Piutang
                        <i class="right fas fa-angle-left"></i>
                      </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                          <a href="pages/charts/chartjs.html" class="nav-link {{ Request::is('dashboard/posts') ? 'active' : '' }}">
                            <i class="far fa-solid fa-hand-holding-dollar nav-icon"></i>
                            <p>Data Hutang</p>
                          </a>
                        </li>
                        <li class="nav-item">
                          <a href="pages/charts/flot.html" class="nav-link {{ Request::is('dashboard/posts') ? 'active' : '' }}">
                            <i class="far fa-solid fa-hand-holding-hand nav-icon"></i>
                            <p>Data Piutang</p>
                          </a>
                        </li>
                    </ul>
                  </li>

                  <li class="nav-item">
                    <a href="{{ route('rekeningbank.index') }}" class="nav-link {{ Request::is('dashboard/rekeningbank') ? 'active' : '' }}">
                       <i class="far fa-solid fa-regular fa-credit-card nav-icon"></i>
                      <p>Rekening Bank</p>
                    </a>
                  </li>

                  <li class="nav-item">
                    <a href="#" class="nav-link {{ Request::is('dashboard/agendaterdekat') ? 'active' : '' }}">
                       <i class="far fa-solid fa-regular fa-file-invoice nav-icon"></i>
                      <p>Laporan</p>
                    </a>
                  </li>

                </li>
                <li class="nav-header border-bottom border-light-subtle">KONFIGURASI</li>

                <li class="nav-item">
                  <a href="{{ route('datapengguna.index') }}" class="nav-link {{ Request::is('dashboard/datapengguna') ? 'active' : '' }}">
                     <i class="far fa-solid fa-solid fa-user-gear nav-icon"></i>
                    <p>Data Pengguna</p>
                  </a>
                </li>

                <li class="nav-item">
                  <a href="#" class="nav-link {{ Request::is('dashboard/agendaterdekat') ? 'active' : '' }}">
                     <i class="far fa-solid fa-regular fa-user-clock nav-icon"></i>
                    <p>Log Activity</p>
                  </a>
                </li>
            </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>




