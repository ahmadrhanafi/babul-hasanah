@extends('layouts.admin')

@section('content')
    <div class="space-y-5 pb-8" x-data="{ search: '' }">

        <!-- HEADER HALAMAN -->
        <div
            class="bg-white p-4 sm:p-6 rounded-2xl sm:rounded-3xl border border-slate-200/80 shadow-sm flex flex-col sm:flex-row sm:items-center justify-between gap-3">
            <div>
                <span
                    class="inline-block px-2.5 py-0.5 rounded-full bg-emerald-50 text-emerald-700 text-[10px] font-extrabold uppercase tracking-wider border border-emerald-500/20 mb-1">
                    Modul Seleksi
                </span>
                <h1 class="text-lg sm:text-2xl font-black text-slate-900 tracking-tight">Verifikasi PPDB</h1>
                <p class="text-xs text-slate-500 mt-0.5">Kelola dan verifikasi status calon santri masuk.</p>
            </div>
            <!-- Badge Total Data -->
            <div
                class="self-start sm:self-center bg-slate-900 text-white px-3.5 py-2 rounded-2xl text-xs font-bold shadow-sm flex items-center gap-2">
                <i class="fa-solid fa-users text-emerald-400"></i>
                <span>Total: {{ count($pendaftar) }} Pendaftar</span>
            </div>
        </div>

        @if (session('success'))
            <div
                class="bg-emerald-50 border border-emerald-200 text-emerald-800 px-4 py-3.5 rounded-2xl text-xs font-bold flex items-center gap-2.5 shadow-sm">
                <i class="fa-solid fa-circle-check text-emerald-600 text-sm"></i>
                <span>{{ session('success') }}</span>
            </div>
        @endif

        <!-- TOOLBAR LIVE SEARCH (Instan tanpa reload) -->
        <div class="bg-white p-3.5 sm:p-4 rounded-2xl sm:rounded-3xl border border-slate-200/80 shadow-sm">
            <div class="relative">
                <span class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none text-slate-400">
                    <i class="fa-solid fa-magnifying-glass text-xs"></i>
                </span>
                <input type="text" id="liveSearchInput" onkeyup="filterData()"
                    placeholder="Ketik nama santri atau no pendaftaran untuk mencari secara instan..."
                    class="w-full pl-10 pr-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-xs text-slate-800 placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-emerald-500/20 focus:border-emerald-500 transition">
            </div>
        </div>

        <!-- KONTEN UTAMA: DAFTAR PENDAFTAR -->
        <div
            class="bg-white rounded-2xl sm:rounded-3xl shadow-sm border border-slate-200/80 overflow-hidden p-4 sm:p-6 space-y-4">

            <!-- TAMPILAN MOBILE: KARTU BERTUMPUK -->
            <div class="space-y-3 sm:hidden" id="mobileListContainer">
                @forelse($pendaftar as $item)
                    <div class="p-4 rounded-2xl bg-slate-50/80 border border-slate-200/70 space-y-3.5 shadow-sm searchable-item"
                        data-keyword="{{ strtolower($item->nama_lengkap . ' ' . $item->no_pendaftaran . ' ' . $item->nik . ' ' . $item->jenjang_tujuan) }}">
                        <div class="flex items-center justify-between border-b border-slate-200/60 pb-2.5">
                            <span
                                class="font-mono font-bold text-emerald-700 text-xs bg-emerald-50 px-2.5 py-1 rounded-lg border border-emerald-500/20">
                                {{ $item->no_pendaftaran }}
                            </span>
                            <div>
                                @if ($item->status_pendaftaran == 'diterima')
                                    <span
                                        class="bg-emerald-100 text-emerald-800 text-[10px] font-bold px-2.5 py-1 rounded-full">Diterima</span>
                                @elseif($item->status_pendaftaran == 'ditolak')
                                    <span
                                        class="bg-rose-100 text-rose-800 text-[10px] font-bold px-2.5 py-1 rounded-full">Ditolak</span>
                                @else
                                    <span
                                        class="bg-amber-100 text-amber-800 text-[10px] font-bold px-2.5 py-1 rounded-full">Pending</span>
                                @endif
                            </div>
                        </div>

                        <div class="space-y-1">
                            <h3 class="text-sm font-black text-slate-900">{{ $item->nama_lengkap }}</h3>
                            <div class="text-[11px] text-slate-500 flex flex-wrap gap-x-3 gap-y-0.5">
                                <span><strong class="text-slate-700">NIK:</strong> {{ $item->nik }}</span>
                                <span>•</span>
                                <span><strong class="text-slate-700">Jenjang:</strong> {{ $item->jenjang_tujuan }}</span>
                            </div>
                            <div class="text-[11px] text-slate-500 pt-0.5">
                                <strong class="text-slate-700">Wali:</strong> {{ $item->nama_ortu_wali }}
                                ({{ $item->no_hp_ortu }})
                            </div>
                        </div>

                        <div class="pt-1">
                            @if ($item->status_pendaftaran == 'pending' || !$item->status_pendaftaran)
                                <form action="{{ route('admin.pendaftaran.update', $item->id) }}" method="POST"
                                    class="grid grid-cols-2 gap-2">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" name="status_pendaftaran" value="diterima"
                                        class="bg-emerald-600 hover:bg-emerald-700 active:scale-95 text-white py-2.5 rounded-xl text-xs font-bold transition flex items-center justify-center gap-1.5 shadow-sm">
                                        <i class="fa-solid fa-check"></i> Terima
                                    </button>
                                    <button type="submit" name="status_pendaftaran" value="ditolak"
                                        class="bg-rose-50 hover:bg-rose-100 active:scale-95 text-rose-700 border border-rose-200 py-2.5 rounded-xl text-xs font-bold transition flex items-center justify-center gap-1.5">
                                        <i class="fa-solid fa-xmark"></i> Tolak
                                    </button>
                                </form>
                            @else
                                <div
                                    class="text-center py-2 bg-slate-100 rounded-xl text-slate-400 text-xs font-medium italic">
                                    <i class="fa-solid fa-lock text-[10px] mr-1"></i> Selesai Diproses
                                </div>
                            @endif
                        </div>
                    </div>
                @empty
                    <div class="text-center py-12 text-slate-400 italic text-xs">
                        Belum ada data pendaftaran.
                    </div>
                @endforelse
            </div>

            <!-- TAMPILAN DESKTOP: TABEL KLASIK -->
            <div class="hidden sm:block overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr
                            class="bg-slate-50 border-b border-slate-200 text-[10px] font-extrabold text-slate-500 uppercase tracking-wider">
                            <th class="py-3 px-4 rounded-l-xl">No. Pendaftaran</th>
                            <th class="py-3 px-4">Nama Santri</th>
                            <th class="py-3 px-4">Jenjang Tujuan</th>
                            <th class="py-3 px-4">Wali / No HP</th>
                            <th class="py-3 px-4 text-center">Status</th>
                            <th class="py-3 px-4 text-center rounded-r-xl">Aksi Verifikasi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100 text-xs text-slate-700 font-medium" id="desktopTableBody">
                        @forelse($pendaftar as $item)
                            <tr class="hover:bg-slate-50/50 transition searchable-item"
                                data-keyword="{{ strtolower($item->nama_lengkap . ' ' . $item->no_pendaftaran . ' ' . $item->nik . ' ' . $item->jenjang_tujuan) }}">
                                <td class="py-3.5 px-4 font-mono font-bold text-emerald-700">{{ $item->no_pendaftaran }}
                                </td>
                                <td class="py-3.5 px-4">
                                    <div class="font-bold text-slate-900">{{ $item->nama_lengkap }}</div>
                                    <div class="text-[10px] font-normal text-slate-400">NIK: {{ $item->nik }}</div>
                                </td>
                                <td class="py-3.5 px-4 text-slate-700">{{ $item->jenjang_tujuan }}</td>
                                <td class="py-3.5 px-4">
                                    <div class="text-slate-900">{{ $item->nama_ortu_wali }}</div>
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
                                    @if ($item->status_pendaftaran == 'pending' || !$item->status_pendaftaran)
                                        <form action="{{ route('admin.pendaftaran.update', $item->id) }}" method="POST"
                                            class="inline-flex gap-1.5">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit" name="status_pendaftaran" value="diterima"
                                                class="bg-emerald-600 hover:bg-emerald-700 text-white px-3 py-1.5 rounded-lg text-xs font-bold transition shadow-sm">
                                                Terima
                                            </button>
                                            <button type="submit" name="status_pendaftaran" value="ditolak"
                                                class="bg-rose-600 hover:bg-rose-700 text-white px-3 py-1.5 rounded-lg text-xs font-bold transition shadow-sm">
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
                                <td colspan="6" class="text-center py-10 text-slate-400 italic">Belum ada data
                                    pendaftaran.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Pesan Kosong Jika Hasil Live Search Nihil -->
            <div id="noResultFound" class="hidden text-center py-12 text-slate-400 italic text-xs">
                <i class="fa-regular fa-face-frown text-2xl mb-2 block text-slate-300"></i>
                Data santri yang dicari tidak ditemukan.
            </div>

        </div>

        <!-- MODAL WHATSAPP -->
        @if (session('wa_link'))
            <div id="modalWa"
                class="fixed inset-0 z-50 flex items-center justify-center bg-slate-900/60 backdrop-blur-sm p-4 animate-fade-in">
                <div
                    class="bg-white rounded-3xl shadow-2xl border border-slate-100 max-w-sm w-full p-6 sm:p-8 space-y-5 text-center relative">
                    <div
                        class="mx-auto w-14 h-14 bg-emerald-100 text-emerald-600 rounded-2xl flex items-center justify-center text-2xl shadow-sm">
                        <i class="fa-brands fa-whatsapp"></i>
                    </div>
                    <div class="space-y-1.5">
                        <h3 class="text-base font-black text-slate-900">Akun Berhasil Dibuat!</h3>
                        <p class="text-xs text-slate-500 leading-relaxed">
                            Santri <span class="font-bold text-slate-800">"{{ session('nama_santri') }}"</span> telah
                            berstatus <span class="text-emerald-600 font-bold">Diterima</span>. Kirimkan detail akun ke
                            WhatsApp wali.
                        </p>
                    </div>
                    <div class="space-y-2 pt-1">
                        <a href="{{ session('wa_link') }}" target="_blank"
                            onclick="document.getElementById('modalWa').remove()"
                            class="w-full bg-emerald-600 hover:bg-emerald-700 active:scale-95 text-white font-black px-4 py-3 rounded-xl text-xs uppercase tracking-wider transition shadow-lg shadow-emerald-600/20 flex items-center justify-center gap-2">
                            <i class="fa-brands fa-whatsapp text-sm"></i> Buka WhatsApp Sekarang
                        </a>
                        <button type="button" onclick="document.getElementById('modalWa').remove()"
                            class="w-full bg-slate-100 hover:bg-slate-200 text-slate-700 font-bold px-4 py-2.5 rounded-xl text-xs transition">
                            Tutup / Nanti Saja
                        </button>
                    </div>
                </div>
            </div>
        @endif

    </div>

    <!-- SCRIPT LIVE SEARCH INSTAN -->
    <script>
        function filterData() {
            let input = document.getElementById('liveSearchInput').value.toLowerCase();
            let items = document.querySelectorAll('.searchable-item');
            let foundCount = 0;

            items.forEach(item => {
                let keyword = item.getAttribute('data-keyword');
                if (keyword.includes(input)) {
                    item.style.display = "";
                    foundCount++;
                } else {
                    item.style.display = "none";
                }
            });

            // Tampilkan pesan jika tidak ada yang cocok
            let noResult = document.getElementById('noResultFound');
            if (foundCount === 0 && items.length > 0) {
                noResult.classList.remove('hidden');
            } else {
                noResult.classList.add('hidden');
            }
        }
    </script>
@endsection
