@extends('layout.layout')
@section('contents')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0"> Daftar Buku Kembali </h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/beranda">Home</a></li>
                            <li class="breadcrumb-item active">Daftar Buku Kembali</li>
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
                            {{-- <a href="{{ route('kepemimpinan.create') }}" class="btn btn-success">Tambah Data<i
                                    class="fas fa-plus-square"></i></a> --}}
                                    @if (auth()->user()->level == 'admin')
                            {{-- <a href="/cetakdata" target="_blank" class="btn btn-primary">Cetak Data<i
                                    class="fa fa-print"></i></a> --}}
                                    @endif
                            <thead>
                                <tr>
                                    <th scope="row"></th>
                                    {{-- <th scope="col">Profile</th> --}}
                                    <th scope="col">Nomor Buku</th>
                                    @if (auth()->user()->level == 'admin')
                                        <th scope="col">Peminjam</th>
                                    @endif
                                    <th scope="col">Kategori Buku</th>
                                    <th scope="col">Judul Buku</th>
                                    <th scope="col">Tanggal Peminjaman</th>
                                    <th scope="col">Tanggal Pengembalian</th>
                                    <th scope="col">Letak Buku</th>
                                    {{-- <th scope="col">Upload Buku</th> --}}
                                    <th scope="col">Status Buku</th>
                                    @if (auth()->user()->level == 'admin')
                                    <th scope="col">Aksi</th>
                                    @endif
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
                                        <td>{{ $item->kategori_buku}}</td>
                                        <td>{{ $item->judul_buku}}</td>
                                        <td>{{ $item->tanggal_peminjaman}}</td>
                                        <td>{{ $item->tanggal_pengembalian}}</td>
                                        <td>{{ $item->letak_buku}}</td>
                                        {{-- <td>{{ $item->upload_buku}}</td> --}}
                                        <td>
                                            @if ($item->status_buku == 0 )
                                                Tersedia
                                            @endif
                                            @if ($item->status_buku == 1 )
                                                Dipinjam
                                            @endif
                                            @if ($item->status_buku == 2 )
                                                Dikembalikan
                                            @endif
                                        </td>
                                        <form action="{{ route('pengembalian.destroy', $item->id) }}" method="POST">
                                            <td>
                                                <div class="btn-group">
                                                    @if (auth()->user()->level == 'admin')
                                                    {{-- <a class="btn btn-dark"
                                                        href="{{ route('fungsional.edit', $item->id) }}"><i
                                                            class="fas fa-edit"></i></a> --}}
                                                    @csrf
                                                    @method('DELETE')
                                                    {{-- <button type="submit" class="btn btn-danger">
                                                        <i class="fas fa-trash"></i>
                                                    </button> --}}
                                                    <a class="btn btn-success"
                                                        href="/accept/peminjaman/{{ $item->id }}"><i
                                                            class="fas fa-check"></i></a>
                                                    <a class="btn btn-danger"
                                                        href="/reject/peminjaman/{{ $item->id }}"><i
                                                            class="fas fa-times"></i></a>
                                                    {{-- <a class="btn btn-info"
                                                        href="/send/{{ $item->id }}"><i
                                                            class="fas fa-paper-plane"></i></a> --}}
                                                @endif
                                                </div>
                                            </td>
                                        </form>
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
