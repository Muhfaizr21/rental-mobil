@extends('layouts.app')
@section('content')

{{-- Hero Section --}}
<section class="bg-gradient-to-br from-gray-900 via-gray-800 to-black py-20 relative overflow-hidden">
    {{-- Animated Background --}}
    <div class="absolute inset-0 opacity-20">
        <div class="absolute top-10 left-10 w-64 h-64 bg-amber-500 rounded-full filter blur-3xl animate-pulse opacity-30"></div>
        <div class="absolute bottom-10 right-10 w-80 h-80 bg-amber-600 rounded-full filter blur-3xl animate-pulse opacity-20" style="animation-delay: 1s"></div>
    </div>

    <div class="max-w-7xl mx-auto px-4 md:px-6 text-center relative z-10">
        <div class="inline-block bg-amber-500/20 text-amber-300 px-4 py-2 rounded-full text-sm font-bold mb-4 backdrop-blur-sm border border-amber-500/30">
            💬 CHAT & KONTAK
        </div>
        <h1 class="text-4xl md:text-6xl font-black text-white mb-4">
            Butuh Bantuan? <span class="text-amber-400">Chat Aja!</span>
        </h1>
        <p class="text-xl text-gray-300 max-w-2xl mx-auto">
            Tim kita siap bantu kalian 24/7. Jangan sungkan buat nanya-nanya ya!
        </p>
    </div>
</section>

{{-- Contact Methods Section --}}
<section class="py-20 bg-gray-900">
    <div class="max-w-7xl mx-auto px-4 md:px-6">
        {{-- Quick Contact Cards --}}
        <div class="grid md:grid-cols-3 gap-8 mb-16">
            {{-- WhatsApp Card --}}
            <a href="https://wa.me/6285601700507" class="group bg-gradient-to-br from-green-600 to-green-700 rounded-3xl p-8 text-white hover:scale-105 transition-all duration-300 shadow-2xl hover:shadow-green-500/30 border border-green-500/30">
                <div class="flex items-center justify-center w-16 h-16 bg-white/20 backdrop-blur-sm rounded-2xl mb-6 group-hover:scale-110 transition-transform border border-white/20">
                    <span class="text-2xl">💬</span>
                </div>
                <h3 class="text-2xl font-bold mb-2">WhatsApp</h3>
                <p class="text-green-100 mb-4">Chat langsung, dijamin cepet responnya!</p>
                <div class="flex items-center justify-between">
                    <span class="text-lg font-semibold">+6285601700507</span>
                    <svg class="w-6 h-6 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                    </svg>
                </div>
                <div class="mt-4 pt-4 border-t border-white/20 text-sm text-green-100">
                    ⚡ Online 24/7 • Respon Kilat
                </div>
            </a>

            {{-- Phone Card --}}
            <a href="tel:+6285601700507" class="group bg-gradient-to-br from-blue-600 to-blue-700 rounded-3xl p-8 text-white hover:scale-105 transition-all duration-300 shadow-2xl hover:shadow-blue-500/30 border border-blue-500/30">
                <div class="flex items-center justify-center w-16 h-16 bg-white/20 backdrop-blur-sm rounded-2xl mb-6 group-hover:scale-110 transition-transform border border-white/20">
                    <span class="text-2xl">📞</span>
                </div>
                <h3 class="text-2xl font-bold mb-2">Telepon</h3>
                <p class="text-blue-100 mb-4">Langsung telepon kalo lebih enak</p>
                <div class="flex items-center justify-between">
                    <span class="text-lg font-semibold">+6285601700507</span>
                    <svg class="w-6 h-6 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                    </svg>
                </div>
                <div class="mt-4 pt-4 border-t border-white/20 text-sm text-blue-100">
                    🕒 Layanan telepon 24 jam
                </div>
            </a>

            {{-- Email Card --}}
            <a href="mailto:rentgo.idcirebon@gmail.com" class="group bg-gradient-to-br from-purple-600 to-purple-700 rounded-3xl p-8 text-white hover:scale-105 transition-all duration-300 shadow-2xl hover:shadow-purple-500/30 border border-purple-500/30">
                <div class="flex items-center justify-center w-16 h-16 bg-white/20 backdrop-blur-sm rounded-2xl mb-6 group-hover:scale-110 transition-transform border border-white/20">
                    <span class="text-2xl">✉️</span>
                </div>
                <h3 class="text-2xl font-bold mb-2">Email</h3>
                <p class="text-purple-100 mb-4">Kirim pertanyaan lewat email</p>
                <div class="flex items-center justify-between">
                    <span class="text-lg font-semibold text-sm">rentgo.idcirebon@gmail.com</span>
                    <svg class="w-6 h-6 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                    </svg>
                </div>
                <div class="mt-4 pt-4 border-t border-white/20 text-sm text-purple-100">
                    📨 Dijawab max 2 jam kerja
                </div>
            </a>
        </div>

        {{-- Office Location & Contact Form --}}
        <div class="grid lg:grid-cols-2 gap-12">
            {{-- Office Location --}}
            <div class="bg-gray-800 rounded-3xl p-8 md:p-10 shadow-xl border border-amber-500/20">
                <h2 class="text-3xl font-black text-white mb-6 flex items-center gap-3">
                    <div class="w-12 h-12 bg-gradient-to-br from-amber-500 to-amber-600 rounded-xl flex items-center justify-center border border-amber-400">
                        <span class="text-xl">🏢</span>
                    </div>
                    Kantor Kita
                </h2>

                {{-- Office Details --}}
                <div class="space-y-6">
                    <div class="flex items-start gap-4 p-4 bg-gray-700 rounded-2xl border border-amber-500/10 hover:border-amber-500/30 transition">
                        <div class="w-12 h-12 bg-amber-500/20 rounded-xl flex items-center justify-center flex-shrink-0 border border-amber-500/30">
                            <span class="text-lg">📍</span>
                        </div>
                        <div class="flex-1">
                            <h3 class="font-bold text-white mb-1">Alamat Kantor</h3>
                            <p class="text-gray-300 leading-relaxed">
                                Keandra Living, Jalan Damai 6 No.16, Sampiran, Kec. Talun, Kabupaten Cirebon, Jawa Barat
                            </p>
                        </div>
                    </div>

                    <div class="flex items-start gap-4 p-4 bg-gray-700 rounded-2xl border border-amber-500/10 hover:border-amber-500/30 transition">
                        <div class="w-12 h-12 bg-amber-500/20 rounded-xl flex items-center justify-center flex-shrink-0 border border-amber-500/30">
                            <span class="text-lg">🕒</span>
                        </div>
                        <div class="flex-1">
                            <h3 class="font-bold text-white mb-1">Jam Operasional</h3>
                            <p class="text-gray-300">
                                Senin - Sabtu: 08.00 - 20.00 WIB<br>
                                Minggu: 09.00 - 18.00 WIB<br>
                                <span class="text-green-400 font-semibold mt-1 inline-block">📱 CS 24/7 via WhatsApp!</span>
                            </p>
                        </div>
                    </div>

                    <div class="flex items-start gap-4 p-4 bg-gray-700 rounded-2xl border border-amber-500/10 hover:border-amber-500/30 transition">
                        <div class="w-12 h-12 bg-amber-500/20 rounded-xl flex items-center justify-center flex-shrink-0 border border-amber-500/30">
                            <span class="text-lg">🚗</span>
                        </div>
                        <div class="flex-1">
                            <h3 class="font-bold text-white mb-1">Area Layanan</h3>
                            <p class="text-gray-300">
                                Cirebon
                            </p>
                        </div>
                    </div>
                </div>

                {{-- Custom Map dengan Background Dark --}}
                <div class="mt-6 bg-gradient-to-br from-gray-900 to-gray-800 rounded-2xl h-64 overflow-hidden border border-amber-500/20 relative">
                    {{-- Map Background Pattern --}}
                    <div class="absolute inset-0 bg-gradient-to-br from-amber-900/10 to-gray-900">
                        {{-- Street Lines --}}
                        <div class="absolute inset-0 opacity-20">
                            <div class="absolute top-1/2 left-0 right-0 h-1 bg-amber-400/30 transform -translate-y-1/2"></div>
                            <div class="absolute top-1/3 left-0 right-0 h-0.5 bg-amber-400/20 transform -translate-y-1/2"></div>
                            <div class="absolute top-2/3 left-0 right-0 h-0.5 bg-amber-400/20 transform -translate-y-1/2"></div>

                            {{-- Intersection --}}
                            <div class="absolute top-1/2 left-1/2 w-8 h-8 border-2 border-amber-400/40 rounded-full transform -translate-x-1/2 -translate-y-1/2"></div>

                            {{-- Buildings --}}
                            <div class="absolute top-1/4 left-1/4 w-12 h-16 bg-gray-700/50 transform -translate-x-1/2 -translate-y-1/2 rounded"></div>
                            <div class="absolute top-1/3 right-1/4 w-10 h-20 bg-gray-700/50 transform translate-x-1/2 -translate-y-1/2 rounded"></div>
                            <div class="absolute bottom-1/4 left-1/3 w-14 h-12 bg-gray-700/50 transform -translate-x-1/2 translate-y-1/2 rounded"></div>
                        </div>

                        {{-- Location Marker --}}
                        <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2">
                            <div class="relative">
                                <div class="w-8 h-8 bg-red-500 rounded-full animate-pulse shadow-lg"></div>
                                <div class="absolute inset-0 w-8 h-8 bg-red-400 rounded-full animate-ping"></div>
                                <div class="absolute -top-2 -left-2 w-12 h-12 border-2 border-red-400/30 rounded-full animate-pulse"></div>
                            </div>
                        </div>

                        {{-- Map Text --}}
                        <div class="absolute bottom-4 left-1/2 transform -translate-x-1/2 text-center">
                            <div class="bg-black/50 backdrop-blur-sm px-4 py-2 rounded-lg border border-amber-500/30">
                                <p class="text-amber-300 text-sm font-semibold">📍 Lokasi Kantor Kita</p>
                                <p class="text-gray-400 text-xs">Keandra Living, Jalan Damai 6 No.16, Sampiran, Kec. Talun, Kabupaten Cirebon, Jawa Barat</p>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Map Link --}}
                <div class="mt-4 text-center">
                    <a href="Alamat:https://share.google/nxiJaPh8UilK5Mk3g"
                       target="_blank"
                       class="inline-flex items-center gap-2 bg-amber-600 hover:bg-amber-700 text-white px-6 py-3 rounded-xl font-semibold transition-all duration-300 hover:scale-105 border border-amber-500/30">
                        <span>🗺️ Buka di Google Maps</span>
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/>
                        </svg>
                    </a>
                </div>
            </div>

            {{-- Contact Form --}}
            <div class="bg-gray-800 rounded-3xl p-8 md:p-10 shadow-xl border border-amber-500/20">
                <h2 class="text-3xl font-black text-white mb-6 flex items-center gap-3">
                    <div class="w-12 h-12 bg-gradient-to-br from-amber-500 to-amber-600 rounded-xl flex items-center justify-center border border-amber-400">
                        <span class="text-xl">💌</span>
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

                <form id="contactForm" action="{{ route('landing.contact.store') }}" method="POST" class="space-y-5">
                    @csrf

                    <div>
                        <label class="block text-sm font-semibold text-gray-300 mb-2">Nama Lengkap *</label>
                        <input type="text" name="name" value="{{ old('name') }}" required
                               class="w-full px-4 py-3 bg-gray-700 border-2 border-gray-600 rounded-xl focus:border-amber-500 focus:ring-4 focus:ring-amber-500/20 transition outline-none text-white placeholder-gray-400 @error('name') border-red-500 @enderror"
                               placeholder="Masukkan nama lo">
                        @error('name')
                            <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-300 mb-2">Nomor WhatsApp *</label>
                        <input type="tel" name="phone" value="{{ old('phone') }}" required
                               class="w-full px-4 py-3 bg-gray-700 border-2 border-gray-600 rounded-xl focus:border-amber-500 focus:ring-4 focus:ring-amber-500/20 transition outline-none text-white placeholder-gray-400 @error('phone') border-red-500 @enderror"
                               placeholder="08xxxxxxxxxx">
                        @error('phone')
                            <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-300 mb-2">Email *</label>
                        <input type="email" name="email" value="{{ old('email') }}" required
                               class="w-full px-4 py-3 bg-gray-700 border-2 border-gray-600 rounded-xl focus:border-amber-500 focus:ring-4 focus:ring-amber-500/20 transition outline-none text-white placeholder-gray-400 @error('email') border-red-500 @enderror"
                               placeholder="nama@email.com">
                        @error('email')
                            <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-300 mb-2">Keperluan *</label>
                        <select name="purpose" required
                                class="w-full px-4 py-3 bg-gray-700 border-2 border-gray-600 rounded-xl focus:border-amber-500 focus:ring-4 focus:ring-amber-500/20 transition outline-none text-white @error('purpose') border-red-500 @enderror">
                            <option value="">Pilih keperluan...</option>
                            <option value="booking" {{ old('purpose') == 'booking' ? 'selected' : '' }}>🚗 Booking Mobil</option>
                            <option value="info" {{ old('purpose') == 'info' ? 'selected' : '' }}>💡 Informasi Harga</option>
                            <option value="partnership" {{ old('purpose') == 'partnership' ? 'selected' : '' }}>🤝 Kerjasama</option>
                            <option value="complaint" {{ old('purpose') == 'complaint' ? 'selected' : '' }}>😔 Keluhan</option>
                            <option value="other" {{ old('purpose') == 'other' ? 'selected' : '' }}>❓ Lainnya</option>
                        </select>
                        @error('purpose')
                            <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-300 mb-2">Pesan *</label>
                        <textarea name="message" rows="5" required
                                  class="w-full px-4 py-3 bg-gray-700 border-2 border-gray-600 rounded-xl focus:border-amber-500 focus:ring-4 focus:ring-amber-500/20 transition outline-none resize-none text-white placeholder-gray-400 @error('message') border-red-500 @enderror"
                                  placeholder="Tulis pesan lo di sini...">{{ old('message') }}</textarea>
                        @error('message')
                            <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <button type="submit" id="submitBtn"
                            class="w-full bg-gradient-to-r from-amber-600 to-amber-700 text-white py-4 rounded-xl font-bold hover:from-amber-700 hover:to-amber-800 transition-all duration-300 shadow-lg hover:shadow-xl hover:scale-105 flex items-center justify-center gap-2 disabled:opacity-50 disabled:cursor-not-allowed border border-amber-500/30">
                        <span id="submitText">📤 Kirim Pesan</span>
                        <div id="submitSpinner" class="hidden">
                            <svg class="animate-spin h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                            </svg>
                        </div>
                    </button>

                    <p class="text-sm text-gray-400 text-center">
                        Atau langsung chat aja via <a href="https://wa.me/6281234567890" class="text-green-400 font-semibold hover:underline">WhatsApp</a> biar lebih cepet!
                    </p>
                </form>
            </div>
        </div>

        {{-- FAQ Section --}}
        <div class="mt-16 bg-gradient-to-br from-gray-800 to-gray-900 rounded-3xl p-8 md:p-12 text-white border border-amber-500/20">
            <h2 class="text-3xl md:text-4xl font-black mb-8 text-center">🤔 Pertanyaan yang Sering Ditanyain</h2>
            <div class="grid md:grid-cols-2 gap-6">
                <div class="bg-gray-700/50 backdrop-blur-sm rounded-2xl p-6 border border-amber-500/20 hover:border-amber-500/40 transition">
                    <h3 class="font-bold text-lg mb-2 flex items-center gap-2">
                        <span class="text-amber-400">💰</span>
                        Ada biaya tambahan gak?
                    </h3>
                    <p class="text-gray-300 text-sm pl-8">
                        Gak ada biaya tambahan sama sekali yaa!
                    </p>
                </div>

                <div class="bg-gray-700/50 backdrop-blur-sm rounded-2xl p-6 border border-amber-500/20 hover:border-amber-500/40 transition">
                    <h3 class="font-bold text-lg mb-2 flex items-center gap-2">
                        <span class="text-amber-400">📅</span>
                        Minimal sewa berapa hari?
                    </h3>
                    <p class="text-gray-300 text-sm pl-8">
                        Minimal sewa 1 hari (24 jam). Kalo sewa harian, overtime dihitung 10%/jam dari harga sewa!
                    </p>
                </div>

                <div class="bg-gray-700/50 backdrop-blur-sm rounded-2xl p-6 border border-amber-500/20 hover:border-amber-500/40 transition">
                    <h3 class="font-bold text-lg mb-2 flex items-center gap-2">
                        <span class="text-amber-400">💳</span>
                        Bayarnya gimana sistemnya?
                    </h3>
                    <p class="text-gray-300 text-sm pl-8">
                        Bisa DP 50% atau bayar full. Transfer via Bank/E-wallet. Jangan lupa kirim bukti transfer buat konfirmasi booking ya!
                    </p>
                </div>

                <div class="bg-gray-700/50 backdrop-blur-sm rounded-2xl p-6 border border-amber-500/20 hover:border-amber-500/40 transition">
                    <h3 class="font-bold text-lg mb-2 flex items-center gap-2">
                        <span class="text-amber-400">🚙</span>
                        Bisa antar jemput mobil?
                    </h3>
                    <p class="text-gray-300 text-sm pl-8">
                        Bisa banget! Kita siap anter jemput free area cirkot, Sumber, Plered, Talun, Kedawung.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- CTA Section --}}
<section class="py-16 bg-gradient-to-r from-amber-600 to-amber-700">
    <div class="max-w-4xl mx-auto px-4 md:px-6 text-center">
        <h2 class="text-3xl md:text-4xl font-black text-white mb-4">
            Masih Bingung atau Ada Pertanyaan?
        </h2>
        <p class="text-xl text-white/90 mb-8">
            Jangan malu-malu, tim kita siap bantu kamu kapan aja!
        </p>
        <a href="https://wa.me/6285601700507"
           class="inline-flex items-center gap-3 bg-white text-amber-600 px-8 py-4 rounded-xl font-bold hover:bg-gray-100 transition-all duration-300 shadow-2xl hover:scale-105 border border-white">
            <span class="text-xl">💬</span>
            <span>Chat via WhatsApp Sekarang</span>
        </a>
    </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const contactForm = document.getElementById('contactForm');
    const submitBtn = document.getElementById('submitBtn');
    const submitText = document.getElementById('submitText');
    const submitSpinner = document.getElementById('submitSpinner');

    if (contactForm) {
        contactForm.addEventListener('submit', function(e) {
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


});
</script>

@endsection
