@extends('layouts.admin')

@section('title', 'Data Santri - Pondok Pesantren Babul Hasanah')

@section('content')
    <div class="space-y-6">
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
            <div>
                <h2 class="text-xl font-black text-slate-900 dark:text-white">Manajemen Data Santri</h2>
                <p class="text-xs text-slate-500 dark:text-slate-400">Kelola informasi data santri aktif Pondok Pesantren
                    Babul Hasanah dari semua jenjang.</p>
            </div>
            <div>
                <a href="#"
                    class="bg-emerald-600 hover:bg-emerald-700 text-white text-xs font-bold px-4 py-2.5 rounded-xl transition flex items-center gap-2 shadow-sm">
                    <i class="fa-solid fa-plus"></i> Tambah Santri Baru
                </a>
            </div>
        </div>

        <div
            class="bg-white dark:bg-slate-900 rounded-3xl border border-slate-100 dark:border-slate-800 shadow-sm overflow-hidden transition-colors duration-300">
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse text-xs">
                    <thead>
                        <tr
                            class="bg-slate-50 dark:bg-slate-800/50 text-slate-400 dark:text-slate-400 uppercase text-[10px] tracking-wider border-b border-slate-100 dark:border-slate-800">
                            <th class="py-3 px-6 font-extrabold">No. Induk / Nama</th>
                            <th class="py-3 px-6 font-extrabold">Jenjang & Kelas</th>
                            <th class="py-3 px-6 font-extrabold">Nama Wali</th>
                            <th class="py-3 px-6 font-extrabold">Alamat</th>
                            <th class="py-3 px-6 font-extrabold text-right">Aksi</th>
                        </tr>
                    </thead>
                    <tbody
                        class="divide-y divide-slate-100 dark:divide-slate-800 text-slate-700 dark:text-slate-300 font-medium">
                        @forelse($santris as $santri)
                            <tr class="hover:bg-slate-50/50 dark:hover:bg-slate-800/30 transition">
                                <td class="py-4 px-6">
                                    <div class="font-black text-slate-900 dark:text-white">{{ $santri->nama_lengkap }}</div>
                                    <div class="text-[10px] text-slate-400">NI: {{ $santri->nomor_induk ?? '-' }}</div>
                                </td>
                                <td class="py-4 px-6">
                                    <span
                                        class="px-2.5 py-1 bg-emerald-50 dark:bg-emerald-950/50 text-emerald-700 dark:text-emerald-400 rounded-lg text-[10px] font-bold">
                                        {{ $santri->jenjang_pendidikan }} - {{ $santri->kelas ?? '-' }}
                                    </span>
                                </td>
                                <td class="py-4 px-6 text-slate-600 dark:text-slate-400">
                                    {{ $santri->nama_wali ?? '-' }}
                                </td>
                                <td class="py-4 px-6 text-slate-600 dark:text-slate-400 max-w-xs truncate">
                                    {{ $santri->alamat ?? '-' }}
                                </td>
                                <td class="py-4 px-6 text-right space-x-1">
                                    <button
                                        class="px-2.5 py-1 bg-sky-50 dark:bg-sky-950/50 text-sky-600 hover:bg-sky-100 rounded-lg text-[10px] font-bold transition">Detail</button>
                                    <button
                                        class="px-2.5 py-1 bg-amber-50 dark:bg-amber-950/50 text-amber-600 hover:bg-amber-100 rounded-lg text-[10px] font-bold transition">Edit</button>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="py-8 text-center text-slate-400 text-xs">Belum ada data santri
                                    yang tersimpan di database.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            @if (method_exists($santris, 'links'))
                <div class="p-4 border-t border-slate-100 dark:border-slate-800">
                    {{ $santris->links() }}
                </div>
            @endif
        </div>
    </div>
@endsection
