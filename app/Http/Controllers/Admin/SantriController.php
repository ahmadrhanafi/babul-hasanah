<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Santri;

class SantriController extends Controller
{
    public function index()
    {
        // Mengambil data santri dari database dengan pagination
        $santris = Santri::latest()->paginate(10);

        return view('dashboard.santri.index', compact('santris'));
    }
}