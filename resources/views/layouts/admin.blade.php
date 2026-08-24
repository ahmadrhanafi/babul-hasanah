<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Pondok Pesantren Babul Hasanah')</title>
    <link rel="icon" type="image/png" href="{{ asset('assets/img/logo/logo.png') }}">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body class="bg-slate-100 text-slate-900 font-sans antialiased">

    <div class="flex h-screen overflow-hidden">

        <!-- SIDEBAR (Menu Samping Tetap Sama di Setiap Halaman Admin) -->
        <aside
            class="w-64 bg-slate-900 text-slate-300 hidden md:flex flex-col justify-between border-r border-slate-800">
            <div>
                <div class="h-20 flex items-center px-6 gap-3 border-b border-slate-800">
                    <div
                        class="w-10 h-10 rounded-xl bg-emerald-500 text-slate-900 flex items-center justify-center font-black">
                        <i class="fa-solid fa-graduation-cap text-lg"></i>
                    </div>
                    <div>
                        <span class="block text-white font-black text-sm tracking-wide">Babul Hasanah</span>
                        <span class="block text-[10px] text-emerald-400 font-semibold uppercase tracking-wider">Panel
                            Dashboard</span>
                    </div>
                </div>

                <div class="p-4 space-y-1.5">
                    <p class="px-3 text-[10px] font-bold text-slate-500 uppercase tracking-wider mb-2">Menu Utama</p>
                    <a href="{{ route('admin.dashboard') }}"
                        class="flex items-center gap-3 px-4 py-3 rounded-xl bg-emerald-600 text-white font-semibold text-xs transition shadow-lg shadow-emerald-900/50">
                        <i class="fa-solid fa-chart-pie w-5 text-sm"></i>
                        <span>Dashboard</span>
                    </a>
                    <!-- Tambah menu lainnya di sini -->
                </div>
            </div>

            <div class="p-4 border-t border-slate-800">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit"
                        class="w-full flex items-center gap-3 px-4 py-3 rounded-xl bg-slate-800/50 hover:bg-red-600/20 hover:text-red-400 font-semibold text-xs transition text-slate-400 border border-slate-800">
                        <i class="fa-solid fa-right-from-bracket w-5 text-sm"></i>
                        <span>Keluar Sistem</span>
                    </button>
                </form>
            </div>
        </aside>

        <!-- AREA KONTEN UTAMA -->
        <div class="flex-1 flex flex-col overflow-hidden">

            <!-- Top Navbar -->
            <header
                class="h-20 bg-white border-b border-slate-200/80 flex items-center justify-between px-6 z-10 shadow-sm">
                <h1 class="text-base sm:text-lg font-black text-slate-900">Panel Admin Pesantren</h1>
                <div class="flex items-center gap-3">
                    <span class="text-xs font-bold text-slate-900">Super Administrator</span>
                </div>
            </header>

            <!-- MAIN CONTENT YANG BERUBAH-UBAH (YIELD) -->
            <main class="flex-1 overflow-x-hidden overflow-y-auto bg-slate-100 p-6 lg:p-8">
                @yield('content')
            </main>

        </div>
    </div>

</body>

</html>
