<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('kegiatan', function (Blueprint $table) {
            $table->id();
            $table->string('nama_kegiatan'); // Contoh: Sorogan Kitab, Muhadharah, Hadrah
            $table->enum('kategori', ['pengajaran', 'ibadah', 'ekstrakurikuler', 'keorganisasian'])->default('pengajaran');
            $table->text('deskripsi')->nullable();
            $table->date('tanggal');
            $table->time('waktu_mulai')->nullable();
            $table->time('waktu_selesai')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('kegiatan');
    }
};