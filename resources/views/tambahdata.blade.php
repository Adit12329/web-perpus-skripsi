@extends('layout.layout')
@section('contents')
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
                        <table class="table">
                            <a href="/createdata" class="btn btn-success">Tambah Data<i class="fas fa-plus-square"></i></a>
                            <a href="/cetakdata" target="_blank" class="btn btn-primary">Cetak Data<i
                                    class="fa fa-print"></i></a>
                            <thead>
                                <tr>
                                    <th scope="row"></th>
                                    {{-- <th scope="col">Profile</th> --}}
                                    <th scope="col">Nomor Buku</th>
                                    @if (auth()->user()->level == 'admin')
                                        <th scope="col">Pemilik</th>
                                    @endif
                                    <th scope="col">Nama Diklat</th>
                                    <th scope="col">Penyelenggara Diklat</th>
                                    <th scope="col">Waktu Pelaksanaan</th>
                                    <th scope="col">Tanggal Sertifikat</th>
                                    <th scope="col">Jumlah JP</th>
                                    <th scope="col">Upload Sertifikat</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($data as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        {{-- <td><a href="#">{{ $item->profile }}</td> --}}
                                        @if (auth()->user()->level == 'admin')
                                            <td>{{ $item->nomor_buku }}
                                            </td>
                                            <td>{{ $item->name }}</td>
                                        @else
                                            <td>{{ $item->nomor_buku }}</td>
                                        @endif
                                        <td>{{ $item->nama_diklat }}</td>
                                        <td>{{ $item->penyelenggara_diklat }}</td>
                                        <td>{{ $item->waktu_pelaksanaan }}</td>
                                        <td>{{ $item->tanggal_sertifikat }}</td>
                                        <td>{{ $item->jumlah_jp }}</td>
                                        <td>{{ $item->upload_sertifikat }}</td>
                                        <td>
                                            <a href="{{ route('editdata', $item->id) }}"><i class="fas fa-edit"
                                                    style="color: #000000;"></i></a> |
                                            @if (auth()->user()->level == 'admin')
                                                <a href="{{ route('deletedata', $item->id) }}"><i class="fas fa-trash"
                                                        style="color:#ff0000"></i></a>
                                                <a href="#"> <i class="fa-sharp fa-solid fa-circle-check"></i></a>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer">
                        {{ $data->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
