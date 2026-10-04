@extends('layouts.admin')

@section('title', 'Detail Pesan')
@section('page_title', 'Rincian Pesan Masuk')

@section('admin_content')
<div class="max-w-3xl mx-auto space-y-6">
    
    <div class="flex items-center justify-between">
        <div>
            <h2 class="text-xl font-bold text-white">Pesan dari {{ $message->name }}</h2>
            <p class="text-xs text-slate-400 mt-0.5">Diterima pada {{ $message->created_at->format('d M Y, H:i') }} ({{ $message->created_at->diffForHumans() }})</p>
        </div>
        <a href="{{ route('admin.messages.index') }}" class="px-3.5 py-2 rounded-xl text-xs font-semibold bg-slate-800 text-slate-300 hover:text-white border border-slate-700/60 transition-colors">
            Kembali
        </a>
    </div>

    <!-- Message Card -->
    <div class="rounded-2xl bg-[#0b1120] border border-slate-800 p-6 sm:p-8 shadow-xl space-y-6">
        
        <!-- Header Info -->
        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 p-4 rounded-xl bg-slate-950/80 border border-slate-800">
            <div class="flex items-center gap-3.5">
                <div class="w-12 h-12 rounded-xl bg-indigo-600/20 text-indigo-400 border border-indigo-500/30 flex items-center justify-center text-lg font-bold">
                    {{ strtoupper(substr($message->name, 0, 1)) }}
                </div>
                <div>
                    <h3 class="font-bold text-white text-base">{{ $message->name }}</h3>
                    <a href="mailto:{{ $message->email }}" class="text-xs text-indigo-400 hover:underline font-mono">{{ $message->email }}</a>
                </div>
            </div>
            
            <div class="flex items-center gap-2">
                <a href="mailto:{{ $message->email }}?subject=Re: {{ rawurlencode($message->subject ?? 'Tanggapan Portofolio') }}" class="inline-flex items-center gap-1.5 px-3.5 py-2 rounded-xl bg-indigo-600 hover:bg-indigo-500 text-white text-xs font-semibold shadow-md shadow-indigo-600/20 transition-all">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                    <span>Balas via Email</span>
                </a>
            </div>
        </div>

        <!-- Subject -->
        @if ($message->subject)
            <div>
                <span class="text-xs uppercase font-semibold tracking-wider text-slate-400 block mb-1">Subjek / Topik:</span>
                <p class="text-base font-semibold text-white">{{ $message->subject }}</p>
            </div>
        @endif

        <!-- Message Body -->
        <div>
            <span class="text-xs uppercase font-semibold tracking-wider text-slate-400 block mb-2">Isi Pesan:</span>
            <div class="p-5 rounded-xl bg-slate-950 border border-slate-800/90 text-slate-200 text-sm leading-relaxed whitespace-pre-wrap font-sans">
{{ $message->message }}
            </div>
        </div>

        <!-- Footer Actions -->
        <div class="pt-4 border-t border-slate-800 flex items-center justify-between">
            <form method="POST" action="{{ route('admin.messages.destroy', $message) }}" onsubmit="return confirm('Hapus pesan ini secara permanen?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="inline-flex items-center gap-1.5 text-xs text-rose-400 hover:text-rose-300 font-semibold transition-colors">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                    <span>Hapus Pesan</span>
                </button>
            </form>

            <a href="{{ route('admin.messages.index') }}" class="text-xs font-semibold text-slate-400 hover:text-white transition-colors">
                &larr; Kembali ke Semua Pesan
            </a>
        </div>

    </div>

</div>
@endsection
