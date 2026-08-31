<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\JadwalRutin;
use Illuminate\Http\Request;

class JadwalRutinController extends Controller
{
    public function index()
    {
        // Mengelompokkan jadwal berdasarkan hari
        $jadwalList = JadwalRutin::orderByRaw("FIELD(hari, 'senin', 'selasa', 'rabu', 'kamis', 'jumat', 'sabtu', 'minggu')")->get()->groupBy('hari');

        return view('dashboard.kegiatan.jadwal-rutin', compact('jadwalList'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'hari' => 'required|in:senin,selasa,rabu,kamis,jumat,sabtu,minggu',
            'nama_kegiatan' => 'required|string|max:255',
            'kategori' => 'required|in:pengajaran,ibadah,ekstrakurikuler,keorganisasian',
        ]);

        JadwalRutin::create($request->all());

        return back()->with('success', 'Jadwal rutin berhasil ditambahkan.');
    }

    public function destroy(JadwalRutin $jadwalRutin)
    {
        $jadwalRutin->delete();

        return back()->with('success', 'Jadwal rutin berhasil dihapus.');
    }
}