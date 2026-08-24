@extends('layouts.admin')

@section('content')
    <div class="space-y-6">
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-xl font-black text-slate-900">Verifikasi Pendaftaran Online (PPDB)</h1>
                <p class="text-xs text-slate-500">Kelola dan verifikasi status calon santri yang mendaftar melalui website.
                </p>
            </div>
        </div>

        @if (session('success'))
            <div class="bg-emerald-50 border border-emerald-200 text-emerald-800 px-4 py-3 rounded-xl text-xs font-bold">
                {{ session('success') }}
            </div>
        @endif

        <!-- Tabel Data Pendaftar -->
        <div class="bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr
                            class="bg-slate-50 border-b border-slate-200 text-[10px] font-extrabold text-slate-500 uppercase tracking-wider">
                            <th class="py-3 px-4">No. Pendaftaran</th>
                            <th class="py-3 px-4">Nama Santri</th>
                            <th class="py-3 px-4">Jenjang Tujuan</th>
                            <th class="py-3 px-4">Wali / No HP</th>
                            <th class="py-3 px-4 text-center">Status</th>
                            <th class="py-3 px-4 text-center">Aksi Verifikasi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100 text-xs text-slate-700">
                        @forelse($pendaftar as $item)
                            <tr class="hover:bg-slate-50/50">
                                <td class="py-3.5 px-4 font-mono font-bold text-emerald-700">{{ $item->no_pendaftaran }}
                                </td>
                                <td class="py-3.5 px-4 font-bold text-slate-900">
                                    {{ $item->nama_lengkap }}
                                    <div class="text-[10px] font-normal text-slate-400">NIK: {{ $item->nik }}</div>
                                </td>
                                <td class="py-3.5 px-4 font-medium">{{ $item->jenjang_tujuan }}</td>
                                <td class="py-3.5 px-4">
                                    {{ $item->nama_ortu_wali }}
                                    <div class="text-[10px] text-slate-400">{{ $item->no_hp_ortu }}</div>
                                </td>
                                <td class="py-3.5 px-4 text-center">
                                    @if ($item->status_pendaftaran == 'diterima')
                                        <span
                                            class="bg-emerald-100 text-emerald-800 text-xs font-bold px-3 py-1 rounded-full">Diterima</span>
                                    @elseif($item->status_pendaftaran == 'ditolak')
                                        <span
                                            class="bg-rose-100 text-rose-800 text-xs font-bold px-3 py-1 rounded-full">Ditolak</span>
                                    @else
                                        <span
                                            class="bg-amber-100 text-amber-800 text-xs font-bold px-3 py-1 rounded-full">Pending</span>
                                    @endif
                                </td>
                                <td class="py-3.5 px-4 text-center">
                                    <!-- Tombol Aksi: Hanya tampilkan form ubah status jika BELUM diterima/ditolak -->
                                    @if ($item->status_pendaftaran == 'pending' || !$item->status_pendaftaran)
                                        <form action="{{ route('admin.pendaftaran.update', $item->id) }}" method="POST"
                                            class="inline-flex gap-2">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit" name="status_pendaftaran" value="diterima"
                                                class="bg-emerald-600 hover:bg-emerald-700 text-white px-3 py-1.5 rounded-lg text-xs font-bold transition">
                                                Terima
                                            </button>
                                            <button type="submit" name="status_pendaftaran" value="ditolak"
                                                class="bg-rose-600 hover:bg-rose-700 text-white px-3 py-1.5 rounded-lg text-xs font-bold transition">
                                                Tolak
                                            </button>
                                        </form>
                                    @else
                                        <span class="text-slate-400 text-xs italic">Selesai diproses</span>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center py-8 text-slate-400 italic">Belum ada data pendaftaran
                                    online.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <!-- MODAL POP-UP KIRIM WHATSAPP -->
        @if (session('wa_link'))
            <div id="modalWa"
                class="fixed inset-0 z-50 flex items-center justify-center bg-slate-900/60 backdrop-blur-sm p-4 animate-fade-in">

                <div
                    class="bg-white rounded-3xl shadow-2xl border border-slate-100 max-w-md w-full p-6 sm:p-8 space-y-6 text-center relative transform transition-all">

                    <!-- Icon WhatsApp Animasi / Badge -->
                    <div
                        class="mx-auto w-16 h-16 bg-emerald-100 text-emerald-600 rounded-2xl flex items-center justify-center text-3xl shadow-sm">
                        <i class="fa-brands fa-whatsapp"></i>
                    </div>

                    <!-- Teks Informasi -->
                    <div class="space-y-2">
                        <h3 class="text-lg font-black text-slate-900">Akun Berhasil Dibuat!</h3>
                        <p class="text-xs text-slate-500 leading-relaxed">
                            Status santri <span class="font-bold text-slate-800">"{{ session('nama_santri') }}"</span> telah
                            diubah menjadi <span class="text-emerald-600 font-bold">Diterima</span>. Silakan kirimkan
                            informasi kredensial akun portal ke WhatsApp orang tua/wali.
                        </p>
                    </div>

                    <!-- Kotak Preview Singkat / Catatan -->
                    <div
                        class="bg-slate-50 rounded-2xl p-4 text-left border border-slate-200/60 text-xs space-y-1.5 text-slate-600">
                        <p class="font-bold text-slate-700 flex items-center gap-1.5">
                            <i class="fa-solid fa-circle-info text-emerald-600"></i> Informasi Pengiriman:
                        </p>
                        <p>• Pesan otomatis sudah dirancang oleh sistem.</p>
                        <p>• Klik tombol di bawah untuk membuka WhatsApp Web.</p>
                    </div>

                    <!-- Tombol Aksi -->
                    <div class="flex flex-col sm:flex-row gap-3 pt-2">
                        <a href="{{ session('wa_link') }}" target="_blank"
                            onclick="document.getElementById('modalWa').remove()"
                            class="flex-1 bg-emerald-600 hover:bg-emerald-700 text-white font-black px-5 py-3 rounded-xl text-xs uppercase tracking-wider transition duration-300 shadow-lg shadow-emerald-600/20 flex items-center justify-center gap-2">
                            <i class="fa-brands fa-whatsapp text-sm"></i> Kirim WhatsApp Sekarang
                        </a>

                        <button type="button" onclick="document.getElementById('modalWa').remove()"
                            class="bg-slate-100 hover:bg-slate-200 text-slate-700 font-bold px-5 py-3 rounded-xl text-xs transition">
                            Tutup
                        </button>
                    </div>

                </div>
            </div>
        @endif
    </div>
@endsection
