@extends('layouts.admin')

@section('title', 'Dashboard Pondok Pesantren Babul Hasanah')

@section('content')
    <div class="space-y-5 pb-6">

        <!-- MOBILE-FRIENDLY APP HEADER -->
        <div
            class="flex items-center justify-between bg-white p-4 sm:p-6 rounded-2xl sm:rounded-3xl border border-slate-200/80 shadow-sm">
            <div class="space-y-0.5">
                <span
                    class="inline-block px-2.5 py-0.5 rounded-full bg-emerald-50 text-emerald-700 text-[10px] font-extrabold uppercase tracking-wider border border-emerald-500/20 mb-1">
                    Tahun Ajaran 2026/2027
                </span>
                <h2 class="text-base sm:text-2xl font-black text-slate-900 tracking-tight">Dashboard Utama</h2>
            </div>
            <!-- Quick Profile / Status App Indicator -->
            <div
                class="w-10 h-10 rounded-2xl bg-slate-900 text-emerald-400 flex items-center justify-center font-black shadow-md shadow-slate-900/20">
                <i class="fa-solid fa-shield-halved text-sm"></i>
            </div>
        </div>

        <!-- STATISTIK KARTU (Gaya Grid Aplikasi Mobile) -->
        <div class="grid grid-cols-2 lg:grid-cols-4 gap-3 sm:gap-6">

            <!-- Card 1: Total Santri -->
            <div
                class="bg-white p-4 sm:p-6 rounded-2xl sm:rounded-3xl border border-slate-200/80 shadow-sm flex flex-col justify-between group">
                <div class="flex items-center justify-between mb-3">
                    <span
                        class="w-9 h-9 sm:w-12 sm:h-12 rounded-xl sm:rounded-2xl bg-emerald-50 text-emerald-600 flex items-center justify-center text-sm sm:text-lg">
                        <i class="fa-solid fa-user-graduate"></i>
                    </span>
                    <span
                        class="text-[9px] sm:text-[10px] font-bold text-emerald-600 bg-emerald-50 px-2 py-0.5 rounded-full">
                        +12%
                    </span>
                </div>
                <div>
                    <span class="text-[10px] sm:text-xs font-bold text-slate-400 uppercase tracking-wider block">Santri
                        Aktif</span>
                    <h3 class="text-2xl sm:text-3xl font-black text-slate-900 mt-0.5">485</h3>
                    <p class="text-[10px] text-slate-500 mt-1 font-medium truncate">Putra: 250 | Putri: 235</p>
                </div>
            </div>

            <!-- Card 2: Pendaftar PPDB -->
            <div
                class="bg-white p-4 sm:p-6 rounded-2xl sm:rounded-3xl border border-slate-200/80 shadow-sm flex flex-col justify-between group">
                <div class="flex items-center justify-between mb-3">
                    <span
                        class="w-9 h-9 sm:w-12 sm:h-12 rounded-xl sm:rounded-2xl bg-sky-50 text-sky-600 flex items-center justify-center text-sm sm:text-lg">
                        <i class="fa-solid fa-file-invoice"></i>
                    </span>
                    <span class="text-[9px] sm:text-[10px] font-bold text-sky-600 bg-sky-50 px-2 py-0.5 rounded-full">
                        Gel. 1
                    </span>
                </div>
                <div>
                    <span
                        class="text-[10px] sm:text-xs font-bold text-slate-400 uppercase tracking-wider block">Pendaftar</span>
                    <h3 class="text-2xl sm:text-3xl font-black text-slate-900 mt-0.5">124</h3>
                    <p class="text-[10px] text-slate-500 mt-1 font-medium truncate">Menunggu verifikasi</p>
                </div>
            </div>

            <!-- Card 3: Berita & Informasi -->
            <div
                class="bg-white p-4 sm:p-6 rounded-2xl sm:rounded-3xl border border-slate-200/80 shadow-sm flex flex-col justify-between group">
                <div class="flex items-center justify-between mb-3">
                    <span
                        class="w-9 h-9 sm:w-12 sm:h-12 rounded-xl sm:rounded-2xl bg-amber-50 text-amber-600 flex items-center justify-center text-sm sm:text-lg">
                        <i class="fa-solid fa-newspaper"></i>
                    </span>
                    <span class="text-[9px] sm:text-[10px] font-bold text-amber-600 bg-amber-50 px-2 py-0.5 rounded-full">
                        Publik
                    </span>
                </div>
                <div>
                    <span
                        class="text-[10px] sm:text-xs font-bold text-slate-400 uppercase tracking-wider block">Berita</span>
                    <h3 class="text-2xl sm:text-3xl font-black text-slate-900 mt-0.5">38</h3>
                    <p class="text-[10px] text-slate-500 mt-1 font-medium truncate">Artikel aktif bulan ini</p>
                </div>
            </div>

            <!-- Card 4: Asatidz / Pengajar -->
            <div
                class="bg-white p-4 sm:p-6 rounded-2xl sm:rounded-3xl border border-slate-200/80 shadow-sm flex flex-col justify-between group">
                <div class="flex items-center justify-between mb-3">
                    <span
                        class="w-9 h-9 sm:w-12 sm:h-12 rounded-xl sm:rounded-2xl bg-purple-50 text-purple-600 flex items-center justify-center text-sm sm:text-lg">
                        <i class="fa-solid fa-chalkboard-user"></i>
                    </span>
                    <span class="text-[9px] sm:text-[10px] font-bold text-purple-600 bg-purple-50 px-2 py-0.5 rounded-full">
                        Staf
                    </span>
                </div>
                <div>
                    <span
                        class="text-[10px] sm:text-xs font-bold text-slate-400 uppercase tracking-wider block">Asatidz</span>
                    <h3 class="text-2xl sm:text-3xl font-black text-slate-900 mt-0.5">32</h3>
                    <p class="text-[10px] text-slate-500 mt-1 font-medium truncate">Pengajar & Pembina</p>
                </div>
            </div>

        </div>

        <!-- ========================================== -->
        <!-- SECTION GRAFIK & DIAGRAM STATIS (BARU)       -->
        <!-- ========================================== -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

            <!-- GRAFIK GARIS (LINE CHART): TREN PENDAFTAR SANTRI BARU -->
            <div
                class="bg-white p-6 rounded-3xl border border-slate-100 shadow-sm lg:col-span-2 flex flex-col justify-between">
                <div class="flex items-center justify-between mb-4">
                    <div>
                        <h3 class="text-sm font-black text-slate-900">Statistik Tren Pendaftar Santri</h3>
                        <p class="text-[11px] text-slate-400">Grafik jumlah calon santri baru per bulan (Tahun Ajaran)</p>
                    </div>
                    <div
                        class="bg-slate-50 border border-slate-200 text-slate-600 text-[11px] font-bold px-3 py-1.5 rounded-xl">
                        <span>Periode 2025/2026</span>
                    </div>
                </div>

                <!-- Ilustrasi / Kontainer Grafik Garis SVG Statis -->
                <div class="py-4 relative">
                    <!-- Garis Grid Horizontal Latar Belakang -->
                    <div class="absolute inset-0 flex flex-col justify-between pointer-events-none opacity-40">
                        <div class="border-b border-dashed border-slate-200 w-full"></div>
                        <div class="border-b border-dashed border-slate-200 w-full"></div>
                        <div class="border-b border-dashed border-slate-200 w-full"></div>
                        <div class="border-b border-dashed border-slate-200 w-full"></div>
                    </div>

                    <!-- SVG Line Chart -->
                    <div class="h-56 w-full flex items-end relative z-10 px-2">
                        <svg class="w-full h-full overflow-visible" viewBox="0 0 600 200" preserveAspectRatio="none">
                            <!-- Area Gradient di bawah garis -->
                            <defs>
                                <linearGradient id="emeraldGradient" x1="0" y1="0" x2="0"
                                    y2="1">
                                    <stop offset="0%" stop-color="#10b981" stop-opacity="0.3" />
                                    <stop offset="100%" stop-color="#10b981" stop-opacity="0.0" />
                                </linearGradient>
                            </defs>
                            <!-- Area Fill -->
                            <path d="M 0,150 Q 100,120 200,90 T 400,60 T 600,30 L 600,200 L 0,200 Z"
                                fill="url(#emeraldGradient)" />
                            <!-- Kurva Garis Utama -->
                            <path d="M 0,150 Q 100,120 200,90 T 400,60 T 600,30" fill="none" stroke="#059669"
                                stroke-width="3" stroke-linecap="round" />

                            <!-- Titik Data (Nodes) -->
                            <circle cx="0" cy="150" r="4" fill="#059669"
                                class="transition-all hover:r-6 cursor-pointer" />
                            <circle cx="120" cy="125" r="4" fill="#059669" />
                            <circle cx="240" cy="95" r="4" fill="#059669" />
                            <circle cx="360" cy="70" r="4" fill="#059669" />
                            <circle cx="480" cy="45" r="4" fill="#059669" />
                            <circle cx="600" cy="30" r="4" fill="#059669" />
                        </svg>
                    </div>

                    <!-- Label Sumbu X (Bulan) -->
                    <div
                        class="grid grid-cols-6 text-center text-[10px] font-bold text-slate-400 mt-3 pt-2 border-t border-slate-100">
                        <span>Nov</span>
                        <span>Des</span>
                        <span>Jan</span>
                        <span>Feb</span>
                        <span>Mar</span>
                        <span>Apr</span>
                    </div>
                </div>

                <!-- Keterangan Ringkas Bawah Grafik -->
                <div class="flex items-center justify-between pt-3 border-t border-slate-100 text-xs">
                    <div class="flex items-center gap-2">
                        <span class="w-3 h-3 rounded-full bg-emerald-600 inline-block"></span>
                        <span class="text-slate-600 font-semibold text-[11px]">Jumlah Pendaftar Masuk</span>
                    </div>
                    <span class="text-slate-900 font-black text-xs">Total Puncak: 42 Orang/Bulan</span>
                </div>
            </div>

            <!-- DIAGRAM DONAT (DONUT CHART): KOMPOSISI DATA SANTRI -->
            <div class="bg-white p-6 rounded-3xl border border-slate-100 shadow-sm flex flex-col justify-between">
                <div>
                    <h3 class="text-sm font-black text-slate-900">Komposisi Santri Aktif</h3>
                    <p class="text-[11px] text-slate-400">Distribusi berdasarkan tingkat jenjang pendidikan</p>
                </div>

                <!-- Ilustrasi Diagram Donat / Progress Bar Kontras -->
                <div class="my-6 flex flex-col items-center justify-center">
                    <!-- Visualisasi Donat Lingkaran Statis Menggunakan CSS Conic Gradient -->
                    <div class="relative w-36 h-36 rounded-full flex items-center justify-center shadow-inner"
                        style="background: conic-gradient(#059669 0% 50%, #3b82f6 50% 80%, #f59e0b 80% 100%);">
                        <!-- Lubang Tengah Donat -->
                        <div class="w-24 h-24 bg-white rounded-full flex flex-col items-center justify-center shadow-sm">
                            <span class="text-xs text-slate-400 font-bold uppercase tracking-wider">Total</span>
                            <span class="text-base font-black text-slate-900">324</span>
                        </div>
                    </div>
                </div>

                <!-- Legenda Keterangan Donat -->
                <div class="space-y-2 pt-2 border-t border-slate-100 text-xs">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap-2">
                            <span class="w-2.5 h-2.5 rounded-full bg-emerald-600"></span>
                            <span class="text-slate-600 font-medium text-[11px]">Tingkat Ula / TPQ</span>
                        </div>
                        <span class="font-bold text-slate-900 text-[11px]">50% (162)</span>
                    </div>
                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap-2">
                            <span class="w-2.5 h-2.5 rounded-full bg-blue-500"></span>
                            <span class="text-slate-600 font-medium text-[11px]">Tingkat Wustha / Tsanawiyah</span>
                        </div>
                        <span class="font-bold text-slate-900 text-[11px]">30% (97)</span>
                    </div>
                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap-2">
                            <span class="w-2.5 h-2.5 rounded-full bg-amber-500"></span>
                            <span class="text-slate-600 font-medium text-[11px]">Tingkat Ulya / Aliyah</span>
                        </div>
                        <span class="font-bold text-slate-900 text-[11px]">20% (65)</span>
                    </div>
                </div>
            </div>

        </div>
        <!-- ========================================== -->

        <!-- GRID SEKSI BAWAH -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-5">

            <!-- PENDAFTAR TERBARU (Di HP berubah jadi bentuk Card List ala Aplikasi, di Laptop tetap Tabel) -->
            <div
                class="lg:col-span-2 bg-white rounded-2xl sm:rounded-3xl border border-slate-200/80 shadow-sm p-5 sm:p-8 space-y-4">
                <div class="flex items-center justify-between pb-3 border-b border-slate-100">
                    <div>
                        <h3 class="text-sm sm:text-base font-black text-slate-900">Pendaftar Terbaru</h3>
                        <p class="text-[11px] text-slate-500">Calon santri yang baru mengisi formulir</p>
                    </div>
                    <a href="{{ route('admin.pendaftaran.index') }}"
                        class="inline-flex items-center gap-1 text-xs font-bold text-emerald-600 hover:text-emerald-700 bg-emerald-50 px-3 py-1.5 rounded-xl transition">
                        <span>Semua</span>
                        <i class="fa-solid fa-arrow-right text-[10px]"></i>
                    </a>
                </div>

                <!-- TAMPILAN MOBILE: LIST CARD (Muncul di layar kecil) -->
                <div class="space-y-3 sm:hidden">
                    <!-- Item 1 -->
                    <div
                        class="p-3.5 rounded-2xl bg-slate-50 border border-slate-200/60 flex items-center justify-between">
                        <div class="space-y-0.5">
                            <span class="text-[9px] font-bold text-slate-400">PPDB-2026-001</span>
                            <h4 class="text-xs font-black text-slate-900">Muhammad Al Fatih</h4>
                            <p class="text-[10px] text-slate-500">MTs • SDN 01 Padang Lawas</p>
                        </div>
                        <span class="bg-amber-100 text-amber-800 px-2.5 py-1 rounded-full text-[9px] font-bold">
                            Pending
                        </span>
                    </div>

                    <!-- Item 2 -->
                    <div
                        class="p-3.5 rounded-2xl bg-slate-50 border border-slate-200/60 flex items-center justify-between">
                        <div class="space-y-0.5">
                            <span class="text-[9px] font-bold text-slate-400">PPDB-2026-002</span>
                            <h4 class="text-xs font-black text-slate-900">Fatimah Az Zahra</h4>
                            <p class="text-[10px] text-slate-500">MA • SMPN 2 Barumun</p>
                        </div>
                        <span class="bg-emerald-100 text-emerald-800 px-2.5 py-1 rounded-full text-[9px] font-bold">
                            Diterima
                        </span>
                    </div>

                    <!-- Item 3 -->
                    <div
                        class="p-3.5 rounded-2xl bg-slate-50 border border-slate-200/60 flex items-center justify-between">
                        <div class="space-y-0.5">
                            <span class="text-[9px] font-bold text-slate-400">PPDB-2026-003</span>
                            <h4 class="text-xs font-black text-slate-900">Umar Faruq</h4>
                            <p class="text-[10px] text-slate-500">SMP • SDIT Al-Madinah</p>
                        </div>
                        <span class="bg-emerald-100 text-emerald-800 px-2.5 py-1 rounded-full text-[9px] font-bold">
                            Diterima
                        </span>
                    </div>
                </div>

                <!-- TAMPILAN DESKTOP: TABEL KLASIK (Tersembunyi di HP) -->
                <div class="hidden sm:block overflow-x-auto">
                    <table class="w-full text-left text-xs text-slate-600">
                        <thead class="bg-slate-50 text-slate-700 font-bold uppercase tracking-wider">
                            <tr>
                                <th class="py-3 px-4 rounded-l-xl">Nama Calon Santri</th>
                                <th class="py-3 px-4">Jenjang</th>
                                <th class="py-3 px-4">Asal Sekolah</th>
                                <th class="py-3 px-4 rounded-r-xl">Status</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-100 font-medium">
                            <tr class="hover:bg-slate-50/50 transition">
                                <td class="py-3.5 px-4">
                                    <div class="font-bold text-slate-900">Muhammad Al Fatih</div>
                                    <div class="text-[10px] text-slate-400">ID: PPDB-2026-001</div>
                                </td>
                                <td class="py-3.5 px-4 text-slate-700">MTs (Setingkat SMP)</td>
                                <td class="py-3.5 px-4 text-slate-500">SDN 01 Padang Lawas</td>
                                <td class="py-3.5 px-4">
                                    <span
                                        class="bg-amber-100 text-amber-800 px-3 py-1 rounded-full text-[10px] font-bold inline-block">Menunggu
                                        Verifikasi</span>
                                </td>
                            </tr>
                            <tr class="hover:bg-slate-50/50 transition">
                                <td class="py-3.5 px-4">
                                    <div class="font-bold text-slate-900">Fatimah Az Zahra</div>
                                    <div class="text-[10px] text-slate-400">ID: PPDB-2026-002</div>
                                </td>
                                <td class="py-3.5 px-4 text-slate-700">MA (Setingkat SMA)</td>
                                <td class="py-3.5 px-4 text-slate-500">SMPN 2 Barumun</td>
                                <td class="py-3.5 px-4">
                                    <span
                                        class="bg-emerald-100 text-emerald-800 px-3 py-1 rounded-full text-[10px] font-bold inline-block">Diterima</span>
                                </td>
                            </tr>
                            <tr class="hover:bg-slate-50/50 transition">
                                <td class="py-3.5 px-4">
                                    <div class="font-bold text-slate-900">Umar Faruq</div>
                                    <div class="text-[10px] text-slate-400">ID: PPDB-2026-003</div>
                                </td>
                                <td class="py-3.5 px-4 text-slate-700">SMP Terpadu</td>
                                <td class="py-3.5 px-4 text-slate-500">SDIT Al-Madinah</td>
                                <td class="py-3.5 px-4">
                                    <span
                                        class="bg-emerald-100 text-emerald-800 px-3 py-1 rounded-full text-[10px] font-bold inline-block">Diterima</span>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- AKSI CEPAT & PINTASAN (Gaya Menu List Aplikasi Mobile) -->
            <div
                class="bg-white rounded-2xl sm:rounded-3xl border border-slate-200/80 shadow-sm p-5 sm:p-8 flex flex-col justify-between space-y-4">
                <div>
                    <h3 class="text-sm sm:text-base font-black text-slate-900 mb-0.5">Aksi Cepat</h3>
                    <p class="text-[11px] text-slate-500 mb-4">Pintasan menu operasional sistem</p>

                    <div class="space-y-2.5">
                        <a href="#"
                            class="flex items-center justify-between p-3.5 rounded-2xl bg-slate-50 hover:bg-emerald-50 hover:text-emerald-700 border border-slate-200/60 transition group">
                            <div class="flex items-center gap-3">
                                <span
                                    class="w-9 h-9 rounded-xl bg-white text-slate-700 group-hover:bg-emerald-600 group-hover:text-white flex items-center justify-center shadow-sm transition">
                                    <i class="fa-solid fa-user-plus text-xs"></i>
                                </span>
                                <div>
                                    <h4 class="text-xs font-bold text-slate-900 group-hover:text-emerald-700">Tambah Data
                                        Santri</h4>
                                    <p class="text-[10px] text-slate-500">Input manual data baru</p>
                                </div>
                            </div>
                            <i class="fa-solid fa-chevron-right text-xs text-slate-400 group-hover:text-emerald-600"></i>
                        </a>

                        <a href="#"
                            class="flex items-center justify-between p-3.5 rounded-2xl bg-slate-50 hover:bg-emerald-50 hover:text-emerald-700 border border-slate-200/60 transition group">
                            <div class="flex items-center gap-3">
                                <span
                                    class="w-9 h-9 rounded-xl bg-white text-slate-700 group-hover:bg-emerald-600 group-hover:text-white flex items-center justify-center shadow-sm transition">
                                    <i class="fa-solid fa-pen-to-square text-xs"></i>
                                </span>
                                <div>
                                    <h4 class="text-xs font-bold text-slate-900 group-hover:text-emerald-700">Tulis Berita
                                        Baru</h4>
                                    <p class="text-[10px] text-slate-500">Publikasi info kegiatan</p>
                                </div>
                            </div>
                            <i class="fa-solid fa-chevron-right text-xs text-slate-400 group-hover:text-emerald-600"></i>
                        </a>

                        <a href="#"
                            class="flex items-center justify-between p-3.5 rounded-2xl bg-slate-50 hover:bg-emerald-50 hover:text-emerald-700 border border-slate-200/60 transition group">
                            <div class="flex items-center gap-3">
                                <span
                                    class="w-9 h-9 rounded-xl bg-white text-slate-700 group-hover:bg-emerald-600 group-hover:text-white flex items-center justify-center shadow-sm transition">
                                    <i class="fa-solid fa-cloud-arrow-down text-xs"></i>
                                </span>
                                <div>
                                    <h4 class="text-xs font-bold text-slate-900 group-hover:text-emerald-700">Rekapitulasi
                                        Data</h4>
                                    <p class="text-[10px] text-slate-500">Unduh laporan Excel/PDF</p>
                                </div>
                            </div>
                            <i class="fa-solid fa-chevron-right text-xs text-slate-400 group-hover:text-emerald-600"></i>
                        </a>
                    </div>
                </div>

                <!-- Banner Bantuan Mini -->
                <div
                    class="p-3.5 rounded-2xl bg-gradient-to-br from-emerald-900 to-slate-900 text-white space-y-1.5 shadow-sm">
                    <div class="flex items-center gap-2">
                        <i class="fa-solid fa-circle-info text-emerald-400 text-xs"></i>
                        <h5 class="text-[11px] font-bold tracking-wide">Pusat Bantuan</h5>
                    </div>
                    <p class="text-[10px] text-slate-300 leading-relaxed">
                        Kendala server atau database? Hubungi tim pengembang internal.
                    </p>
                </div>
            </div>

        </div>

    </div>
@endsection
