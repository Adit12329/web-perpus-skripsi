<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="../../index3.html" class="brand-link">
        <img src="{{ asset('Gambar/SMP.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-light">PERPUSTAKAAN</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('Gambar/Aditya.jpg') }}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{ auth()->user()->name }}</a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                    aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
        with font-awesome or any other icon font library -->
                <!-- Logout -->
                <li class="nav-item">
                    <a href="{{ route('logout') }}" class="nav-link">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        logout
                    </a>
                    {{-- <i class="right fas fa-angle-left"></i> --}}
                    <form id="logout-form" action="{{ route('logout') }}" method="get" style="display: none;">
                        @csrf
                    </form>
                </li>
                {{-- @if (auth()->user()->level == 'admin') --}}
                    <li class="nav-item">
                        <a href="/bukuinduk" class="nav-link">
                            <i class="nav-icon fas fa-book"></i> Buku Induk
                        </a>
                    </li>
                    @if (auth()->user()->level == 'admin')
                    <li class="nav-item">
                        <a href="/pengguna" class="nav-link">
                            <i class="nav-icon fas fa-user"></i> Pengguna
                        </a>
                    </li>
                    @endif
                    {{-- <li class="nav-item">
                        <a href="/datagambar" class="nav-link">
                            <i class="nav-icon fas fa-image"></i> Upload Gambar
                        </a>
                    </li> --}}
                {{-- @endif --}}
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
