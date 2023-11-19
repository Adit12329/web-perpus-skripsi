@extends('layout.layout')
@section('contents')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Profile</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/beranda">Home</a></li>
                            <li class="breadcrumb-item active">Profile</li>
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
                        <div class="row">
                            <div class="col-lg-3">
                                <div class="card card-primary card-outline">
                                    <div class="card-body box-profile">
                                        <div class="image">
                                            <img src="#" class="img-circle elevation-2" alt="User Image">
                                        </div>

                                        <h3 class="profile-username text-center">{{ auth()->user()->name }}</h3>

                                        {{-- <p class="text-muted text-center">Software Engineer</p> --}}

                                        {{-- <ul class="list-group list-group-unbordered mb-3">
                                            <li class="list-group-item">
                                                <b>Followers</b> <a class="float-right">1,322</a>
                                            </li>
                                            <li class="list-group-item">
                                                <b>Following</b> <a class="float-right">543</a>
                                            </li>
                                            <li class="list-group-item">
                                                <b>Friends</b> <a class="float-right">13,287</a>
                                            </li>
                                        </ul> --}}
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-9">
                                <div class="card">
                                    <div class="card-body">
                                        <form action="{{ route('update_pengguna', auth()->user()->id) }}" method="post"
                                            enctype="multipart/form-data">
                                            {{ csrf_field() }}
                                            {{ isset(auth()->user()->id) ? method_field('PUT') : '' }}
                                            <div class="form-group">
                                                <input type="text" id="nama" name="nama" class="form-control"
                                                    placeholder="Nama"
                                                    value="{{ isset(auth()->user()->id) ? auth()->user()->name : '' }}">
                                            </div>
                                            <div class="form-group">
                                                <input type="email" id="email" name="email" class="form-control"
                                                    placeholder="Email"
                                                    value="{{ isset(auth()->user()->id) ? auth()->user()->email : '' }}">
                                            </div>
                                            <div class="form-group">
                                                <input type="text" id="level" name="level" class="form-control"
                                                    placeholder="Level"
                                                    value="{{ isset(auth()->user()->id) ? auth()->user()->level : '' }}">
                                            </div>
                                            <div class="form-group">
                                                <input type="password" id="level" name="password" class="form-control"
                                                    placeholder="Password"
                                                    value="{{ isset(auth()->user()->id) ? auth()->user()->password : '' }}">
                                            </div>
                                            <div class="form-group">
                                                <input type="file" id="foto" name="foto" class="form-control" 
                                                    placeholder="Nama File Foto"
                                                    value="{{ isset(auth()->user()->id) ? auth()->user()->foto : '' }}">
                                            </div>
                                            <div class="row">
                                                <div class="form-group">
                                                    <button type="submit" class="btn btn-success">Simpan</button>
                                                </div>
                                                <div class="form-group">
                                                    <a href="/pengguna"><button type="button"
                                                            class="btn btn-danger">Batal</button></a>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- /.content-wrapper -->
@endsection
