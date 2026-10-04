<!-- Footer Component (Responsip Layar HP & Desktop) -->
<footer class="relative z-10 bg-[#05080f] border-t border-slate-800/80 pt-12 pb-8">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 pb-10 border-b border-slate-800/80">

            <!-- Col 1: Brand & Tagline -->
            <div class="space-y-4 text-center md:text-left">
                <a href="#hero" class="inline-flex items-center gap-2.5 group">
                    <div
                        class="w-9 h-9 rounded-xl bg-gradient-to-tr from-indigo-600 via-indigo-500 to-cyan-400 p-[1.5px] shadow-md shadow-indigo-500/20 group-hover:scale-105 transition-transform">
                        <div
                            class="w-full h-full bg-[#0b1120] rounded-[9px] flex items-center justify-center overflow-hidden">
                            @if (!empty($profile->logo_image))
                                <img src="{{ asset('storage/' . $profile->logo_image) }}" alt="Logo"
                                    class="max-h-full max-w-full object-contain p-1">
                            @else
                                <span
                                    class="font-extrabold text-xs text-transparent bg-clip-text bg-gradient-to-r from-indigo-400 to-cyan-400 font-mono">
                                    {{ $profile->logo_initials ?? 'IB' }}
                                </span>
                            @endif
                        </div>
                    </div>
                    <span
                        class="font-bold text-lg tracking-tight text-white group-hover:text-indigo-400 transition-colors">{{ $profile->name ?? 'Ibrahim' }}<span
                            class="text-indigo-500">.</span></span>
                </a>
                <p class="text-xs sm:text-sm text-slate-400 leading-relaxed max-w-sm mx-auto md:mx-0">
                    Spesialis dalam pengembangan aplikasi web performa tinggi, modular, dan ramah pengguna dengan
                    ekosistem Laravel & Tailwind CSS.
                </p>
                <div class="flex items-center justify-center md:justify-start gap-2 text-xs text-emerald-400">
                    <span class="w-2 h-2 rounded-full bg-emerald-400 animate-pulse"></span>
                    <span>Siap menerima tawaran proyek</span>
                </div>
            </div>

            <!-- Col 2: Navigasi Cepat -->
            <div class="text-center md:text-left">
                <h4 class="text-xs font-semibold uppercase tracking-wider text-slate-200 mb-4">Navigasi Halaman</h4>
                <ul class="space-y-2 text-xs sm:text-sm">
                    <li><a href="#hero"
                            class="text-slate-400 hover:text-indigo-400 transition-colors py-1 inline-block">Beranda</a>
                    </li>
                    <li><a href="#about"
                            class="text-slate-400 hover:text-indigo-400 transition-colors py-1 inline-block">Tentang
                            Saya</a></li>
                    <li><a href="#skills"
                            class="text-slate-400 hover:text-indigo-400 transition-colors py-1 inline-block">Keahlian &
                            Stack</a></li>
                    <li><a href="#projects"
                            class="text-slate-400 hover:text-indigo-400 transition-colors py-1 inline-block">Portofolio
                            Proyek</a></li>
                    <li><a href="#experience"
                            class="text-slate-400 hover:text-indigo-400 transition-colors py-1 inline-block">Pengalaman
                            Kerja</a></li>
                    <li><a href="#contact"
                            class="text-slate-400 hover:text-indigo-400 transition-colors py-1 inline-block">Hubungi
                            Saya</a></li>
                </ul>
            </div>

            <!-- Col 3: Layanan & Solusi -->
            <div class="text-center md:text-left">
                <h4 class="text-xs font-semibold uppercase tracking-wider text-slate-200 mb-4">Layanan & Keahlian</h4>
                <ul class="space-y-2 text-xs sm:text-sm text-slate-400">
                    <li class="py-1">Pengembangan Web Laravel Custom</li>
                    <li class="py-1">Perancangan RESTful API & Integrasi</li>
                    <li class="py-1">Pembuatan UI Responsif Mobile & HP</li>
                    <li class="py-1">Optimasi Database & Query Relasi</li>
                    <li class="py-1">Integrasi Payment Gateway Indonesia</li>
                </ul>
            </div>

            <!-- Col 4: Sosial & Komunitas -->
            <div class="text-center md:text-left space-y-4">
                <h4 class="text-xs font-semibold uppercase tracking-wider text-slate-200 mb-4">Terhubung Bersama Saya
                </h4>
                <p class="text-xs text-slate-400">Ikuti perkembangan proyek dan hubungi melalui jejaring profesional:
                </p>

                <div class="flex items-center justify-center md:justify-start gap-2.5">
                    <!-- GitHub -->
                    <a href="https://github.com/betawidesign007" target="_blank" rel="noopener noreferrer"
                        aria-label="GitHub"
                        class="w-9 h-9 rounded-xl bg-slate-900 border border-slate-800 text-slate-400 hover:text-white hover:border-slate-700 flex items-center justify-center transition-all hover:scale-105 active:scale-95">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.53 1.032 1.53 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z" />
                        </svg>
                    </a>
                    <!-- LinkedIn -->
                    <a href="https://linkedin.com" target="_blank" rel="noopener noreferrer" aria-label="LinkedIn"
                        class="w-9 h-9 rounded-xl bg-slate-900 border border-slate-800 text-slate-400 hover:text-white hover:border-slate-700 flex items-center justify-center transition-all hover:scale-105 active:scale-95">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z" />
                        </svg>
                    </a>
                    @php
                        $footerWaRaw = $profile->phone ?? '6287799107735';
                        $footerWaClean = preg_replace('/[^0-9]/', '', $footerWaRaw);
                        if (str_starts_with($footerWaClean, '0')) {
                            $footerWa = '62' . substr($footerWaClean, 1);
                        } elseif (!str_starts_with($footerWaClean, '62') && !empty($footerWaClean)) {
                            $footerWa = str_starts_with($footerWaClean, '8') ? '62' . $footerWaClean : $footerWaClean;
                        } else {
                            $footerWa = $footerWaClean ?: '6287799107735';
                        }
                    @endphp
                    <!-- WhatsApp -->
                    <a href="https://wa.me/{{ $footerWa }}" target="_blank" rel="noopener noreferrer"
                        aria-label="WhatsApp"
                        class="w-9 h-9 rounded-xl bg-slate-900 border border-slate-800 text-slate-400 hover:text-emerald-400 hover:border-emerald-500/50 flex items-center justify-center transition-all hover:scale-105 active:scale-95">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981z" />
                        </svg>
                    </a>
                    <!-- Email -->
                    <a href="mailto:{{ $profile->email ?? 'betawidesign007@gmail.com' }}" aria-label="Email"
                        class="w-9 h-9 rounded-xl bg-slate-900 border border-slate-800 text-slate-400 hover:text-indigo-400 hover:border-indigo-500/50 flex items-center justify-center transition-all hover:scale-105 active:scale-95">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                    </a>
                </div>
            </div>

        </div>

        <!-- Bottom Copyright & Back to Top Link -->
        <div
            class="pt-8 flex flex-col sm:flex-row items-center justify-between gap-4 text-xs text-slate-400 text-center sm:text-left">
            <p>
                &copy; {{ date('Y') }} <span
                    class="text-slate-300 font-medium">{{ $profile->name ?? 'Ibrahim' }}</span>. Hak Cipta Dilindungi
                Undang-Undang.
            </p>
            <div class="flex items-center justify-center gap-4">
                <p class="flex items-center gap-1.5 text-slate-400">
                    <span>Dibangun dengan cinta</span>
                    <span class="text-rose-500">❤️</span>
                    <span>menggunakan</span>
                    <span class="text-indigo-400 font-medium">Laravel</span>
                </p>
                <span class="text-slate-700">&bull;</span>
                <a href="{{ route('login') }}"
                    class="text-slate-500 hover:text-slate-300 font-medium inline-flex items-center gap-1 transition-colors">
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                    </svg>
                    <span>Panel Admin</span>
                </a>
            </div>
        </div>
    </div>
</footer>
