<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kegiatan extends Model
{
    use HasFactory;

    protected $table = 'kegiatan';

    protected $fillable = [
        'nama_kegiatan',
        'kategori',
        'deskripsi',
        'tanggal',
        'waktu_mulai',
        'waktu_selesai',
    ];

    // Relasi ke absensi
    public function absensi()
    {
        return $this->hasMany(Absensi::class, 'kegiatan_id');
    }
}