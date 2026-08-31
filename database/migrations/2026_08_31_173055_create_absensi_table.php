<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('absensi', function (Blueprint $table) {
            $table->id();
            $table->foreignId('santri_id')->constrained('santri')->onDelete('cascade');
            $table->foreignId('kegiatan_id')->constrained('kegiatan')->onDelete('cascade'); // Menghubungkan ke tabel kegiatan
            $table->enum('status_kehadiran', ['hadir', 'izin', 'sakit', 'alpa'])->default('hadir');
            $table->text('keterangan')->nullable();
            $table->date('tanggal');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('absensi');
    }
};