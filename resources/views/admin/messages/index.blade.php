@extends('layouts.admin')

@section('title', 'Pesan Masuk')
@section('page_title', 'Kotak Pesan Masuk')

@section('admin_content')
<div class="space-y-6">
    
    <div>
        <h2 class="text-xl font-bold text-white">Daftar Pesan Masuk Pengunjung</h2>
        <p class="text-xs text-slate-400 mt-0.5">Pesan yang dikirimkan calon klien melalui formulir kontak portofolio</p>
    </div>

    <div class="rounded-2xl bg-[#0b1120] border border-slate-800 shadow-xl overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="border-b border-slate-800 bg-slate-900/60 text-[11px] font-semibold uppercase tracking-wider text-slate-400">
                        <th class="py-3.5 px-4 sm:px-6">Status</th>
                        <th class="py-3.5 px-4 sm:px-6">Pengirim</th>
                        <th class="py-3.5 px-4 sm:px-6">Subjek / Topik</th>
                        <th class="py-3.5 px-4 sm:px-6">Waktu Masuk</th>
                        <th class="py-3.5 px-4 sm:px-6 text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-800 text-sm">
                    @forelse ($messages as $msg)
                        <tr class="hover:bg-slate-800/40 transition-colors {{ $msg->is_read ? 'opacity-75' : 'bg-indigo-950/20' }}">
                            <td class="py-4 px-4 sm:px-6">
                                @if (! $msg->is_read)
                                    <span class="inline-flex items-center gap-1.5 px-2 py-0.5 rounded-full text-[10px] font-bold bg-rose-500/20 text-rose-400 border border-rose-500/30">
                                        <span class="w-1.5 h-1.5 rounded-full bg-rose-500 animate-pulse"></span>
                                        Baru
                                    </span>
                                @else
                                    <span class="inline-flex items-center px-2 py-0.5 rounded-full text-[10px] font-medium bg-slate-800 text-slate-400">
                                        Dibaca
                                    </span>
                                @endif
                            </td>
                            <td class="py-4 px-4 sm:px-6">
                                <div class="font-semibold text-white {{ ! $msg->is_read ? 'font-bold text-indigo-300' : '' }}">{{ $msg->name }}</div>
                                <div class="text-xs text-slate-400 font-mono">{{ $msg->email }}</div>
                            </td>
                            <td class="py-4 px-4 sm:px-6">
                                <div class="text-slate-200 text-xs sm:text-sm font-medium">{{ $msg->subject ?? '(Tanpa Topik)' }}</div>
                                <p class="text-xs text-slate-400 line-clamp-1 max-w-sm mt-0.5">{{ $msg->message }}</p>
                            </td>
                            <td class="py-4 px-4 sm:px-6 text-xs text-slate-400">
                                {{ $msg->created_at->isoFormat('D MMM Y, HH:mm') ?? $msg->created_at->diffForHumans() }}
                            </td>
                            <td class="py-4 px-4 sm:px-6 text-right">
                                <div class="flex items-center justify-end gap-2">
                                    <a href="{{ route('admin.messages.show', $msg) }}" class="px-3 py-1.5 rounded-lg text-xs font-semibold bg-indigo-600/20 text-indigo-400 hover:bg-indigo-600 hover:text-white transition-all" title="Baca Pesan">
                                        Buka
                                    </a>
                                    <form method="POST" action="{{ route('admin.messages.destroy', $msg) }}" onsubmit="return confirm('Hapus pesan ini?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="p-1.5 text-slate-400 hover:text-rose-400 hover:bg-rose-500/10 rounded-lg transition-colors" title="Hapus">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="py-12 text-center text-slate-500 text-sm">
                                Belum ada pesan masuk dari pengunjung.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if ($messages->hasPages())
            <div class="p-4 border-t border-slate-800">
                {{ $messages->links() }}
            </div>
        @endif
    </div>

</div>
@endsection
