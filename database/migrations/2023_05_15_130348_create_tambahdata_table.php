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
        Schema::create('tambahdata', function (Blueprint $table) {
            $table->id();
            $table->string('profile');
            $table->string('nomor_buku');
            $table->string('kategori_buku');
            $table->string('judul_buku');
            $table->date('tanggal_peminjaman');
            $table->date('tanggal_pengembalian');
            $table->integer('letak_buku');
            $table->integer('quantity')->default(0);
            $table->string('upload_buku');
            $table->tinyInteger('status_buku')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tambahdata');
    }
};
