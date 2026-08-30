<!-- OVERLAY SIDEBAR MOBILE (Background gelap saat sidebar mobile terbuka) -->
<div x-show="sidebarOpen" @click="sidebarOpen = false"
    class="fixed inset-0 z-40 bg-slate-900/60 backdrop-blur-sm md:hidden" x-transition.opacity></div>

<!-- SIDEBAR (Desktop & Mobile Drawer dengan Backdrop & Custom Scrollbar Tipis) -->
<div x-show="sidebarOpen" x-transition.opacity.duration.300ms @click="sidebarOpen = false"
    class="fixed inset-0 z-40 bg-slate-900/60 backdrop-blur-sm md:hidden" style="display: none;">
</div>

<aside :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'"
    class="fixed inset-y-0 left-0 z-50 w-64 bg-slate-900 text-slate-300 flex flex-col justify-between border-r border-slate-800 transition-transform duration-300 ease-in-out md:translate-x-0 md:static shadow-2xl md:shadow-none">

    <!-- Bagian Atas: Logo & Tombol Close Mobile -->
    <div>
        <div class="h-20 flex items-center justify-between px-6 border-b border-slate-800">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 flex items-center justify-center font-black">
                    <img src="{{ asset('assets/img/logo/logo.png') }}" alt="Logo Babul Hasanah"
                        class="w-full h-full object-contain">
                </div>
                <div>
                    <span class="block text-white font-black text-sm tracking-wide">Babul Hasanah</span>
                    <span class="block text-[10px] text-emerald-400 font-semibold uppercase tracking-wider">Panel
                        Dashboard</span>
                </div>
            </div>
            <!-- Tombol Close Sidebar Khusus Mobile -->
            <button @click="sidebarOpen = false"
                class="md:hidden text-slate-400 hover:text-white p-2 rounded-xl hover:bg-slate-800 transition">
                <i class="fa-solid fa-xmark text-lg"></i>
            </button>
        </div>

        <!-- Daftar Menu Navigasi dengan Scrollbar Tipis Custom -->
        <div
            class="p-4 space-y-1.5 overflow-y-auto max-h-[calc(100vh-13rem)] [&::-webkit-scrollbar]:w-1.5 [&::-webkit-scrollbar-track]:bg-transparent [&::-webkit-scrollbar-thumb]:bg-slate-800 [&::-webkit-scrollbar-thumb]:rounded-full hover:[&::-webkit-scrollbar-thumb]:bg-slate-700">

            <p class="px-3 text-[10px] font-bold text-slate-500 uppercase tracking-wider mb-2">Ringkasan</p>
            <a href="{{ route('admin.dashboard') }}" @click="sidebarOpen = false"
                class="flex items-center gap-3 px-4 py-3 rounded-xl {{ request()->routeIs('admin.dashboard') ? 'bg-emerald-600 text-white shadow-lg shadow-emerald-900/50' : 'hover:bg-slate-800 text-slate-400' }} font-semibold text-xs transition">
                <i class="fa-solid fa-chart-pie w-5 text-sm"></i>
                <span>DASHBOARD</span>
            </a>

            <!-- MENU UTAMA DENGAN DROPDOWN (ACCORDION) -->
            <div class="pt-3" x-data="{ open: {{ request()->routeIs('admin.pendaftaran.*') || request()->routeIs('admin.santri.*') ? 'true' : 'false' }} }">

                <button @click="open = !open"
                    class="w-full flex items-center justify-between px-4 py-3 rounded-xl text-xs font-bold uppercase tracking-wider text-slate-400 hover:bg-slate-800 transition">
                    <div class="flex items-center gap-3">
                        <i class="fa-solid fa-address-card w-5 text-sm"></i>
                        <span>Menu Utama</span>
                    </div>
                    <i class="fa-solid fa-chevron-down text-[10px] transition-transform duration-200"
                        :class="open ? 'rotate-180 text-emerald-400' : ''"></i>
                </button>

                <!-- Sub-menu Dropdown -->
                <div x-show="open" x-collapse class="pl-4 pt-1.5 space-y-1 border-l border-slate-800 ml-4">
                    <a href="{{ route('admin.pendaftaran.index') }}" @click="sidebarOpen = false"
                        class="flex items-center gap-3 px-3 py-2.5 rounded-xl {{ request()->routeIs('admin.pendaftaran.*') ? 'bg-emerald-600/20 text-emerald-400 font-bold' : 'hover:bg-slate-800 text-slate-400' }} text-xs transition">
                        <i class="fas fa-address-book w-4 text-xs"></i>
                        <span>Pendaftaran</span>
                    </a>

                    <a href="{{ route('admin.santri.index') }}" @click="sidebarOpen = false"
                        class="flex items-center gap-3 px-3 py-2.5 rounded-xl {{ request()->routeIs('admin.santri.*') && !request()->routeIs('admin.pengguna.*') ? 'bg-emerald-600/20 text-emerald-400 font-bold' : 'hover:bg-slate-800 text-slate-400' }} text-xs transition">
                        <i class="fa-solid fa-people-group w-4 text-xs"></i>
                        <span>Data Santri</span>
                    </a>

                    <!-- Menu Khusus Super Admin di dalam Sub-menu Utama -->
                    @if (auth()->check() && auth()->user()->role == 'super_admin')
                        <a href="{{ route('admin.santri.index') }}" @click="sidebarOpen = false"
                            class="flex items-center gap-3 px-3 py-2.5 rounded-xl {{ request()->routeIs('admin.pengguna.*') ? 'bg-emerald-600/20 text-emerald-400 font-bold' : 'hover:bg-slate-800 text-slate-400' }} text-xs transition">
                            <i class="fa-solid fa-users w-4 text-xs"></i>
                            <span>Pengguna</span>
                        </a>
                    @endif
                </div>
            </div>

            <!-- MENU PENGELOLAAN DENGAN DROPDOWN (ACCORDION) -->
            <div class="pt-2" x-data="{ open: {{ request()->routeIs('admin.konten.*') || request()->routeIs('admin.program.*') || request()->routeIs('admin.berita.*') || request()->routeIs('admin.kegiatan.*') || request()->routeIs('admin.galeri.*') ? 'true' : 'false' }} }">

                <button @click="open = !open"
                    class="w-full flex items-center justify-between px-4 py-3 rounded-xl text-xs font-bold uppercase tracking-wider text-slate-400 hover:bg-slate-800 transition">
                    <div class="flex items-center gap-3">
                        <i class="fa-solid fa-layer-group w-5 text-sm"></i>
                        <span>Pengelolaan</span>
                    </div>
                    <i class="fa-solid fa-chevron-down text-[10px] transition-transform duration-200"
                        :class="open ? 'rotate-180 text-emerald-400' : ''"></i>
                </button>

                <!-- Sub-menu Dropdown -->
                <div x-show="open" x-collapse class="pl-4 pt-1.5 space-y-1 border-l border-slate-800 ml-4">
                    <a href="{{ route('admin.konten.index') }}" @click="sidebarOpen = false"
                        class="flex items-center gap-3 px-3 py-2.5 rounded-xl {{ request()->routeIs('admin.konten.*') ? 'bg-emerald-600/20 text-emerald-400 font-bold' : 'hover:bg-slate-800 text-slate-400' }} text-xs transition">
                        <i class="fa-solid fa-blog w-4 text-xs"></i>
                        <span>Konten</span>
                    </a>
                    <a href="{{ route('admin.program.index') }}" @click="sidebarOpen = false"
                        class="flex items-center gap-3 px-3 py-2.5 rounded-xl {{ request()->routeIs('admin.program.*') ? 'bg-emerald-600/20 text-emerald-400 font-bold' : 'hover:bg-slate-800 text-slate-400' }} text-xs transition">
                        <i class="fa-solid fa-folder-tree w-4 text-xs"></i>
                        <span>Program</span>
                    </a>
                    <a href="{{ route('admin.berita.index') }}" @click="sidebarOpen = false"
                        class="flex items-center gap-3 px-3 py-2.5 rounded-xl {{ request()->routeIs('admin.berita.*') ? 'bg-emerald-600/20 text-emerald-400 font-bold' : 'hover:bg-slate-800 text-slate-400' }} text-xs transition">
                        <i class="fa-solid fa-newspaper w-4 text-xs"></i>
                        <span>Berita</span>
                    </a>
                    <a href="{{ route('admin.kegiatan.index') }}" @click="sidebarOpen = false"
                        class="flex items-center gap-3 px-3 py-2.5 rounded-xl {{ request()->routeIs('admin.kegiatan.*') ? 'bg-emerald-600/20 text-emerald-400 font-bold' : 'hover:bg-slate-800 text-slate-400' }} text-xs transition">
                        <i class="fa-solid fa-calendar-plus w-4 text-xs"></i>
                        <span>Kegiatan</span>
                    </a>
                    <a href="{{ route('admin.galeri.index') }}" @click="sidebarOpen = false"
                        class="flex items-center gap-3 px-3 py-2.5 rounded-xl {{ request()->routeIs('admin.galeri.*') ? 'bg-emerald-600/20 text-emerald-400 font-bold' : 'hover:bg-slate-800 text-slate-400' }} text-xs transition">
                        <i class="fa-solid fa-photo-film w-4 text-xs"></i>
                        <span>Galeri</span>
                    </a>
                </div>
            </div>

        </div>
    </div>

    <!-- Bagian Bawah: Tombol Logout Responsif -->
    <div class="p-4 border-t border-slate-800">
        <button @click="logoutModalOpen = true; sidebarOpen = false;"
            class="flex w-full items-center gap-3 px-4 py-3 rounded-xl bg-slate-800/50 hover:bg-red-600/20 hover:text-red-400 font-semibold text-xs transition text-slate-400 border border-slate-800">
            <i class="fa-solid fa-right-from-bracket w-5 text-sm"></i>
            <span>Logout</span>
        </button>
    </div>
</aside>
