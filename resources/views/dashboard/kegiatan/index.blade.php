@extends('layouts.admin')

@section('title', 'Manajemen Kegiatan Santri - Pondok Pesantren Babul Hasanah')

@section('content')
    <div class="space-y-6">
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
            <div>
                <h2 class="text-xl font-black text-slate-900 dark:text-white">Kegiatan & Aktivitas Santri</h2>
                <p class="text-xs text-slate-500 dark:text-slate-400">Kelola jadwal kegiatan dan pemantauan absensi harian
                    santri.</p>
            </div>
            <div>
                <button onclick="document.getElementById('modalTambahKegiatan').classList.remove('hidden')"
                    class="bg-emerald-600 hover:bg-emerald-700 text-white text-xs font-bold px-4 py-2.5 rounded-xl transition flex items-center gap-2 shadow-sm">
                    <i class="fa-solid fa-plus"></i> Tambah Kegiatan
                </button>
            </div>
        </div>

        @if (session('success'))
            <div
                class="p-4 bg-emerald-50 dark:bg-emerald-950/50 border border-emerald-200 dark:border-emerald-800 text-emerald-700 dark:text-emerald-400 rounded-2xl text-xs font-bold">
                {{ session('success') }}
            </div>
        @endif

        <div
            class="bg-white dark:bg-slate-900 rounded-3xl border border-slate-100 dark:border-slate-800 shadow-sm overflow-hidden transition-colors duration-300">
            <div class="overflow-x-auto custom-scrollbar">
                <table class="w-full text-left border-collapse text-xs">
                    <thead>
                        <tr
                            class="bg-slate-50 dark:bg-slate-800/50 text-slate-400 dark:text-slate-400 uppercase text-[10px] tracking-wider border-b border-slate-100 dark:border-slate-800">
                            <th class="py-3 px-6 font-extrabold">No</th>
                            <th class="py-3 px-6 font-extrabold">Nama Kegiatan</th>
                            <th class="py-3 px-6 font-extrabold">Kategori</th>
                            <th class="py-3 px-6 font-extrabold">Tanggal & Waktu</th>
                            <th class="py-3 px-6 font-extrabold text-center">Absensi Tercatat</th>
                            <th class="py-3 px-6 font-extrabold text-right">Aksi</th>
                        </tr>
                    </thead>
                    <tbody
                        class="divide-y divide-slate-100 dark:divide-slate-800 text-slate-700 dark:text-slate-300 font-medium">
                        @forelse($kegiatan as $index => $item)
                            <tr class="hover:bg-slate-50/50 dark:hover:bg-slate-800/30 transition">
                                <td class="py-4 px-6 text-slate-400 font-bold">{{ $index + 1 }}</td>
                                <td class="py-4 px-6 font-black text-slate-900 dark:text-white">{{ $item->nama_kegiatan }}
                                </td>
                                <td class="py-4 px-6">
                                    <span
                                        class="px-2.5 py-1 bg-slate-100 dark:bg-slate-800 text-slate-600 dark:text-slate-300 rounded-lg text-[10px] font-bold capitalize">
                                        {{ $item->kategori }}
                                    </span>
                                </td>
                                <td class="py-4 px-6 text-slate-500 dark:text-slate-400">
                                    {{ \Carbon\Carbon::parse($item->tanggal)->format('d M Y') }}
                                    @if ($item->waktu_mulai)
                                        <span class="block text-[10px] text-slate-400">({{ $item->waktu_mulai }} -
                                            {{ $item->waktu_selesai ?? 'Selesai' }})</span>
                                    @endif
                                </td>
                                <td class="py-4 px-6 text-center font-bold text-emerald-600 dark:text-emerald-400">
                                    {{ $item->absensi_count }} Santri
                                </td>
                                <td class="py-4 px-6 text-right">
                                    <a href="{{ route('admin.kegiatan.absensi', $item->id) }}"
                                        class="px-3 py-1.5 bg-sky-50 dark:bg-sky-950/50 text-sky-700 dark:text-sky-400 hover:bg-sky-100 rounded-xl text-[10px] font-bold transition">
                                        Kelola Absen
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="py-8 text-center text-slate-400 text-xs">Belum ada data kegiatan
                                    pesantren.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Modal Tambah Kegiatan -->
    <div id="modalTambahKegiatan"
        class="fixed inset-0 bg-slate-900/50 backdrop-blur-sm hidden flex items-center justify-center p-4 z-50">
        <div
            class="bg-white dark:bg-slate-900 rounded-3xl max-w-lg w-full p-6 shadow-xl border border-slate-100 dark:border-slate-800">
            <h3 class="text-base font-bold text-slate-900 dark:text-white mb-4">Tambah Kegiatan Baru</h3>
            <form action="{{ route('admin.kegiatan.store') }}" method="POST" class="space-y-4">
                @csrf
                <div>
                    <label class="block text-xs font-bold text-slate-700 dark:text-slate-300 mb-1">Nama Kegiatan</label>
                    <input type="text" name="nama_kegiatan" required placeholder="Contoh: Sorogan Kitab Fathul Qarib"
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
                <div>
                    <label class="block text-xs font-bold text-slate-700 dark:text-slate-300 mb-1">Tanggal</label>
                    <input type="date" name="tanggal" required
                        class="w-full px-3.5 py-2.5 rounded-xl border border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-800 text-xs text-slate-800 dark:text-slate-200 focus:ring-2 focus:ring-emerald-600 outline-none">
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
                    <button type="button" onclick="document.getElementById('modalTambahKegiatan').classList.add('hidden')"
                        class="px-4 py-2 bg-slate-100 dark:bg-slate-800 hover:bg-slate-200 text-slate-600 dark:text-slate-300 rounded-xl text-xs font-bold transition">
                        Batal
                    </button>
                    <button type="submit"
                        class="px-4 py-2 bg-emerald-600 hover:bg-emerald-700 text-white rounded-xl text-xs font-bold transition">
                        Simpan Kegiatan
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
