@extends('layouts.admin')

@section('title', 'Edit Proyek')
@section('page_title', 'Perbarui Data Proyek')

@section('admin_content')
<div class="max-w-4xl mx-auto space-y-6">
    
    <div class="flex items-center justify-between">
        <div>
            <h2 class="text-xl font-bold text-white">Edit Proyek: {{ $project->title }}</h2>
            <p class="text-xs text-slate-400 mt-0.5">Perbarui rincian proyek yang tampil di portofolio</p>
        </div>
        <a href="{{ route('admin.projects.index') }}" class="px-3.5 py-2 rounded-xl text-xs font-semibold bg-slate-800 text-slate-300 hover:text-white border border-slate-700/60 transition-colors">
            Kembali
        </a>
    </div>

    @if ($errors->any())
        <div class="p-4 rounded-xl bg-rose-500/10 border border-rose-500/20 text-rose-400 text-xs sm:text-sm">
            <ul class="list-disc list-inside space-y-1">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="rounded-2xl bg-[#0b1120] border border-slate-800 p-6 sm:p-8 shadow-xl">
        <form method="POST" action="{{ route('admin.projects.update', $project) }}" class="space-y-6">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                <!-- Judul Proyek -->
                <div>
                    <label for="title" class="block text-xs font-semibold uppercase tracking-wider text-slate-300 mb-1.5">Judul Proyek *</label>
                    <input type="text" id="title" name="title" value="{{ old('title', $project->title) }}" required placeholder="Contoh: Sistem Informasi Kasir POS" class="w-full px-4 py-2.5 rounded-xl bg-slate-950/80 border border-slate-800 text-slate-100 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500">
                </div>

                <!-- Kategori -->
                <div>
                    <label for="category" class="block text-xs font-semibold uppercase tracking-wider text-slate-300 mb-1.5">Kategori *</label>
                    <input type="text" id="category" name="category" value="{{ old('category', $project->category) }}" required placeholder="Contoh: Web Application, E-Commerce, PWA" class="w-full px-4 py-2.5 rounded-xl bg-slate-950/80 border border-slate-800 text-slate-100 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500">
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-3 gap-5">
                <!-- Badge Highlight -->
                <div>
                    <label for="badge" class="block text-xs font-semibold uppercase tracking-wider text-slate-300 mb-1.5">Badge Label</label>
                    <input type="text" id="badge" name="badge" value="{{ old('badge', $project->badge) }}" placeholder="Contoh: Enterprise, Live Demo" class="w-full px-4 py-2.5 rounded-xl bg-slate-950/80 border border-slate-800 text-slate-100 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500">
                </div>

                <!-- Status -->
                <div>
                    <label for="status" class="block text-xs font-semibold uppercase tracking-wider text-slate-300 mb-1.5">Status Proyek *</label>
                    <select id="status" name="status" class="w-full px-4 py-2.5 rounded-xl bg-slate-950/80 border border-slate-800 text-slate-100 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500">
                        <option value="Selesai" {{ old('status', $project->status) == 'Selesai' ? 'selected' : '' }}>Selesai</option>
                        <option value="Selesai & Berjalan" {{ old('status', $project->status) == 'Selesai & Berjalan' ? 'selected' : '' }}>Selesai & Berjalan</option>
                        <option value="Dalam Pengembangan" {{ old('status', $project->status) == 'Dalam Pengembangan' ? 'selected' : '' }}>Dalam Pengembangan</option>
                    </select>
                </div>

                <!-- Urutan -->
                <div>
                    <label for="order" class="block text-xs font-semibold uppercase tracking-wider text-slate-300 mb-1.5">Nomor Urutan</label>
                    <input type="number" id="order" name="order" value="{{ old('order', $project->order) }}" min="0" class="w-full px-4 py-2.5 rounded-xl bg-slate-950/80 border border-slate-800 text-slate-100 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500">
                </div>
            </div>

            <!-- Tech Stack -->
            <div>
                <label for="tech_stack" class="block text-xs font-semibold uppercase tracking-wider text-slate-300 mb-1.5">Teknologi / Tech Stack *</label>
                <input type="text" id="tech_stack" name="tech_stack" value="{{ old('tech_stack', $project->tech_stack) }}" required placeholder="Contoh: Laravel 11, Tailwind CSS, MySQL, Alpine.js" class="w-full px-4 py-2.5 rounded-xl bg-slate-950/80 border border-slate-800 text-slate-100 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500">
            </div>

            <!-- Deskripsi Proyek -->
            <div>
                <label for="description" class="block text-xs font-semibold uppercase tracking-wider text-slate-300 mb-1.5">Deskripsi Lengkap *</label>
                <textarea id="description" name="description" rows="4" required class="w-full px-4 py-2.5 rounded-xl bg-slate-950/80 border border-slate-800 text-slate-100 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 resize-y">{{ old('description', $project->description) }}</textarea>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                <!-- Demo URL -->
                <div>
                    <label for="demo_url" class="block text-xs font-semibold uppercase tracking-wider text-slate-300 mb-1.5">Tautan Live Demo</label>
                    <input type="url" id="demo_url" name="demo_url" value="{{ old('demo_url', $project->demo_url) }}" placeholder="https://example.com" class="w-full px-4 py-2.5 rounded-xl bg-slate-950/80 border border-slate-800 text-slate-100 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500">
                </div>

                <!-- GitHub URL -->
                <div>
                    <label for="github_url" class="block text-xs font-semibold uppercase tracking-wider text-slate-300 mb-1.5">Tautan Repositori GitHub</label>
                    <input type="url" id="github_url" name="github_url" value="{{ old('github_url', $project->github_url) }}" placeholder="https://github.com/username/project" class="w-full px-4 py-2.5 rounded-xl bg-slate-950/80 border border-slate-800 text-slate-100 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500">
                </div>
            </div>

            <div class="pt-4 flex items-center justify-end gap-3 border-t border-slate-800">
                <a href="{{ route('admin.projects.index') }}" class="px-5 py-2.5 rounded-xl text-xs font-semibold text-slate-400 hover:text-white transition-colors">
                    Batal
                </a>
                <button type="submit" class="px-6 py-2.5 rounded-xl bg-indigo-600 hover:bg-indigo-500 text-white font-semibold text-xs sm:text-sm shadow-lg shadow-indigo-600/30 active:scale-95 transition-all">
                    Simpan Perubahan
                </button>
            </div>
        </form>
    </div>

</div>
@endsection
