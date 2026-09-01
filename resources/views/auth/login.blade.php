@extends('layouts.auth')

@section('title', 'Portal Login - Pondok Pesantren Babul Hasanah')

@section('content')
    <div class="min-h-screen w-full flex">

        <!-- Sisi Kiri: Panel Branding (Tampil di Layar Desktop lg:) -->
        <div class="hidden lg:flex lg:w-1/2 relative overflow-hidden flex-col justify-between p-12 lg:p-16 text-white"
            style="background-color: var(--color-pharmaceutical-green);">

            <!-- Background Gradient Layer -->
            <div class="absolute inset-0 bg-gradient-to-br from-black/20 via-transparent to-black/30 z-0"></div>

            <!-- Elemen Dekoratif Blur Background -->
            <div class="absolute -bottom-24 -left-24 w-96 h-96 rounded-full blur-3xl pointer-events-none opacity-40"
                style="background-color: var(--color-kashmir);"></div>
            <div class="absolute -top-16 -right-16 w-80 h-80 rounded-full blur-3xl pointer-events-none opacity-25"
                style="background-color: var(--color-copper-patina);"></div>

            <!-- Top Header Logo -->
            <div class="relative z-10 flex items-center gap-4">
                <a href="{{ route('home') }}"
                    class="inline-flex items-center justify-center w-12 h-12 rounded-2xl bg-white/10 backdrop-blur-md border border-white/20 text-white shadow-lg p-2.5 transition duration-300 hover:scale-105">
                    <img src="{{ asset('/assets/img/logo/logo.png') }}" alt="Logo Pesantren"
                        class="w-full h-full object-contain">
                </a>
                <div>
                    <span class="block font-black text-sm tracking-wider uppercase text-white">PP. Babul Hasanah</span>
                    <span class="block text-[11px] font-medium tracking-widest uppercase text-emerald-100/80">Sistem
                        Informasi Manajemen</span>
                </div>
            </div>

            <!-- Content Tengah -->
            <div class="relative z-10 space-y-6 my-auto max-w-lg">
                <div
                    class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full text-xs font-bold backdrop-blur-md border border-white/20 text-emerald-50 bg-white/10 shadow-sm">
                    <i class="fa-solid fa-graduation-cap text-emerald-300"></i>
                    <span>Portal Manajemen Terpadu</span>
                </div>
                <h1 class="text-4xl xl:text-5xl font-black leading-tight tracking-tight text-white">
                    Melahirkan Lulusan yang Menguasai Bidang Kitab Kuning.
                </h1>
                <p class="text-sm leading-relaxed font-normal text-emerald-100/90">
                    Sistem manajemen data santri, kegiatan rutinitas, dan administrasi harian pondok pesantren secara
                    terpadu dan
                    digital.
                </p>
            </div>

            <!-- Footer Kiri -->
            <div class="relative z-10 text-xs text-emerald-100/60 font-medium">
                &copy; {{ date('Y') }} Pondok Pesantren Babul Hasanah. All rights reserved.
            </div>
        </div>

        <!-- Sisi Kanan: Form Login -->
        <div class="w-full lg:w-1/2 flex items-center justify-center p-6 sm:p-12 lg:p-16">
            <div
                class="w-full max-w-md bg-white p-8 sm:p-10 rounded-3xl shadow-xl shadow-slate-200/70 border border-slate-100 space-y-6">

                <!-- Header Mobile Logo & Judul -->
                <div class="text-center lg:text-left space-y-2">
                    <div class="inline-flex lg:hidden items-center justify-center w-12 h-12 rounded-2xl text-white mb-2 shadow-md p-2.5"
                        style="background-color: var(--color-pharmaceutical-green);">
                        <img src="{{ asset('/assets/img/logo/logo.png') }}" alt="Logo Pesantren"
                            class="w-full h-full object-contain">
                    </div>
                    <h2 class="text-lg sm:text-3xl font-bold tracking-tight text-slate-900" style="font-size: medium">
                        Selamat <span style="color: var(--color-pharmaceutical-green);">Datang!</span>
                    </h2>
                    <p class="text-slate-500 text-xs sm:text-sm font-normal">
                        Masukkan kredensial Anda untuk mengakses sistem.
                    </p>
                </div>

                <!-- Alert Status Session -->
                @if (session('status'))
                    <div
                        class="p-4 rounded-2xl text-xs font-semibold flex items-start gap-3 bg-emerald-50 border border-emerald-200 text-emerald-800">
                        <i class="fa-solid fa-circle-check text-emerald-600 text-sm mt-0.5"></i>
                        <span>{{ session('status') }}</span>
                    </div>
                @endif

                <!-- Form Login dengan State Loading Alpine.js -->
                <form class="space-y-4" action="{{ route('login') }}" method="POST" x-data="{
                    loading: false,
                    startLoading(e) {
                        e.preventDefault();
                        this.loading = true;
                
                        setTimeout(() => {
                            e.target.submit();
                        }, 1500);
                    }
                }"
                    @submit="startLoading($event)">
                    @csrf

                    <div class="space-y-1.5">
                        <label for="email" class="font-bold text-slate-600 uppercase tracking-wider"
                            style="font-size: x-small">Alamat Email</label>
                        <div class="relative flex items-center">
                            <div
                                class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-slate-400">
                                <i class="fa-regular fa-envelope text-sm"></i>
                            </div>
                            <input id="email" name="email" type="email" autocomplete="email" required
                                value="{{ old('email') }}"
                                class="w-full py-3 bg-slate-50 border border-slate-200 rounded-2xl text-slate-900 text-xs sm:text-sm font-medium transition duration-200 focus:outline-none focus:bg-white focus:border-emerald-600 focus:ring-4 focus:ring-emerald-600/10 placeholder:text-slate-400"
                                placeholder="nama@email.com" style="padding-left: 38px">
                        </div>
                        @error('email')
                            <span class="text-[11px] text-red-600 font-semibold mt-1 block flex items-center gap-1">
                                <i class="fa-solid fa-circle-exclamation"></i> {{ $message }}
                            </span>
                        @enderror
                    </div>

                    <div class="space-y-1.5">
                        <div class="flex items-center justify-between">
                            <label for="password" style="font-size: x-small"
                                class="text-[11px] font-bold text-slate-600 uppercase tracking-wider">Kata Sandi</label>
                            @if (Route::has('password.request'))
                                <a href="{{ route('password.request') }}"
                                    class="text-xs font-bold transition hover:underline"
                                    style="color: var(--color-pharmaceutical-green);">Lupa sandi?</a>
                            @endif
                        </div>
                        <div class="relative flex items-center">
                            <div
                                class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-slate-400">
                                <i class="fa-solid fa-lock text-sm"></i>
                            </div>
                            <input id="password" name="password" type="password" autocomplete="current-password" required
                                class="w-full pl-11 pr-12 py-3 bg-slate-50 border border-slate-200 rounded-2xl text-slate-900 text-xs sm:text-sm font-medium transition duration-200 focus:outline-none focus:bg-white focus:border-emerald-600 focus:ring-4 focus:ring-emerald-600/10 placeholder:text-slate-400"
                                placeholder="••••••••" style="padding-left: 38px">
                            <button type="button" onclick="togglePassword()"
                                class="absolute inset-y-0 right-0 pr-4 flex items-center text-slate-400 hover:text-slate-600 transition focus:outline-none"
                                style="padding-right: 12px">
                                <i id="toggleIcon" class="fa-regular fa-eye text-sm"></i>
                            </button>
                        </div>
                        @error('password')
                            <span class="text-[11px] text-red-600 font-semibold mt-1 block flex items-center gap-1">
                                <i class="fa-solid fa-circle-exclamation"></i> {{ $message }}
                            </span>
                        @enderror
                    </div>

                    <div class="flex items-center justify-between text-xs pt-1">
                        <label class="flex items-center gap-2.5 cursor-pointer group">
                            <input type="checkbox" name="remember" id="remember"
                                class="w-4 h-4 rounded border-slate-300 text-emerald-700 focus:ring-emerald-600 cursor-pointer transition">
                            <span class="text-slate-400 font-medium group-hover:text-slate-800 transition">Ingat saya di
                                perangkat ini</span>
                        </label>
                    </div>

                    <!-- Tombol Submit dengan Animasi Loading -->
                    <div class="pt-2">
                        <button type="submit" :disabled="loading"
                            class="w-full text-white font-bold py-3.5 rounded-2xl transition-all duration-300 text-sm shadow-lg shadow-emerald-900/10 hover:shadow-emerald-900/20 hover:-translate-y-0.5 active:translate-y-0 flex items-center justify-center gap-2 group disabled:opacity-75 disabled:cursor-not-allowed"
                            style="background-color: var(--color-pharmaceutical-green);">

                            <!-- Teks Normal -->
                            <span x-show="!loading">Masuk ke Dashboard</span>

                            <!-- Teks & Spinner saat Loading -->
                            <span x-show="loading" class="flex items-center gap-2" style="display: none;">
                                <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 24 24">
                                    <circle class="opacity-25" cx="12" cy="12" r="10"
                                        stroke="currentColor" stroke-width="4"></circle>
                                    <path class="opacity-75" fill="currentColor"
                                        d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                                    </path>
                                </svg>
                                Memproses Masuk...
                            </span>
                        </button>
                    </div>

                    <!-- Fullscreen Loading Overlay (Muncul Pas Submit Berhasil) -->
                    <div x-show="loading" style="display: none;"
                        class="fixed inset-0 z-50 bg-white/90 backdrop-blur-md flex flex-col items-center justify-center transition-all duration-300">
                        <div class="flex flex-col items-center space-y-4">
                            <div class="w-16 h-16 rounded-2xl flex items-center justify-center shadow-lg shadow-emerald-900/10 animate-bounce"
                                style="background-color: var(--color-pharmaceutical-green);">
                                <img src="{{ asset('/assets/img/logo/logo.png') }}" alt="Logo"
                                    class="w-10 h-10 object-contain">
                            </div>

                            <div class="text-center space-y-1">
                                <h3 class="font-bold text-slate-800 text-sm tracking-wide">Memuat Sesi...</h3>
                                <p class="text-xs text-slate-400">Mohon tunggu sebentar</p>
                            </div>

                            <div class="flex items-center gap-1.5 pt-2">
                                <div class="w-2 h-2 rounded-full dot-sequence"
                                    style="background-color: var(--color-pharmaceutical-green); animation-delay: 0s;">
                                </div>
                                <div class="w-2 h-2 rounded-full dot-sequence"
                                    style="background-color: var(--color-pharmaceutical-green); animation-delay: 0.3s;">
                                </div>
                                <div class="w-2 h-2 rounded-full dot-sequence"
                                    style="background-color: var(--color-pharmaceutical-green); animation-delay: 0.6s;">
                                </div>
                            </div>
                        </div>
                    </div>
                </form>

                <!-- Divider / Pemisah -->
                <div class="relative flex items-center">
                    <div class="flex-grow border-t border-slate-200"></div>
                    <span class="flex-shrink px-3 text-[10px] font-extrabold text-slate-400 uppercase tracking-widest"
                        style="font-size: x-small">Atau
                        masuk dengan</span>
                    <div class="flex-grow border-t border-slate-200"></div>
                </div>

                <!-- Tombol Google Login (Fixed Ukuran Icon) -->
                <div>
                    <a href="{{ route('auth.google') }}"
                        class="w-full py-3 px-4 bg-white hover:bg-slate-50 border border-slate-200 rounded-2xl text-slate-700 text-xs sm:text-sm font-bold transition duration-200 flex items-center justify-center gap-3 shadow-sm hover:shadow active:scale-[0.99]">
                        <svg class="w-5 h-5 min-w-[20px] shrink-0" viewBox="0 0 24 24">
                            <path fill="#4285F4"
                                d="M23.745 12.27c0-.7-.06-1.4-.19-2.07H12v4.51h6.6c-.29 1.52-1.14 2.82-2.4 3.68v3.05h3.88c2.27-2.09 3.66-5.17 3.66-9.17z" />
                            <path fill="#34A853"
                                d="M12 24c3.24 0 5.95-1.08 7.93-2.91l-3.88-3.05c-1.08.72-2.45 1.16-4.05 1.16-3.12 0-5.77-2.1-6.72-4.93H1.2v3.15C3.16 21.35 7.22 24 12 24z" />
                            <path fill="#FBBC05"
                                d="M5.28 14.27c-.25-.72-.38-1.49-.38-2.27s.13-1.55.38-2.27V6.58H1.2C.44 8.12 0 9.87 0 11.7s.44 3.58 1.2 5.12l4.08-2.55z" />
                            <path fill="#EA4335"
                                d="M12 4.75c1.77 0 3.35.61 4.6 1.8l3.42-3.42C17.95 1.19 15.24 0 12 0 7.22 0 3.16 2.65 1.2 6.58l4.08 3.15c.95-2.83 3.6-4.98 6.72-4.98z" />
                        </svg>
                        <span>Masuk dengan Google</span>
                    </a>
                </div>

                <!-- Footer Link -->
                <div class="text-center pt-2 border-t border-slate-100">
                    <p class="text-xs text-slate-500 font-medium">
                        Belum mempunyai akun?
                        <a href="{{ route('pendaftaran.index') }}" class="font-extrabold hover:underline ml-0.5"
                            style="color: var(--color-pharmaceutical-green);">Daftarkan Santri!</a>
                    </p>
                </div>

            </div>
        </div>

    </div>

    <!-- Script Show/Hide Password -->
    <script>
        function togglePassword() {
            const passwordInput = document.getElementById('password');
            const toggleIcon = document.getElementById('toggleIcon');

            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                toggleIcon.classList.replace('fa-eye', 'fa-eye-slash');
            } else {
                passwordInput.type = 'password';
                toggleIcon.classList.replace('fa-eye-slash', 'fa-eye');
            }
        }
    </script>
@endsection
