<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA_Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ route('cetakdata') }}">
    <style>
        table.static {
            /* left: 3%; */
            border: 1px solid #543535;
        }
    </style>
    <title> Cetak Data</title>
</head>

<style>
    .center-logo {
        display: block;
        margin: 0 auto;
    }
</style>

<body>
    <div class="form-group">
        <img class="center-logo" src="{{ asset('Gambar/SMP.png') }}" alt="Logo Sekolah" style="width: 100px; height: auto;">
        <p align="center"><b>Laporan Peminjaman</b></p>
        <p align="center"><b>SMPN 2 SUKOWONO</b></p>
        <table class="static" align="center" rules="all" border="1px" style="width: 95%;">
            <tr>
                <th scope="row"></th>
                {{-- <th scope="col">Profile</th> --}}
                <th scope="col">Nomor Buku</th>

                <th scope="col">Peminjam</th>

                <th scope="col">Kategori Buku</th>
                <th scope="col">Judul Buku</th>
                <th scope="col">Tanggal Peminjaman</th>
                <th scope="col">Tanggal Pengembalian</th>
                <th scope="col">Letak Buku</th>
                {{-- <th scope="col">Upload Buku</th> --}}
                {{-- <th scope="col">Aksi</th> --}}
            </tr>
            <tr>
                @foreach ($ctkdata as $item)
                    <td>{{ $loop->iteration }}</td>
                    {{-- <td><a href="#">{{ $item->profile }}</td> --}}

                    <td>{{ $item->nomor_buku }}</td>
                    <td>{{ $item->profile }}</td>

                    <td>{{ $item->kategori_buku }}</td>
                    <td>{{ $item->judul_buku }}</td>
                    <td>{{ $item->tanggal_peminjaman }}</td>
                    <td>{{ $item->tanggal_pengembalian }}</td>
                    <td>{{ $item->letak_buku }}</td>
                    {{-- <td>{{ $item->upload_buku }}</td> --}}
                    {{-- @if ($item->status_buku == 0)
                    Tersedia
                @endif
                @if ($item->status_buku == 1)
                    Dipinjam
                @endif
                @if ($item->status_buku == 2)
                    Dikembalikan
                @endif --}}
            </tr>
            @endforeach
        </table>
    </div>

    <script type="text/javascript">
        window.print();
    </script>
</body>

</html>
