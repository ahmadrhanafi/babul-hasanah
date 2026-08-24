@extends('layouts.app')

@section('title', 'Pondok Pesantren Babul Hasanah')

@section('content')
    <!-- HERO SECTION -->
    <section class="relative bg-slate-950 text-white py-20 lg:py-32 bg-[image:var(--banner-img)] bg-cover bg-center">

        <!-- Inline Style untuk Gambar Background & Overlay Hitam Solid Langsung -->
        <div class="absolute inset-0 bg-slate-950/90 z-0"
            style="background-image: linear-gradient(to right, rgba(2, 6, 23, 0.85), rgba(2, 6, 23, 0.485)), url('{{ asset('assets/img/banner/banner.png') }}'); background-size: cover; background-position: center;">
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 w-full">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-12 items-center">

                <!-- Kolom Kiri: Teks Utama (7 Kolom) -->
                <div class="lg:col-span-7 space-y-6 text-center lg:text-left">

                    <!-- Badge -->
                    <div
                        class="inline-flex items-center gap-2 bg-emerald-500/10 text-emerald-300 text-xs font-semibold px-4 py-2 rounded-full border border-emerald-500/20 backdrop-blur-md uppercase tracking-wider">
                        <i class="fa-solid fa-sparkles text-emerald-400"></i> Selamat Datang di Official Website
                    </div>

                    <!-- Judul -->
                    <h1 class="text-3xl sm:text-4xl lg:text-6xl font-extrabold tracking-tight leading-tight">
                        Membangun Generasi Unggul Dalam Penguasaan <span class="text-emerald-400">Kitab Kuning</span>
                    </h1>

                    <!-- Deskripsi -->
                    <p class="text-sm sm:text-base lg:text-lg text-slate-300 max-w-xl mx-auto lg:mx-0 leading-relaxed">
                        Pondok Pesantren Babul Hasanah berkomitmen mendidik santri yang mendalami ilmu agama, unggul dalam
                        kitab kuning, berakhlak mulia serta berani menghadapi tantangan zaman.
                    </p>

                    <!-- Tombol Aksi -->
                    <div class="flex flex-col sm:flex-row justify-center lg:justify-start gap-4 pt-2">
                        <a href="{{ route('pendaftaran.index') }}"
                            class="bg-emerald-500 hover:bg-emerald-600 text-white font-semibold px-8 py-3.5 rounded-xl shadow-lg shadow-emerald-900/40 transition duration-200 text-center flex items-center justify-center gap-2">
                            <span>Daftar Santri Baru</span>
                        </a>
                        <a href="#profil"
                            class="bg-slate-800/80 hover:bg-slate-800 text-slate-200 hover:text-white font-semibold px-8 py-3.5 rounded-xl border border-slate-700 backdrop-blur-md transition duration-200 text-center flex items-center justify-center gap-2">
                            Pelajari Selengkapnya
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- QUICK INFO / STATS SECTION -->
    <section class="bg-white py-12 border-b border-slate-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-6 text-center">
                <div class="p-6 rounded-2xl bg-slate-50 border border-slate-100 shadow-sm">
                    <h3 class="text-3xl font-extrabold text-emerald-700">500+</h3>
                    <p class="text-sm text-slate-600 mt-1">Santri Aktif</p>
                </div>
                <div class="p-6 rounded-2xl bg-slate-50 border border-slate-100 shadow-sm">
                    <h3 class="text-3xl font-extrabold text-emerald-700">30+</h3>
                    <p class="text-sm text-slate-600 mt-1">Ustadz / Ustadzah</p>
                </div>
                <div class="p-6 rounded-2xl bg-slate-50 border border-slate-100 shadow-sm">
                    <h3 class="text-3xl font-extrabold text-emerald-700">2</h3>
                    <p class="text-sm text-slate-600 mt-1">Program Unggulan</p>
                </div>
                <div class="p-6 rounded-2xl bg-slate-50 border border-slate-100 shadow-sm">
                    <h3 class="text-3xl font-extrabold text-emerald-700">15+</h3>
                    <p class="text-sm text-slate-600 mt-1">Ekstrakurikuler</p>
                </div>
            </div>
        </div>
    </section>

    <!-- TENTANG / PROFIL SINGKAT -->
    <section id="profil" class="py-20 bg-slate-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto mb-16 space-y-4">
                <h2 class="text-xs font-semibold text-emerald-600 uppercase tracking-widest">Mengenal Lebih Dekat</h2>
                <h3 class="text-3xl sm:text-4xl font-bold text-slate-900">Pusat Pendidikan Islam Berwawasan Global</h3>
                <p class="text-slate-600">
                    Pondok Pesantren Babul Hasanah hadir di Kabupaten Padang Lawas untuk memberikan fasilitas pendidikan
                    agama yang kokoh serta penguasaan sains dan teknologi.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="bg-white p-8 rounded-2xl shadow-sm border border-slate-200/60 hover:shadow-md transition">
                    <div
                        class="w-12 h-12 bg-emerald-100 text-emerald-700 rounded-xl flex items-center justify-center font-bold text-lg mb-6">
                        <i class="fa-solid fa-book-quran"></i>
                    </div>
                    <h4 class="text-xl font-bold text-slate-900 mb-3">Tahfidzul Qur'an</h4>
                    <p class="text-slate-600 text-sm leading-relaxed">
                        Program khusus hafalan Al-Qur'an dengan bimbingan intensif dan metode talaqqi yang teruji
                        menghasilkan hafizh dan hafizhah handal.
                    </p>
                </div>
                <div class="bg-white p-8 rounded-2xl shadow-sm border border-slate-200/60 hover:shadow-md transition">
                    <div
                        class="w-12 h-12 bg-emerald-100 text-emerald-700 rounded-xl flex items-center justify-center font-bold text-lg mb-6">
                        <i class="fa-solid fa-school"></i>
                    </div>
                    <h4 class="text-xl font-bold text-slate-900 mb-3">Kulliyatul Mu'allimin</h4>
                    <p class="text-slate-600 text-sm leading-relaxed">
                        Pendidikan formal tingkat MTs dan MA dengan kurikulum memadukan DEPAG, pesantren salafiyah, serta
                        penguasaan bahasa asing (Arab & Inggris).
                    </p>
                </div>
                <div class="bg-white p-8 rounded-2xl shadow-sm border border-slate-200/60 hover:shadow-md transition">
                    <div
                        class="w-12 h-12 bg-emerald-100 text-emerald-700 rounded-xl flex items-center justify-center font-bold text-lg mb-6">
                        <i class="fa-solid fa-laptop-code"></i>
                    </div>
                    <h4 class="text-xl font-bold text-slate-900 mb-3">Kemandirian & Teknologi</h4>
                    <p class="text-slate-600 text-sm leading-relaxed">
                        Membekali santri dengan kecakapan hidup (life skills), kewirausahaan, serta literasi digital guna
                        menghadapi tantangan zaman modern.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- CALL TO ACTION (CTA) PENDAFTARAN -->
    <section class="py-20 bg-emerald-900 text-white relative overflow-hidden">
        <div
            class="absolute inset-0 opacity-10 bg-[radial-gradient(#d1fae5_1px,transparent_1px)] [background-size:16px_16px]">
        </div>
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 text-center relative z-10 space-y-6">
            <h2 class="text-3xl sm:text-4xl font-extrabold tracking-tight">Mari Bergabung Bersama Keluarga Besar Babul
                Hasanah</h2>
            <p class="text-emerald-100 max-w-2xl mx-auto text-base sm:text-lg">
                Pendaftaran santri baru tahun ajaran baru telah dibuka. Daftarkan putra-putri Anda untuk mendapatkan
                pendidikan islami yang berkualitas.
            </p>
            <div class="pt-4 flex flex-col sm:flex-row justify-center gap-4">
                <a href="{{ route('pendaftaran.index') }}"
                    class="bg-white hover:bg-emerald-50 text-emerald-900 font-bold px-8 py-4 rounded-xl shadow-lg transition duration-200 flex items-center justify-center gap-2">
                    <i class="fa-solid fa-file-lines"></i> Formulir Pendaftaran Online
                </a>
                <a href="https://wa.me/" target="_blank"
                    class="bg-emerald-800 hover:bg-emerald-700 text-white border border-emerald-600 font-semibold px-8 py-4 rounded-xl transition duration-200 flex items-center justify-center gap-2">
                    <i class="fa-brands fa-whatsapp text-lg"></i> Hubungi Panitia (WhatsApp)
                </a>
            </div>
        </div>
    </section>

    <!-- BERITA & INFORMASI TERBARU -->
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row justify-between items-start md:items-end mb-12">
                <div>
                    <h2 class="text-xs font-semibold text-emerald-600 uppercase tracking-widest">Informasi & Kegiatan</h2>
                    <h3 class="text-3xl font-bold text-slate-900 mt-1">Berita Terbaru Pesantren</h3>
                </div>
                <a href="{{ route('berita.index') }}"
                    class="mt-4 md:mt-0 text-emerald-600 hover:text-emerald-700 font-semibold text-sm flex items-center gap-1">
                    Lihat Semua Berita <i class="fa-solid fa-arrow-right ml-1"></i>
                </a>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Loop Item Berita (Contoh Statis) -->
                <div class="bg-slate-50 border border-slate-200/60 rounded-2xl overflow-hidden shadow-sm flex flex-col">
                    <div class="h-48 bg-slate-200 flex items-center justify-center text-slate-400 font-medium">
                        [ Gambar Kegiatan ]
                    </div>
                    <div class="p-6 flex-1 flex flex-col justify-between">
                        <div>
                            <span class="text-xs font-semibold text-emerald-600 uppercase">Pengumuman</span>
                            <h4 class="text-lg font-bold text-slate-900 mt-2 mb-3">Pelaksanaan Ujian Semester Ganjil Santri
                                Babul Hasanah</h4>
                            <p class="text-slate-600 text-sm line-clamp-3">
                                Ujian akhir semester ganjil tahun ajaran ini resmi dibuka oleh pimpinan pondok dengan sistem
                                terpadu...
                            </p>
                        </div>
                        <div
                            class="pt-4 mt-4 border-t border-slate-200/60 flex items-center justify-between text-xs text-slate-500">
                            <span><i class="fa-regular fa-calendar mr-1"></i> 24 Agustus 2026</span>
                            <a href="#" class="text-emerald-600 font-semibold hover:underline">Baca Selengkapnya</a>
                        </div>
                    </div>
                </div>

                <div class="bg-slate-50 border border-slate-200/60 rounded-2xl overflow-hidden shadow-sm flex flex-col">
                    <div class="h-48 bg-slate-200 flex items-center justify-center text-slate-400 font-medium">
                        [ Gambar Kegiatan ]
                    </div>
                    <div class="p-6 flex-1 flex flex-col justify-between">
                        <div>
                            <span class="text-xs font-semibold text-emerald-600 uppercase">Prestasi</span>
                            <h4 class="text-lg font-bold text-slate-900 mt-2 mb-3">Santri Babul Hasanah Juara 1 Musabaqah
                                Tilawatil Qur'an</h4>
                            <p class="text-slate-600 text-sm line-clamp-3">
                                Kebanggaan kembali hadir setelah perwakilan santri berhasil menyabet juara pertama tingkat
                                Kabupaten Padang Lawas...
                            </p>
                        </div>
                        <div
                            class="pt-4 mt-4 border-t border-slate-200/60 flex items-center justify-between text-xs text-slate-500">
                            <span><i class="fa-regular fa-calendar mr-1"></i> 20 Agustus 2026</span>
                            <a href="#" class="text-emerald-600 font-semibold hover:underline">Baca Selengkapnya</a>
                        </div>
                    </div>
                </div>

                <div class="bg-slate-50 border border-slate-200/60 rounded-2xl overflow-hidden shadow-sm flex flex-col">
                    <div class="h-48 bg-slate-200 flex items-center justify-center text-slate-400 font-medium">
                        [ Gambar Kegiatan ]
                    </div>
                    <div class="p-6 flex-1 flex flex-col justify-between">
                        <div>
                            <span class="text-xs font-semibold text-emerald-600 uppercase">Kegiatan Pondok</span>
                            <h4 class="text-lg font-bold text-slate-900 mt-2 mb-3">Kajian Kitab Kuning Bulanan Bersama
                                Ulama Tamu</h4>
                            <p class="text-slate-600 text-sm line-clamp-3">
                                Kegiatan rutin pengajian kitab kuning penunjang pemahaman fiqih santri dilaksanakan di aula
                                utama pesantren...
                            </p>
                        </div>
                        <div
                            class="pt-4 mt-4 border-t border-slate-200/60 flex items-center justify-between text-xs text-slate-500">
                            <span><i class="fa-regular fa-calendar mr-1"></i> 15 Agustus 2026</span>
                            <a href="#" class="text-emerald-600 font-semibold hover:underline">Baca Selengkapnya</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
