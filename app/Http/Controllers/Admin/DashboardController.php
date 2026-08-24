<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// use App\Models\Santri;
// use App\Models\PendaftaranOnline;
// use App\Models\InformasiPesantren;

class DashboardController extends Controller
{
    public function index()
    {
        // Nanti bisa diubah mengambil data asli dari database, contoh:
        // $totalSantri = Santri::count();
        // $totalPendaftar = PendaftaranOnline::count();

        // Untuk sementara kita kirim data dummy / placeholder yang rapi:
        $data = [
            'totalSantri' => 485,
            'totalPendaftar' => 124,
            'totalBerita' => 38,
            'totalAsatidz' => 32,
        ];

        return view('admin.dashboard', $data);
    }
}