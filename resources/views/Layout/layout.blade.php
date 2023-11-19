<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SMPN 2 SUKOWONO</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('AdminLTE/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('AdminLTE/dist/css/adminlte.min.css') }}">
   
    @stack('content-css')


</head>

<body class="hold-transition sidebar-collapse layout-top-nav">
    <div class="wrapper">
        {{-- <div class="background-image">
            <link rel="stylesheet" href="{{ asset('Gambar/Aditya.jpg') }}">
        </div> --}}
        @include('Layout.navbar')

        @include('Layout.sidebar')

        @yield('contents')


    </div>

    <!-- Main Footer -->
    {{-- <footer class="main-footer"> --}}
    <!-- To the right -->
    <!-- Default to the left -->
    {{-- <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights
        reserved. --}}
    {{-- </footer> --}}

    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <script src="{{ asset('AdminLTE/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('AdminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('AdminLTE/dist/js/adminlte.min.js') }}"></script>
    <!-- AdminLTE for demo purposes -->
    {{-- <script src="{{ asset('AdminLTE/dist/js/demo.js') }}"></script> --}}
    @stack('content-js')

</body>
