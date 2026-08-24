<?php

use Illuminate\Support\Facades\Route;

// ==========================================
// 1. PUBLIC ROUTES (Halaman Depan & Pendaftaran)
// ==========================================
Route::get('/', function () {
    return view('pages.beranda');
})->name('home');

Route::get('/profil', function () {
    return view('pages.profil');
})->name('profil');

Route::get('/program', function () {
    return view('pages.program');
})->name('program');

Route::get('/berita', function () {
    return view('pages.berita');
})->name('berita.index');

Route::get('/galeri', function () {
    return view('pages.beranda');
})->name('galeri');

Route::get('/kegiatan', function () {
    return view('pages.kegiatan');
})->name('kegiatan');

Route::get('/pendaftaran', function () {
    return view('pages.beranda');
})->name('pendaftaran.index');


// ==========================================
// 2. AUTHENTICATION ROUTES (Placeholder)
// ==========================================
Route::get('/login', function () {
    return "Halaman Login Multi-Role (Super Admin / Admin / Wali Santri)";
})->name('login');


// ==========================================
// 3. ADMIN & SUPER ADMIN ROUTES (Protected)
// ==========================================
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', function () {
        return "Dashboard Super Admin / Admin Pesantren";
    })->name('dashboard');

});


// ==========================================
// 4. PORTAL WALI SANTRI ROUTES (Protected)
// ==========================================
Route::prefix('portal')->name('portal.')->group(function () {
    Route::get('/dashboard', function () {
        return "Dashboard Portal Wali Santri (Monitoring Anak)";
    })->name('dashboard');

});