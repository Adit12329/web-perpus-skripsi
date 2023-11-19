@extends('layout.layout')
@section('contents')

<style>
    .content-wrapper {
        background-image: url('/Gambar/SMP 2.jpg'); /* Sesuaikan dengan path gambar Anda */
        background-size: cover; /* Mengatur gambar untuk menutupi seluruh area kontainer */
        background-repeat: no-repeat; /* Menghindari pengulangan gambar latar belakang */
        background-attachment: fixed; /* Membuat gambar latar belakang tetap saat menggulir halaman */
    }
</style>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">BERANDA</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/beranda">Home</a></li>
                            <li class="breadcrumb-item active">Beranda</li>
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
                        <p style="padding: 20px;">Peraturan Peminjaman Dan Pengembalian Buku Perpustakaan SMPN 2 SUKOWONO.
                            <br><b> PEMINJAMAN BUKU:</b>
                            <br>1. Siswa yang meminjam <b>DIWAJIBKAN</b> untuk mendaftarkan <b>EMAIL AKTIF</b> untuk menerima notifikasi pengembalian.
                            <br>2. Siswa yang meminjam buku <b>DIWAJIBKAN</b> mendaftar akun melalui pegawai perpustakaan agar tidak terjadi kesalahan pengisian data siswa.
                            <br>3. Siswa yang meminjam buku diberikan waktu peminjaman selama <b>1 MINGGU</b>.
                            <br>4. Siswa yang meminjam buku hanya diperbolehkan meminjam buku maksimal 3 judul buku.
                            <br>5. Siswa yang meminjam buku wajib melaporkan terlebih dahulu kepada pegawai perpustakaan jika buku yang akan dipinjam dalam kondisi rusak.
                        </p>
                        <p style="padding: 20px;"><b>PENGEMBALIAN BUKU</b>
                            <br>1. Jika terdapat siswa yang mengembalikan buku melebihi tanggal pengembalian, maka akan dikenakan <b>DENDA</b> sebesar 2000rp per hari.
                            <br>2. Siswa yang meminjam buku akan mendapatkan <b>NOTIFIKASI</b> melalui <b>E-MAIL</b> untuk pengembalian buku yang dipinjam.
                            <br>3. Jika buku yang dipinjam tersebut hilang, maka akan dikenakan sanksi mengganti buku sesuai harga buku yang tertera.
                            <br>4. Jika siswa ingin memperpanjang peminjaman buku dengan judul yang sama, harap untuk membawa buku tersebut untuk mengkonfirmasi perpanjangan kepada pegawai perpustakaan.
                            <br>5. Siswa diharapkan dapat mengembalikan buku dengan tepat waktunya.
                        </p>
                        <p style="padding: 20px;"><b>LANGKAH-LANGKAH PEMINJAMAN DAN PENGEMBALIAN BUKU</b>
                            <br>1. Login akun user siswa maupun admin perpustakaan
                            <br>2. Menuju menu buku induk
                            <br>3. Cari buku yang akan dipinjam, kemudian copy nomor buku tersebut
                            <br>4. Menuju menu peminjaman dan buatlah transaksi peminjaman buku
                            <br>5. Paste nomor buku tersebut ke dalam kolom nomor buku saat akan meminjam buku, kemudian akan muncul data buku yang akan dipinjam 
                            <br>6. Pilih tanggal peminjaman dan tanggal pengembalian buku
                            <br>7. Simpan data, buku dapat dipinjam
                            <br>8. Sebelum jatuh tempo pengembalian buku, admin perpustakaan akan mengirimi notifikasi pengembalian buku melalui e-mail
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
