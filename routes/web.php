<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboard;
use App\Http\Controllers\Portal\PortalDashboardController as PortalDashboard;

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
    return view('pages.galeri');
})->name('galeri');

Route::get('/kegiatan', function () {
    return view('pages.kegiatan');
})->name('kegiatan');

Route::get('/pendaftaran', function () {
    return view('pages.beranda');
})->name('pendaftaran.index');


// ==========================================
// 2. AUTHENTICATION ROUTES
// ==========================================
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
    Route::post('/login', [AuthenticatedSessionController::class, 'store']);
});

Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout')->middleware('auth');

// ==========================================
// 3. ADMIN ROUTES (Protected)
// ==========================================
Route::middleware(['auth', \App\Http\Middleware\RoleAdmin::class])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminDashboard::class, 'index'])->name('dashboard');
});

// ==========================================
// 4. PORTAL WALI SANTRI ROUTES (Protected)
// ==========================================
Route::middleware(['auth', \App\Http\Middleware\RoleWaliSantri::class])->prefix('portal')->name('portal.')->group(function () {
    Route::get('/dashboard', [PortalDashboard::class, 'index'])->name('dashboard');
});