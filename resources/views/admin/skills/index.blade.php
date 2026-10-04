@extends('layouts.admin')

@section('title', 'Keahlian (Skills)')
@section('page_title', 'Kelola Keahlian & Tech Stack')

@section('admin_content')
<div class="space-y-6">
    
    <!-- Actions Bar -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div>
            <h2 class="text-xl font-bold text-white">Daftar Keahlian Teknologi</h2>
            <p class="text-xs text-slate-400 mt-0.5">Kelola teknologi, framework, dan alat yang tampil di portofolio</p>
        </div>
        <a href="{{ route('admin.skills.create') }}" class="inline-flex items-center justify-center gap-2 px-4 py-2.5 rounded-xl bg-indigo-600 hover:bg-indigo-500 text-white font-semibold text-xs sm:text-sm shadow-lg shadow-indigo-600/30 transition-all active:scale-95">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
            <span>Tambah Keahlian</span>
        </a>
    </div>

    <!-- Skills List Grouped by Category -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        @foreach ($categories as $cat)
            @php
                $catSkills = $skills->where('category', $cat);
            @endphp
            <div class="rounded-2xl bg-[#0b1120] border border-slate-800 p-6 shadow-xl space-y-4 flex flex-col justify-between">
                <div>
                    <div class="flex items-center justify-between border-b border-slate-800 pb-3">
                        <div class="flex items-center gap-2.5">
                            <span class="w-2.5 h-2.5 rounded-full bg-indigo-500"></span>
                            <h3 class="font-bold text-white text-base">{{ $cat }}</h3>
                        </div>
                        <span class="text-xs font-mono text-slate-400">{{ $catSkills->count() }} item</span>
                    </div>

                    <div class="divide-y divide-slate-800/60 mt-2">
                        @forelse ($catSkills as $skill)
                            <div class="py-2.5 flex items-center justify-between gap-3 group">
                                <div class="flex items-center gap-3">
                                    <span class="text-xs font-mono text-slate-400">#{{ $skill->order }}</span>
                                    <span class="text-sm font-semibold text-slate-200 group-hover:text-indigo-400 transition-colors">{{ $skill->name }}</span>
                                </div>
                                <div class="flex items-center gap-2">
                                    @if ($skill->level)
                                        <span class="px-2 py-0.5 rounded text-[10px] font-semibold bg-slate-900 border border-slate-700 text-slate-300">
                                            {{ $skill->level }}
                                        </span>
                                    @endif
                                    <a href="{{ route('admin.skills.edit', $skill) }}" class="p-1.5 text-slate-400 hover:text-indigo-400 hover:bg-slate-800 rounded-md transition-colors" title="Edit">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/></svg>
                                    </a>
                                    <form method="POST" action="{{ route('admin.skills.destroy', $skill) }}" onsubmit="return confirm('Hapus keahlian ini?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="p-1.5 text-slate-400 hover:text-rose-400 hover:bg-rose-500/10 rounded-md transition-colors" title="Hapus">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        @empty
                            <div class="py-4 text-center text-xs text-slate-500">
                                Belum ada data keahlian di kategori ini.
                            </div>
                        @endforelse
                    </div>
                </div>

                <div class="pt-3 border-t border-slate-800/80">
                    <a href="{{ route('admin.skills.create', ['category' => $cat]) }}" class="text-xs font-semibold text-indigo-400 hover:text-indigo-300 inline-flex items-center gap-1.5">
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                        <span>Tambah ke {{ $cat }}</span>
                    </a>
                </div>
            </div>
        @endforeach
    </div>

</div>
@endsection
