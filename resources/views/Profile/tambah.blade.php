@extends('layout.layout')
@section('contents')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0"> {{ isset($admin_lecture) ? 'Edit' : 'Tambah' }} Anggota Perpustakaan </h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/beranda">Home</a></li>
                            <li class="breadcrumb-item active">{{ isset($admin_lecture) ? 'Edit' : 'Tambah' }} Anggota
                                Perpustakaan</li>
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
                            {{-- <div class="card card-primary card-outline"> --}}
                            {{-- <div class="col-lg-3"> --}}
                            {{-- <div class="card-body box-profile"> --}}
                            {{-- <div class="text-center">
                                            <img class="profile-user-img img-fluid img-circle"
                                                src="{{ auth()->user()->foto }}" alt="User profile picture">
                                        </div> --}}

                            {{-- <h3 class="profile-username text-center">{{ auth()->user()->name }}</h3> --}}

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
                            {{-- </div> --}}
                            {{-- </div> --}}
                            {{-- </div> --}}
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <form
                                            action="{{ isset($pengguna) ? route('update_pengguna', $pengguna->id) : route('create') }}"
                                            method="post">
                                            {{ csrf_field() }}
                                            {{ isset($pengguna) ? method_field('PUT') : '' }}
                                            <div class="form-group">
                                                <input type="text" id="name" name="name" class="form-control"
                                                    placeholder="Nama"
                                                    value="{{ isset($pengguna) ? $pengguna->name : '' }}">
                                            </div>
                                            <div class="form-group">
                                                <input type="email" id="email" name="email" class="form-control"
                                                    placeholder="Email"
                                                    value="{{ isset($pengguna) ? $pengguna->email : '' }}">
                                            </div>
                                            <div class="form-group">
                                                <input type="text" id="level" name="level" class="form-control"
                                                    placeholder="Level"
                                                    value="{{ isset($pengguna) ? $pengguna->level : '' }}">
                                            </div>
                                            <div class="form-group">
                                                <input type="password" id="password" name="password" class="form-control"
                                                    placeholder="Password"
                                                    value="{{ isset($pengguna) ? $pengguna->password : '12345' }}">
                                            </div>
                                            {{-- <div class="form-group">
                                                <input type="file" id="foto" name="foto" class="form-control"
                                                    placeholder="Nama File Foto">
                                            </div> --}}
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
