<h1>{{ $isi_email['judul'] }}</h1>
{{-- <p>{{ $isi_email['badan_email'] }}</p>
<p>{{ $data[0]->name }}</p> --}}
<p style="padding: 20px;">Halo, <b>{{ $data[0]->name }}</b> dimohon untuk mengembalikan peminjaman buku dengan judul
    <b>{{ $data[0]->judul_buku }} </b>, dengan nomor buku <b>{{ $data[0]->nomor_buku }}</b>,
    <br>yang dipinjam pada tanggal <b>{{ $data[0]->tanggal_peminjaman }}</b> dan harus dikembalikan pada tanggal
    <b>{{ $data[0]->tanggal_pengembalian }}</b>.
    <br> Mohon untuk dikembalikan tepat waktu, jika melebihi waktu yang ditetapkan, Maka akan dikenakan denda.
</p>
