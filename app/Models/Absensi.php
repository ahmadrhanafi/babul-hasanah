<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absensi extends Model
{
    use HasFactory;

    protected $table = 'absensi';

    protected $fillable = [
        'santri_id',
        'kegiatan_id',
        'status_kehadiran',
        'keterangan',
        'tanggal',
    ];

    // Relasi ke data santri
    public function santri()
    {
        return $this->belongsTo(Santri::class, 'santri_id');
    }

    // Relasi ke master kegiatan
    public function kegiatan()
    {
        return $this->belongsTo(Kegiatan::class, 'kegiatan_id');
    }
}