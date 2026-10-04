<!-- About Section -->
<section id="about" class="py-16 sm:py-24 relative z-10 border-t border-slate-800/60 bg-[#070b14]/50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <!-- Section Header -->
        <div class="text-center max-w-3xl mx-auto mb-12 sm:mb-16">
            <span
                class="text-xs sm:text-sm font-semibold tracking-wider text-indigo-400 uppercase bg-indigo-500/10 px-3 py-1 rounded-full border border-indigo-500/20">Tentang
                Saya</span>
            <h2 class="mt-3 text-2xl sm:text-4xl font-extrabold text-white tracking-tight">
                {{ $profile->headline ?? 'Menciptakan Solusi Melalui Kode & Desain' }}
            </h2>
            <div class="w-16 h-1 bg-gradient-to-r from-indigo-500 to-cyan-400 mx-auto mt-4 rounded-full"></div>
            <p class="mt-4 text-slate-400 text-sm sm:text-base leading-relaxed">
                Kombinasi antara logika teknis yang kuat, pemecahan masalah analitis, dan perhatian mendalam terhadap
                antarmuka pengguna yang ramah di berbagai layar HP maupun desktop.
            </p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-12 items-center">

            <!-- Left: Highlights & Core Values -->
            <div class="lg:col-span-6 space-y-6">
                <h3 class="text-xl sm:text-2xl font-bold text-white">
                    Siapa Saya?
                </h3>
                <p class="text-slate-300 text-sm sm:text-base leading-relaxed">
                    {{ $profile->about_text ?? 'Saya adalah seorang web developer berdedikasi yang mencintai ekosistem web modern. Memiliki ketertarikan mendalam dalam membangun sistem backend yang aman menggunakan Laravel serta mengintegrasikan antarmuka frontend yang luwes, ringan, dan cepat di berbagai layar smartphone (HP) maupun desktop.' }}
                </p>

                <!-- Value Proposition Badges -->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 pt-2">
                    <div class="p-4 rounded-xl bg-slate-900/60 border border-slate-800 flex items-start gap-3">
                        <div class="p-2 rounded-lg bg-indigo-500/10 text-indigo-400">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4" />
                            </svg>
                        </div>
                        <div>
                            <h4 class="text-sm font-semibold text-white">Clean Code</h4>
                            <p class="text-xs text-slate-400 mt-1">Struktur kode modular, rapi, dan mudah di-maintain.
                            </p>
                        </div>
                    </div>

                    <div class="p-4 rounded-xl bg-slate-900/60 border border-slate-800 flex items-start gap-3">
                        <div class="p-2 rounded-lg bg-cyan-500/10 text-cyan-400">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z" />
                            </svg>
                        </div>
                        <div>
                            <h4 class="text-sm font-semibold text-white">Mobile Friendly</h4>
                            <p class="text-xs text-slate-400 mt-1">Optimal dan responsif di semua ukuran layar
                                smartphone.</p>
                        </div>
                    </div>

                    <div class="p-4 rounded-xl bg-slate-900/60 border border-slate-800 flex items-start gap-3">
                        <div class="p-2 rounded-lg bg-purple-500/10 text-purple-400">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13 10V3L4 14h7v7l9-11h-7z" />
                            </svg>
                        </div>
                        <div>
                            <h4 class="text-sm font-semibold text-white">High Performance</h4>
                            <p class="text-xs text-slate-400 mt-1">Optimasi asset dan query database untuk loading
                                kilat.</p>
                        </div>
                    </div>

                    <div class="p-4 rounded-xl bg-slate-900/60 border border-slate-800 flex items-start gap-3">
                        <div class="p-2 rounded-lg bg-emerald-500/10 text-emerald-400">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                            </svg>
                        </div>
                        <div>
                            <h4 class="text-sm font-semibold text-white">Best Security</h4>
                            <p class="text-xs text-slate-400 mt-1">Penerapan proteksi CSRF, sanitasi input, dan
                                otorisasi ketat.</p>
                        </div>
                    </div>
                </div>

                <!-- Action Button -->
                <div class="pt-2">
                    <a href="#contact"
                        class="inline-flex items-center gap-2 text-indigo-400 hover:text-indigo-300 font-semibold text-sm group">
                        <span>Ingin berkolaborasi bersama saya?</span>
                        <svg class="w-4 h-4 transform group-hover:translate-x-1 transition-transform" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 8l4 4m0 0l-4 4m4-4H3" />
                        </svg>
                    </a>
                </div>
            </div>

            <!-- Right: Interactive Info Cards & Stats -->
            <div class="lg:col-span-6 space-y-4 sm:space-y-6">
                <!-- Info Box 1 -->
                <div
                    class="p-6 rounded-2xl bg-gradient-to-br from-slate-900/90 to-slate-950 border border-slate-800/90 shadow-xl relative overflow-hidden group hover:border-indigo-500/40 transition-colors">
                    <div class="flex items-center justify-between mb-4">
                        <span class="text-xs font-semibold text-indigo-400 uppercase tracking-wider">Pendidikan & Latar
                            Belakang</span>
                        <span class="text-xs text-slate-400">Teknik Informatika / IT</span>
                    </div>
                    <h4 class="text-base sm:text-lg font-bold text-white mb-2">Pondasi Rekayasa Perangkat Lunak</h4>
                    <p class="text-xs sm:text-sm text-slate-400 leading-relaxed">
                        Mempelajari konsep dasar ilmu komputer, algoritma pemrograman, perancangan basis data, hingga
                        implementasi arsitektur MVC dan RESTful API modern.
                    </p>
                </div>

                <!-- Info Box 2 -->
                <div
                    class="p-6 rounded-2xl bg-gradient-to-br from-slate-900/90 to-slate-950 border border-slate-800/90 shadow-xl relative overflow-hidden group hover:border-cyan-500/40 transition-colors">
                    <div class="flex items-center justify-between mb-4">
                        <span class="text-xs font-semibold text-cyan-400 uppercase tracking-wider">Komitmen
                            Kualitas</span>
                        <span class="text-xs text-slate-400">Standar Industri</span>
                    </div>
                    <h4 class="text-base sm:text-lg font-bold text-white mb-2">Pengembangan Berkelanjutan</h4>
                    <p class="text-xs sm:text-sm text-slate-400 leading-relaxed">
                        Terus memperbarui wawasan terhadap tren teknologi terbaru, implementasi Git version control,
                        automasi deploy, dan pengujian berkala.
                    </p>
                </div>

                <!-- Stats Bar -->
                <div class="grid grid-cols-2 sm:grid-cols-3 gap-4 pt-2">
                    <div class="p-4 rounded-xl bg-slate-900/80 border border-slate-800 text-center">
                        <div
                            class="text-2xl sm:text-3xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-indigo-400 to-cyan-400">
                            100%</div>
                        <div class="text-xs text-slate-400 mt-1">Komitmen Proyek</div>
                    </div>
                    <div class="p-4 rounded-xl bg-slate-900/80 border border-slate-800 text-center">
                        <div
                            class="text-2xl sm:text-3xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-purple-400 to-indigo-400">
                            24/7</div>
                        <div class="text-xs text-slate-400 mt-1">Dukungan Komunikasi</div>
                    </div>
                    <div
                        class="col-span-2 sm:col-span-1 p-4 rounded-xl bg-slate-900/80 border border-slate-800 text-center">
                        <div
                            class="text-2xl sm:text-3xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-emerald-400 to-teal-400">
                            &lt; 1s</div>
                        <div class="text-xs text-slate-400 mt-1">Target Respons Web</div>
                    </div>
                </div>
            </div>

        </div>

    </div>
</section>
