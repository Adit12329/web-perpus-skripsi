<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tambah Data</title>

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
                </ul>
            </div>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="../../index3.html" class="brand-link">
                <img src="{{ asset('Gambar/SMP.png') }}" alt="AdminLTE Logo"
                    class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">SMPN 2 SUKOWONO</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="{{ asset('Gambar/Aditya.jpg') }}" class="img-circle elevation-2" alt="User Image">
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
                            <h1 class="m-0"> Tambah Data </h1>
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
                <div class="container">
                    <div class="card">
                        <div class="card-body">
                            <form action="/tambahdata" method="post">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <input type="text" id="nama" name="nomor_sertifikat"
                                        class="form-control" placeholder="Nomor Sertifikat">
                                </div>
                                <div class="form-group">
                                    <input type="text" id="nama" name="nama_diklat" class="form-control"
                                        placeholder="Nama Diklat">
                                </div>
                                <div class="form-group">
                                    <input type="text" id="pemilik" name="pemilik" class="form-control"
                                        placeholder="Pemilik">
                                </div>
                                <div class="form-group">
                                    <input type="text" id="nama" name="penyelenggara_diklat"
                                        class="form-control" placeholder="Penyelenggara Diklat">
                                </div>
                                <div class="form-group">
                                    <input type="date" id="nama" name="waktu_pelaksanaan"
                                        class="form-control" placeholder="Waktu Pelaksanaan">
                                </div>
                                <div class="form-group">
                                    <input type="date" id="nama" name="tanggal_sertifikat"
                                        class="form-control" placeholder="Tanggal Sertifikat">
                                </div>
                                <div class="form-group">
                                    <input type="text" id="nama" name="jumlah_jp" class="form-control"
                                        placeholder="Jumlah JP">
                                </div>
                                <div class="form-group">
                                    <input type="file" id="nama" name="upload_sertifikat"
                                        class="form-control" placeholder="Upload Sertifikat">
                                </div>
                                <div class="form-group">
                                    <a href="/tambahdata"><button type="submit" class="btn btn-success">Simpan</button></a>
                                </div>
                                <div class="form-group">
                                    <a href="/tambahdata"><button type="button" class="btn btn-danger">Batal</button></a>
                                </div>
                                {{-- <div class="button-group">
                                <a href="/tambahdata" class="btn btn-primary">Simpan</a>
                                    <div class="button-space"></div>
                                <a href="/tambahdata" class="btn btn-danger">Batal</a>
                                </div> --}}
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- Control Sidebar -->
        {{-- <aside class="control-sidebar control-sidebar-dark"> --}}
                                <!-- Control sidebar content goes here -->
        {{-- </aside> --}}
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