@extends('layouts.admin')

@section('title', 'Kelola Absensi Kegiatan - Pondok Pesantren Babul Hasanah')

@section('content')
    <div class="space-y-6">
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
            <div>
                <a href="{{ route('admin.kegiatan.index') }}"
                    class="text-xs text-emerald-600 dark:text-emerald-400 font-bold hover:underline mb-1 inline-flex items-center gap-1.5">
                    <i class="fa-solid fa-arrow-left"></i> Kembali ke Daftar Kegiatan
                </a>
                <h2 class="text-xl font-black text-slate-900 dark:text-white">Absensi: {{ $kegiatan->nama_kegiatan }}</h2>
                <p class="text-xs text-slate-500 dark:text-slate-400">Tanggal:
                    {{ \Carbon\Carbon::parse($kegiatan->tanggal)->format('d M Y') }}</p>
            </div>
        </div>

        @if (session('success'))
            <div
                class="p-4 bg-emerald-50 dark:bg-emerald-950/50 border border-emerald-200 dark:border-emerald-800 text-emerald-700 dark:text-emerald-400 rounded-2xl text-xs font-bold">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('admin.kegiatan.absensi.store', $kegiatan->id) }}" method="POST">
            @csrf
            <div
                class="bg-white dark:bg-slate-900 rounded-3xl border border-slate-100 dark:border-slate-800 shadow-sm overflow-hidden transition-colors duration-300 mb-6">
                <div class="overflow-x-auto custom-scrollbar">
                    <table class="w-full text-left border-collapse text-xs">
                        <thead>
                            <tr
                                class="bg-slate-50 dark:bg-slate-800/50 text-slate-400 dark:text-slate-400 uppercase text-[10px] tracking-wider border-b border-slate-100 dark:border-slate-800">
                                <th class="py-3 px-6 font-extrabold w-16">No</th>
                                <th class="py-3 px-6 font-extrabold">Nama Santri</th>
                                <th class="py-3 px-6 font-extrabold w-48">Status Kehadiran</th>
                                <th class="py-3 px-6 font-extrabold">Keterangan</th>
                            </tr>
                        </thead>
                        <tbody
                            class="divide-y divide-slate-100 dark:divide-slate-800 text-slate-700 dark:text-slate-300 font-medium">
                            @forelse($santri as $index => $s)
                                @php
                                    $currentAbsensi = $absensiList[$s->id] ?? null;
                                    $status = $currentAbsensi ? $currentAbsensi->status_kehadiran : 'hadir';
                                    $ket = $currentAbsensi ? $currentAbsensi->keterangan : '';
                                @endphp
                                <tr class="hover:bg-slate-50/50 dark:hover:bg-slate-800/35 transition">
                                    <td class="py-4 px-6 text-slate-400 font-bold">{{ $index + 1 }}</td>
                                    <td class="py-4 px-6 font-black text-slate-900 dark:text-white">
                                        {{ $s->nama_lengkap ?? $s->name }}</td>
                                    <td class="py-4 px-6">
                                        <select name="status_kehadiran[{{ $s->id }}]"
                                            class="w-full px-3 py-1.5 rounded-xl border border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-800 text-xs font-bold text-slate-700 dark:text-slate-200 outline-none focus:ring-2 focus:ring-emerald-600 transition">
                                            <option value="hadir" {{ $status == 'hadir' ? 'selected' : '' }}>Hadir</option>
                                            <option value="izin" {{ $status == 'izin' ? 'selected' : '' }}>Izin</option>
                                            <option value="sakit" {{ $status == 'sakit' ? 'selected' : '' }}>Sakit
                                            </option>
                                            <option value="alpa" {{ $status == 'alpa' ? 'selected' : '' }}>Alpa</option>
                                        </select>
                                    </td>
                                    <td class="py-4 px-6">
                                        <input type="text" name="keterangan[{{ $s->id }}]"
                                            value="{{ $ket }}" placeholder="Catatan tambahan (opsional)"
                                            class="w-full px-3 py-1.5 rounded-xl border border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-800 text-xs text-slate-700 dark:text-slate-200 outline-none focus:ring-2 focus:ring-emerald-600 transition">
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="py-8 text-center text-slate-400 text-xs">Belum ada data santri
                                        yang terdaftar di database.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="flex justify-end">
                <button type="submit"
                    class="bg-emerald-600 hover:bg-emerald-700 text-white text-xs font-bold px-6 py-3 rounded-xl transition flex items-center gap-2 shadow-sm">
                    <i class="fa-solid fa-save"></i> Simpan Semua Absensi
                </button>
            </div>
        </form>
    </div>
@endsection
