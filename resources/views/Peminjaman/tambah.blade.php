@extends('layout.layout')
@section('contents')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0"> {{ isset($admin_lecture) ? 'Edit' : 'Tambah' }} Peminjaman </h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/beranda">Home</a></li>
                            <li class="breadcrumb-item active">{{ isset($admin_lecture) ? 'Edit' : 'Tambah' }} Peminjaman
                            </li>
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
                            action="{{ isset($fungsional) ? route('peminjaman.update', $fungsional->id) : route('peminjaman.store') }}"
                            method="post">
                            {{ csrf_field() }}
                            {{ isset($fungsional) ? method_field('PUT') : '' }}
                            <div class="form-group">
                                <input type="text" id="nomor_buku" name="nomor_buku" class="form-control"
                                    placeholder="Nomor Buku"
                                    value="{{ isset($peminjaman) ? $peminjaman->nomor_buku : '' }}">
                            </div>
                            <div class="form-group">
                                <input type="text" id="jdlbuku" name="judul_buku" class="form-control"
                                    placeholder="Judul Buku"
                                    value="{{ isset($peminjaman) ? $peminjaman->judul_buku : '' }}">
                            </div>
                            <div class="form-group">
                                <select class="custom-select d-block w-100" id="ktbuku" name="ktbuku">
                                    @if (isset($admin_lecture))
                                        @foreach ($kategori as $kat)
                                            <option @if ($kategori[0]->nama_kategori == $peminjaman->nama_kategori) selected @endif
                                                value="{{ $kat->nama_kategori }}">
                                                {{ $kat->nama_kategori }}</option>
                                        @endforeach
                                    @else
                                        <option value=""selected>Pilih Kategori</option>
                                        @foreach ($kategori as $kat)
                                            <option value="{{ $kat->nama_kategori }}">{{ $kat->nama_kategori }}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                            {{-- <div class="form-group">
                                    <select class="custom-select d-block w-100" id="jdlbuku" name="judul_buku">
                                        @if (isset($admin_lecture))
                                            <option value="{{ $bukuinduk->id }}">{{ $bukuinduk->judul_buku }}</option>
                                            <option value="{{ $item->id }}">{{ $item->judul_buku }}</option>
                                        @else
                                            <option value="Pilih"></option>
                                            @foreach ($data as $item)
                                                <option value="{{ $item->id }}">{{ $item->judul_buku }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                            </div> --}}
                            {{-- <div class="form-group">
                                <input type="text" id="ktbuku" name="kategori_buku" class="form-control"
                                    placeholder="" @if (isset($admin_lecture))/>
                                    @foreach ($kategori as $kat)
                                        <option @if ($bukuinduk->kategori == $kat->id) selected @endif
                                            value="{{ $kat->id }}"{{ $kat->nama_kategori }}></option>
                                    @endforeach
                                @else
                                    <option value="Pilih"></option>
                                    @foreach ($data as $item)
                                        <option value="{{ $item->id_kategori }}">{{ $item->nama_kategori }}</option>
                                    @endforeach
                                @endif
                            </div> --}}
                            <div class="form-group">
                                <input type="text" id="ltbuku" name="letak_buku" class="form-control"
                                    placeholder="Letak Buku"
                                    value="{{ isset($peminjaman) ? $peminjaman->letak_buku : '' }}">
                            </div>
                            <div class="form-group">
                                <input type="text" id="quantity" name="quantity" class="form-control"
                                    placeholder="Quantity" value="{{ isset($peminjaman) ? $peminjaman->quantity : '' }}">
                            </div>
                            @if (auth()->user()->level == 'admin')
                                <div class="form-group">
                                    <select class="custom-select d-block w-100" id="pemilik" name="pemilik">
                                        @if (isset($admin_lecture))
                                            <option value="{{ $peminjaman->profile }}">{{ $data->name }}</option>
                                        @else
                                            <option value="">Pilih Siswa</option>
                                            @foreach ($data as $item)
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            @else
                                <div class="form-group" hidden>
                                    <select class="custom-select d-block w-100" id="pemilik" name="pemilik">
                                        <option value="{{ auth()->user()->id }}"></option>
                                    </select>
                                </div>
                            @endif

                            <div class="form-group">
                                <input type="date" id="nama" name="tanggal_peminjaman" class="form-control"
                                    placeholder="Tanggal Peminjaman"
                                    value="{{ isset($peminjaman) ? $peminjaman->tanggal_peminjaman : '' }}">
                            </div>
                            <div class="form-group">
                                <input type="date" id="nama" name="tanggal_pengembalian" class="form-control"
                                    placeholder="Tanggal Pengembalian"
                                    value="{{ isset($peminjaman) ? $peminjaman->tanggal_pengembalian : '' }}">
                            </div>

                            {{-- <div class="form-group">
                                <input type="file" id="nama" name="upload_buku" class="form-control"
                                    placeholder="Upload Buku"
                                    value="{{ isset($fungsional) ? $fungsional->upload_buku : '' }}">
                            </div> --}}
                            <div class="form-group">
                                <button type="submit" class="btn btn-success">Simpan</button>
                            </div>
                            <div class="form-group">
                                <a href="{{ route('peminjaman.index') }}"><button type="button"
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

@push('content-js')
    <script type="text/javascript">
        $("#nomor_buku").focusout(function(e) {
            // alert($(this).val());
            var nobuku = $(this).val();
            $.ajax({
                type: "POST",
                url: "{{ route('caribuku') }}",
                data: {
                    'nobuku': nobuku,
                    _token: "{{ csrf_token() }}"
                },
                dataType: 'json',
                success: function(data) {
                    $('#jdlbuku').val(data[0].judul_buku);
                    $('#ktbuku').val(data[0].nama_kategori);
                    $('#ltbuku').val(data[0].letak_buku);
                },
                error: function(response) {
                    alert(response.responseJSON.message);
                }
            });
        });
    </script>
@endpush
