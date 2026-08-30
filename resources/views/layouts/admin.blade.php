<!DOCTYPE html>
<html lang="id" x-data="{
    darkMode: localStorage.getItem('darkMode') === 'true',
    toggleDarkMode() {
        this.darkMode = !this.darkMode;
        localStorage.setItem('darkMode', this.darkMode);
    }
}" :class="{ 'dark': darkMode }">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Pondok Pesantren Babul Hasanah')</title>
    <link rel="icon" type="image/png" href="{{ asset('assets/img/logo/logo.png') }}">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
        }
    </script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Tambah Alpine.js untuk kontrol buka/tutup menu mobile dengan mudah -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <style>
        :root {
            /* Palette Colors */
            --color-white: #fefefe;
            --color-pharmaceutical-green: #1b7b32;
            --color-kashmir: #698d6e;
            --color-misty-marsh: #cdd9cf;
            --color-copper-patina: #9cb49d;
            --color-woodgrain: #916438;
            --color-queen-of-the-night: #44467e;
            --color-bourbon-peach: #ee8a3e;
        }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }

        [x-cloak] {
            display: none !important;
        }
    </style>
</head>

<body
    class="bg-slate-100 dark:bg-slate-950 text-slate-900 dark:text-slate-100 font-sans antialiased transition-colors duration-300"
    x-data="{ sidebarOpen: false, logoutModalOpen: false }">

    <div class="flex h-screen overflow-hidden">

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
                            <span
                                class="block text-[10px] text-emerald-400 font-semibold uppercase tracking-wider">Panel
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

        <!-- AREA KONTEN UTAMA -->
        <div class="flex-1 flex flex-col overflow-hidden">

            <header
                class="h-20 bg-white dark:bg-slate-900 border-b border-slate-200/80 dark:border-slate-800 flex items-center justify-between px-4 sm:px-6 z-10 shadow-sm relative transition-colors duration-300">

                <!-- BAGIAN KIRI & TENGAH (MOBILE) -->
                <div class="flex items-center gap-3">
                    <!-- Hamburger Menu -->
                    <button @click="sidebarOpen = true"
                        class="md:hidden text-[#1b7b32] dark:text-emerald-400 hover:text-[#ee8a2a] py-1.5 px-2.5 rounded-xl flex items-center justify-center transition active:scale-95 shadow-sm">
                        <i class="fa-solid fa-bars-staggered text-lg"></i>
                    </button>

                    <!-- Judul Panel untuk Desktop (Tersembunyi di Mobile) -->
                    <h1 class="hidden md:block text-lg font-black text-slate-900 dark:text-white">Panel Admin Pesantren
                    </h1>
                </div>

                <!-- LOGO TEKS DI TENGAH (Mobile) -->
                <div class="absolute left-1/2 -translate-x-1/2 md:hidden flex items-center justify-center">
                    <img src="{{ asset('/assets/img/logo/logo-teks.png') }}" alt="Logo Pesantren"
                        class="h-10 w-auto object-contain">
                </div>

                <!-- BAGIAN KANAN: TOMBOL TOGGLE DARK MODE & USER INFO -->
                <div class="flex items-center gap-3">
                    <!-- Tombol Toggle Dark Mode -->
                    <button @click="toggleDarkMode()"
                        class="w-10 h-10 bg-slate-100 dark:bg-slate-800 hover:bg-slate-200 dark:hover:bg-slate-700 text-slate-700 dark:text-amber-400 rounded-xl flex items-center justify-center transition active:scale-95 shadow-sm"
                        :title="darkMode ? 'Ubah ke Light Mode' : 'Ubah ke Dark Mode'">
                        <i class="fa-solid text-sm" :class="darkMode ? 'fa-sun' : 'fa-moon'"></i>
                    </button>

                    <!-- Badge Nama User (Desktop) -->
                    <div
                        class="hidden sm:flex items-center text-xs font-bold text-slate-900 dark:text-slate-200 bg-slate-100 dark:bg-slate-800 px-3.5 py-1.5 rounded-full border border-slate-200 dark:border-slate-700">
                        <i class="fa-solid fa-circle text-[8px] text-emerald-500 mr-1.5"></i> {{ Auth::user()->name }}
                    </div>
                </div>
            </header>

            <!-- MODAL POP-UP KONFIRMASI LOGOUT -->
            <div x-show="logoutModalOpen" x-cloak
                class="fixed inset-0 z-50 flex items-center justify-center bg-slate-900/60 backdrop-blur-sm p-4 animate-fade-in"
                @keydown.escape.window="logoutModalOpen = false">

                <div class="bg-white dark:bg-slate-900 rounded-3xl shadow-2xl border border-slate-100 dark:border-slate-800 max-w-sm w-full p-6 sm:p-8 space-y-5 text-center relative"
                    @click.away="logoutModalOpen = false">

                    <!-- Icon Logout Warning -->
                    <div
                        class="mx-auto w-14 h-14 bg-rose-100 dark:bg-rose-900/30 text-rose-600 rounded-2xl flex items-center justify-center text-xl shadow-sm">
                        <i class="fa-solid fa-triangle-exclamation"></i>
                    </div>

                    <!-- Teks Informasi -->
                    <div class="space-y-1.5">
                        <h3 class="text-base font-black text-slate-900 dark:text-white">Konfirmasi Keluar</h3>
                        <p class="text-xs text-slate-500 dark:text-slate-400 leading-relaxed">
                            Apakah Anda yakin ingin keluar dari Panel Admin Pesantren? Sesi Anda akan diakhiri.
                        </p>
                    </div>

                    <!-- Tombol Aksi Modal -->
                    <div class="space-y-2 pt-1">
                        <!-- Form Logout Bawaan Laravel -->
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit"
                                class="w-full bg-rose-600 hover:bg-rose-700 active:scale-95 text-white font-black px-4 py-3 rounded-xl text-xs transition shadow-lg shadow-rose-600/20 flex items-center justify-center gap-2">
                                Ya, Keluar Sekarang
                            </button>
                        </form>

                        <button type="button" @click="logoutModalOpen = false"
                            class="w-full bg-slate-100 dark:bg-slate-800 hover:bg-slate-200 dark:hover:bg-slate-700 text-slate-700 dark:text-slate-300 font-bold px-4 py-2.5 rounded-xl text-xs transition">
                            Batal
                        </button>
                    </div>

                </div>
            </div>

            <!-- MAIN CONTENT -->
            <main
                class="flex-1 overflow-x-hidden overflow-y-auto bg-slate-100 dark:bg-slate-950 p-4 sm:p-6 lg:p-8 pb-24 md:pb-8 transition-colors duration-300">
                @yield('content')
            </main>

        </div>
    </div>

    <!-- BOTTOM NAVIGATION -->
    <div
        class="md:hidden fixed bottom-0 left-0 right-0 bg-slate-900/90 backdrop-blur-md border-t border-slate-800 px-6 py-2 flex items-center justify-around z-30 shadow-2xl">
        <a href="{{ route('admin.dashboard') }}"
            class="flex flex-col items-center gap-1 py-1 {{ request()->routeIs('admin.dashboard') ? 'text-emerald-400' : 'text-slate-400 hover:text-white' }} transition">
            <i class="fa-solid fa-chart-pie text-base"></i>
            <span class="text-[10px] font-bold">Dashboard</span>
        </a>
        <a href="{{ route('admin.pendaftaran.index') }}"
            class="flex flex-col items-center gap-1 py-1 {{ request()->routeIs('admin.pendaftaran.*') ? 'text-emerald-400' : 'text-slate-400 hover:text-white' }} transition">
            <i class="fas fa-address-book text-base"></i>
            <span class="text-[10px] font-bold">Pendaftaran</span>
        </a>
        <!-- Tombol Menu Tambahan untuk buka Sidebar Drawer -->
        <button @click="sidebarOpen = true"
            class="flex flex-col items-center gap-1 py-1 text-slate-400 hover:text-white transition">
            <i class="fa-solid fa-bars text-base"></i>
            <span class="text-[10px] font-bold">Menu Lain</span>
        </button>
    </div>

</body>

</html>
