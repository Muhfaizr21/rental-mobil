@extends('layouts.app')
@section('content')

    {{-- Hero Section --}}
    <section class="bg-gradient-to-br from-gray-900 via-gray-800 to-black py-16 md:py-20 relative overflow-hidden">
        {{-- Animated Background --}}
        <div class="absolute inset-0 opacity-20">
            <div
                class="absolute top-10 left-10 w-64 h-64 bg-amber-500 rounded-full filter blur-3xl animate-pulse opacity-30">
            </div>
            <div class="absolute bottom-10 right-10 w-80 h-80 bg-amber-600 rounded-full filter blur-3xl animate-pulse opacity-20"
                style="animation-delay: 1s"></div>
        </div>

        <div class="max-w-7xl mx-auto px-4 md:px-6 text-center relative z-10">
            <div
                class="inline-block bg-amber-500/20 text-amber-300 px-4 py-2 rounded-full text-sm font-bold mb-4 backdrop-blur-sm border border-amber-500/30">
                💬 CHAT & KONTAK
            </div>
            <h1 class="text-3xl md:text-4xl lg:text-6xl font-black text-white mb-4">
                Butuh Bantuan? <span class="text-amber-400">Chat Aja!</span>
            </h1>
            <p class="text-lg md:text-xl text-gray-300 max-w-2xl mx-auto">
                Tim kita siap bantu kalian 24/7. Jangan sungkan buat nanya-nanya ya!
            </p>
        </div>
    </section>

    {{-- Contact Methods Section --}}
    <section class="py-16 md:py-20 bg-gray-900">
        <div class="max-w-7xl mx-auto px-4 md:px-6">
            {{-- Quick Contact Cards --}}
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 md:gap-8 mb-12 md:mb-16">
                {{-- WhatsApp Card --}}
                <a href="https://wa.me/6285601700507"
                    class="group bg-gradient-to-br from-green-600 to-green-700 rounded-2xl md:rounded-3xl p-6 md:p-8 text-white hover:scale-105 transition-all duration-300 shadow-2xl hover:shadow-green-500/30 border border-green-500/30">
                    <div
                        class="flex items-center justify-center w-12 h-12 md:w-16 md:h-16 bg-white/20 backdrop-blur-sm rounded-2xl mb-4 md:mb-6 group-hover:scale-110 transition-transform border border-white/20">
                        <span class="text-xl md:text-2xl">💬</span>
                    </div>
                    <h3 class="text-xl md:text-2xl font-bold mb-2">WhatsApp</h3>
                    <p class="text-green-100 mb-4 text-sm md:text-base">Chat langsung, dijamin cepet responnya!</p>
                    <div class="flex items-center justify-between">
                        <span class="text-base md:text-lg font-semibold">+6285601700507</span>
                        <svg class="w-5 h-5 md:w-6 md:h-6 group-hover:translate-x-1 transition-transform" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 7l5 5m0 0l-5 5m5-5H6" />
                        </svg>
                    </div>
                    <div class="mt-4 pt-4 border-t border-white/20 text-xs md:text-sm text-green-100">
                        ⚡ Online 24/7 • Respon Kilat
                    </div>
                </a>

                {{-- Phone Card --}}
                <a href="tel:+6285601700507"
                    class="group bg-gradient-to-br from-blue-600 to-blue-700 rounded-2xl md:rounded-3xl p-6 md:p-8 text-white hover:scale-105 transition-all duration-300 shadow-2xl hover:shadow-blue-500/30 border border-blue-500/30">
                    <div
                        class="flex items-center justify-center w-12 h-12 md:w-16 md:h-16 bg-white/20 backdrop-blur-sm rounded-2xl mb-4 md:mb-6 group-hover:scale-110 transition-transform border border-white/20">
                        <span class="text-xl md:text-2xl">📞</span>
                    </div>
                    <h3 class="text-xl md:text-2xl font-bold mb-2">Telepon</h3>
                    <p class="text-blue-100 mb-4 text-sm md:text-base">Langsung telepon kalo lebih enak</p>
                    <div class="flex items-center justify-between">
                        <span class="text-base md:text-lg font-semibold">+6285601700507</span>
                        <svg class="w-5 h-5 md:w-6 md:h-6 group-hover:translate-x-1 transition-transform" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 7l5 5m0 0l-5 5m5-5H6" />
                        </svg>
                    </div>
                    <div class="mt-4 pt-4 border-t border-white/20 text-xs md:text-sm text-blue-100">
                        🕒 Layanan telepon 24 jam
                    </div>
                </a>

                {{-- Email Card --}}
                <a href="mailto:rentgo.idcirebon@gmail.com"
                    class="group bg-gradient-to-br from-purple-600 to-purple-700 rounded-2xl md:rounded-3xl p-6 md:p-8 text-white hover:scale-105 transition-all duration-300 shadow-2xl hover:shadow-purple-500/30 border border-purple-500/30">
                    <div
                        class="flex items-center justify-center w-12 h-12 md:w-16 md:h-16 bg-white/20 backdrop-blur-sm rounded-2xl mb-4 md:mb-6 group-hover:scale-110 transition-transform border border-white/20">
                        <span class="text-xl md:text-2xl">✉️</span>
                    </div>
                    <h3 class="text-xl md:text-2xl font-bold mb-2">Email</h3>
                    <p class="text-purple-100 mb-4 text-sm md:text-base">Kirim pertanyaan lewat email</p>
                    <div class="flex items-center justify-between">
                        <span class="text-sm md:text-base font-semibold break-words">rentgo.idcirebon@gmail.com</span>
                        <svg class="w-5 h-5 md:w-6 md:h-6 group-hover:translate-x-1 transition-transform" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 7l5 5m0 0l-5 5m5-5H6" />
                        </svg>
                    </div>
                    <div class="mt-4 pt-4 border-t border-white/20 text-xs md:text-sm text-purple-100">
                        📨 Dijawab max 2 jam kerja
                    </div>
                </a>
            </div>

            {{-- Office Location & Contact Form --}}
            <div class="grid lg:grid-cols-2 gap-8 md:gap-12">
                {{-- Office Location --}}
                <div class="bg-gray-800 rounded-2xl md:rounded-3xl p-6 md:p-8 lg:p-10 shadow-xl border border-amber-500/20">
                    <h2 class="text-2xl md:text-3xl font-black text-white mb-6 flex items-center gap-3">
                        <div
                            class="w-10 h-10 md:w-12 md:h-12 bg-gradient-to-br from-amber-500 to-amber-600 rounded-xl flex items-center justify-center border border-amber-400">
                            <span class="text-lg md:text-xl">🏢</span>
                        </div>
                        Kantor Kita
                    </h2>

                    {{-- Office Details --}}
                    <div class="space-y-4 md:space-y-6">
                        <div
                            class="flex items-start gap-3 md:gap-4 p-4 bg-gray-700 rounded-2xl border border-amber-500/10 hover:border-amber-500/30 transition">
                            <div
                                class="w-10 h-10 md:w-12 md:h-12 bg-amber-500/20 rounded-xl flex items-center justify-center flex-shrink-0 border border-amber-500/30">
                                <span class="text-lg">📍</span>
                            </div>
                            <div class="flex-1">
                                <h3 class="font-bold text-white mb-1 text-sm md:text-base">Alamat Kantor</h3>
                                <p class="text-gray-300 leading-relaxed text-sm md:text-base">
                                    Jl. Flamboyan XIII No D.341 Griya Cempaka Arum Wanasaba Lor Talun - Kab. Cirebon (45171)
                                </p>
                            </div>
                        </div>

                        <div
                            class="flex items-start gap-3 md:gap-4 p-4 bg-gray-700 rounded-2xl border border-amber-500/10 hover:border-amber-500/30 transition">
                            <div
                                class="w-10 h-10 md:w-12 md:h-12 bg-amber-500/20 rounded-xl flex items-center justify-center flex-shrink-0 border border-amber-500/30">
                                <span class="text-lg">🕒</span>
                            </div>
                            <div class="flex-1">
                                <h3 class="font-bold text-white mb-1 text-sm md:text-base">Jam Operasional</h3>
                                <p class="text-gray-300 text-sm md:text-base">
                                    Senin - Sabtu: 08.00 - 20.00 WIB<br>
                                    Minggu: 09.00 - 18.00 WIB<br>
                                    <span class="text-green-400 font-semibold mt-1 inline-block text-sm md:text-base">📱 CS
                                        24/7 via WhatsApp!</span>
                                </p>
                            </div>
                        </div>

                        <div
                            class="flex items-start gap-3 md:gap-4 p-4 bg-gray-700 rounded-2xl border border-amber-500/10 hover:border-amber-500/30 transition">
                            <div
                                class="w-10 h-10 md:w-12 md:h-12 bg-amber-500/20 rounded-xl flex items-center justify-center flex-shrink-0 border border-amber-500/30">
                                <span class="text-lg">🚗</span>
                            </div>
                            <div class="flex-1">
                                <h3 class="font-bold text-white mb-1 text-sm md:text-base">Area Layanan</h3>
                                <p class="text-gray-300 text-sm md:text-base">
                                    Cirebon dan Sekitarnya
                                </p>
                            </div>
                        </div>
                    </div>

                    {{-- Google Maps Embed --}}
                    <div class="mt-6 rounded-2xl overflow-hidden border border-amber-500/20 relative">
                        <div class="relative h-64 md:h-80 lg:h-96">
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3549.361275872814!2d108.50275527499505!3d-6.760379593236244!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6f1f000b53c6d7%3A0xfaef57e929a116b2!2sRentGo%20Indonesia!5e1!3m2!1sid!2sid!4v1763447609288!5m2!1sid!2sid"
                                width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"
                                referrerpolicy="no-referrer-when-downgrade" class="w-full h-full">
                            </iframe>
                        </div>
                    </div>

                    {{-- Map Link --}}
                    <div class="mt-4 text-center">
                        <a href="https://www.google.com/maps/place/RentGo+Indonesia/@-6.7603796,108.5027553,17z/data=!3m1!4b1!4m5!3m4!1s0x2e6f1f000b53c6d7:0xfaef57e929a116b2!8m2!3d-6.7603796!4d108.5027553"
                            target="_blank"
                            class="inline-flex items-center gap-2 bg-amber-600 hover:bg-amber-700 text-white px-4 md:px-6 py-3 rounded-xl font-semibold transition-all duration-300 hover:scale-105 border border-amber-500/30 text-sm md:text-base">
                            <span>🗺️ Buka di Google Maps</span>
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                            </svg>
                        </a>
                    </div>
                </div>

                {{-- Contact Form --}}
                <div class="bg-gray-800 rounded-2xl md:rounded-3xl p-6 md:p-8 lg:p-10 shadow-xl border border-amber-500/20">
                    <h2 class="text-2xl md:text-3xl font-black text-white mb-6 flex items-center gap-3">
                        <div
                            class="w-10 h-10 md:w-12 md:h-12 bg-gradient-to-br from-amber-500 to-amber-600 rounded-xl flex items-center justify-center border border-amber-400">
                            <span class="text-lg md:text-xl">💌</span>
                        </div>
                        Kirim Pesan
                    </h2>

                    {{-- Success Message --}}
                    @if(session('success'))
                        <div class="mb-6 bg-green-600/20 border border-green-500/30 text-green-400 px-4 py-3 rounded-xl">
                            <div class="flex items-center">
                                <span class="text-lg mr-2">✅</span>
                                {{ session('success') }}
                            </div>
                        </div>
                    @endif

                    {{-- Error Messages --}}
                    @if($errors->any())
                        <div class="mb-6 bg-red-600/20 border border-red-500/30 text-red-400 px-4 py-3 rounded-xl">
                            <div class="flex items-center">
                                <span class="text-lg mr-2">⚠️</span>
                                Ada yang salah nih, cek lagi ya formnya!
                                <ul class="mt-2 list-disc list-inside text-sm">
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    @endif

                    <form id="contactForm" action="{{ route('landing.contact.store') }}" method="POST"
                        class="space-y-4 md:space-y-5">
                        @csrf

                        <div>
                            <label class="block text-sm font-semibold text-gray-300 mb-2">Nama Lengkap *</label>
                            <input type="text" name="name" value="{{ old('name') }}" required
                                class="w-full px-4 py-3 bg-gray-700 border-2 border-gray-600 rounded-xl focus:border-amber-500 focus:ring-4 focus:ring-amber-500/20 transition outline-none text-white placeholder-gray-400 @error('name') border-red-500 @enderror text-sm md:text-base"
                                placeholder="Masukkan nama anda">
                            @error('name')
                                <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-gray-300 mb-2">Nomor WhatsApp *</label>
                            <input type="tel" name="phone" value="{{ old('phone') }}" required
                                class="w-full px-4 py-3 bg-gray-700 border-2 border-gray-600 rounded-xl focus:border-amber-500 focus:ring-4 focus:ring-amber-500/20 transition outline-none text-white placeholder-gray-400 @error('phone') border-red-500 @enderror text-sm md:text-base"
                                placeholder="08xxxxxxxxxx">
                            @error('phone')
                                <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-gray-300 mb-2">Email *</label>
                            <input type="email" name="email" value="{{ old('email') }}" required
                                class="w-full px-4 py-3 bg-gray-700 border-2 border-gray-600 rounded-xl focus:border-amber-500 focus:ring-4 focus:ring-amber-500/20 transition outline-none text-white placeholder-gray-400 @error('email') border-red-500 @enderror text-sm md:text-base"
                                placeholder="nama@email.com">
                            @error('email')
                                <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-gray-300 mb-2">Keperluan *</label>
                            <select name="purpose" required
                                class="w-full px-4 py-3 bg-gray-700 border-2 border-gray-600 rounded-xl focus:border-amber-500 focus:ring-4 focus:ring-amber-500/20 transition outline-none text-white @error('purpose') border-red-500 @enderror text-sm md:text-base">
                                <option value="">Pilih keperluan...</option>
                                <option value="booking" {{ old('purpose') == 'booking' ? 'selected' : '' }}>🚗 Booking Mobil
                                </option>
                                <option value="info" {{ old('purpose') == 'info' ? 'selected' : '' }}>💡 Informasi Harga
                                </option>
                                <option value="partnership" {{ old('purpose') == 'partnership' ? 'selected' : '' }}>🤝
                                    Kerjasama</option>
                                <option value="complaint" {{ old('purpose') == 'complaint' ? 'selected' : '' }}>😔 Keluhan
                                </option>
                                <option value="other" {{ old('purpose') == 'other' ? 'selected' : '' }}>❓ Lainnya</option>
                            </select>
                            @error('purpose')
                                <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-gray-300 mb-2">Pesan *</label>
                            <textarea name="message" rows="4" required
                                class="w-full px-4 py-3 bg-gray-700 border-2 border-gray-600 rounded-xl focus:border-amber-500 focus:ring-4 focus:ring-amber-500/20 transition outline-none resize-none text-white placeholder-gray-400 @error('message') border-red-500 @enderror text-sm md:text-base"
                                placeholder="Tulis pesan sini...">{{ old('message') }}</textarea>
                            @error('message')
                                <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <button type="submit" id="submitBtn"
                            class="w-full bg-gradient-to-r from-amber-600 to-amber-700 text-white py-3 md:py-4 rounded-xl font-bold hover:from-amber-700 hover:to-amber-800 transition-all duration-300 shadow-lg hover:shadow-xl hover:scale-105 flex items-center justify-center gap-2 disabled:opacity-50 disabled:cursor-not-allowed border border-amber-500/30 text-sm md:text-base">
                            <span id="submitText">📤 Kirim Pesan</span>
                            <div id="submitSpinner" class="hidden">
                                <svg class="animate-spin h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24">
                                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                                        stroke-width="4"></circle>
                                    <path class="opacity-75" fill="currentColor"
                                        d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                                    </path>
                                </svg>
                            </div>
                        </button>

                        <p class="text-xs md:text-sm text-gray-400 text-center">
                            Atau langsung chat aja via <a href="https://wa.me/6285601700507"
                                class="text-green-400 font-semibold hover:underline">WhatsApp</a> biar lebih cepet!
                        </p>
                    </form>
                </div>
            </div>

            {{-- FAQ Section --}}
            <div
                class="mt-12 md:mt-16 bg-gradient-to-br from-gray-800 to-gray-900 rounded-2xl md:rounded-3xl p-6 md:p-8 lg:p-12 text-white border border-amber-500/20">
                <h2 class="text-2xl md:text-3xl lg:text-4xl font-black mb-6 md:mb-8 text-center">🤔 Pertanyaan yang Sering
                    Ditanyain</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 md:gap-6">
                    <div
                        class="bg-gray-700/50 backdrop-blur-sm rounded-2xl p-4 md:p-6 border border-amber-500/20 hover:border-amber-500/40 transition">
                        <h3 class="font-bold text-base md:text-lg mb-2 flex items-center gap-2">
                            <span class="text-amber-400">💰</span>
                            Ada biaya tambahan gak?
                        </h3>
                        <p class="text-gray-300 text-sm md:text-base pl-6 md:pl-8">
                            Gak ada biaya tambahan sama sekali yaa!
                        </p>
                    </div>

                    <div
                        class="bg-gray-700/50 backdrop-blur-sm rounded-2xl p-4 md:p-6 border border-amber-500/20 hover:border-amber-500/40 transition">
                        <h3 class="font-bold text-base md:text-lg mb-2 flex items-center gap-2">
                            <span class="text-amber-400">📅</span>
                            Minimal sewa berapa hari?
                        </h3>
                        <p class="text-gray-300 text-sm md:text-base pl-6 md:pl-8">
                            Minimal sewa 1 hari (24 jam). Kalo sewa harian, overtime dihitung 10%/jam dari harga sewa!
                        </p>
                    </div>

                    <div
                        class="bg-gray-700/50 backdrop-blur-sm rounded-2xl p-4 md:p-6 border border-amber-500/20 hover:border-amber-500/40 transition">
                        <h3 class="font-bold text-base md:text-lg mb-2 flex items-center gap-2">
                            <span class="text-amber-400">💳</span>
                            Bayarnya gimana sistemnya?
                        </h3>
                        <p class="text-gray-300 text-sm md:text-base pl-6 md:pl-8">
                            Bisa DP 50% atau bayar full. Transfer via Bank/E-wallet. Jangan lupa kirim bukti transfer buat
                            konfirmasi booking ya!
                        </p>
                    </div>

                    <div
                        class="bg-gray-700/50 backdrop-blur-sm rounded-2xl p-4 md:p-6 border border-amber-500/20 hover:border-amber-500/40 transition">
                        <h3 class="font-bold text-base md:text-lg mb-2 flex items-center gap-2">
                            <span class="text-amber-400">🚙</span>
                            Bisa antar jemput mobil?
                        </h3>
                        <p class="text-gray-300 text-sm md:text-base pl-6 md:pl-8">
                            Bisa banget! Kita siap anter jemput free area cirkot, Sumber, Plered, Talun, Kedawung.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- CTA Section --}}
    <section class="py-12 md:py-16 bg-gradient-to-r from-amber-600 to-amber-700">
        <div class="max-w-4xl mx-auto px-4 md:px-6 text-center">
            <h2 class="text-2xl md:text-3xl lg:text-4xl font-black text-white mb-4">
                Masih Bingung atau Ada Pertanyaan?
            </h2>
            <p class="text-lg md:text-xl text-white/90 mb-6 md:mb-8">
                Jangan malu-malu, tim kita siap bantu kamu kapan aja!
            </p>
            <a href="https://wa.me/6285601700507"
                class="inline-flex items-center gap-3 bg-white text-amber-600 px-6 md:px-8 py-3 md:py-4 rounded-xl font-bold hover:bg-gray-100 transition-all duration-300 shadow-2xl hover:scale-105 border border-white text-sm md:text-base">
                <span class="text-lg md:text-xl">💬</span>
                <span>Chat via WhatsApp Sekarang</span>
            </a>
        </div>
    </section>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const contactForm = document.getElementById('contactForm');
            const submitBtn = document.getElementById('submitBtn');
            const submitText = document.getElementById('submitText');
            const submitSpinner = document.getElementById('submitSpinner');

            if (contactForm) {
                contactForm.addEventListener('submit', function (e) {
                    // Prevent double submission
                    if (submitBtn.disabled) {
                        e.preventDefault();
                        return;
                    }

                    // Show loading state
                    submitBtn.disabled = true;
                    submitText.textContent = '🔄 Lagi dikirim...';
                    submitSpinner.classList.remove('hidden');
                });
            }

            // Improve mobile experience
            const inputs = document.querySelectorAll('input, textarea, select');
            inputs.forEach(input => {
                input.addEventListener('focus', function () {
                    // Add small delay to ensure keyboard doesn't cover input on mobile
                    setTimeout(() => {
                        this.scrollIntoView({ behavior: 'smooth', block: 'center' });
                    }, 300);
                });
            });
        });
    </script>

    <style>
        /* Improve form accessibility on mobile */
        @media (max-width: 768px) {

            input,
            textarea,
            select {
                font-size: 16px;
                /* Prevent zoom on iOS */
            }

            /* Ensure proper spacing on small screens */
            .grid>* {
                min-width: 0;
            }
        }

        /* Custom scrollbar for webkit browsers */
        ::-webkit-scrollbar {
            width: 8px;
        }

        ::-webkit-scrollbar-track {
            background: #1f2937;
        }

        ::-webkit-scrollbar-thumb {
            background: linear-gradient(135deg, #f59e0b, #d97706);
            border-radius: 10px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: linear-gradient(135deg, #fbbf24, #f59e0b);
        }

        /* Focus styles for better accessibility */
        input:focus,
        textarea:focus,
        select:focus {
            outline: 2px solid #f59e0b;
            outline-offset: 2px;
        }

        /* Improve touch targets on mobile */
        @media (max-width: 640px) {

            button,
            a {
                min-height: 44px;
                min-width: 44px;
            }
        }
    </style>

@endsection