@extends('layouts.admin')

@section('title', 'Dashboard')
@section('page_title', 'Ringkasan Dashboard')

@section('admin_content')
    <div class="space-y-8">

        <!-- Welcome Banner -->
        <div
            class="relative overflow-hidden rounded-2xl bg-gradient-to-r from-indigo-900/60 via-purple-900/40 to-slate-900 border border-slate-800 p-6 sm:p-8">
            <div class="relative z-10 max-w-2xl space-y-2">
                <span
                    class="px-2.5 py-1 text-xs font-semibold rounded-md bg-indigo-500/20 text-indigo-300 border border-indigo-500/30">
                    Panel Manajemen Portofolio
                </span>
                <h2 class="text-2xl sm:text-3xl font-extrabold text-white">
                    Selamat Datang, {{ auth()->user()->name }}! 👋
                </h2>
                <p class="text-sm text-slate-300 leading-relaxed">
                    Kelola profil, proyek showcase, daftar keahlian teknologi, dan pantau pesan masuk dari calon klien atau
                    perekrut secara real-time.
                </p>
            </div>
            <div class="absolute -right-10 -bottom-10 w-64 h-64 bg-indigo-600/10 rounded-full blur-3xl pointer-events-none">
            </div>
        </div>

        <!-- Stat Metric Cards -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">

            <!-- Total Proyek -->
            <div
                class="rounded-2xl bg-[#0b1120] border border-slate-800 p-5 hover:border-indigo-500/40 transition-colors shadow-lg">
                <div class="flex items-center justify-between">
                    <span class="text-xs font-semibold text-slate-400 uppercase tracking-wider">Total Proyek</span>
                    <div class="p-2.5 rounded-xl bg-indigo-500/10 text-indigo-400">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                        </svg>
                    </div>
                </div>
                <div class="mt-4 flex items-baseline gap-2">
                    <span class="text-3xl font-extrabold text-white">{{ $totalProjects }}</span>
                    <span class="text-xs text-slate-400">karya aktif</span>
                </div>
                <div class="mt-4 pt-3 border-t border-slate-800/80">
                    <a href="{{ route('admin.projects.index') }}"
                        class="text-xs font-semibold text-indigo-400 hover:text-indigo-300 inline-flex items-center gap-1">
                        <span>Kelola Proyek</span>
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                    </a>
                </div>
            </div>

            <!-- Total Keahlian -->
            <div
                class="rounded-2xl bg-[#0b1120] border border-slate-800 p-5 hover:border-cyan-500/40 transition-colors shadow-lg">
                <div class="flex items-center justify-between">
                    <span class="text-xs font-semibold text-slate-400 uppercase tracking-wider">Keahlian (Skills)</span>
                    <div class="p-2.5 rounded-xl bg-cyan-500/10 text-cyan-400">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4" />
                        </svg>
                    </div>
                </div>
                <div class="mt-4 flex items-baseline gap-2">
                    <span class="text-3xl font-extrabold text-white">{{ $totalSkills }}</span>
                    <span class="text-xs text-slate-400">tech stack</span>
                </div>
                <div class="mt-4 pt-3 border-t border-slate-800/80">
                    <a href="{{ route('admin.skills.index') }}"
                        class="text-xs font-semibold text-cyan-400 hover:text-cyan-300 inline-flex items-center gap-1">
                        <span>Kelola Keahlian</span>
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                    </a>
                </div>
            </div>

            <!-- Pesan Belum Dibaca -->
            <div
                class="rounded-2xl bg-[#0b1120] border border-slate-800 p-5 hover:border-rose-500/40 transition-colors shadow-lg">
                <div class="flex items-center justify-between">
                    <span class="text-xs font-semibold text-slate-400 uppercase tracking-wider">Pesan Baru</span>
                    <div class="p-2.5 rounded-xl bg-rose-500/10 text-rose-400">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                    </div>
                </div>
                <div class="mt-4 flex items-baseline gap-2">
                    <span class="text-3xl font-extrabold text-white">{{ $unreadMessages }}</span>
                    <span class="text-xs text-rose-400 font-medium">belum dibaca</span>
                </div>
                <div class="mt-4 pt-3 border-t border-slate-800/80">
                    <a href="{{ route('admin.messages.index') }}"
                        class="text-xs font-semibold text-rose-400 hover:text-rose-300 inline-flex items-center gap-1">
                        <span>Buka Kotak Masuk</span>
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                    </a>
                </div>
            </div>

            <!-- Status Ketersediaan -->
            <div
                class="rounded-2xl bg-[#0b1120] border border-slate-800 p-5 hover:border-emerald-500/40 transition-colors shadow-lg">
                <div class="flex items-center justify-between">
                    <span class="text-xs font-semibold text-slate-400 uppercase tracking-wider">Status Portofolio</span>
                    <div class="p-2.5 rounded-xl bg-emerald-500/10 text-emerald-400">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                </div>
                <div class="mt-4">
                    <span
                        class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-semibold {{ $profile->is_available ?? true ? 'bg-emerald-500/15 text-emerald-400 border border-emerald-500/30' : 'bg-slate-800 text-slate-400' }}">
                        <span
                            class="w-2 h-2 rounded-full {{ $profile->is_available ?? true ? 'bg-emerald-400 animate-pulse' : 'bg-slate-500' }}"></span>
                        {{ $profile->is_available ?? true ? 'Siap Menerima Proyek' : 'Sibuk / Ditutup' }}
                    </span>
                </div>
                <div class="mt-4 pt-3 border-t border-slate-800/80">
                    <a href="{{ route('admin.profile.edit') }}"
                        class="text-xs font-semibold text-emerald-400 hover:text-emerald-300 inline-flex items-center gap-1">
                        <span>Ubah Profil & Status</span>
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                    </a>
                </div>
            </div>

        </div>

        <!-- Two Columns: Recent Projects & Recent Messages -->
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">

            <!-- Left: Recent Projects -->
            <div class="lg:col-span-7 rounded-2xl bg-[#0b1120] border border-slate-800 p-6 shadow-xl space-y-5">
                <div class="flex items-center justify-between">
                    <div>
                        <h3 class="text-base font-bold text-white">Daftar Proyek Terkini</h3>
                        <p class="text-xs text-slate-400">Proyek yang sedang aktif tampil di portofolio</p>
                    </div>
                    <a href="{{ route('admin.projects.create') }}"
                        class="px-3 py-1.5 rounded-lg bg-indigo-600 hover:bg-indigo-500 text-white text-xs font-semibold inline-flex items-center gap-1.5 transition-all">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                        </svg>
                        <span>Tambah</span>
                    </a>
                </div>

                <div class="divide-y divide-slate-800/80">
                    @forelse ($recentProjects as $project)
                        <div class="py-3.5 flex items-center justify-between gap-4 group">
                            <div class="min-w-0">
                                <h4
                                    class="text-sm font-semibold text-white group-hover:text-indigo-400 transition-colors truncate">
                                    {{ $project->title }}
                                </h4>
                                <p class="text-xs text-slate-400 truncate mt-0.5 font-mono">
                                    {{ $project->category }} &bull; {{ $project->tech_stack }}
                                </p>
                            </div>
                            <div class="flex items-center gap-2 shrink-0">
                                <span class="px-2 py-0.5 rounded text-[11px] font-medium bg-slate-800 text-slate-300">
                                    {{ $project->status }}
                                </span>
                                <a href="{{ route('admin.projects.edit', $project) }}"
                                    class="p-1.5 text-slate-400 hover:text-white hover:bg-slate-800 rounded-md transition-colors"
                                    title="Edit">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    @empty
                        <div class="py-8 text-center text-xs text-slate-500">
                            Belum ada proyek yang ditambahkan.
                        </div>
                    @endforelse
                </div>
            </div>

            <!-- Right: Recent Messages -->
            <div class="lg:col-span-5 rounded-2xl bg-[#0b1120] border border-slate-800 p-6 shadow-xl space-y-5">
                <div class="flex items-center justify-between">
                    <div>
                        <h3 class="text-base font-bold text-white">Pesan Masuk Terbaru</h3>
                        <p class="text-xs text-slate-400">Pesan dari formulir kontak website</p>
                    </div>
                    <a href="{{ route('admin.messages.index') }}"
                        class="text-xs font-semibold text-indigo-400 hover:text-indigo-300">
                        Lihat Semua
                    </a>
                </div>

                <div class="divide-y divide-slate-800/80">
                    @forelse ($recentMessages as $msg)
                        <a href="{{ route('admin.messages.show', $msg) }}" class="py-3 flex items-start gap-3 group">
                            <div
                                class="w-8 h-8 rounded-full {{ $msg->is_read ? 'bg-slate-800 text-slate-400' : 'bg-rose-500/20 text-rose-400 border border-rose-500/30' }} flex items-center justify-center text-xs font-bold shrink-0 mt-0.5">
                                {{ strtoupper(substr($msg->name, 0, 1)) }}
                            </div>
                            <div class="min-w-0 flex-1">
                                <div class="flex items-center justify-between gap-2">
                                    <span
                                        class="text-xs font-semibold {{ $msg->is_read ? 'text-slate-300' : 'text-white font-bold' }} truncate">
                                        {{ $msg->name }}
                                    </span>
                                    <span class="text-[10px] text-slate-500 shrink-0">
                                        {{ $msg->created_at->diffForHumans() }}
                                    </span>
                                </div>
                                <p class="text-xs text-slate-400 truncate mt-0.5">
                                    {{ $msg->subject ?? $msg->message }}
                                </p>
                            </div>
                        </a>
                    @empty
                        <div class="py-8 text-center text-xs text-slate-500">
                            Belum ada pesan yang masuk.
                        </div>
                    @endforelse
                </div>
            </div>

        </div>

    </div>
@endsection
