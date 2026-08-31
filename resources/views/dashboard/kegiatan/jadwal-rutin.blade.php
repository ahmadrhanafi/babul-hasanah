@extends('layouts.admin')

@section('title', 'Master Jadwal Rutin Mingguan - Pondok Pesantren Babul Hasanah')

@section('content')
    <div class="space-y-6">
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
            <div>
                <a href="{{ route('admin.kegiatan.index') }}"
                    class="text-xs text-emerald-600 dark:text-emerald-400 font-bold hover:underline mb-1 inline-flex items-center gap-1.5">
                    <i class="fa-solid fa-arrow-left"></i> Kembali ke Daftar Kegiatan Harian
                </a>
                <h2 class="text-xl font-black text-slate-900 dark:text-white">Master Jadwal Rutin Mingguan</h2>
                <p class="text-xs text-slate-500 dark:text-slate-400">Atur cetak biru kegiatan otomatis yang berulang setiap
                    minggunya.</p>
            </div>
            <div>
                <button onclick="document.getElementById('modalTambahJadwal').classList.remove('hidden')"
                    class="bg-emerald-600 hover:bg-emerald-700 text-white text-xs font-bold px-4 py-2.5 rounded-xl transition flex items-center gap-2 shadow-sm">
                    <i class="fa-solid fa-plus"></i> Tambah Jadwal Rutin
                </button>
            </div>
        </div>

        @if (session('success'))
            <div
                class="p-4 bg-emerald-50 dark:bg-emerald-950/50 border border-emerald-200 dark:border-emerald-800 text-emerald-700 dark:text-emerald-400 rounded-2xl text-xs font-bold">
                {{ session('success') }}
            </div>
        @endif

        @php
            $daftarHari = ['senin', 'selasa', 'rabu', 'kamis', 'jumat', 'sabtu', 'minggu'];
        @endphp

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($daftarHari as $hari)
                @php
                    $kegiatanHariIni = $jadwalList[$hari] ?? collect();
                @endphp
                <div
                    class="bg-white dark:bg-slate-900 rounded-3xl border border-slate-100 dark:border-slate-800 shadow-sm p-5 flex flex-col justify-between">
                    <div>
                        <div
                            class="flex justify-between items-center mb-4 pb-3 border-b border-slate-100 dark:border-slate-800">
                            <h3 class="text-sm font-black text-slate-900 dark:text-white uppercase tracking-wider">
                                {{ $hari }}</h3>
                            <span
                                class="px-2.5 py-0.5 bg-slate-100 dark:bg-slate-800 text-slate-600 dark:text-slate-300 rounded-lg text-[10px] font-bold">
                                {{ $kegiatanHariIni->count() }} Kegiatan
                            </span>
                        </div>

                        <div class="space-y-3">
                            @forelse($kegiatanHariIni as $j)
                                <div
                                    class="p-3 rounded-2xl bg-slate-50 dark:bg-slate-800/40 border border-slate-100 dark:border-slate-800/80 flex justify-between items-start gap-2">
                                    <div>
                                        <h4 class="text-xs font-black text-slate-800 dark:text-slate-200">
                                            {{ $j->nama_kegiatan }}</h4>
                                        <span
                                            class="inline-block mt-1 px-2 py-0.5 bg-emerald-50 dark:bg-emerald-950/40 text-emerald-700 dark:text-emerald-400 rounded text-[9px] font-bold capitalize">
                                            {{ $j->kategori }}
                                        </span>
                                        @if ($j->waktu_mulai)
                                            <p class="text-[10px] text-slate-400 mt-1"><i class="fa-regular fa-clock"></i>
                                                {{ $j->waktu_mulai }} - {{ $j->waktu_selesai ?? 'Selesai' }}</p>
                                        @endif
                                    </div>
                                    <form action="{{ route('admin.jadwal-rutin.destroy', $j->id) }}" method="POST"
                                        onsubmit="return confirm('Hapus jadwal rutin ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="text-slate-400 hover:text-rose-600 transition text-xs p-1">
                                            <i class="fa-solid fa-trash-can"></i>
                                        </button>
                                    </form>
                                </div>
                            @empty
                                <p class="text-xs text-slate-400 text-center py-4 italic">Belum ada jadwal rutin di hari
                                    {{ $hari }}.</p>
                            @endforelse
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <!-- Modal Tambah Jadwal Rutin -->
    <div id="modalTambahJadwal"
        class="fixed inset-0 bg-slate-900/50 backdrop-blur-sm hidden flex items-center justify-center p-4 z-50">
        <div
            class="bg-white dark:bg-slate-900 rounded-3xl max-w-lg w-full p-6 shadow-xl border border-slate-100 dark:border-slate-800">
            <h3 class="text-base font-bold text-slate-900 dark:text-white mb-4">Tambah Jadwal Rutin Baru</h3>
            <form action="{{ route('admin.jadwal-rutin.store') }}" method="POST" class="space-y-4">
                @csrf
                <div>
                    <label class="block text-xs font-bold text-slate-700 dark:text-slate-300 mb-1">Hari</label>
                    <select name="hari"
                        class="w-full px-3.5 py-2.5 rounded-xl border border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-800 text-xs text-slate-800 dark:text-slate-200 focus:ring-2 focus:ring-emerald-600 outline-none capitalize">
                        @foreach ($daftarHari as $h)
                            <option value="{{ $h }}">{{ ucfirst($h) }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label class="block text-xs font-bold text-slate-700 dark:text-slate-300 mb-1">Nama Kegiatan</label>
                    <input type="text" name="nama_kegiatan" required placeholder="Contoh: Shalat Subuh Berjamaah"
                        class="w-full px-3.5 py-2.5 rounded-xl border border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-800 text-xs text-slate-800 dark:text-slate-200 focus:ring-2 focus:ring-emerald-600 outline-none">
                </div>
                <div>
                    <label class="block text-xs font-bold text-slate-700 dark:text-slate-300 mb-1">Kategori</label>
                    <select name="kategori"
                        class="w-full px-3.5 py-2.5 rounded-xl border border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-800 text-xs text-slate-800 dark:text-slate-200 focus:ring-2 focus:ring-emerald-600 outline-none">
                        <option value="pengajaran">Pengajaran Kitab Kuning</option>
                        <option value="ibadah">Ibadah Berjamaah & Wirid</option>
                        <option value="ekstrakurikuler">Ekstrakurikuler & Seni</option>
                        <option value="keorganisasian">Keorganisasian & Muhadharah</option>
                    </select>
                </div>
                <div class="grid grid-cols-2 gap-3">
                    <div>
                        <label class="block text-xs font-bold text-slate-700 dark:text-slate-300 mb-1">Waktu Mulai
                            (Opsional)</label>
                        <input type="time" name="waktu_mulai"
                            class="w-full px-3.5 py-2.5 rounded-xl border border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-800 text-xs text-slate-800 dark:text-slate-200 focus:ring-2 focus:ring-emerald-600 outline-none">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-slate-700 dark:text-slate-300 mb-1">Waktu Selesai
                            (Opsional)</label>
                        <input type="time" name="waktu_selesai"
                            class="w-full px-3.5 py-2.5 rounded-xl border border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-800 text-xs text-slate-800 dark:text-slate-200 focus:ring-2 focus:ring-emerald-600 outline-none">
                    </div>
                </div>
                <div>
                    <label class="block text-xs font-bold text-slate-700 dark:text-slate-300 mb-1">Deskripsi
                        (Opsional)</label>
                    <textarea name="deskripsi" rows="2"
                        class="w-full px-3.5 py-2.5 rounded-xl border border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-800 text-xs text-slate-800 dark:text-slate-200 focus:ring-2 focus:ring-emerald-600 outline-none"></textarea>
                </div>
                <div class="flex justify-end gap-2 pt-2">
                    <button type="button" onclick="document.getElementById('modalTambahJadwal').classList.add('hidden')"
                        class="px-4 py-2 bg-slate-100 dark:bg-slate-800 hover:bg-slate-200 text-slate-600 dark:text-slate-300 rounded-xl text-xs font-bold transition">
                        Batal
                    </button>
                    <button type="submit"
                        class="px-4 py-2 bg-emerald-600 hover:bg-emerald-700 text-white rounded-xl text-xs font-bold transition">
                        Simpan Jadwal
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
