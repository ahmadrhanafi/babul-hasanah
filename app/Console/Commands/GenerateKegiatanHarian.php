<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\JadwalRutin;
use App\Models\Kegiatan;
use Carbon\Carbon;

class GenerateKegiatanHarian extends Command
{
    protected $signature = 'kegiatan:generate';
    protected $description = 'Generate kegiatan otomatis ke tabel kegiatan berdasarkan jadwal rutin hari ini';

    public function handle()
    {
        $isoDay = Carbon::now()->dayOfWeekIso;

        $mappingHari = [
            1 => 'senin',
            2 => 'selasa',
            3 => 'rabu',
            4 => 'kamis',
            5 => 'jumat',
            6 => 'sabtu',
            7 => 'minggu',
        ];

        $hariIni = $mappingHari[$isoDay] ?? null;
        $tanggalHariIni = Carbon::now()->toDateString();

        if (!$hariIni) {
            $this->error("Gagal mendeteksi hari.");
            return;
        }

        $jadwalList = JadwalRutin::where('hari', $hariIni)->get();

        if ($jadwalList->isEmpty()) {
            $this->info("Tidak ada jadwal rutin untuk hari {$hariIni}.");
            return;
        }

        $count = 0;
        foreach ($jadwalList as $jadwal) {
            $exists = Kegiatan::where('tanggal', $tanggalHariIni)
                ->where('nama_kegiatan', $jadwal->nama_kegiatan)
                ->exists();

            if (!$exists) {
                Kegiatan::create([
                    'nama_kegiatan' => $jadwal->nama_kegiatan,
                    'kategori' => $jadwal->kategori,
                    'deskripsi' => $jadwal->deskripsi,
                    'tanggal' => $tanggalHariIni,
                    'waktu_mulai' => $jadwal->waktu_mulai,
                    'waktu_selesai' => $jadwal->waktu_selesai,
                ]);
                $count++;
            }
        }

        $this->info("Berhasil men-generate {$count} kegiatan rutin untuk hari {$hariIni} ({$tanggalHariIni}).");
    }
}