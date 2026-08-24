@extends('layouts.auth')

@section('title', 'Login Pondok Pesantren Babul Hasanah')

@section('content')
    <!-- SECTION HALAMAN LOGIN -->
    <div class="min-h-screen bg-slate-100 flex items-center justify-center py-16 px-4 sm:px-6 lg:px-8">
        <div
            class="max-w-md w-full space-y-8 bg-white p-8 sm:p-10 rounded-3xl border border-slate-200/80 shadow-xl shadow-slate-200/50">

            <!-- Header Logo & Judul -->
            <div class="text-center space-y-3">
                <a href="{{ route('home') }}"
                    class="inline-flex items-center justify-center w-12 h-12 rounded-2xl bg-emerald-50 text-emerald-600 border border-emerald-500/20 mb-2">
                    <i class="fa-solid fa-graduation-cap text-xl"></i>
                </a>
                <h1 class="text-2xl sm:text-3xl font-black tracking-tight text-slate-900">
                    Masuk ke <span class="text-emerald-600">Akun Anda</span>
                </h1>
                <p class="text-slate-500 text-xs sm:text-sm">
                    Silakan masukkan email dan kata sandi untuk mengakses dashboard Pondok Pesantren Babul Hasanah.
                </p>
            </div>

            <!-- Session Status (Notifikasi sukses/error dari Laravel) -->
            @if (session('status'))
                <div
                    class="bg-emerald-50 border border-emerald-200 text-emerald-700 px-4 py-3 rounded-xl text-xs font-medium">
                    {{ session('status') }}
                </div>
            @endif

            <!-- Form Login -->
            <form class="space-y-5" action="{{ route('login') }}" method="POST">
                @csrf

                <!-- Input Email -->
                <div class="space-y-1.5">
                    <label for="email" class="text-xs font-bold text-slate-700 uppercase tracking-wider">Alamat
                        Email</label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-slate-400">
                            <i class="fa-regular fa-envelope text-sm"></i>
                        </span>
                        <input id="email" name="email" type="email" autocomplete="email" required
                            value="{{ old('email') }}"
                            class="w-full pl-11 pr-4 py-3.5 bg-slate-50 border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:border-emerald-600 focus:bg-white transition"
                            placeholder="nama@email.com">
                    </div>
                    @error('email')
                        <span class="text-xs text-red-600 font-medium mt-1 block">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Input Password -->
                <div class="space-y-1.5">
                    <div class="flex items-center justify-between">
                        <label for="password" class="text-xs font-bold text-slate-700 uppercase tracking-wider">Kata
                            Sandi</label>
                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}"
                                class="text-xs font-semibold text-emerald-600 hover:underline">
                                Lupa sandi?
                            </a>
                        @endif
                    </div>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-slate-400">
                            <i class="fa-solid fa-lock text-sm"></i>
                        </span>
                        <input id="password" name="password" type="password" autocomplete="current-password" required
                            class="w-full pl-11 pr-4 py-3.5 bg-slate-50 border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:border-emerald-600 focus:bg-white transition"
                            placeholder="••••••••">
                    </div>
                    @error('password')
                        <span class="text-xs text-red-600 font-medium mt-1 block">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Remember Me Checkbox -->
                <div class="flex items-center justify-between text-xs">
                    <label class="flex items-center gap-2 cursor-pointer">
                        <input type="checkbox" name="remember" id="remember"
                            class="w-4 h-4 text-emerald-600 border-slate-300 rounded focus:ring-emerald-500">
                        <span class="text-slate-600 font-medium">Ingat Saya</span>
                    </label>
                </div>

                <!-- Tombol Submit -->
                <div>
                    <button type="submit"
                        class="w-full bg-slate-900 hover:bg-emerald-600 text-white font-bold py-4 rounded-xl transition duration-300 text-sm shadow-lg shadow-slate-900/10 flex items-center justify-center gap-2">
                        <span>Masuk Sekarang</span>
                        <i class="fa-solid fa-arrow-right text-xs"></i>
                    </button>
                </div>
            </form>

            <!-- Footer / Link Pendaftaran -->
            <div class="text-center pt-4 border-t border-slate-100">
                <p class="text-xs text-slate-500">
                    Belum mendaftar sebagai santri baru?
                    <a href="{{ route('pendaftaran.index') }}"
                        class="font-bold text-emerald-600 hover:underline ml-1">Daftar Online</a>
                </p>
            </div>

        </div>
    </div>
@endsection
