<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Uploadgambar extends Model
{
    protected $table = 'uploadgambars';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id', 'nama', 'gambar'];
}
