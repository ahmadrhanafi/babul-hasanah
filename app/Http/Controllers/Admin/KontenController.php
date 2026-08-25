<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class KontenController extends Controller
{
    public function index()
    {
        $data = [
        ];

        return view('admin.konten.index', $data);
    }
}