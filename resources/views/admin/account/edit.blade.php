@extends('layouts.admin')

@section('title', 'Keamanan & Akun')
@section('page_title', 'Pengaturan Akun & Kata Sandi')

@section('admin_content')
<div class="max-w-3xl mx-auto space-y-6">
    
    <div>
        <h2 class="text-xl font-bold text-white">Kelola Kredensial Akun Administrator</h2>
        <p class="text-xs text-slate-400 mt-0.5">Perbarui email login dan kata sandi untuk menjaga keamanan akses panel admin</p>
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
        <form method="POST" action="{{ route('admin.account.update') }}" class="space-y-6">
            @csrf
            @method('PUT')

            <!-- Bagian 1: Informasi Dasar -->
            <div class="space-y-4">
                <h3 class="text-sm font-bold uppercase tracking-wider text-indigo-400 border-b border-slate-800 pb-2">
                    1. Informasi Akun Login
                </h3>

                <div>
                    <label for="name" class="block text-xs font-semibold uppercase tracking-wider text-slate-300 mb-1.5">Nama Pengguna *</label>
                    <input type="text" id="name" name="name" value="{{ old('name', $user->name) }}" required class="w-full px-4 py-2.5 rounded-xl bg-slate-950/80 border border-slate-800 text-slate-100 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500">
                </div>

                <div>
                    <label for="email" class="block text-xs font-semibold uppercase tracking-wider text-slate-300 mb-1.5">Alamat Email Login *</label>
                    <input type="email" id="email" name="email" value="{{ old('email', $user->email) }}" required class="w-full px-4 py-2.5 rounded-xl bg-slate-950/80 border border-slate-800 text-slate-100 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500">
                    <span class="text-[11px] text-slate-500 mt-1 block">Email ini digunakan setiap kali Anda login ke panel admin.</span>
                </div>
            </div>

            <!-- Bagian 2: Ubah Kata Sandi -->
            <div class="space-y-4 pt-4">
                <div class="border-b border-slate-800 pb-2">
                    <h3 class="text-sm font-bold uppercase tracking-wider text-indigo-400">
                        2. Ubah Kata Sandi (Opsional)
                    </h3>
                    <p class="text-xs text-slate-400 mt-0.5">Kosongkan kolom sandi jika Anda hanya ingin memperbarui nama atau alamat email.</p>
                </div>

                <div>
                    <label for="current_password" class="block text-xs font-semibold uppercase tracking-wider text-slate-300 mb-1.5">Kata Sandi Saat Ini</label>
                    <input type="password" id="current_password" name="current_password" placeholder="Masukkan kata sandi saat ini" class="w-full px-4 py-2.5 rounded-xl bg-slate-950/80 border border-slate-800 text-slate-100 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500">
                    <span class="text-[11px] text-slate-500 mt-1 block">Wajib diisi jika Anda ingin menetapkan kata sandi baru.</span>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label for="password" class="block text-xs font-semibold uppercase tracking-wider text-slate-300 mb-1.5">Kata Sandi Baru</label>
                        <input type="password" id="password" name="password" placeholder="Minimal 8 karakter" class="w-full px-4 py-2.5 rounded-xl bg-slate-950/80 border border-slate-800 text-slate-100 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500">
                    </div>

                    <div>
                        <label for="password_confirmation" class="block text-xs font-semibold uppercase tracking-wider text-slate-300 mb-1.5">Ulangi Kata Sandi Baru</label>
                        <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Ulangi kata sandi baru" class="w-full px-4 py-2.5 rounded-xl bg-slate-950/80 border border-slate-800 text-slate-100 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500">
                    </div>
                </div>
            </div>

            <!-- Submit Button -->
            <div class="pt-5 border-t border-slate-800 flex items-center justify-end gap-3">
                <button type="submit" class="px-7 py-3 rounded-xl bg-indigo-600 hover:bg-indigo-500 text-white font-semibold text-sm shadow-lg shadow-indigo-600/30 active:scale-95 transition-all">
                    Simpan Perubahan Akun
                </button>
            </div>
        </form>
    </div>

</div>
@endsection
