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
        Schema::create('bukuinduk', function (Blueprint $table) {
            $table->id();
            $table->string('nomor_buku');
            $table->string('letak_buku');
            $table->string('judul_buku');
            $table->string('sumber');
            $table->string('pengarang');
            $table->date('tahun_terbit');
            $table->string('detail_buku');
            $table->string('upload_buku');
            $table->tinyInteger('kategori')->default(0);
            $table->integer('quantity')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bukuinduk');
    }
};
