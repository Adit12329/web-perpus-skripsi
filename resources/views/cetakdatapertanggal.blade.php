<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA_Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ route('cetakdatapertanggal') }}">
    {{-- <style>
        table.static {
            /* left: 3%; */
            border: 1px solid #543535;

        }
    </style>
    <title> Cetak Data</title> --}}
</head>

<body>
    <div class="form-group">
        <p align="center"><b>Laporan Data Pertanggal</b></p>
        <table class="static" align="center" rules="all" border="1px" style="width: 95%;">
            <tr>
                <th scope="row"></th>
                <th>Nomor Sertifikat</th>
                <th>Nama Diklat</th>
                <th>Penyelenggara Diklat</th>
                <th>Waktu Pelaksanaan</th>
                <th>Tanggal Sertifikat</th>
                <th>Jumlah JP</th>
                <th>Upload Sertifikat</th>
            </tr>
            <tr>
                @foreach ($cetakdataPertanggal as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->nomor_sertifikat }}</td>
                <td>{{ $item->nama_diklat }}</td>
                <td>{{ $item->penyelenggara_diklat }}</td>
                <td>{{ $item->waktu_pelaksanaan }}</td>
                <td>{{ $item->tanggal_sertifikat }}</td>
                <td>{{ $item->jumlah_jp }}</td>
                <td>{{ $item->upload_sertifikat }}</td>
{{-- <td>
    <div class="input-group mb-3">
        <a href="{{ route('cetakdatapertanggal') }}"  target="_blank" class="btn btn-primary col-md 12">Cetak Data Pertanggal <i class="fas fa-print"></i></a>
    </div>
</td> --}}
            </tr>
            @endforeach
        </table>
    </div>

    <script type="text/javascript">
        window.print();
    </script>
</body>

</html>
