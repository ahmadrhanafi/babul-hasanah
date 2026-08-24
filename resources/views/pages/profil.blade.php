@extends('layouts.app')

@section('title', 'Profil Pondok Pesantren Babul Hasanah')

@section('content')

    <!-- HERO SECTION PROFIL -->
    <section
        class="relative bg-gradient-to-br from-emerald-900 via-emerald-800 to-slate-900 text-white py-24 lg:py-32 overflow-hidden">
        <!-- Background Ornament / Pattern -->
        <div
            class="absolute inset-0 opacity-10 bg-[radial-gradient(#d1fae5_1px,transparent_1px)] [background-size:16px_16px]">
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-center space-y-6">
            <span
                class="inline-block bg-emerald-700/60 text-emerald-200 text-xs font-semibold px-3.5 py-1.5 rounded-full border border-emerald-500/30 uppercase tracking-wider">
                <i class="fa-solid fa-sparkles mr-1"></i> Tentang Kami
            </span>
            <h1 class="text-4xl sm:text-5xl lg:text-6xl font-extrabold tracking-tight leading-tight">
                Profil & Visi Misi <span class="text-emerald-400">Pondok Pesantren</span>
            </h1>
            <p class="text-lg text-slate-300 max-w-2xl mx-auto leading-relaxed">
                Mengenal lebih dekat sejarah, landasan hukum, struktur kepengurusan, serta cita-cita luhur Pondok Pesantren
                Babul Hasanah.
            </p>
        </div>
    </section>

    <!-- SEJARAH SINGKAT -->
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                <div class="space-y-6">
                    <h2 class="text-xs font-semibold text-emerald-600 uppercase tracking-widest">Sejarah Berdirinya</h2>
                    <h3 class="text-3xl font-bold text-slate-900 leading-tight">Menyalakan Lentera Ilmu di Tanah Padang
                        Lawas</h3>
                    <p class="text-slate-600 text-sm sm:text-base leading-relaxed">
                        Pondok Pesantren Babul Hasanah didirikan dengan niat tulus untuk membina generasi muda yang
                        berakhlakul karimah, menguasai ilmu agama secara mendalam melalui tradisi kitab kuning, serta siap
                        menghadapi perkembangan zaman di era modern.
                    </p>
                    <p class="text-slate-600 text-sm sm:text-base leading-relaxed">
                        Terletak di Jalan Lintas Pinarik Papaso Km. 14, Desa Manggis, Kecamatan Batang Lubu Sutam, Kabupaten
                        Padang Lawas, Sumatera Utara, pesantren ini terus berkembang menjadi pusat pendidikan Islam yang
                        dipercaya oleh masyarakat luas.
                    </p>
                </div>
                <div class="bg-slate-50 rounded-2xl p-4 border border-slate-200/60 shadow-sm">
                    <div
                        class="h-80 bg-slate-200/80 rounded-xl flex items-center justify-center text-slate-500 font-medium text-sm">
                        [ Foto Komplek / Gedung Pesantren ]
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- VISI & MISI -->
    <section class="py-20 bg-slate-50 border-y border-slate-200/60">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-2xl mx-auto mb-16 space-y-3">
                <h2 class="text-xs font-semibold text-emerald-600 uppercase tracking-widest">Landasan Utama</h2>
                <h3 class="text-3xl font-bold text-slate-900">Visi & Misi Pesantren</h3>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <!-- Visi -->
                <div
                    class="bg-white p-8 rounded-2xl shadow-sm border border-slate-200/60 flex flex-col justify-between hover:shadow-md transition">
                    <div>
                        <div
                            class="w-12 h-12 bg-emerald-100 text-emerald-700 rounded-xl flex items-center justify-center font-bold text-lg mb-6">
                            <i class="fa-solid fa-eye"></i>
                        </div>
                        <h4 class="text-2xl font-bold text-slate-900 mb-4">Visi</h4>
                        <p
                            class="text-slate-700 leading-relaxed italic bg-emerald-50/50 p-6 rounded-xl border border-emerald-100">
                            "Terwujudnya lembaga pendidikan Islam yang unggul dalam mencetak kader ulama dan intelektual
                            muslim yang berkarakter salaf, berwawasan global, serta menguasai ilmu pengetahuan dan
                            teknologi."
                        </p>
                    </div>
                </div>

                <!-- Misi -->
                <div class="bg-white p-8 rounded-2xl shadow-sm border border-slate-200/60 hover:shadow-md transition">
                    <div
                        class="w-12 h-12 bg-emerald-100 text-emerald-700 rounded-xl flex items-center justify-center font-bold text-lg mb-6">
                        <i class="fa-solid fa-bullseye"></i>
                    </div>
                    <h4 class="text-2xl font-bold text-slate-900 mb-4">Misi</h4>
                    <ul class="space-y-3 text-slate-600 text-sm">
                        <li class="flex items-start gap-3">
                            <i class="fa-solid fa-check text-emerald-600 mt-1"></i>
                            <span>Menyelenggarakan pendidikan Islam terpadu berbasis salafiyah dan kurikulum
                                nasional.</span>
                        </li>
                        <li class="flex items-start gap-3">
                            <i class="fa-solid fa-check text-emerald-600 mt-1"></i>
                            <span>Menanamkan kecintaan terhadap Al-Qur'an dan penguasaan kitab kuning klasik secara
                                mendalam.</span>
                        </li>
                        <li class="flex items-start gap-3">
                            <i class="fa-solid fa-check text-emerald-600 mt-1"></i>
                            <span>Membina kemandirian, kedisiplinan, serta kecakapan hidup santri di lingkungan
                                asrama.</span>
                        </li>
                        <li class="flex items-start gap-3">
                            <i class="fa-solid fa-check text-emerald-600 mt-1"></i>
                            <span>Mengembangkan literasi teknologi dan sains sebagai bekal menghadapi tantangan
                                zaman.</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- PIMPINAN & STRUKTUR -->
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center space-y-12">
            <div class="max-w-2xl mx-auto space-y-3">
                <h2 class="text-xs font-semibold text-emerald-600 uppercase tracking-widest">Kepengurusan</h2>
                <h3 class="text-3xl font-bold text-slate-900">Pimpinan & Dewan Pengasuh</h3>
                <p class="text-slate-600 text-sm">Dikelola oleh para ustadz dan asatidz berpengalaman lulusan pesantren
                    terkemuka.</p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8 text-center">
                <!-- Card Pengasuh 1 -->
                <div class="bg-slate-50 border border-slate-200/60 rounded-2xl p-6 space-y-4 hover:shadow-md transition">
                    <div
                        class="w-32 h-32 mx-auto bg-slate-200 rounded-full flex items-center justify-center text-slate-500 font-medium text-sm">
                        [ Foto ]
                    </div>
                    <div>
                        <h4 class="text-lg font-bold text-slate-900">KH. Pimpinan Pesantren, Lc.</h4>
                        <p class="text-xs text-emerald-600 font-semibold uppercase mt-1">Pimpinan Pondok Pesantren</p>
                    </div>
                </div>
                <!-- Card Pengasuh 2 -->
                <div class="bg-slate-50 border border-slate-200/60 rounded-2xl p-6 space-y-4 hover:shadow-md transition">
                    <div
                        class="w-32 h-32 mx-auto bg-slate-200 rounded-full flex items-center justify-center text-slate-500 font-medium text-sm">
                        [ Foto ]
                    </div>
                    <div>
                        <h4 class="text-lg font-bold text-slate-900">Ustadz Pengurus, S.Pd.I</h4>
                        <p class="text-xs text-emerald-600 font-semibold uppercase mt-1">Kepala Madrasah Aliyah (MA)</p>
                    </div>
                </div>
                <!-- Card Pengasuh 3 -->
                <div
                    class="bg-slate-50 border border-slate-200/60 rounded-2xl p-6 space-y-4 hover:shadow-md transition sm:col-span-2 lg:col-span-1">
                    <div
                        class="w-32 h-32 mx-auto bg-slate-200 rounded-full flex items-center justify-center text-slate-500 font-medium text-sm">
                        [ Foto ]
                    </div>
                    <div>
                        <h4 class="text-lg font-bold text-slate-900">Ustadz Pendidikan, M.Pd</h4>
                        <p class="text-xs text-emerald-600 font-semibold uppercase mt-1">Kepala Madrasah Tsanawiyah (MTs)
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
