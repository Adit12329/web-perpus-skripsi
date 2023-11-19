<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TambahData extends Model
{
    protected $table =  'tambahdata';
    protected $primaryKey = 'id';
    protected $fillable = [
        'profile', 'nomor_buku', 'kategori_buku', 'judul_buku', 'tanggal_peminjaman', 'tanggal_pengembalian', 'letak_buku', 'upload_buku', 'status_buku', 'quantity'];
}
