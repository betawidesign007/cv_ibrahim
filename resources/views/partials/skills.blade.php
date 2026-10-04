<!-- Skills & Tech Stack Section -->
<section id="skills" class="py-16 sm:py-24 relative z-10 border-t border-slate-800/60">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Section Header -->
        <div class="text-center max-w-3xl mx-auto mb-12 sm:mb-16">
            <span class="text-xs sm:text-sm font-semibold tracking-wider text-cyan-400 uppercase bg-cyan-500/10 px-3 py-1 rounded-full border border-cyan-500/20">Keahlian & Teknologi</span>
            <h2 class="mt-3 text-2xl sm:text-4xl font-extrabold text-white tracking-tight">
                Tech Stack yang Saya Kuasai
            </h2>
            <div class="w-16 h-1 bg-gradient-to-r from-cyan-400 to-indigo-500 mx-auto mt-4 rounded-full"></div>
            <p class="mt-4 text-slate-400 text-sm sm:text-base leading-relaxed">
                Berbagai perangkat lunak, bahasa pemrograman, dan framework yang saya gunakan untuk mewujudkan produk digital yang andal dan terstruktur.
            </p>
        </div>

        @php
            $categoryMeta = [
                'Backend Dev' => [
                    'color' => 'indigo',
                    'desc' => 'Membangun logika bisnis yang tangguh, routing aman, dan REST API cepat.',
                    'svg' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14M5 12a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v4a2 2 0 01-2 2M5 12a2 2 0 00-2 2v4a2 2 0 002 2h14a2 2 0 002-2v-4a2 2 0 00-2-2m-2-4h.01M17 16h.01"/>',
                    'default' => ['Laravel 11/12', 'PHP 8.x', 'RESTful API', 'MVC Pattern', 'Composer'],
                ],
                'Frontend & Mobile UI' => [
                    'color' => 'cyan',
                    'desc' => 'Tampilan presisi pixel, adaptif untuk HP & tablet, serta interaksi dinamis.',
                    'svg' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>',
                    'default' => ['TailwindCSS', 'Blade Engine', 'JavaScript ES6+', 'Responsive UX', 'HTML5 / CSS3'],
                ],
                'Database & Storage' => [
                    'color' => 'emerald',
                    'desc' => 'Perancangan skema relasional, optimasi index query, dan integrasi ORM.',
                    'svg' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 7v10c0 2.21 3.582 4 8 4s8-1.79 8-4V7M4 7c0 2.21 3.582 4 8 4s8-1.79 8-4M4 7c0-2.21 3.582-4 8-4s8 1.79 8 4m0 5c0 2.21-3.582 4-8 4s-8-1.79-8-4"/>',
                    'default' => ['MySQL', 'PostgreSQL', 'SQLite', 'Eloquent ORM', 'Migrations'],
                ],
                'Tools & Workflow' => [
                    'color' => 'purple',
                    'desc' => 'Pengelolaan kode tim, automasi build asset, dan pengujian API.',
                    'svg' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>',
                    'default' => ['Git / GitHub', 'Vite', 'Postman', 'NPM', 'Linux CLI'],
                ],
            ];
        @endphp

        <!-- Skills Grid (Responsive: 1 col on mobile, 2 col on tablet, 4 col on desktop) -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">

            @foreach ($categoryMeta as $catName => $meta)
                @php
                    $categorySkills = isset($skills) && $skills->has($catName) ? $skills->get($catName) : null;
                @endphp
                <div class="rounded-2xl bg-[#0b1120] border border-slate-800/80 p-6 hover:border-{{ $meta['color'] }}-500/50 hover:shadow-xl hover:shadow-{{ $meta['color'] }}-500/10 transition-all duration-300 group flex flex-col justify-between">
                    <div>
                        <div class="w-12 h-12 rounded-xl bg-{{ $meta['color'] }}-500/10 text-{{ $meta['color'] }}-400 flex items-center justify-center mb-5 group-hover:scale-110 transition-transform">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                {!! $meta['svg'] !!}
                            </svg>
                        </div>
                        <h3 class="text-lg font-bold text-white mb-2 group-hover:text-{{ $meta['color'] }}-400 transition-colors">{{ $catName }}</h3>
                        <p class="text-xs text-slate-400 leading-relaxed mb-4">{{ $meta['desc'] }}</p>
                    </div>

                    <div class="flex flex-wrap gap-2 pt-2 border-t border-slate-800">
                        @if ($categorySkills && $categorySkills->isNotEmpty())
                            @foreach ($categorySkills as $item)
                                <span class="px-2.5 py-1 text-xs rounded-md bg-slate-900 border border-slate-700/60 text-slate-300">
                                    {{ $item->name }}
                                </span>
                            @endforeach
                        @else
                            @foreach ($meta['default'] as $defName)
                                <span class="px-2.5 py-1 text-xs rounded-md bg-slate-900 border border-slate-700/60 text-slate-300">
                                    {{ $defName }}
                                </span>
                            @endforeach
                        @endif
                    </div>
                </div>
            @endforeach

        </div>

    </div>
</section>
