<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GaleriController extends Controller
{
    public function index()
    {
        $data = [
        ];

        return view('dashboard.galeri.index', $data);
    }
}