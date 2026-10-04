<!-- Header & Sticky Navbar -->
<header
    class="sticky top-0 z-50 w-full backdrop-blur-xl bg-[#070b14]/80 border-b border-slate-800/80 transition-all duration-300">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-16 sm:h-20">
            <!-- Brand Logo -->
            <a href="#hero" class="flex items-center gap-3 group">
                <div
                    class="w-10 h-10 rounded-xl bg-gradient-to-tr from-indigo-600 via-indigo-500 to-cyan-400 p-[1.5px] shadow-lg shadow-indigo-500/20 group-hover:scale-105 transition-transform duration-300">
                    <div
                        class="w-full h-full bg-[#0b1120] rounded-[10px] flex items-center justify-center overflow-hidden">
                        @if (!empty($profile->logo_image))
                            <img src="{{ asset('storage/' . $profile->logo_image) }}" alt="Logo"
                                class="max-h-full max-w-full object-contain p-1">
                        @else
                            <span
                                class="font-extrabold text-sm sm:text-base text-transparent bg-clip-text bg-gradient-to-r from-indigo-400 to-cyan-400 font-mono">
                                {{ $profile->logo_initials ?? 'IB' }}
                            </span>
                        @endif
                    </div>
                </div>
                <div class="flex flex-col">
                    <span
                        class="font-bold text-base sm:text-lg tracking-tight text-white group-hover:text-indigo-400 transition-colors">{{ $profile->name ?? 'Ibrahim' }}<span
                            class="text-indigo-500">.</span></span>
                    <span
                        class="text-[10px] tracking-wider uppercase text-slate-400 font-medium line-clamp-1">{{ $profile->title ?? 'Software Engineer' }}</span>
                </div>
            </a>

            <!-- Desktop Navigation Links -->
            <nav
                class="hidden md:flex items-center gap-1 lg:gap-2 bg-slate-900/60 p-1.5 rounded-full border border-slate-800/70 shadow-inner">
                <a href="#hero"
                    class="nav-desktop-link px-4 py-2 text-sm font-medium text-slate-300 hover:text-white rounded-full hover:bg-slate-800/70 transition-all">Beranda</a>
                <a href="#about"
                    class="nav-desktop-link px-4 py-2 text-sm font-medium text-slate-300 hover:text-white rounded-full hover:bg-slate-800/70 transition-all">Tentang</a>
                <a href="#skills"
                    class="nav-desktop-link px-4 py-2 text-sm font-medium text-slate-300 hover:text-white rounded-full hover:bg-slate-800/70 transition-all">Keahlian</a>
                <a href="#projects"
                    class="nav-desktop-link px-4 py-2 text-sm font-medium text-slate-300 hover:text-white rounded-full hover:bg-slate-800/70 transition-all">Portofolio</a>
                <a href="#experience"
                    class="nav-desktop-link px-4 py-2 text-sm font-medium text-slate-300 hover:text-white rounded-full hover:bg-slate-800/70 transition-all">Pengalaman</a>
                <a href="#contact"
                    class="nav-desktop-link px-4 py-2 text-sm font-medium text-slate-300 hover:text-white rounded-full hover:bg-slate-800/70 transition-all">Kontak</a>
            </nav>

            <!-- Action CTA Button (Desktop) -->
            <div class="hidden md:flex items-center gap-3">
                <a href="#contact"
                    class="relative inline-flex items-center justify-center p-0.5 overflow-hidden text-xs font-semibold rounded-full group bg-gradient-to-br from-indigo-500 via-purple-500 to-cyan-500 group-hover:from-indigo-600 group-hover:to-cyan-600 hover:text-white shadow-md shadow-indigo-500/20 active:scale-95 transition-all">
                    <span
                        class="relative px-5 py-2.5 transition-all ease-in duration-200 bg-[#070b14] rounded-full group-hover:bg-transparent text-white flex items-center gap-2">
                        <span class="relative flex h-2 w-2">
                            <span
                                class="animate-ping absolute inline-flex h-full w-full rounded-full bg-emerald-400 opacity-75"></span>
                            <span class="relative inline-flex rounded-full h-2 w-2 bg-emerald-500"></span>
                        </span>
                        Hubungi Saya
                    </span>
                </a>
            </div>

            <!-- Mobile Hamburger Button (HP Screen) -->
            <div class="flex md:hidden items-center gap-2">
                <a href="#contact"
                    class="px-3 py-1.5 text-xs font-semibold text-white bg-indigo-600 rounded-lg hover:bg-indigo-500 active:scale-95 transition-all">
                    Kontak
                </a>
                <button id="mobileMenuToggleBtn" aria-label="Buka navigasi menu" aria-expanded="false"
                    class="p-2.5 rounded-xl bg-slate-800/80 text-slate-300 hover:text-white hover:bg-slate-700/80 border border-slate-700/60 focus:outline-none focus:ring-2 focus:ring-indigo-500 transition-all active:scale-90">
                    <!-- Hamburger Icon -->
                    <svg id="hamburgerIcon" class="w-6 h-6 transition-transform duration-200" fill="none"
                        stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16m-7 6h7"></path>
                    </svg>
                    <!-- Close Icon -->
                    <svg id="closeIcon" class="w-6 h-6 hidden transition-transform duration-200" fill="none"
                        stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                        </path>
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile Drawer Navigation (Responsip Layar HP) -->
    <div id="mobileMenu"
        class="md:hidden hidden border-t border-slate-800 bg-[#070b14]/95 backdrop-blur-2xl transition-all duration-300 px-4 pt-3 pb-6 space-y-1 shadow-2xl">
        <a href="#hero"
            class="mobile-nav-link flex items-center gap-3 px-4 py-3 rounded-xl text-base font-medium text-slate-200 hover:bg-indigo-600/10 hover:text-indigo-400 active:bg-indigo-600/20 transition-all">
            <svg class="w-5 h-5 text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
            </svg>
            Beranda
        </a>
        <a href="#about"
            class="mobile-nav-link flex items-center gap-3 px-4 py-3 rounded-xl text-base font-medium text-slate-200 hover:bg-indigo-600/10 hover:text-indigo-400 active:bg-indigo-600/20 transition-all">
            <svg class="w-5 h-5 text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
            </svg>
            Tentang Saya
        </a>
        <a href="#skills"
            class="mobile-nav-link flex items-center gap-3 px-4 py-3 rounded-xl text-base font-medium text-slate-200 hover:bg-indigo-600/10 hover:text-indigo-400 active:bg-indigo-600/20 transition-all">
            <svg class="w-5 h-5 text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4" />
            </svg>
            Keahlian & Stack
        </a>
        <a href="#projects"
            class="mobile-nav-link flex items-center gap-3 px-4 py-3 rounded-xl text-base font-medium text-slate-200 hover:bg-indigo-600/10 hover:text-indigo-400 active:bg-indigo-600/20 transition-all">
            <svg class="w-5 h-5 text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
            </svg>
            Portofolio Proyek
        </a>
        <a href="#experience"
            class="mobile-nav-link flex items-center gap-3 px-4 py-3 rounded-xl text-base font-medium text-slate-200 hover:bg-indigo-600/10 hover:text-indigo-400 active:bg-indigo-600/20 transition-all">
            <svg class="w-5 h-5 text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
            </svg>
            Pengalaman
        </a>
        <a href="#contact"
            class="mobile-nav-link flex items-center gap-3 px-4 py-3 rounded-xl text-base font-medium text-slate-200 hover:bg-indigo-600/10 hover:text-indigo-400 active:bg-indigo-600/20 transition-all">
            <svg class="w-5 h-5 text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
            </svg>
            Hubungi Saya
        </a>

        <!-- Extra Mobile Social Links -->
        <div class="pt-4 mt-2 border-t border-slate-800/80 flex items-center justify-around text-slate-400">
            <a href="https://github.com" target="_blank" rel="noopener noreferrer"
                class="p-2 hover:text-white transition-colors" aria-label="GitHub">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.53 1.032 1.53 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z" />
                </svg>
            </a>
            <a href="https://linkedin.com" target="_blank" rel="noopener noreferrer"
                class="p-2 hover:text-white transition-colors" aria-label="LinkedIn">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                    <path
                        d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z" />
                </svg>
            </a>
            <a href="mailto:{{ $profile->email ?? 'betawidesign007@gmail.com' }}"
                class="p-2 hover:text-white transition-colors" aria-label="Email">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                </svg>
            </a>
        </div>
    </div>
</header>

<script>
    // Responsive Mobile Menu Toggle
    document.addEventListener('DOMContentLoaded', () => {
        const toggleBtn = document.getElementById('mobileMenuToggleBtn');
        const mobileMenu = document.getElementById('mobileMenu');
        const hamburgerIcon = document.getElementById('hamburgerIcon');
        const closeIcon = document.getElementById('closeIcon');
        const mobileLinks = document.querySelectorAll('.mobile-nav-link');

        function toggleMenu() {
            const isHidden = mobileMenu.classList.contains('hidden');
            if (isHidden) {
                mobileMenu.classList.remove('hidden');
                hamburgerIcon.classList.add('hidden');
                closeIcon.classList.remove('hidden');
                toggleBtn.setAttribute('aria-expanded', 'true');
            } else {
                mobileMenu.classList.add('hidden');
                hamburgerIcon.classList.remove('hidden');
                closeIcon.classList.add('hidden');
                toggleBtn.setAttribute('aria-expanded', 'false');
            }
        }

        toggleBtn?.addEventListener('click', (e) => {
            e.stopPropagation();
            toggleMenu();
        });

        // Close menu on link click
        mobileLinks.forEach(link => {
            link.addEventListener('click', () => {
                if (!mobileMenu.classList.contains('hidden')) {
                    toggleMenu();
                }
            });
        });

        // Close when clicking outside
        document.addEventListener('click', (e) => {
            if (!mobileMenu.classList.contains('hidden') && !mobileMenu.contains(e.target) && !toggleBtn
                .contains(e.target)) {
                toggleMenu();
            }
        });
    });
</script>
