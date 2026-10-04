<!-- Hero Section -->
<section id="hero" class="relative pt-8 pb-16 sm:pt-16 sm:pb-24 lg:pt-20 lg:pb-32 overflow-hidden">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-8 items-center">

            <!-- Left Column: Introduction & CTA -->
            <div class="lg:col-span-7 space-y-6 sm:space-y-8 text-center lg:text-left">
                <!-- Available for work badge -->
                @if ($profile->is_available ?? true)
                    <div
                        class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-indigo-500/10 border border-indigo-500/20 text-indigo-400 text-xs sm:text-sm font-medium shadow-sm backdrop-blur-sm">
                        <span class="relative flex h-2 w-2">
                            <span
                                class="animate-ping absolute inline-flex h-full w-full rounded-full bg-emerald-400 opacity-75"></span>
                            <span class="relative inline-flex rounded-full h-2 w-2 bg-emerald-500"></span>
                        </span>
                        <span>{{ $profile->availability_badge ?? 'Tersedia untuk Pekerjaan Full-time / Freelance' }}</span>
                    </div>
                @endif

                <!-- Main Headline -->
                <div class="space-y-3">
                    <h1 class="text-3xl sm:text-5xl lg:text-6xl font-extrabold tracking-tight text-white leading-tight">
                        Halo, I'am <span
                            class="text-transparent bg-clip-text bg-gradient-to-r from-indigo-400 via-purple-400 to-cyan-400">{{ $profile->name ?? 'Ibrahim' }}</span>
                        <span class="inline-block animate-bounce origin-bottom-right">👋</span>
                    </h1>
                    <p class="text-xl sm:text-2xl font-semibold text-slate-300">
                        {{ $profile->title ?? 'Fullstack Web Developer & Software Engineer' }}
                    </p>
                </div>

                <!-- Bio Description -->
                <p class="text-slate-400 text-sm sm:text-base lg:text-lg leading-relaxed max-w-2xl mx-auto lg:mx-0">
                    {{ $profile->bio ?? 'Berpengalaman dalam merancang dan mengembangkan aplikasi web yang cepat, responsif, dan terstruktur rapi. Fokus pada ekosistem Laravel, arsitektur API modern, database relasional, dan UI/UX interaktif yang memanjakan pengguna di berbagai perangkat.' }}
                </p>

                <!-- Action Buttons (Responsive on Mobile) -->
                <div class="flex flex-col sm:flex-row items-center justify-center lg:justify-start gap-3 sm:gap-4 pt-2">
                    <a href="#projects"
                        class="w-full sm:w-auto inline-flex items-center justify-center gap-2 px-6 py-3.5 rounded-xl bg-gradient-to-r from-indigo-600 to-indigo-500 text-white font-semibold text-sm sm:text-base shadow-lg shadow-indigo-600/30 hover:shadow-indigo-600/50 hover:from-indigo-500 hover:to-indigo-400 transition-all duration-300 transform active:scale-95">
                        <span>Lihat Portofolio</span>
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M14 5l7 7m0 0l-7 7m7-7H3" />
                        </svg>
                    </a>
                    <a href="#contact"
                        class="w-full sm:w-auto inline-flex items-center justify-center gap-2 px-6 py-3.5 rounded-xl bg-slate-900 hover:bg-slate-800 text-slate-200 font-semibold text-sm sm:text-base border border-slate-700/80 hover:border-slate-600 transition-all duration-300 transform active:scale-95 shadow-sm">
                        <svg class="w-4 h-4 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                        </svg>
                        <span>Hubungi Saya</span>
                    </a>
                </div>

                <!-- Mini Tech Highlights & Socials -->
                <div
                    class="pt-4 flex flex-col sm:flex-row items-center justify-center lg:justify-start gap-4 text-slate-400 text-xs sm:text-sm">
                    <span class="font-medium text-slate-500 uppercase tracking-wider text-[11px]">Tech Stack
                        Utama:</span>
                    <div class="flex items-center gap-2 flex-wrap justify-center">
                        <span
                            class="px-2.5 py-1 rounded-md bg-slate-800/80 border border-slate-700/50 text-slate-300 font-mono text-xs">Laravel</span>
                        <span
                            class="px-2.5 py-1 rounded-md bg-slate-800/80 border border-slate-700/50 text-slate-300 font-mono text-xs">PHP
                            8.x</span>
                        <span
                            class="px-2.5 py-1 rounded-md bg-slate-800/80 border border-slate-700/50 text-slate-300 font-mono text-xs">TailwindCSS</span>
                        <span
                            class="px-2.5 py-1 rounded-md bg-slate-800/80 border border-slate-700/50 text-slate-300 font-mono text-xs">MySQL</span>
                        <span
                            class="px-2.5 py-1 rounded-md bg-slate-800/80 border border-slate-700/50 text-slate-300 font-mono text-xs">JavaScript</span>
                    </div>
                </div>
            </div>

            <!-- Right Column: Profile Card & Decorative Element -->
            <div class="lg:col-span-5 flex justify-center">
                <div class="relative w-full max-w-sm sm:max-w-md">
                    <!-- Glowing border effect -->
                    <div
                        class="absolute -inset-1 bg-gradient-to-r from-indigo-500 via-purple-500 to-cyan-500 rounded-3xl blur-xl opacity-30 group-hover:opacity-100 transition duration-1000 group-hover:duration-200">
                    </div>

                    <!-- Card Body -->
                    <div
                        class="relative rounded-2xl bg-gradient-to-b from-slate-900 to-[#0b1120] border border-slate-800 p-6 sm:p-8 shadow-2xl space-y-6">
                        <!-- Card Header / Avatar -->
                        <div class="flex items-center gap-4">
                            <div class="relative">
                                <div
                                    class="w-16 h-16 sm:w-20 sm:h-20 rounded-2xl bg-gradient-to-tr from-indigo-600 to-cyan-400 p-[2px] shadow-lg shadow-indigo-500/30">
                                    <div
                                        class="w-full h-full bg-slate-950 rounded-[14px] flex items-center justify-center overflow-hidden">
                                        @if (!empty($profile->avatar))
                                            <img src="{{ asset('storage/' . $profile->avatar) }}"
                                                alt="{{ $profile->name ?? 'Ibrahim' }}"
                                                class="w-full h-full object-cover">
                                        @else
                                            <!-- Code Developer Avatar SVG -->
                                            <svg class="w-10 h-10 sm:w-12 sm:h-12 text-indigo-400" fill="none"
                                                stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                            </svg>
                                        @endif
                                    </div>
                                </div>
                                <span class="absolute -bottom-1 -right-1 flex h-4 w-4">
                                    <span
                                        class="animate-ping absolute inline-flex h-full w-full rounded-full bg-emerald-400 opacity-75"></span>
                                    <span
                                        class="relative inline-flex rounded-full h-4 w-4 bg-emerald-500 border-2 border-slate-950"></span>
                                </span>
                            </div>
                            <div>
                                <h3 class="text-lg sm:text-xl font-bold text-white">{{ $profile->name ?? 'Ibrahim' }}
                                </h3>
                                <p class="text-xs sm:text-sm text-indigo-400 font-medium">
                                    {{ $profile->title ?? 'Web Engineer' }}</p>
                                <p class="text-xs text-slate-400 flex items-center gap-1 mt-1">
                                    <svg class="w-3.5 h-3.5 text-slate-500" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                    </svg>
                                    {{ $profile->location ?? 'Indonesia' }}
                                </p>
                            </div>
                        </div>

                        <!-- Code / Terminal Mockup Snippet -->
                        <div
                            class="rounded-xl bg-slate-950/90 border border-slate-800/80 p-4 font-mono text-xs text-slate-300 space-y-2">
                            <div
                                class="flex items-center justify-between pb-2 border-b border-slate-800/60 text-slate-500 text-[10px]">
                                <span class="flex items-center gap-1.5">
                                    <span class="w-2.5 h-2.5 rounded-full bg-rose-500/80 inline-block"></span>
                                    <span class="w-2.5 h-2.5 rounded-full bg-amber-500/80 inline-block"></span>
                                    <span class="w-2.5 h-2.5 rounded-full bg-emerald-500/80 inline-block"></span>
                                </span>
                                <span>developer.php</span>
                            </div>
                            <div class="space-y-1 text-slate-300">
                                <p><span class="text-indigo-400">$developer</span> = [</p>
                                <p class="pl-4"><span class="text-purple-400">'name'</span> => <span
                                        class="text-emerald-400">'{{ $profile->name ?? 'Ibrahim' }}'</span>,</p>
                                <p class="pl-4"><span class="text-purple-400">'role'</span> => <span
                                        class="text-emerald-400">'Fullstack Artisan'</span>,</p>
                                <p class="pl-4"><span class="text-purple-400">'ready_to_hire'</span> => <span
                                        class="text-cyan-400">{{ $profile->is_available ?? true ? 'true' : 'false' }}</span>,
                                </p>
                                <p>];</p>
                            </div>
                        </div>

                        <!-- Quick Stats Grid in Card -->
                        <div class="grid grid-cols-3 gap-2 pt-2 border-t border-slate-800/80 text-center">
                            <div class="p-2 rounded-lg bg-slate-800/40">
                                <div class="text-base sm:text-lg font-bold text-indigo-400">
                                    {{ $profile->experience_years ?? 3 }}+</div>
                                <div class="text-[10px] text-slate-400">Tahun Exp</div>
                            </div>
                            <div class="p-2 rounded-lg bg-slate-800/40">
                                <div class="text-base sm:text-lg font-bold text-cyan-400">
                                    {{ $profile->completed_projects ?? 20 }}+</div>
                                <div class="text-[10px] text-slate-400">Proyek</div>
                            </div>
                            <div class="p-2 rounded-lg bg-slate-800/40">
                                <div class="text-base sm:text-lg font-bold text-emerald-400">100%</div>
                                <div class="text-[10px] text-slate-400">Dedikasi</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
