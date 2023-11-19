@extends('layout.layout')
@section('contents')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0"> Pengguna </h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/beranda">Home</a></li>
                            <li class="breadcrumb-item active">Pengguna</li>
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
                                <a href="{{ route('tambah_pengguna') }}" class="btn btn-success">Tambah Pengguna<i
                                        class="fas fa-plus-square"></i></a>
                            @endif
                            <tr>
                                <th scope="row"></th>
                                <th scope="col">Nama</th>
                                <th scope="col">Email</th>
                                <th scope="col">Level</th>
                                {{-- <th scope="col">Foto</th> --}}
                                <th scope="col">Aksi</th>
                            </tr>
                            </thead>

                            <tbody>
                                @foreach ($data as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->email }}</td>
                                        <td>{{ $item->level }}</td>
                                        {{-- <td>{{ $item->foto }}</td> --}}
                                        {{-- <form action="{{ route('destroy', $item->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE') --}}
                                            <td>
                                                <a href="{{ route('edit_pengguna', $item->id) }}"><i class="fas fa-edit"
                                                        style="color: #000000;"></i></a> |
                                                <a href="{{ route('deletedata', $item->id) }}"><i class="fas fa-trash"
                                                        style="color:#ff0000"></i></a>
                                            </td>
                                        {{-- </form> --}}
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
