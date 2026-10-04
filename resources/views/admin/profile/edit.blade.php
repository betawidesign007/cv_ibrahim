@extends('layouts.admin')

@section('title', 'Profil & Pengaturan')
@section('page_title', 'Pengaturan Profil & Portofolio')

@section('admin_content')
<div class="max-w-4xl mx-auto space-y-6">
    
    <div>
        <h2 class="text-xl font-bold text-white">Kelola Informasi Profil Portofolio</h2>
        <p class="text-xs text-slate-400 mt-0.5">Perbarui biodata, teks perkenalan, status ketersediaan, dan kontak utama yang tampil di beranda website</p>
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
        <form method="POST" action="{{ route('admin.profile.update') }}" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @method('PUT')

            <!-- Section 0: Logo Website & Foto Profil (Avatar) -->
            <div class="space-y-4">
                <h3 class="text-sm font-bold uppercase tracking-wider text-indigo-400 border-b border-slate-800 pb-2">
                    0. Logo Website & Foto Profil
                </h3>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Foto Profil (Avatar) -->
                    <div class="p-4 rounded-xl bg-slate-950/80 border border-slate-800 space-y-4">
                        <span class="text-xs font-semibold text-white block uppercase tracking-wider">Foto Profil (Hero Section)</span>
                        <div class="flex items-center gap-4">
                            <div class="w-16 h-16 rounded-2xl bg-gradient-to-tr from-indigo-600 to-cyan-400 p-[2px] shrink-0 shadow-lg shadow-indigo-500/20">
                                <div class="w-full h-full bg-slate-950 rounded-[14px] flex items-center justify-center overflow-hidden">
                                    @if ($profile->avatar)
                                        <img src="{{ asset('storage/' . $profile->avatar) }}" alt="Avatar" class="w-full h-full object-cover">
                                    @else
                                        <svg class="w-8 h-8 text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                                    @endif
                                </div>
                            </div>
                            <div class="flex-1 space-y-1">
                                <label for="avatar" class="block text-xs text-slate-400">Pilih file foto (JPG, PNG, WEBP, maks 2MB):</label>
                                <input type="file" id="avatar" name="avatar" accept="image/*" class="text-xs text-slate-400 file:mr-2 file:py-1.5 file:px-3 file:rounded-lg file:border-0 file:text-xs file:font-semibold file:bg-indigo-600 file:text-white hover:file:bg-indigo-500 cursor-pointer">
                            </div>
                        </div>
                        @if ($profile->avatar)
                            <label class="flex items-center gap-2 pt-1 text-xs text-rose-400 cursor-pointer">
                                <input type="checkbox" name="remove_avatar" value="1" class="rounded bg-slate-900 border-slate-700 text-rose-600 focus:ring-rose-500">
                                <span>Hapus foto khusus dan gunakan ilustrasi default</span>
                            </label>
                        @endif
                    </div>

                    <!-- Logo Brand Website -->
                    <div class="p-4 rounded-xl bg-slate-950/80 border border-slate-800 space-y-4">
                        <span class="text-xs font-semibold text-white block uppercase tracking-wider">Logo Brand Website (Navbar & Footer)</span>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                            <div>
                                <label for="logo_initials" class="block text-xs text-slate-400 mb-1">Inisial Teks Logo (Maks 5 karakter):</label>
                                <input type="text" id="logo_initials" name="logo_initials" value="{{ old('logo_initials', $profile->logo_initials ?? 'IB') }}" maxlength="10" placeholder="Contoh: IB" class="w-full px-3 py-1.5 rounded-lg bg-slate-900 border border-slate-800 text-slate-100 text-xs font-mono font-bold focus:outline-none focus:ring-2 focus:ring-indigo-500 uppercase">
                            </div>
                            <div class="flex items-center gap-2">
                                <span class="text-[11px] text-slate-500">Pratinjau:</span>
                                <div class="w-9 h-9 rounded-xl bg-gradient-to-tr from-indigo-600 via-indigo-500 to-cyan-400 p-[1.5px]">
                                    <div class="w-full h-full bg-[#0b1120] rounded-[9px] flex items-center justify-center">
                                        <span class="font-extrabold text-xs text-transparent bg-clip-text bg-gradient-to-r from-indigo-400 to-cyan-400 font-mono">
                                            {{ $profile->logo_initials ?? 'IB' }}
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="space-y-1 pt-1 border-t border-slate-800/80">
                            <label for="logo_image" class="block text-xs text-slate-400">Atau unggah file gambar logo khusus (opsional):</label>
                            <div class="flex items-center gap-3">
                                @if ($profile->logo_image)
                                    <div class="w-8 h-8 rounded-lg bg-slate-900 border border-slate-800 flex items-center justify-center p-1 shrink-0">
                                        <img src="{{ asset('storage/' . $profile->logo_image) }}" alt="Logo" class="max-h-full max-w-full object-contain">
                                    </div>
                                @endif
                                <input type="file" id="logo_image" name="logo_image" accept="image/*" class="text-xs text-slate-400 file:mr-2 file:py-1.5 file:px-3 file:rounded-lg file:border-0 file:text-xs file:font-semibold file:bg-slate-800 file:text-slate-200 hover:file:bg-slate-700 cursor-pointer">
                            </div>
                            @if ($profile->logo_image)
                                <label class="flex items-center gap-2 pt-1 text-xs text-rose-400 cursor-pointer">
                                    <input type="checkbox" name="remove_logo_image" value="1" class="rounded bg-slate-900 border-slate-700 text-rose-600 focus:ring-rose-500">
                                    <span>Hapus gambar logo dan gunakan inisial teks</span>
                                </label>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <!-- Section 1: Identitas Utama -->
            <div class="space-y-4 pt-2">
                <h3 class="text-sm font-bold uppercase tracking-wider text-indigo-400 border-b border-slate-800 pb-2">
                    1. Identitas Utama & Header
                </h3>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label for="name" class="block text-xs font-semibold uppercase tracking-wider text-slate-300 mb-1.5">Nama Lengkap / Panggilan *</label>
                        <input type="text" id="name" name="name" value="{{ old('name', $profile->name) }}" required class="w-full px-4 py-2.5 rounded-xl bg-slate-950/80 border border-slate-800 text-slate-100 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500">
                    </div>

                    <div>
                        <label for="title" class="block text-xs font-semibold uppercase tracking-wider text-slate-300 mb-1.5">Profesi / Title *</label>
                        <input type="text" id="title" name="title" value="{{ old('title', $profile->title) }}" required class="w-full px-4 py-2.5 rounded-xl bg-slate-950/80 border border-slate-800 text-slate-100 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500">
                    </div>
                </div>

                <div>
                    <label for="headline" class="block text-xs font-semibold uppercase tracking-wider text-slate-300 mb-1.5">Headline Utama (Hero & About) *</label>
                    <input type="text" id="headline" name="headline" value="{{ old('headline', $profile->headline) }}" required class="w-full px-4 py-2.5 rounded-xl bg-slate-950/80 border border-slate-800 text-slate-100 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500">
                </div>

                <div>
                    <label for="bio" class="block text-xs font-semibold uppercase tracking-wider text-slate-300 mb-1.5">Bio Singkat (Hero Section)</label>
                    <textarea id="bio" name="bio" rows="3" class="w-full px-4 py-2.5 rounded-xl bg-slate-950/80 border border-slate-800 text-slate-100 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 resize-y">{{ old('bio', $profile->bio) }}</textarea>
                </div>

                <div>
                    <label for="about_text" class="block text-xs font-semibold uppercase tracking-wider text-slate-300 mb-1.5">Deskripsi Lengkap (About Section)</label>
                    <textarea id="about_text" name="about_text" rows="4" class="w-full px-4 py-2.5 rounded-xl bg-slate-950/80 border border-slate-800 text-slate-100 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 resize-y">{{ old('about_text', $profile->about_text) }}</textarea>
                </div>
            </div>

            <!-- Section 2: Ketersediaan & Angka Statistik -->
            <div class="space-y-4 pt-4">
                <h3 class="text-sm font-bold uppercase tracking-wider text-indigo-400 border-b border-slate-800 pb-2">
                    2. Status Ketersediaan & Metrik
                </h3>

                <div class="p-4 rounded-xl bg-slate-950/80 border border-slate-800 flex items-center justify-between">
                    <div>
                        <span class="text-sm font-semibold text-white block">Status Ketersediaan Kerja</span>
                        <span class="text-xs text-slate-400">Aktifkan jika Anda saat ini menerima pekerjaan fulltime/freelance</span>
                    </div>
                    <label class="relative inline-flex items-center cursor-pointer">
                        <input type="checkbox" name="is_available" value="1" {{ old('is_available', $profile->is_available) ? 'checked' : '' }} class="sr-only peer">
                        <div class="w-11 h-6 bg-slate-800 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-slate-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-emerald-600"></div>
                    </label>
                </div>

                <div>
                    <label for="availability_badge" class="block text-xs font-semibold uppercase tracking-wider text-slate-300 mb-1.5">Teks Badge Ketersediaan *</label>
                    <input type="text" id="availability_badge" name="availability_badge" value="{{ old('availability_badge', $profile->availability_badge) }}" required class="w-full px-4 py-2.5 rounded-xl bg-slate-950/80 border border-slate-800 text-slate-100 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500">
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label for="experience_years" class="block text-xs font-semibold uppercase tracking-wider text-slate-300 mb-1.5">Tahun Pengalaman Kerja *</label>
                        <input type="number" id="experience_years" name="experience_years" value="{{ old('experience_years', $profile->experience_years) }}" min="0" required class="w-full px-4 py-2.5 rounded-xl bg-slate-950/80 border border-slate-800 text-slate-100 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500">
                    </div>
                    <div>
                        <label for="completed_projects" class="block text-xs font-semibold uppercase tracking-wider text-slate-300 mb-1.5">Jumlah Proyek Selesai *</label>
                        <input type="number" id="completed_projects" name="completed_projects" value="{{ old('completed_projects', $profile->completed_projects) }}" min="0" required class="w-full px-4 py-2.5 rounded-xl bg-slate-950/80 border border-slate-800 text-slate-100 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500">
                    </div>
                </div>
            </div>

            <!-- Section 3: Kontak & Media Sosial -->
            <div class="space-y-4 pt-4">
                <h3 class="text-sm font-bold uppercase tracking-wider text-indigo-400 border-b border-slate-800 pb-2">
                    3. Kontak Langsung & Tautan Sosial
                </h3>

                <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                    <div>
                        <label for="email" class="block text-xs font-semibold uppercase tracking-wider text-slate-300 mb-1.5">Email Publik *</label>
                        <input type="email" id="email" name="email" value="{{ old('email', $profile->email) }}" required class="w-full px-4 py-2.5 rounded-xl bg-slate-950/80 border border-slate-800 text-slate-100 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500">
                    </div>

                    <div>
                        <label for="phone" class="block text-xs font-semibold uppercase tracking-wider text-slate-300 mb-1.5">No. Telepon / WhatsApp *</label>
                        <input type="text" id="phone" name="phone" value="{{ old('phone', $profile->phone) }}" required class="w-full px-4 py-2.5 rounded-xl bg-slate-950/80 border border-slate-800 text-slate-100 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500">
                    </div>

                    <div>
                        <label for="location" class="block text-xs font-semibold uppercase tracking-wider text-slate-300 mb-1.5">Lokasi Domisili *</label>
                        <input type="text" id="location" name="location" value="{{ old('location', $profile->location) }}" required class="w-full px-4 py-2.5 rounded-xl bg-slate-950/80 border border-slate-800 text-slate-100 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500">
                    </div>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label for="github_url" class="block text-xs font-semibold uppercase tracking-wider text-slate-300 mb-1.5">Profil GitHub URL</label>
                        <input type="url" id="github_url" name="github_url" value="{{ old('github_url', $profile->github_url) }}" placeholder="https://github.com/username" class="w-full px-4 py-2.5 rounded-xl bg-slate-950/80 border border-slate-800 text-slate-100 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500">
                    </div>

                    <div>
                        <label for="linkedin_url" class="block text-xs font-semibold uppercase tracking-wider text-slate-300 mb-1.5">Profil LinkedIn URL</label>
                        <input type="url" id="linkedin_url" name="linkedin_url" value="{{ old('linkedin_url', $profile->linkedin_url) }}" placeholder="https://linkedin.com/in/username" class="w-full px-4 py-2.5 rounded-xl bg-slate-950/80 border border-slate-800 text-slate-100 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500">
                    </div>
                </div>
            </div>

            <!-- Submit Button -->
            <div class="pt-5 border-t border-slate-800 flex items-center justify-end">
                <button type="submit" class="px-7 py-3 rounded-xl bg-indigo-600 hover:bg-indigo-500 text-white font-semibold text-sm shadow-lg shadow-indigo-600/30 active:scale-95 transition-all">
                    Simpan Perubahan Profil
                </button>
            </div>
        </form>
    </div>

</div>
@endsection
