<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kegiatan;
use App\Models\Absensi;
use App\Models\Santri;
use Illuminate\Http\Request;
use Carbon\Carbon;

class KegiatanController extends Controller
{
    public function index(Request $request)
    {
        // Ambil tanggal dari request, jika kosong default ke hari ini
        $tanggal = $request->input('tanggal', Carbon::today()->toDateString());

        // Ambil kegiatan berdasarkan tanggal yang dipilih
        $kegiatan = Kegiatan::withCount('absensi')
            ->whereDate('tanggal', $tanggal)
            ->orderBy('waktu_mulai', 'asc')
            ->get();

        return view('dashboard.kegiatan.index', compact('kegiatan', 'tanggal'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_kegiatan' => 'required|string|max:255',
            'kategori' => 'required|in:pengajaran,ibadah,ekstrakurikuler,keorganisasian',
            'tanggal' => 'required|date',
        ]);

        Kegiatan::create($request->all());

        return redirect()->route('admin.kegiatan.index', ['tanggal' => $request->tanggal])
            ->with('success', 'Kegiatan pesantren berhasil ditambahkan.');
    }

    public function showAbsensi(Kegiatan $kegiatan)
    {
        $santri = Santri::all();
        $absensiList = $kegiatan->absensi()->get()->keyBy('santri_id');

        return view('dashboard.kegiatan.absensi', compact('kegiatan', 'santri', 'absensiList'));
    }

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