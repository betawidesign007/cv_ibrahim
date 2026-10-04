<!-- Contact Section -->
<section id="contact" class="py-16 sm:py-24 relative z-10 border-t border-slate-800/60 bg-[#070b14]/60">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <!-- Section Header -->
        <div class="text-center max-w-3xl mx-auto mb-12 sm:mb-16">
            <span
                class="text-xs sm:text-sm font-semibold tracking-wider text-rose-400 uppercase bg-rose-500/10 px-3 py-1 rounded-full border border-rose-500/20">Kontak
                & Kolaborasi</span>
            <h2 class="mt-3 text-2xl sm:text-4xl font-extrabold text-white tracking-tight">
                Mari Diskusikan Proyek Anda
            </h2>
            <div class="w-16 h-1 bg-gradient-to-r from-rose-500 to-indigo-500 mx-auto mt-4 rounded-full"></div>
            <p class="mt-4 text-slate-400 text-sm sm:text-base leading-relaxed">
                Punya ide proyek, kebutuhan sistem aplikasi, atau tawaran kerja sama? Jangan ragu untuk menghubungi saya
                melalui formulir di bawah atau kontak instan.
            </p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-12">

            <!-- Left Column: Direct Contact Info (HP & Desktop friendly) -->
            <div class="lg:col-span-5 space-y-6">
                <div
                    class="p-6 sm:p-8 rounded-2xl bg-gradient-to-b from-slate-900 to-[#0b1120] border border-slate-800 shadow-xl space-y-6">
                    <h3 class="text-xl font-bold text-white">Informasi Kontak</h3>
                    <p class="text-xs sm:text-sm text-slate-400 leading-relaxed">
                        Saya selalu terbuka untuk berdiskusi mengenai proyek baru, ide kreatif, atau kesempatan untuk
                        menjadi bagian dari visi Anda.
                    </p>

                    <!-- Contact Channels -->
                    <div class="space-y-4">
                        @php
                            $targetEmail = $profile->email ?? 'betawidesign007@gmail.com';
                            $rawPhone = $profile->phone ?? '6287799107735';
                            $cleanPhone = preg_replace('/[^0-9]/', '', $rawPhone);
                            if (str_starts_with($cleanPhone, '0')) {
                                $waPhone = '62' . substr($cleanPhone, 1);
                            } elseif (!str_starts_with($cleanPhone, '62') && !empty($cleanPhone)) {
                                $waPhone = str_starts_with($cleanPhone, '8') ? ('62' . $cleanPhone) : $cleanPhone;
                            } else {
                                $waPhone = $cleanPhone ?: '6287799107735';
                            }
                            $waText = rawurlencode('Halo ' . ($profile->name ?? 'Ibrahim') . ', saya tertarik dengan portofolio Anda dan ingin berdiskusi.');
                        @endphp

                        <!-- Email -->
                        <a href="mailto:{{ $targetEmail }}?subject={{ rawurlencode('Diskusi Proyek Web / Penawaran Kerjasama') }}"
                            class="flex items-center gap-4 p-3.5 rounded-xl bg-slate-800/40 border border-slate-800 hover:border-indigo-500/50 hover:bg-slate-800/80 transition-all group">
                            <div
                                class="w-11 h-11 rounded-lg bg-indigo-500/10 text-indigo-400 flex items-center justify-center group-hover:scale-110 transition-transform">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                </svg>
                            </div>
                            <div>
                                <span
                                    class="text-[11px] uppercase tracking-wider text-slate-400 font-semibold block">Email</span>
                                <span
                                    class="text-sm font-medium text-white group-hover:text-indigo-400 transition-colors">{{ $targetEmail }}</span>
                            </div>
                        </a>

                        <!-- WhatsApp -->
                        <a href="https://wa.me/{{ $waPhone }}?text={{ $waText }}" target="_blank"
                            rel="noopener noreferrer"
                            class="flex items-center gap-4 p-3.5 rounded-xl bg-slate-800/40 border border-slate-800 hover:border-emerald-500/50 hover:bg-slate-800/80 transition-all group">
                            <div
                                class="w-11 h-11 rounded-lg bg-emerald-500/10 text-emerald-400 flex items-center justify-center group-hover:scale-110 transition-transform">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                                </svg>
                            </div>
                            <div>
                                <span
                                    class="text-[11px] uppercase tracking-wider text-slate-400 font-semibold block">WhatsApp</span>
                                <span
                                    class="text-sm font-medium text-white group-hover:text-emerald-400 transition-colors">{{ $profile->phone ?? '+62 877-9910-7735' }}</span>
                            </div>
                        </a>

                        <!-- Lokasi -->
                        <div class="flex items-center gap-4 p-3.5 rounded-xl bg-slate-800/40 border border-slate-800">
                            <div
                                class="w-11 h-11 rounded-lg bg-rose-500/10 text-rose-400 flex items-center justify-center">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                            </div>
                            <div>
                                <span
                                    class="text-[11px] uppercase tracking-wider text-slate-400 font-semibold block">Lokasi</span>
                                <span
                                    class="text-sm font-medium text-white">{{ $profile->location ?? 'Indonesia' }}</span>
                            </div>
                        </div>
                    </div>

                    <!-- Direct WhatsApp Fast Button -->
                    <a href="https://wa.me/{{ $waPhone }}?text={{ $waText }}"
                        target="_blank" rel="noopener noreferrer"
                        class="w-full inline-flex items-center justify-center gap-2 px-5 py-3 rounded-xl bg-emerald-600 hover:bg-emerald-500 text-white font-semibold text-sm shadow-lg shadow-emerald-600/20 active:scale-95 transition-all">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981z" />
                        </svg>
                        <span>Chat Cepat via WhatsApp</span>
                    </a>
                </div>
            </div>

            <!-- Right Column: Interactive Contact Form -->
            <div class="lg:col-span-7">
                <div
                    class="p-6 sm:p-8 rounded-2xl bg-gradient-to-b from-slate-900 to-[#0b1120] border border-slate-800 shadow-xl">
                    <h3 class="text-xl font-bold text-white mb-2">Kirim Pesan Langsung</h3>
                    <p class="text-xs sm:text-sm text-slate-400 mb-6">Silakan lengkapi formulir di bawah ini, saya akan
                        merespons secepat mungkin.</p>

                    @if (session('contact_success'))
                        <div
                            class="mb-4 p-4 rounded-xl text-xs sm:text-sm font-medium bg-emerald-500/10 text-emerald-400 border border-emerald-500/20">
                            {{ session('contact_success') }}
                        </div>
                    @endif

                    <form id="contactForm" method="POST" action="{{ route('contact.send') }}"
                        onsubmit="handleContactSubmit(event);" class="space-y-4">
                        @csrf

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div>
                                <label for="senderName"
                                    class="block text-xs font-semibold text-slate-300 uppercase tracking-wider mb-1.5">Nama
                                    Lengkap *</label>
                                <input type="text" id="senderName" name="name" required
                                    placeholder="Contoh: Budi Santoso"
                                    class="w-full px-4 py-3 rounded-xl bg-slate-950/80 border border-slate-800 text-slate-100 placeholder-slate-500 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all">
                            </div>
                            <div>
                                <label for="senderEmail"
                                    class="block text-xs font-semibold text-slate-300 uppercase tracking-wider mb-1.5">Alamat
                                    Email *</label>
                                <input type="email" id="senderEmail" name="email" required
                                    placeholder="nama@email.com"
                                    class="w-full px-4 py-3 rounded-xl bg-slate-950/80 border border-slate-800 text-slate-100 placeholder-slate-500 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all">
                            </div>
                        </div>

                        <div>
                            <label for="senderSubject"
                                class="block text-xs font-semibold text-slate-300 uppercase tracking-wider mb-1.5">Topik
                                / Subjek</label>
                            <input type="text" id="senderSubject" name="subject"
                                placeholder="Diskusi Proyek Web / Penawaran Kerjasama"
                                class="w-full px-4 py-3 rounded-xl bg-slate-950/80 border border-slate-800 text-slate-100 placeholder-slate-500 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all">
                        </div>

                        <div>
                            <label for="senderMessage"
                                class="block text-xs font-semibold text-slate-300 uppercase tracking-wider mb-1.5">Pesan
                                Anda *</label>
                            <textarea id="senderMessage" name="message" rows="4" required
                                placeholder="Tuliskan detail rencana atau kebutuhan aplikasi Anda..."
                                class="w-full px-4 py-3 rounded-xl bg-slate-950/80 border border-slate-800 text-slate-100 placeholder-slate-500 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all resize-y"></textarea>
                        </div>

                        <!-- Form Status Message Banner -->
                        <div id="formStatusMsg"
                            class="hidden p-3 rounded-xl text-xs sm:text-sm font-medium transition-all"></div>

                        <button type="submit" id="submitBtn"
                            class="w-full sm:w-auto inline-flex items-center justify-center gap-2 px-7 py-3.5 rounded-xl bg-gradient-to-r from-indigo-600 to-indigo-500 text-white font-semibold text-sm shadow-lg shadow-indigo-600/30 hover:from-indigo-500 hover:to-indigo-400 active:scale-95 transition-all">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8" />
                            </svg>
                            <span>Kirim Pesan Sekarang</span>
                        </button>
                    </form>
                </div>
            </div>

        </div>

    </div>
</section>

<script>
    async function handleContactSubmit(event) {
        event.preventDefault();

        const form = document.getElementById('contactForm');
        const name = document.getElementById('senderName').value.trim();
        const email = document.getElementById('senderEmail').value.trim();
        const subject = document.getElementById('senderSubject').value.trim();
        const message = document.getElementById('senderMessage').value.trim();
        const statusBox = document.getElementById('formStatusMsg');
        const submitBtn = document.getElementById('submitBtn');

        if (!name || !email || !message) {
            statusBox.className =
                'p-3 rounded-xl text-xs sm:text-sm font-medium bg-rose-500/10 text-rose-400 border border-rose-500/20';
            statusBox.textContent = 'Harap isi semua kolom wajib (*) sebelum mengirim.';
            statusBox.classList.remove('hidden');
            return;
        }

        submitBtn.disabled = true;
        const originalBtnContent = submitBtn.innerHTML;
        submitBtn.innerHTML = '<span>Mengirimkan pesan...</span>';

        try {
            const response = await fetch("{{ route('contact.send') }}", {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                },
                body: JSON.stringify({
                    name,
                    email,
                    subject,
                    message
                })
            });

            const result = await response.json();

            if (response.ok && result.success) {
                statusBox.className =
                    'p-3 rounded-xl text-xs sm:text-sm font-medium bg-emerald-500/10 text-emerald-400 border border-emerald-500/20';
                statusBox.innerHTML = '<strong>Terima kasih, ' + name +
                    '!</strong> Pesan Anda berhasil dikirim dan tersimpan di sistem.';
                statusBox.classList.remove('hidden');
                form.reset();
            } else {
                statusBox.className =
                    'p-3 rounded-xl text-xs sm:text-sm font-medium bg-rose-500/10 text-rose-400 border border-rose-500/20';
                statusBox.textContent = result.message || 'Gagal mengirim pesan. Silakan coba kembali.';
                statusBox.classList.remove('hidden');
            }
        } catch (err) {
            statusBox.className =
                'p-3 rounded-xl text-xs sm:text-sm font-medium bg-rose-500/10 text-rose-400 border border-rose-500/20';
            statusBox.textContent = 'Terjadi kendala jaringan saat mengirim pesan.';
            statusBox.classList.remove('hidden');
        } finally {
            submitBtn.disabled = false;
            submitBtn.innerHTML = originalBtnContent;
        }
    }
</script>
