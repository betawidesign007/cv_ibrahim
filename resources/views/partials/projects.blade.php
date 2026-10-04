<!-- Portfolio Projects Section -->
<section id="projects" class="py-16 sm:py-24 relative z-10 border-t border-slate-800/60 bg-[#070b14]/40">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Section Header -->
        <div class="text-center max-w-3xl mx-auto mb-12 sm:mb-16">
            <span class="text-xs sm:text-sm font-semibold tracking-wider text-purple-400 uppercase bg-purple-500/10 px-3 py-1 rounded-full border border-purple-500/20">Portofolio Pilihan</span>
            <h2 class="mt-3 text-2xl sm:text-4xl font-extrabold text-white tracking-tight">
                Karya & Proyek Unggulan
            </h2>
            <div class="w-16 h-1 bg-gradient-to-r from-purple-500 to-indigo-500 mx-auto mt-4 rounded-full"></div>
            <p class="mt-4 text-slate-400 text-sm sm:text-base leading-relaxed">
                Beberapa contoh sistem dan aplikasi nyata yang telah saya kembangkan dengan fokus pada performa, keamanan, dan keindahan antarmuka pengguna.
            </p>
        </div>

        <!-- Projects Grid (1 col on mobile HP, 2 col on md, 3 col on lg) -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 sm:gap-8">

            @if (isset($projects) && $projects->isNotEmpty())
                @foreach ($projects as $project)
                    @php
                        // Cycle gradient styles for variety
                        $gradients = [
                            ['from' => 'indigo', 'to' => 'purple', 'border' => 'indigo'],
                            ['from' => 'cyan', 'to' => 'blue', 'border' => 'cyan'],
                            ['from' => 'purple', 'to' => 'pink', 'border' => 'purple'],
                        ];
                        $grad = $gradients[$loop->index % 3];
                        $stacks = array_filter(array_map('trim', explode(',', $project->tech_stack)));
                    @endphp
                    <div class="group rounded-2xl bg-gradient-to-b from-[#0e1628] to-[#070b14] border border-slate-800 hover:border-{{ $grad['border'] }}-500/50 shadow-xl overflow-hidden flex flex-col justify-between transition-all duration-300 hover:-translate-y-1.5">
                        <div>
                            <!-- Visual Mockup Banner -->
                            <div class="h-48 sm:h-52 bg-gradient-to-br from-{{ $grad['from'] }}-900/60 via-slate-900 to-slate-950 relative overflow-hidden flex items-center justify-center p-6 border-b border-slate-800">
                                <div class="relative z-10 text-center space-y-2">
                                    <div class="w-12 h-12 mx-auto rounded-xl bg-{{ $grad['from'] }}-500/20 text-{{ $grad['from'] }}-400 border border-{{ $grad['from'] }}-500/30 flex items-center justify-center group-hover:scale-110 transition-transform">
                                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/></svg>
                                    </div>
                                    <span class="text-xs font-mono text-{{ $grad['from'] }}-300 uppercase tracking-widest block font-semibold">{{ $project->category }}</span>
                                </div>
                                @if ($project->badge)
                                    <span class="absolute top-3 right-3 px-2.5 py-1 text-[11px] font-semibold rounded-md bg-{{ $grad['from'] }}-500/20 text-{{ $grad['from'] }}-300 border border-{{ $grad['from'] }}-500/30">
                                        {{ $project->badge }}
                                    </span>
                                @endif
                            </div>

                            <!-- Project Content -->
                            <div class="p-5 sm:p-6 space-y-3">
                                <div class="flex flex-wrap gap-1.5">
                                    @foreach ($stacks as $stack)
                                        <span class="text-[11px] px-2 py-0.5 rounded bg-slate-900 text-slate-300 border border-slate-700/80 font-mono">{{ $stack }}</span>
                                    @endforeach
                                </div>
                                <h3 class="text-lg sm:text-xl font-bold text-white group-hover:text-{{ $grad['border'] }}-400 transition-colors">
                                    {{ $project->title }}
                                </h3>
                                <p class="text-xs sm:text-sm text-slate-400 leading-relaxed">
                                    {{ $project->description }}
                                </p>
                            </div>
                        </div>

                        <div class="p-5 sm:p-6 pt-0 flex items-center justify-between border-t border-slate-800/80 mt-4">
                            <div class="flex items-center gap-3">
                                @if ($project->demo_url)
                                    <a href="{{ $project->demo_url }}" target="_blank" rel="noopener noreferrer" class="text-xs font-semibold text-indigo-400 hover:text-indigo-300 inline-flex items-center gap-1 transition-colors">
                                        <span>Demo</span>
                                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                                    </a>
                                @endif
                                @if ($project->github_url)
                                    <a href="{{ $project->github_url }}" target="_blank" rel="noopener noreferrer" class="text-xs font-semibold text-slate-400 hover:text-white inline-flex items-center gap-1 transition-colors">
                                        <span>Code</span>
                                        <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 24 24"><path fill-rule="evenodd" clip-rule="evenodd" d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.53 1.032 1.53 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z"/></svg>
                                    </a>
                                @endif
                            </div>
                            <span class="text-[11px] text-emerald-400 font-medium flex items-center gap-1">
                                <span class="w-1.5 h-1.5 rounded-full bg-emerald-400"></span> {{ $project->status }}
                            </span>
                        </div>
                    </div>
                @endforeach
            @else
                <!-- Fallback Default Projects -->
                <div class="col-span-full py-12 text-center text-slate-500 text-sm">
                    Belum ada proyek yang ditambahkan di database.
                </div>
            @endif

        </div>

    </div>
</section>
