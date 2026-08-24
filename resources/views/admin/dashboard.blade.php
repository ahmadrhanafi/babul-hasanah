@extends('layouts.admin')

@section('title', 'Dashboard Pondok Pesantren Babul Hasanah')

@section('content')
    <div class="space-y-6">

        <!-- HEADER & BREADCRUMB -->
        <div
            class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 bg-white p-6 rounded-3xl border border-slate-200/80 shadow-sm">
            <div>
                <div class="flex items-center gap-2 text-xs font-semibold text-slate-400 mb-1">
                    <span>Panel Utama</span>
                    <i class="fa-solid fa-chevron-right text-[10px]"></i>
                    <span class="text-emerald-600">Dashboard</span>
                </div>
                <h2 class="text-xl sm:text-2xl font-black text-slate-900 tracking-tight">Ringkasan Sistem Informasi</h2>
            </div>
            <div class="flex items-center gap-3">
                <span
                    class="inline-flex items-center gap-2 px-3.5 py-2 rounded-xl bg-emerald-50 text-emerald-700 text-xs font-bold border border-emerald-500/20">
                    <span class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></span>
                    Tahun Ajaran 2026/2027
                </span>
            </div>
        </div>

        <!-- KARTU STATISTIK UTAMA (GRID 4 KOLOM) -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">

            <!-- Card 1: Total Santri -->
            <div class="bg-white p-6 rounded-3xl border border-slate-200/80 shadow-sm hover:shadow-md transition group">
                <div class="flex items-center justify-between mb-4">
                    <span
                        class="w-12 h-12 rounded-2xl bg-emerald-50 text-emerald-600 flex items-center justify-center text-lg group-hover:bg-emerald-600 group-hover:text-white transition duration-300">
                        <i class="fa-solid fa-user-graduate"></i>
                    </span>
                    <span
                        class="inline-flex items-center gap-1 text-[10px] font-bold text-emerald-600 bg-emerald-50 px-2.5 py-1 rounded-full">
                        <i class="fa-solid fa-arrow-trend-up"></i> +12%
                    </span>
                </div>
                <span class="text-xs font-bold text-slate-400 uppercase tracking-wider block mb-1">Total Santri Aktif</span>
                <h3 class="text-3xl font-black text-slate-900">485</h3>
                <p class="text-[11px] text-slate-500 mt-2 font-medium">Putra: 250 | Putri: 235</p>
            </div>

            <!-- Card 2: Pendaftar PPDB -->
            <div class="bg-white p-6 rounded-3xl border border-slate-200/80 shadow-sm hover:shadow-md transition group">
                <div class="flex items-center justify-between mb-4">
                    <span
                        class="w-12 h-12 rounded-2xl bg-sky-50 text-sky-600 flex items-center justify-center text-lg group-hover:bg-sky-600 group-hover:text-white transition duration-300">
                        <i class="fa-solid fa-file-invoice"></i>
                    </span>
                    <span
                        class="inline-flex items-center gap-1 text-[10px] font-bold text-sky-600 bg-sky-50 px-2.5 py-1 rounded-full">
                        Gelombang 1
                    </span>
                </div>
                <span class="text-xs font-bold text-slate-400 uppercase tracking-wider block mb-1">Pendaftar PPDB</span>
                <h3 class="text-3xl font-black text-slate-900">124</h3>
                <p class="text-[11px] text-slate-500 mt-2 font-medium">Menunggu verifikasi berkas</p>
            </div>

            <!-- Card 3: Berita & Informasi -->
            <div class="bg-white p-6 rounded-3xl border border-slate-200/80 shadow-sm hover:shadow-md transition group">
                <div class="flex items-center justify-between mb-4">
                    <span
                        class="w-12 h-12 rounded-2xl bg-amber-50 text-amber-600 flex items-center justify-center text-lg group-hover:bg-amber-600 group-hover:text-white transition duration-300">
                        <i class="fa-solid fa-newspaper"></i>
                    </span>
                    <span
                        class="inline-flex items-center gap-1 text-[10px] font-bold text-amber-600 bg-amber-50 px-2.5 py-1 rounded-full">
                        Publikasi
                    </span>
                </div>
                <span class="text-xs font-bold text-slate-400 uppercase tracking-wider block mb-1">Berita Pesantren</span>
                <h3 class="text-3xl font-black text-slate-900">38</h3>
                <p class="text-[11px] text-slate-500 mt-2 font-medium">Total artikel aktif bulan ini</p>
            </div>

            <!-- Card 4: Asatidz / Pengajar -->
            <div class="bg-white p-6 rounded-3xl border border-slate-200/80 shadow-sm hover:shadow-md transition group">
                <div class="flex items-center justify-between mb-4">
                    <span
                        class="w-12 h-12 rounded-2xl bg-purple-50 text-purple-600 flex items-center justify-center text-lg group-hover:bg-purple-600 group-hover:text-white transition duration-300">
                        <i class="fa-solid fa-chalkboard-user"></i>
                    </span>
                    <span
                        class="inline-flex items-center gap-1 text-[10px] font-bold text-purple-600 bg-purple-50 px-2.5 py-1 rounded-full">
                        Aktif
                    </span>
                </div>
                <span class="text-xs font-bold text-slate-400 uppercase tracking-wider block mb-1">Dewan Asatidz</span>
                <h3 class="text-3xl font-black text-slate-900">32</h3>
                <p class="text-[11px] text-slate-500 mt-2 font-medium">Pengajar & Pembina Asrama</p>
            </div>

        </div>

        <!-- GRID SEKSI BAWAH (TABEL & QUICK INFO) -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

            <!-- Tabel Pendaftar Terbaru (Mengambil 2 Kolom) -->
            <div
                class="lg:col-span-2 bg-white rounded-3xl border border-slate-200/80 shadow-sm p-6 sm:p-8 flex flex-col justify-between">
                <div>
                    <div class="flex items-center justify-between mb-6 pb-4 border-b border-slate-100">
                        <div>
                            <h3 class="text-base font-black text-slate-900">Pendaftar Calon Santri Terbaru</h3>
                            <p class="text-xs text-slate-500">Daftar calon santri yang baru saja mengisi formulir online.
                            </p>
                        </div>
                        <a href="#"
                            class="inline-flex items-center gap-1 text-xs font-bold text-emerald-600 hover:text-emerald-700 bg-emerald-50 px-3.5 py-2 rounded-xl transition">
                            <span>Lihat Semua</span>
                            <i class="fa-solid fa-arrow-right text-[10px]"></i>
                        </a>
                    </div>

                    <div class="overflow-x-auto">
                        <table class="w-full text-left text-xs text-slate-600">
                            <thead class="bg-slate-50 text-slate-700 font-bold uppercase tracking-wider">
                                <tr>
                                    <th class="py-3.5 px-4 rounded-l-xl">Nama Calon Santri</th>
                                    <th class="py-3.5 px-4">Jenjang</th>
                                    <th class="py-3.5 px-4">Asal Sekolah</th>
                                    <th class="py-3.5 px-4 rounded-r-xl">Status</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-100 font-medium">
                                <tr class="hover:bg-slate-50/55 transition">
                                    <td class="py-4 px-4">
                                        <div class="font-bold text-slate-900">Muhammad Al Fatih</div>
                                        <div class="text-[10px] text-slate-400">ID: PPDB-2026-001</div>
                                    </td>
                                    <td class="py-4 px-4 text-slate-700">MTs (Setingkat SMP)</td>
                                    <td class="py-4 px-4 text-slate-500">SDN 01 Padang Lawas</td>
                                    <td class="py-4 px-4">
                                        <span
                                            class="bg-amber-100 text-amber-800 px-3 py-1 rounded-full text-[10px] font-bold inline-block">Menunggu
                                            Verifikasi</span>
                                    </td>
                                </tr>
                                <tr class="hover:bg-slate-50/55 transition">
                                    <td class="py-4 px-4">
                                        <div class="font-bold text-slate-900">Fatimah Az Zahra</div>
                                        <div class="text-[10px] text-slate-400">ID: PPDB-2026-002</div>
                                    </td>
                                    <td class="py-4 px-4 text-slate-700">MA (Setingkat SMA)</td>
                                    <td class="py-4 px-4 text-slate-500">SMPN 2 Barumun</td>
                                    <td class="py-4 px-4">
                                        <span
                                            class="bg-emerald-100 text-emerald-800 px-3 py-1 rounded-full text-[10px] font-bold inline-block">Diterima</span>
                                    </td>
                                </tr>
                                <tr class="hover:bg-slate-50/55 transition">
                                    <td class="py-4 px-4">
                                        <div class="font-bold text-slate-900">Umar Faruq</div>
                                        <div class="text-[10px] text-slate-400">ID: PPDB-2026-003</div>
                                    </td>
                                    <td class="py-4 px-4 text-slate-700">SMP Terpadu</td>
                                    <td class="py-4 px-4 text-slate-500">SDIT Al-Madinah</td>
                                    <td class="py-4 px-4">
                                        <span
                                            class="bg-emerald-100 text-emerald-800 px-3 py-1 rounded-full text-[10px] font-bold inline-block">Diterima</span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Panel Pintasan / Aktivitas Sistem (Mengambil 1 Kolom) -->
            <div
                class="bg-white rounded-3xl border border-slate-200/80 shadow-sm p-6 sm:p-8 flex flex-col justify-between space-y-6">
                <div>
                    <h3 class="text-base font-black text-slate-900 mb-1">Aksi Cepat & Pintasan</h3>
                    <p class="text-xs text-slate-500 mb-6">Menu pintas untuk pengelolaan cepat.</p>

                    <div class="space-y-3">
                        <a href="#"
                            class="flex items-center justify-between p-4 rounded-2xl bg-slate-50 hover:bg-emerald-50 hover:text-emerald-700 border border-slate-200/60 transition group">
                            <div class="flex items-center gap-3">
                                <span
                                    class="w-10 h-10 rounded-xl bg-white text-slate-700 group-hover:bg-emerald-600 group-hover:text-white flex items-center justify-center shadow-sm transition">
                                    <i class="fa-solid fa-user-plus text-sm"></i>
                                </span>
                                <div>
                                    <h4 class="text-xs font-bold text-slate-900 group-hover:text-emerald-700">Tambah Data
                                        Santri</h4>
                                    <p class="text-[10px] text-slate-500">Input data santri baru secara manual</p>
                                </div>
                            </div>
                            <i class="fa-solid fa-chevron-right text-xs text-slate-400 group-hover:text-emerald-600"></i>
                        </a>

                        <a href="#"
                            class="flex items-center justify-between p-4 rounded-2xl bg-slate-50 hover:bg-emerald-50 hover:text-emerald-700 border border-slate-200/60 transition group">
                            <div class="flex items-center gap-3">
                                <span
                                    class="w-10 h-10 rounded-xl bg-white text-slate-700 group-hover:bg-emerald-600 group-hover:text-white flex items-center justify-center shadow-sm transition">
                                    <i class="fa-solid fa-pen-to-square text-sm"></i>
                                </span>
                                <div>
                                    <h4 class="text-xs font-bold text-slate-900 group-hover:text-emerald-700">Tulis Berita
                                        Baru</h4>
                                    <p class="text-[10px] text-slate-500">Publikasi informasi kegiatan pesantren</p>
                                </div>
                            </div>
                            <i class="fa-solid fa-chevron-right text-xs text-slate-400 group-hover:text-emerald-600"></i>
                        </a>

                        <a href="#"
                            class="flex items-center justify-between p-4 rounded-2xl bg-slate-50 hover:bg-emerald-50 hover:text-emerald-700 border border-slate-200/60 transition group">
                            <div class="flex items-center gap-3">
                                <span
                                    class="w-10 h-10 rounded-xl bg-white text-slate-700 group-hover:bg-emerald-600 group-hover:text-white flex items-center justify-center shadow-sm transition">
                                    <i class="fa-solid fa-cloud-arrow-down text-sm"></i>
                                </span>
                                <div>
                                    <h4 class="text-xs font-bold text-slate-900 group-hover:text-emerald-700">Rekapitulasi
                                        Data</h4>
                                    <p class="text-[10px] text-slate-500">Unduh laporan format Excel/PDF</p>
                                </div>
                            </div>
                            <i class="fa-solid fa-chevron-right text-xs text-slate-400 group-hover:text-emerald-600"></i>
                        </a>
                    </div>
                </div>

                <!-- Banner Info Kecil di Bawah -->
                <div class="p-4 rounded-2xl bg-gradient-to-br from-emerald-900 to-slate-900 text-white space-y-2">
                    <div class="flex items-center gap-2">
                        <i class="fa-solid fa-circle-info text-emerald-400 text-sm"></i>
                        <h5 class="text-xs font-bold tracking-wide">Pusat Bantuan Sistem</h5>
                    </div>
                    <p class="text-[11px] text-slate-300 leading-relaxed">
                        Butuh bantuan teknis konfigurasi database atau kendala server? Hubungi tim pengembang internal.
                    </p>
                </div>
            </div>

        </div>

    </div>
@endsection
