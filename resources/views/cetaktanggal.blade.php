<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- <title>Tambah Data</title> --}}

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('AdminLTE/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('AdminLTE/dist/css/adminlte.min.css') }}">
</head>

<body class="hold-transition sidebar-collapse layout-top-nav">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
            <div class="container">
                <a href="{{ '/beranda' }}" class="navbar-brand">
                    <img src="{{ asset('Gambar/Jember.png') }}" alt=""
                        class="brand-image img-circle elevation-3" style="opacity: .8">
                    <span class="brand-text font-weight-light">IPASN</span>
                </a>

                <button class="navbar-toggler order-1" type="button" data-toggle="collapse"
                    data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse order-3" id="navbarCollapse">
                    <!-- Left navbar links -->
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i
                                    class="fas fa-bars"></i></a>
                        </li>
                        <li class="nav-item">
                            <a href="/beranda" class="nav-link">Beranda</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">Profile</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false" class="nav-link dropdown-toggle">Diklat</a>
                            <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
                                <li><a href="#" class="dropdown-item">Diklat Fungsional</a></li>
                                <li><a href="#" class="dropdown-item">Diklat Kepemimpinan</a></li>
                                <li><a href="#" class="dropdown-item">Diklat Teknis</a></li>
                                <li><a href="#" class="dropdown-item">Diklat Teknis 1 Tahun Terakhir</a></li>
                                <li><a href="#" class="dropdown-item">Diklat Teknis 2 Tahun Terakhir</a></li>
                                <li><a href="#" class="dropdown-item">Diklat Magang</a></li>
                                <li><a href="#" class="dropdown-item">Diklat Workshop</a></li>

                                <!-- End Level two -->
                            </ul>
                        </li>
                    </ul>

                    <!-- SEARCH FORM -->
                    <form class="form-inline ml-0 ml-md-3">
                        <div class="input-group input-group-sm">
                            <input class="form-control form-control-navbar" type="search" placeholder="Search"
                                aria-label="Search">
                            <div class="input-group-append">
                                <button class="btn btn-navbar" type="submit">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>

                <!-- Right navbar links -->
                <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
                    <!-- Messages Dropdown Menu -->
                    {{-- <li class="nav-item dropdown">
                        <a class="nav-link" data-toggle="dropdown" href="#">
                            <i class="fas fa-comments"></i>
                            <span class="badge badge-danger navbar-badge">3</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                            <a href="#" class="dropdown-item"> --}}
                    <!-- Message Start -->
                    {{-- <div class="media">
                                    <img src="../../dist/img/user1-128x128.jpg" alt="User Avatar"
                                        class="img-size-50 mr-3 img-circle">
                                    <div class="media-body">
                                        <h3 class="dropdown-item-title">
                                            Brad Diesel
                                            <span class="float-right text-sm text-danger"><i
                                                    class="fas fa-star"></i></span>
                                        </h3>
                                        <p class="text-sm">Call me whenever you can...</p>
                                        <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago
                                        </p>
                                    </div>
                                </div> --}}
                    <!-- Message End -->
                    {{-- </a>
                            <div class="dropdown-divider"></div>
                            <a href="#" class="dropdown-item">
                                <!-- Message Start -->
                                <div class="media">
                                    <img src="../../dist/img/user8-128x128.jpg" alt="User Avatar"
                                        class="img-size-50 img-circle mr-3">
                                    <div class="media-body">
                                        <h3 class="dropdown-item-title">
                                            John Pierce
                                            <span class="float-right text-sm text-muted"><i
                                                    class="fas fa-star"></i></span>
                                        </h3>
                                        <p class="text-sm">I got your message bro</p>
                                        <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago
                                        </p>
                                    </div>
                                </div> --}}
                    <!-- Message End -->
                    {{-- </a>
                            <div class="dropdown-divider"></div>
                            <a href="#" class="dropdown-item">
                                <!-- Message Start -->
                                <div class="media">
                                    <img src="../../dist/img/user3-128x128.jpg" alt="User Avatar"
                                        class="img-size-50 img-circle mr-3">
                                    <div class="media-body">
                                        <h3 class="dropdown-item-title">
                                            Nora Silvester
                                            <span class="float-right text-sm text-warning"><i
                                                    class="fas fa-star"></i></span>
                                        </h3>
                                        <p class="text-sm">The subject goes here</p>
                                        <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago
                                        </p>
                                    </div>
                                </div> --}}
                    <!-- Message End -->
                    {{-- </a>
                            <div class="dropdown-divider"></div>
                            <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
                        </div>
                    </li> --}}
                    <!-- Notifications Dropdown Menu -->
                    {{-- <li class="nav-item dropdown">
                        <a class="nav-link" data-toggle="dropdown" href="#">
                            <i class="far fa-bell"></i>
                            <span class="badge badge-warning navbar-badge">15</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                            <span class="dropdown-header">15 Notifications</span>
                            <div class="dropdown-divider"></div>
                            <a href="#" class="dropdown-item">
                                <i class="fas fa-envelope mr-2"></i> 4 new messages
                                <span class="float-right text-muted text-sm">3 mins</span>
                            </a>
                            <div class="dropdown-divider"></div>
                            <a href="#" class="dropdown-item">
                                <i class="fas fa-users mr-2"></i> 8 friend requests
                                <span class="float-right text-muted text-sm">12 hours</span>
                            </a>
                            <div class="dropdown-divider"></div>
                            <a href="#" class="dropdown-item">
                                <i class="fas fa-file mr-2"></i> 3 new reports
                                <span class="float-right text-muted text-sm">2 days</span>
                            </a>
                            <div class="dropdown-divider"></div>
                            <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
                        </div>
                    </li> --}}
                    {{-- <li class="nav-item">
                        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#"
                            role="button">
                            <i class="fas fa-th-large"></i> --}}
                    {{-- </a>
                    </li> --}}
                </ul>
            </div>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="../../index3.html" class="brand-link">
                <img src="{{ asset('Gambar/Jember.png') }}" alt="AdminLTE Logo"
                    class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">IPASN</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="{{ asset('Gambar/Aditya.jpg') }}" class="img-circle elevation-2" alt="User Image">
                    </div>
                    {{-- <div class="info">
                        <a href="#" class="d-block">{{auth()->user()->name}}</a>
                    </div> --}}
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
                            <form id="logout-form" action="{{ route('logout') }}" method="get"
                                style="display: none;">
                                @csrf
                            </form>
                        </li>
                        <li class="nav-item">
                            <a href="/tambahdata" class="nav-link">
                                <i class="nav-icon fas fa-book"></i> Sertifikat
                            </a>
                        </li>
                        {{-- <ul class="nav nav-treeview"> --}}
                        {{-- @if (auth()->user()->level == 'admin')
                            <li class="nav-item">
                                <a href="{{ route('halaman-satu')}}" class="nav-link">
                                    <i class="for fa-circle nav-icon"></i>
                                    <p> Halaman Satu</p>
                                </a>
                            </li>
                            @endif

                            <li class="nav-item">
                                <a href="{{ route('halaman-dua')}}" class="nav-link">
                                    <i class="for fa-circle nav-icon"></i>
                                    <p> Halaman Dua</p>
                                </a>
                            </li> --}}
                        {{-- </ul> --}}
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            {{-- <h1 class="m-0"> Tambah Data </h1> --}}
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="/beranda">Home</a></li>
                                <li class="breadcrumb-item active">Tambah Data</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <div class="content">
                <div class="card card-info card-outline">
                    <div class="card-header">
                        <h1>Cetak Data Pertanggal</h1>
                    </div>
                </div>
                <div class="car-body">
                    <div class="input-group mb-3">
                        <label for="label">Tanggal Awal</label>
                        <input type="date" name="tanggalawal" id="tanggalawal" class="form-control">
                    </div>
                    <div class="input-group mb-3">
                        <label for="label">Tanggal Akhir</label>
                        <input type="date" name="tanggalakhir" id="tanggalakhir" class="form-control">
                    </div>
                    <div class="input-group mb-3">
                        <a href="" onclick="this.href='cetakdatapertanggal/'+document.getElementeById('tanggalawal').value +
                        '/' + document.getElementById('tanggalakhir').value" target="_blank" class="btn btn-primary col-md 12">Cetak Data Pertanggal <i class="fas fa-print"></i></a>
                    </div>
                </div>
            </div>
        </div>


        <!-- Control Sidebar -->
        {{-- <aside class="control-sidebar control-sidebar-dark">
                                <!-- Control sidebar content goes here -->
                            </aside> --}}
        <!-- /.control-sidebar -->


        <!-- ./wrapper -->
        <!-- Main Footer -->
        <footer class="main-footer">
            <!-- To the right -->
            <div class="float-right d-none d-sm-inline">
                Anything you want
            </div>
            <!-- Default to the left -->
            <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights
            reserved.
        </footer>
    </div>
    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <script src="{{ asset('AdminLTE/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('AdminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('AdminLTE/dist/js/adminlte.min.js') }}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{ asset('AdminLTE/dist/js/demo.js') }}"></script>

</body>

</html>
