<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JadwalRutin extends Model
{
    use HasFactory;

    protected $table = 'jadwal_rutin';

    protected $fillable = [
        'hari',
        'nama_kegiatan',
        'kategori',
        'deskripsi',
        'waktu_mulai',
        'waktu_selesai',
    ];
}