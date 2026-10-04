@extends('layouts.admin')

@section('title', 'Kelola Proyek')
@section('page_title', 'Kelola Proyek Portofolio')

@section('admin_content')
<div class="space-y-6">
    
    <!-- Actions Bar -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div>
            <h2 class="text-xl font-bold text-white">Daftar Karya & Proyek</h2>
            <p class="text-xs text-slate-400 mt-0.5">Tambah, perbarui, atau hapus proyek yang tampil di website utama</p>
        </div>
        <a href="{{ route('admin.projects.create') }}" class="inline-flex items-center justify-center gap-2 px-4 py-2.5 rounded-xl bg-indigo-600 hover:bg-indigo-500 text-white font-semibold text-xs sm:text-sm shadow-lg shadow-indigo-600/30 transition-all active:scale-95">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
            <span>Tambah Proyek Baru</span>
        </a>
    </div>

    <!-- Table Container (Responsive on HP) -->
    <div class="rounded-2xl bg-[#0b1120] border border-slate-800 shadow-xl overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="border-b border-slate-800 bg-slate-900/60 text-[11px] font-semibold uppercase tracking-wider text-slate-400">
                        <th class="py-3.5 px-4 sm:px-6">Urutan</th>
                        <th class="py-3.5 px-4 sm:px-6">Nama Proyek</th>
                        <th class="py-3.5 px-4 sm:px-6">Kategori & Badge</th>
                        <th class="py-3.5 px-4 sm:px-6">Tech Stack</th>
                        <th class="py-3.5 px-4 sm:px-6">Status</th>
                        <th class="py-3.5 px-4 sm:px-6 text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-800 text-sm">
                    @forelse ($projects as $project)
                        <tr class="hover:bg-slate-800/40 transition-colors">
                            <td class="py-4 px-4 sm:px-6 text-xs font-mono text-slate-400">
                                #{{ $project->order }}
                            </td>
                            <td class="py-4 px-4 sm:px-6">
                                <div class="font-semibold text-white">{{ $project->title }}</div>
                                <p class="text-xs text-slate-400 line-clamp-1 max-w-xs mt-0.5">{{ $project->description }}</p>
                            </td>
                            <td class="py-4 px-4 sm:px-6">
                                <div class="text-xs text-slate-300 font-medium">{{ $project->category }}</div>
                                @if ($project->badge)
                                    <span class="inline-block mt-1 px-2 py-0.5 text-[10px] rounded bg-indigo-500/15 text-indigo-400 border border-indigo-500/20">
                                        {{ $project->badge }}
                                    </span>
                                @endif
                            </td>
                            <td class="py-4 px-4 sm:px-6 text-xs text-slate-400 font-mono">
                                {{ $project->tech_stack }}
                            </td>
                            <td class="py-4 px-4 sm:px-6">
                                <span class="px-2.5 py-1 text-xs font-medium rounded-full bg-emerald-500/10 text-emerald-400 border border-emerald-500/20">
                                    {{ $project->status }}
                                </span>
                            </td>
                            <td class="py-4 px-4 sm:px-6 text-right">
                                <div class="flex items-center justify-end gap-2">
                                    <a href="{{ route('admin.projects.edit', $project) }}" class="p-2 text-slate-400 hover:text-indigo-400 hover:bg-slate-800 rounded-lg transition-colors" title="Edit">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                                    </a>
                                    <form method="POST" action="{{ route('admin.projects.destroy', $project) }}" onsubmit="return confirm('Apakah Anda yakin ingin menghapus proyek ini?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="p-2 text-slate-400 hover:text-rose-400 hover:bg-rose-500/10 rounded-lg transition-colors" title="Hapus">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="py-12 text-center text-slate-500 text-sm">
                                Belum ada proyek. Klik tombol "Tambah Proyek Baru" untuk memasukkan proyek pertama Anda.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if ($projects->hasPages())
            <div class="p-4 border-t border-slate-800">
                {{ $projects->links() }}
            </div>
        @endif
    </div>

</div>
@endsection
