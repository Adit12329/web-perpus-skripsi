<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BukuInduk extends Model
{
    protected $table =  'bukuinduk' ;
    protected $primaryKey = 'id';
    protected $fillable = [
        'pengarang', 'nomor_buku', 'letak_buku', 'judul_buku', 'sumber', 'tahun_terbit', 'detail_buku', 'upload_buku', 'kategori', 'quantity'];
}
