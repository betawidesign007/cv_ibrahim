@extends('layouts.admin')

@section('title', 'Tambah Keahlian')
@section('page_title', 'Tambah Keahlian Baru')

@section('admin_content')
<div class="max-w-2xl mx-auto space-y-6">
    
    <div class="flex items-center justify-between">
        <div>
            <h2 class="text-xl font-bold text-white">Formulir Keahlian</h2>
            <p class="text-xs text-slate-400 mt-0.5">Tambahkan teknologi atau keahlian ke stack portofolio</p>
        </div>
        <a href="{{ route('admin.skills.index') }}" class="px-3.5 py-2 rounded-xl text-xs font-semibold bg-slate-800 text-slate-300 hover:text-white border border-slate-700/60 transition-colors">
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
        <form method="POST" action="{{ route('admin.skills.store') }}" class="space-y-5">
            @csrf

            <!-- Nama Keahlian -->
            <div>
                <label for="name" class="block text-xs font-semibold uppercase tracking-wider text-slate-300 mb-1.5">Nama Keahlian / Framework *</label>
                <input type="text" id="name" name="name" value="{{ old('name') }}" required placeholder="Contoh: Laravel, Vue.js, Docker, Tailwind" class="w-full px-4 py-2.5 rounded-xl bg-slate-950/80 border border-slate-800 text-slate-100 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500">
            </div>

            <!-- Kategori -->
            <div>
                <label for="category" class="block text-xs font-semibold uppercase tracking-wider text-slate-300 mb-1.5">Kategori *</label>
                <select id="category" name="category" required class="w-full px-4 py-2.5 rounded-xl bg-slate-950/80 border border-slate-800 text-slate-100 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500">
                    @foreach ($categories as $cat)
                        <option value="{{ $cat }}" {{ (old('category', request('category')) == $cat) ? 'selected' : '' }}>{{ $cat }}</option>
                    @endforeach
                </select>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <!-- Tingkat Kemahiran (Level) -->
                <div>
                    <label for="level" class="block text-xs font-semibold uppercase tracking-wider text-slate-300 mb-1.5">Tingkat Kemahiran</label>
                    <select id="level" name="level" class="w-full px-4 py-2.5 rounded-xl bg-slate-950/80 border border-slate-800 text-slate-100 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500">
                        <option value="Expert" {{ old('level') == 'Expert' ? 'selected' : '' }}>Expert</option>
                        <option value="Advanced" {{ old('level', 'Advanced') == 'Advanced' ? 'selected' : '' }}>Advanced</option>
                        <option value="Intermediate" {{ old('level') == 'Intermediate' ? 'selected' : '' }}>Intermediate</option>
                        <option value="Familiar" {{ old('level') == 'Familiar' ? 'selected' : '' }}>Familiar</option>
                    </select>
                </div>

                <!-- Urutan -->
                <div>
                    <label for="order" class="block text-xs font-semibold uppercase tracking-wider text-slate-300 mb-1.5">Nomor Urutan</label>
                    <input type="number" id="order" name="order" value="{{ old('order', 1) }}" min="0" class="w-full px-4 py-2.5 rounded-xl bg-slate-950/80 border border-slate-800 text-slate-100 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500">
                </div>
            </div>

            <div class="pt-4 flex items-center justify-end gap-3 border-t border-slate-800">
                <a href="{{ route('admin.skills.index') }}" class="px-5 py-2.5 rounded-xl text-xs font-semibold text-slate-400 hover:text-white transition-colors">
                    Batal
                </a>
                <button type="submit" class="px-6 py-2.5 rounded-xl bg-indigo-600 hover:bg-indigo-500 text-white font-semibold text-xs sm:text-sm shadow-lg shadow-indigo-600/30 active:scale-95 transition-all">
                    Simpan Keahlian
                </button>
            </div>
        </form>
    </div>

</div>
@endsection
