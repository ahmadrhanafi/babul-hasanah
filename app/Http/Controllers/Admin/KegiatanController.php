<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kegiatan;
use App\Models\Absensi;
use App\Models\Santri;
use Illuminate\Http\Request;

class KegiatanController extends Controller
{
    public function index()
    {
        $kegiatan = Kegiatan::withCount('absensi')->latest()->get();

        return view('dashboard.kegiatan.index', compact('kegiatan'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_kegiatan' => 'required|string|max:255',
            'kategori' => 'required|in:pengajaran,ibadah,ekstrakurikuler,keorganisasian',
            'tanggal' => 'required|date',
        ]);

        Kegiatan::create($request->all());

        return redirect()->route('admin.kegiatan.index')->with('success', 'Kegiatan pesantren berhasil ditambahkan.');
    }

    // Halaman kelola absensi per kegiatan
    public function showAbsensi(Kegiatan $kegiatan)
    {
        $santri = Santri::all();
        $absensiList = $kegiatan->absensi()->get()->keyBy('santri_id');

        return view('dashboard.kegiatan.absensi', compact('kegiatan', 'santri', 'absensiList'));
    }

    // Simpan atau update absensi santri secara massal
    public function storeAbsensi(Request $request, Kegiatan $kegiatan)
    {
        $request->validate([
            'status_kehadiran' => 'required|array',
        ]);

        foreach ($request->status_kehadiran as $santri_id => $status) {
            Absensi::updateOrCreate(
                [
                    'kegiatan_id' => $kegiatan->id,
                    'santri_id' => $santri_id,
                ],
                [
                    'status_kehadiran' => $status,
                    'keterangan' => $request->keterangan[$santri_id] ?? null,
                    'tanggal' => $kegiatan->tanggal,
                ]
            );
        }

        return back()->with('success', 'Data absensi kegiatan berhasil disimpan.');
    }
}