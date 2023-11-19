@extends('layout.layout')
@section('contents')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0"> {{ isset($admin_lecture) ? 'Edit' : 'Tambah' }} Buku </h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/beranda">Home</a></li>
                            <li class="breadcrumb-item active">{{ isset($admin_lecture) ? 'Edit' : 'Tambah' }} Buku </li>
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
                        <form
                            action="{{ isset($bukuinduk) ? route('bukuinduk.update', $bukuinduk->id) : route('bukuinduk.store') }}"
                            method="post">
                            {{ csrf_field() }}
                            {{ isset($bukuinduk) ? method_field('PUT') : '' }}
                            <div class="form-group">
                                <input type="text" id="nama" name="nomor_buku" class="form-control"
                                    placeholder="Nomor Buku" value="{{ isset($bukuinduk) ? $bukuinduk->nomor_buku : '' }}">
                            </div>
                            <div class="form-group">
                                <input type="text" id="nama" name="judul_buku" class="form-control"
                                    placeholder="Judul Buku" value="{{ isset($bukuinduk) ? $bukuinduk->judul_buku : '' }}">
                            </div>
                            <div class="form-group">
                                <select class="custom-select d-block w-100" id="ktbuku" name="kategori_buku">
                                    @if (isset($admin_lecture))
                                        @foreach ($kategori as $kat)
                                            <option @if ($bukuinduk->kategori == $kat->id) selected @endif
                                                value="{{ $kat->id }}">{{ $kat->nama_kategori }}</option>
                                        @endforeach
                                    @else
                                        <option value="Pilih"></option>
                                        @foreach ($data as $item)
                                            <option value="{{ $item->id_kategori }}">{{ $item->nama_kategori }}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                            <div class="form-group">
                                <input type="text" id="nama" name="letak_buku" class="form-control"
                                    placeholder="Letak Buku" value="{{ isset($bukuinduk) ? $bukuinduk->letak_buku : '' }}">
                            </div>
                            <div class="form-group">
                                <input type="text" id="nama" name="pengarang" class="form-control"
                                    placeholder="Pengarang" value="{{ isset($bukuinduk) ? $bukuinduk->pengarang : '' }}">
                            </div>
                            <div class="form-group">
                                <input type="text" id="nama" name="sumber" class="form-control"
                                    placeholder="Sumber" value="{{ isset($bukuinduk) ? $bukuinduk->sumber : '' }}">
                            </div>
                            <div class="form-group">
                                <input type="date" id="nama" name="tahun_terbit" class="form-control"
                                    placeholder="Tanggal Pengembalian"
                                    value="{{ isset($bukuinduk) ? $bukuinduk->tahun_terbit : '' }}">
                            </div>
                            <div class="form-group">
                                <input type="text" id="nama" name="detail_buku" class="form-control"
                                    placeholder="Detail Buku"
                                    value="{{ isset($bukuinduk) ? $bukuinduk->detail_buku : '' }}">
                            </div>
                            <div class="form-group">
                                <input type="file" id="nama" name="upload_buku" class="form-control"
                                    placeholder="Upload Buku"
                                    value="{{ isset($bukuinduk) ? $bukuinduk->upload_buku : '' }}">
                            </div>
                            <div class="form-group">
                                <input type="text" id="nama" name="quantity" class="form-control"
                                    placeholder="Quantity" value="{{ isset($bukuinduk) ? $bukuinduk->quantity : '' }}">
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-success">Simpan</button>
                            </div>
                            <div class="form-group">
                                <a href="{{ route('bukuinduk.index') }}"><button type="button"
                                        class="btn btn-danger">Batal</button></a>
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
@endsection
