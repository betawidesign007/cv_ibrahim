<!DOCTYPE html>
<html lang="id" class="h-full">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
    <title>Login Panel Admin | Ibrahim Portfolio</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">

    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }
    </style>

    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
        <script src="https://cdn.tailwindcss.com"></script>
        <script>
            tailwind.config = {
                theme: {
                    extend: {
                        fontFamily: {
                            sans: ['"Plus Jakarta Sans"', 'sans-serif']
                        }
                    }
                }
            }
        </script>
    @endif
</head>

<body
    class="h-full bg-[#070b14] text-slate-100 antialiased selection:bg-indigo-600 selection:text-white flex items-center justify-center p-4 relative overflow-x-hidden">

    <!-- Ambient Glow Background -->
    <div class="fixed inset-0 pointer-events-none z-0">
        <div class="absolute -top-32 -left-32 w-80 h-80 bg-indigo-600/20 rounded-full blur-[100px]"></div>
        <div class="absolute -bottom-32 -right-32 w-80 h-80 bg-cyan-500/15 rounded-full blur-[100px]"></div>
    </div>

    <!-- Login Card Container -->
    <div class="relative z-10 w-full max-w-md">

        <!-- Brand Header -->
        <div class="text-center mb-8">
            <a href="{{ route('home') }}" class="inline-flex items-center gap-3 group">
                <div
                    class="w-12 h-12 rounded-2xl bg-gradient-to-tr from-indigo-600 via-indigo-500 to-cyan-400 p-[1.5px] shadow-lg shadow-indigo-500/25 group-hover:scale-105 transition-transform duration-300">
                    <div class="w-full h-full bg-[#0b1120] rounded-[14px] flex items-center justify-center">
                        <span
                            class="font-extrabold text-xl text-transparent bg-clip-text bg-gradient-to-r from-indigo-400 to-cyan-400">IB</span>
                    </div>
                </div>
                <div class="text-left">
                    <span
                        class="font-bold text-xl tracking-tight text-white block group-hover:text-indigo-400 transition-colors">Ibrahim<span
                            class="text-indigo-500">.</span></span>
                    <span class="text-[11px] tracking-wider uppercase text-slate-400 font-medium">Panel
                        Administrasi</span>
                </div>
            </a>
            <h1 class="text-2xl font-bold text-white mt-5">Masuk ke Panel Admin</h1>
            <p class="text-xs sm:text-sm text-slate-400 mt-1">Kelola konten dan pesan masuk portofolio Anda</p>
        </div>

        <!-- Main Card -->
        <div
            class="rounded-2xl bg-gradient-to-b from-[#0e1628] to-[#070b14] border border-slate-800/90 shadow-2xl p-6 sm:p-8 backdrop-blur-xl">

            <!-- Session Status / Alert -->
            @auth
                <div
                    class="mb-5 p-3.5 rounded-xl text-xs bg-indigo-500/10 border border-indigo-500/20 text-indigo-300 flex items-center justify-between gap-3">
                    <div class="flex items-center gap-2 truncate">
                        <span class="w-2 h-2 rounded-full bg-emerald-400 shrink-0"></span>
                        <span class="truncate">Sesi aktif: <strong>{{ auth()->user()->name }}</strong></span>
                    </div>
                    <a href="{{ route('home') }}"
                        class="px-3 py-1.5 rounded-lg bg-indigo-600 hover:bg-indigo-500 text-white font-semibold text-xs shrink-0 transition-colors">
                        Website Utama &rarr;
                    </a>
                </div>
            @endauth

            @if (session('status'))
                <div
                    class="mb-5 p-3 rounded-xl text-xs sm:text-sm font-medium bg-emerald-500/10 text-emerald-400 border border-emerald-500/20 flex items-center gap-2">
                    <svg class="w-4 h-4 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                    <span>{{ session('status') }}</span>
                </div>
            @endif

            @if ($errors->any())
                <div
                    class="mb-5 p-3 rounded-xl text-xs sm:text-sm font-medium bg-rose-500/10 text-rose-400 border border-rose-500/20">
                    <ul class="list-disc list-inside space-y-1">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form id="loginForm" method="POST" action="{{ route('login.attempt') }}" autocomplete="off" class="space-y-4">
                @csrf

                <!-- Email Input -->
                <div>
                    <label for="email"
                        class="block text-xs font-semibold text-slate-300 uppercase tracking-wider mb-1.5">Email
                        Akun</label>
                    <div class="relative">
                        <div
                            class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-slate-500">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207" />
                            </svg>
                        </div>
                        <input type="email" id="email" name="email"
                            value="{{ old('email', '') }}" required autofocus autocomplete="off"
                            placeholder="nama@email.com"
                            class="w-full pl-10 pr-11 py-3 rounded-xl bg-slate-950/80 border border-slate-800 text-slate-100 placeholder-slate-500 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all">
                        <button type="button" id="toggleEmailBtn" title="Tampilkan/Sembunyikan Email" aria-label="Lihat atau sembunyikan email"
                            class="absolute inset-y-0 right-0 pr-3.5 flex items-center text-slate-500 hover:text-indigo-400 transition-colors focus:outline-none">
                            <!-- Eye Open (email terlihat) -->
                            <svg id="emailEyeOpen" class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                            </svg>
                            <!-- Eye Slashed (email disembunyikan/password-masked) -->
                            <svg id="emailEyeClosed" class="w-4 h-4 hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l18 18" />
                            </svg>
                        </button>
                    </div>
                </div>

                <!-- Password Input -->
                <div>
                    <label for="password"
                        class="block text-xs font-semibold text-slate-300 uppercase tracking-wider mb-1.5">Kata
                        Sandi</label>
                    <div class="relative">
                        <div
                            class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-slate-500">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                            </svg>
                        </div>
                        <input type="password" id="password" name="password" required value="" autocomplete="new-password" placeholder="••••••••"
                            class="w-full pl-10 pr-11 py-3 rounded-xl bg-slate-950/80 border border-slate-800 text-slate-100 placeholder-slate-500 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all">
                        <button type="button" id="togglePasswordBtn" title="Tampilkan/Sembunyikan Kata Sandi" aria-label="Lihat atau sembunyikan kata sandi"
                            class="absolute inset-y-0 right-0 pr-3.5 flex items-center text-slate-500 hover:text-indigo-400 transition-colors focus:outline-none">
                            <!-- Eye Slashed (password tersembunyi default) -->
                            <svg id="passwordEyeClosed" class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l18 18" />
                            </svg>
                            <!-- Eye Open (password terlihat) -->
                            <svg id="passwordEyeOpen" class="w-4 h-4 hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                            </svg>
                        </button>
                    </div>
                </div>

                <!-- Remember Me & Forgot Password -->
                <div class="flex items-center justify-between pt-1">
                    <label class="flex items-center gap-2 cursor-pointer">
                        <input type="checkbox" name="remember"
                            class="w-4 h-4 rounded bg-slate-950 border-slate-700 text-indigo-600 focus:ring-indigo-500 focus:ring-offset-slate-900">
                        <span class="text-xs text-slate-400 select-none">Ingat saya</span>
                    </label>
                    <span class="text-xs text-slate-500">Akses Khusus Admin</span>
                </div>

                <!-- Submit Button -->
                <button type="submit"
                    class="w-full inline-flex items-center justify-center gap-2 px-6 py-3.5 rounded-xl bg-gradient-to-r from-indigo-600 to-indigo-500 hover:from-indigo-500 hover:to-indigo-400 text-white font-semibold text-sm shadow-lg shadow-indigo-600/30 active:scale-95 transition-all duration-200">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1" />
                    </svg>
                    <span>Masuk ke Dashboard</span>
                </button>
            </form>

            <!-- Restricted Access Notice -->
            <div
                class="mt-6 pt-5 border-t border-slate-800/80 rounded-xl bg-slate-950/60 p-4 text-center space-y-1.5">
                <div class="inline-flex items-center justify-center gap-1.5 text-amber-400 text-xs font-semibold">
                    <svg class="w-4 h-4 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                    </svg>
                    <span>Peringatan Akses Terbatas</span>
                </div>
                <p class="text-xs text-slate-400 leading-relaxed max-w-sm mx-auto">
                    Halaman ini dikhususkan untuk Administrator. Selain admin yang berwenang, dilarang dan tidak dapat masuk ke sistem.
                </p>
            </div>

        </div>

        <!-- Back to Website -->
        <div class="text-center mt-6">
            <a href="{{ route('home') }}"
                class="inline-flex items-center gap-2 text-xs font-semibold text-slate-400 hover:text-indigo-400 transition-colors">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
                <span>Kembali ke Halaman Web Portofolio</span>
            </a>
        </div>

    </div>

    <!-- Script Toggle Visibility Password & Email -->
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            // Toggle Password Visibility
            const passwordInput = document.getElementById('password');
            const togglePasswordBtn = document.getElementById('togglePasswordBtn');
            const passwordEyeOpen = document.getElementById('passwordEyeOpen');
            const passwordEyeClosed = document.getElementById('passwordEyeClosed');

            if (togglePasswordBtn && passwordInput) {
                togglePasswordBtn.addEventListener('click', () => {
                    const isPassword = passwordInput.type === 'password';
                    passwordInput.type = isPassword ? 'text' : 'password';
                    passwordEyeOpen.classList.toggle('hidden', !isPassword);
                    passwordEyeClosed.classList.toggle('hidden', isPassword);
                    passwordInput.focus();
                });
            }

            // Toggle Email Visibility / Masking
            const emailInput = document.getElementById('email');
            const toggleEmailBtn = document.getElementById('toggleEmailBtn');
            const emailEyeOpen = document.getElementById('emailEyeOpen');
            const emailEyeClosed = document.getElementById('emailEyeClosed');

            if (toggleEmailBtn && emailInput) {
                toggleEmailBtn.addEventListener('click', () => {
                    const isMasked = emailInput.type === 'password';
                    emailInput.type = isMasked ? 'email' : 'password';
                    emailEyeOpen.classList.toggle('hidden', !isMasked);
                    emailEyeClosed.classList.toggle('hidden', isMasked);
                    emailInput.focus();
                });
            }

            // Kosongkan nilai input saat halaman pertama kali dimuat (mencegah autofill otomatis browser)
            @if (!$errors->any())
                const loginForm = document.getElementById('loginForm');
                if (loginForm) loginForm.reset();
                if (emailInput) emailInput.value = '';
                if (passwordInput) passwordInput.value = '';
                setTimeout(() => {
                    if (emailInput) emailInput.value = '';
                    if (passwordInput) passwordInput.value = '';
                }, 50);
            @endif
        });
    </script>
</body>

</html>
