<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('data_diklat', function (Blueprint $table) {
            $table->id();
            $table->string('nomor_buku');
            $table->string('kategori_buku');
            $table->string('judul_buku');
            $table->date('tanggal_peminjaman');
            $table->date('tanggal_pengembalian');
            $table->integer('letak_buku');
            $table->string('upload_buku');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_diklat');
    }
};
