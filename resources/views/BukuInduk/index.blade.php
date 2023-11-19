@push('content-css')
    <style>
        .card {
            width: 1500px;
        }
    </style>
@endpush
@extends('layout.layout')

@section('contents')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0"> Buku Induk </h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/beranda">Home</a></li>
                            <li class="breadcrumb-item active">Buku Induk</li>
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
                            @if (auth()->user()->level == 'admin')
                                <a href="{{ route('bukuinduk.create') }}" class="btn btn-success">Tambah Buku<i
                                        class="fas fa-plus-square"></i></a>

                                <a href="/cetakdatabukuinduk" target="_blank" class="btn btn-primary">Cetak Data<i
                                        class="fa fa-print"></i></a>
                            @endif
                            <thead>
                                <tr>
                                    <th scope="row"></th>
                                    {{-- <th scope="col">Profile</th> --}}
                                    <th scope="col">Nomor Buku</th>
                                    {{-- @if (auth()->user()->level == 'admin') --}}
                                    <th scope="col">Pengarang</th>
                                    {{-- @endif --}}
                                    <th scope="col">Kategori Buku</th>
                                    <th scope="col">Letak Buku</th>
                                    <th scope="col">Judul Buku</th>
                                    <th scope="col">Sumber</th>
                                    <th scope="col">Tahun Terbit</th>
                                    <th scope="col">Detail Buku</th>
                                    <th scope="col">Upload Buku</th>
                                    <th scope="col">Quantity</th>
                                    <th scope="col">Status</th>
                                    @if (auth()->user()->level == 'admin')
                                        <th scope="col">Aksi</th>
                                    @endif
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($bukuinduk as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->nomor_buku }}</td>
                                        <td>{{ $item->pengarang }}</td>
                                        <td>{{ $item->nama_kategori }}</td>
                                        <td>{{ $item->letak_buku }}</td>
                                        <td>{{ $item->judul_buku }}</td>
                                        <td>{{ $item->sumber }}</td>
                                        <td>{{ $item->tahun_terbit }}</td>
                                        <td>{{ $item->detail_buku }}</td>
                                        <td>{{ $item->upload_buku }}</td>
                                        <td>{{ $item->quantity }}</td>
                                        <td>
                                            @if ($item->status_buku == 0)
                                                Tersedia
                                            @endif
                                            @if ($item->status_buku == 1)
                                                Dipinjam
                                            @endif
                                            @if ($item->status_buku == 2)
                                                Dikembalikan
                                            @endif
                                        </td>
                                        {{-- <td>
                                            @if ($item->status_buku == 0)
                                                Tersedia
                                            @endif
                                            @if ($item->status_buku == 1)
                                                Dipinjam
                                            @endif
                                            @if ($item->status_buku == 2)
                                                Dikembalikan
                                            @endif

                                        </td> --}}
                                        <form action="{{ route('bukuinduk.destroy', $item->id) }}" method="POST">
                                            <td>
                                                <div class="btn-group">
                                                    @if (auth()->user()->level == 'admin')
                                                        <a class="btn btn-dark"
                                                            href="{{ route('bukuinduk.edit', $item->id) }}"><i
                                                                class="fas fa-edit"></i></a>

                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger">
                                                            <i class="fas fa-trash"></i>
                                                        </button>
                                                        {{-- <a class="btn btn-success"
                                                            href="/accept/bukuinduk/{{ $item->id }}"><i
                                                                class="fas fa-check"></i></a>
                                                        <a class="btn btn-danger"
                                                            href="/reject/bukuinduk/{{ $item->id }}"><i
                                                                class="fas fa-times"></i></a> --}}
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
                        {{-- {{ $bukuinduk->links() }} --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
