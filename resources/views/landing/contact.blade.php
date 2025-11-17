@extends('layouts.app')
@section('content')

{{-- Hero Section --}}
<section class="bg-gradient-to-br from-slate-900 via-blue-900 to-slate-900 py-20 relative overflow-hidden">
    {{-- Animated Background --}}
    <div class="absolute inset-0 opacity-20">
        <div class="absolute top-10 left-10 w-64 h-64 bg-amber-500 rounded-full filter blur-3xl animate-pulse"></div>
        <div class="absolute bottom-10 right-10 w-80 h-80 bg-blue-500 rounded-full filter blur-3xl animate-pulse" style="animation-delay: 1s"></div>
    </div>

    <div class="max-w-7xl mx-auto px-4 md:px-6 text-center relative z-10">
        <div class="inline-block bg-amber-500/20 text-amber-300 px-4 py-2 rounded-full text-sm font-bold mb-4 backdrop-blur-sm border border-amber-500/30">
            📞 HUBUNGI KAMI
        </div>
        <h1 class="text-4xl md:text-6xl font-black text-white mb-4">
            Siap Melayani <span class="text-amber-400">Anda</span>
        </h1>
        <p class="text-xl text-blue-100 max-w-2xl mx-auto">
            Tim kami siap membantu kebutuhan rental mobil Anda 24/7
        </p>
    </div>
</section>

{{-- Contact Methods Section --}}
<section class="py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 md:px-6">
        {{-- Quick Contact Cards --}}
        <div class="grid md:grid-cols-3 gap-8 mb-16">
            {{-- WhatsApp Card --}}
            <a href="https://wa.me/6281234567890" class="group bg-gradient-to-br from-green-500 to-green-600 rounded-3xl p-8 text-white hover:scale-105 transition-all duration-300 shadow-2xl hover:shadow-green-500/50">
                <div class="flex items-center justify-center w-16 h-16 bg-white/20 backdrop-blur-sm rounded-2xl mb-6 group-hover:scale-110 transition-transform">
                    <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
                    </svg>
                </div>
                <h3 class="text-2xl font-bold mb-2">WhatsApp</h3>
                <p class="text-green-100 mb-4">Chat langsung dengan tim kami</p>
                <div class="flex items-center justify-between">
                    <span class="text-lg font-semibold">+62 812-3456-7890</span>
                    <svg class="w-6 h-6 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                    </svg>
                </div>
                <div class="mt-4 pt-4 border-t border-white/20 text-sm text-green-100">
                    ⚡ Respon cepat • Online 24/7
                </div>
            </a>

            {{-- Phone Card --}}
            <a href="tel:+6281234567890" class="group bg-gradient-to-br from-blue-500 to-blue-600 rounded-3xl p-8 text-white hover:scale-105 transition-all duration-300 shadow-2xl hover:shadow-blue-500/50">
                <div class="flex items-center justify-center w-16 h-16 bg-white/20 backdrop-blur-sm rounded-2xl mb-6 group-hover:scale-110 transition-transform">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                    </svg>
                </div>
                <h3 class="text-2xl font-bold mb-2">Telepon</h3>
                <p class="text-blue-100 mb-4">Hubungi kami langsung</p>
                <div class="flex items-center justify-between">
                    <span class="text-lg font-semibold">+62 812-3456-7890</span>
                    <svg class="w-6 h-6 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                    </svg>
                </div>
                <div class="mt-4 pt-4 border-t border-white/20 text-sm text-blue-100">
                    📞 Layanan telepon aktif 24 jam
                </div>
            </a>

            {{-- Email Card --}}
            <a href="mailto:support@rentcarid.com" class="group bg-gradient-to-br from-purple-500 to-purple-600 rounded-3xl p-8 text-white hover:scale-105 transition-all duration-300 shadow-2xl hover:shadow-purple-500/50">
                <div class="flex items-center justify-center w-16 h-16 bg-white/20 backdrop-blur-sm rounded-2xl mb-6 group-hover:scale-110 transition-transform">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                    </svg>
                </div>
                <h3 class="text-2xl font-bold mb-2">Email</h3>
                <p class="text-purple-100 mb-4">Kirim pertanyaan via email</p>
                <div class="flex items-center justify-between">
                    <span class="text-lg font-semibold text-sm">support@rentcarid.com</span>
                    <svg class="w-6 h-6 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                    </svg>
                </div>
                <div class="mt-4 pt-4 border-t border-white/20 text-sm text-purple-100">
                    ✉️ Balasan maksimal 2 jam kerja
                </div>
            </a>
        </div>

        {{-- Office Location & Contact Form --}}
        <div class="grid lg:grid-cols-2 gap-12">
            {{-- Office Location --}}
            <div class="bg-white rounded-3xl p-8 md:p-10 shadow-xl border border-gray-100">
                <h2 class="text-3xl font-black text-gray-900 mb-6 flex items-center gap-3">
                    <div class="w-12 h-12 bg-gradient-to-br from-amber-500 to-orange-600 rounded-xl flex items-center justify-center">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                        </svg>
                    </div>
                    Kantor Kami
                </h2>

                {{-- Office Details --}}
                <div class="space-y-6">
                    <div class="flex items-start gap-4 p-4 bg-gray-50 rounded-2xl">
                        <div class="w-12 h-12 bg-blue-100 rounded-xl flex items-center justify-center flex-shrink-0">
                            <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                            </svg>
                        </div>
                        <div class="flex-1">
                            <h3 class="font-bold text-gray-900 mb-1">Alamat</h3>
                            <p class="text-gray-600 leading-relaxed">
                                Jl. Sunan Kalijaga No. 123<br>
                                Kesambi, Kota Cirebon<br>
                                Jawa Barat 45133
                            </p>
                        </div>
                    </div>

                    <div class="flex items-start gap-4 p-4 bg-gray-50 rounded-2xl">
                        <div class="w-12 h-12 bg-green-100 rounded-xl flex items-center justify-center flex-shrink-0">
                            <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </div>
                        <div class="flex-1">
                            <h3 class="font-bold text-gray-900 mb-1">Jam Operasional</h3>
                            <p class="text-gray-600">
                                Senin - Sabtu: 08.00 - 20.00 WIB<br>
                                Minggu: 09.00 - 18.00 WIB<br>
                                <span class="text-green-600 font-semibold mt-1 inline-block">Customer Service 24/7 via WhatsApp</span>
                            </p>
                        </div>
                    </div>

                    <div class="flex items-start gap-4 p-4 bg-gray-50 rounded-2xl">
                        <div class="w-12 h-12 bg-purple-100 rounded-xl flex items-center justify-center flex-shrink-0">
                            <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7"/>
                            </svg>
                        </div>
                        <div class="flex-1">
                            <h3 class="font-bold text-gray-900 mb-1">Area Layanan</h3>
                            <p class="text-gray-600">
                                Cirebon, Indramayu, Majalengka, Kuningan, Brebes, dan sekitarnya
                            </p>
                        </div>
                    </div>
                </div>

                {{-- Map Placeholder --}}
                <div class="mt-6 bg-gradient-to-br from-blue-100 to-purple-200 rounded-2xl h-64 flex items-center justify-center overflow-hidden">
                    <div class="text-center">
                        <svg class="w-16 h-16 text-blue-400 mx-auto mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                        </svg>
                        <p class="text-blue-600 font-semibold">Google Maps</p>
                        <a href="https://maps.google.com" target="_blank" class="text-sm text-blue-500 hover:underline">Buka di Google Maps →</a>
                    </div>
                </div>
            </div>

            {{-- Contact Form --}}
            <div class="bg-white rounded-3xl p-8 md:p-10 shadow-xl border border-gray-100">
                <h2 class="text-3xl font-black text-gray-900 mb-6 flex items-center gap-3">
                    <div class="w-12 h-12 bg-gradient-to-br from-blue-500 to-purple-600 rounded-xl flex items-center justify-center">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"/>
                        </svg>
                    </div>
                    Kirim Pesan
                </h2>

                {{-- Success Message --}}
                @if(session('success'))
                <div class="mb-6 bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-xl">
                    <div class="flex items-center">
                        <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                        </svg>
                        {{ session('success') }}
                    </div>
                </div>
                @endif

                {{-- Error Messages --}}
                @if($errors->any())
                <div class="mb-6 bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-xl">
                    <div class="flex items-center">
                        <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0118 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                        </svg>
                        Terdapat kesalahan dalam pengisian form. Silakan periksa kembali.
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
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Nama Lengkap *</label>
                        <input type="text" name="name" value="{{ old('name') }}" required
                               class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:border-blue-500 focus:ring-4 focus:ring-blue-100 transition outline-none @error('name') border-red-500 @enderror"
                               placeholder="Masukkan nama Anda">
                        @error('name')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Nomor WhatsApp *</label>
                        <input type="tel" name="phone" value="{{ old('phone') }}" required
                               class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:border-blue-500 focus:ring-4 focus:ring-blue-100 transition outline-none @error('phone') border-red-500 @enderror"
                               placeholder="08xxxxxxxxxx">
                        @error('phone')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Email *</label>
                        <input type="email" name="email" value="{{ old('email') }}" required
                               class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:border-blue-500 focus:ring-4 focus:ring-blue-100 transition outline-none @error('email') border-red-500 @enderror"
                               placeholder="nama@email.com">
                        @error('email')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Keperluan *</label>
                        <select name="purpose" required
                                class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:border-blue-500 focus:ring-4 focus:ring-blue-100 transition outline-none @error('purpose') border-red-500 @enderror">
                            <option value="">Pilih keperluan...</option>
                            <option value="booking" {{ old('purpose') == 'booking' ? 'selected' : '' }}>Booking Mobil</option>
                            <option value="info" {{ old('purpose') == 'info' ? 'selected' : '' }}>Informasi Harga</option>
                            <option value="partnership" {{ old('purpose') == 'partnership' ? 'selected' : '' }}>Kerjasama</option>
                            <option value="complaint" {{ old('purpose') == 'complaint' ? 'selected' : '' }}>Keluhan</option>
                            <option value="other" {{ old('purpose') == 'other' ? 'selected' : '' }}>Lainnya</option>
                        </select>
                        @error('purpose')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Pesan *</label>
                        <textarea name="message" rows="5" required
                                  class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:border-blue-500 focus:ring-4 focus:ring-blue-100 transition outline-none resize-none @error('message') border-red-500 @enderror"
                                  placeholder="Tulis pesan Anda di sini...">{{ old('message') }}</textarea>
                        @error('message')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <button type="submit" id="submitBtn"
                            class="w-full bg-gradient-to-r from-blue-500 to-purple-600 text-white py-4 rounded-xl font-bold hover:from-blue-600 hover:to-purple-700 transition-all duration-300 shadow-lg hover:shadow-xl hover:scale-105 flex items-center justify-center gap-2 disabled:opacity-50 disabled:cursor-not-allowed">
                        <span id="submitText">Kirim Pesan</span>
                        <div id="submitSpinner" class="hidden">
                            <svg class="animate-spin h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                            </svg>
                        </div>
                        <svg id="submitIcon" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"/>
                        </svg>
                    </button>

                    <p class="text-sm text-gray-500 text-center">
                        Atau hubungi kami langsung via <a href="https://wa.me/6281234567890" class="text-green-600 font-semibold hover:underline">WhatsApp</a>
                    </p>
                </form>
            </div>
        </div>

        {{-- FAQ Section --}}
        <div class="mt-16 bg-gradient-to-br from-slate-900 to-blue-900 rounded-3xl p-8 md:p-12 text-white">
            <h2 class="text-3xl md:text-4xl font-black mb-8 text-center">Pertanyaan yang Sering Diajukan</h2>
            <div class="grid md:grid-cols-2 gap-6">
                <div class="bg-white/10 backdrop-blur-sm rounded-2xl p-6 border border-white/20">
                    <h3 class="font-bold text-lg mb-2 flex items-center gap-2">
                        <span class="text-amber-400">Q:</span>
                        Apakah ada biaya tambahan?
                    </h3>
                    <p class="text-blue-100 text-sm pl-6">
                        Tidak ada biaya tersembunyi. Semua harga sudah termasuk BBM untuk pemakaian dalam kota. Biaya tambahan hanya untuk perjalanan luar kota atau overtime.
                    </p>
                </div>

                <div class="bg-white/10 backdrop-blur-sm rounded-2xl p-6 border border-white/20">
                    <h3 class="font-bold text-lg mb-2 flex items-center gap-2">
                        <span class="text-amber-400">Q:</span>
                        Minimal sewa berapa hari?
                    </h3>
                    <p class="text-blue-100 text-sm pl-6">
                        Minimal sewa 1 hari (24 jam). Untuk sewa harian, overtime dihitung per jam. Diskon tersedia untuk sewa 3 hari atau lebih.
                    </p>
                </div>

                <div class="bg-white/10 backdrop-blur-sm rounded-2xl p-6 border border-white/20">
                    <h3 class="font-bold text-lg mb-2 flex items-center gap-2">
                        <span class="text-amber-400">Q:</span>
                        Bagaimana sistem pembayaran?
                    </h3>
                    <p class="text-blue-100 text-sm pl-6">
                        Pembayaran bisa DP 50% atau full payment. Transfer via Bank/E-wallet. Bukti transfer dikirim untuk konfirmasi booking.
                    </p>
                </div>

                <div class="bg-white/10 backdrop-blur-sm rounded-2xl p-6 border border-white/20">
                    <h3 class="font-bold text-lg mb-2 flex items-center gap-2">
                        <span class="text-amber-400">Q:</span>
                        Apakah bisa antar jemput mobil?
                    </h3>
                    <p class="text-blue-100 text-sm pl-6">
                        Bisa! Kami menyediakan layanan antar jemput mobil ke lokasi Anda. Biaya disesuaikan dengan jarak lokasi.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- CTA Section --}}
<section class="py-16 bg-gradient-to-r from-amber-500 to-orange-600">
    <div class="max-w-4xl mx-auto px-4 md:px-6 text-center">
        <h2 class="text-3xl md:text-4xl font-black text-white mb-4">
            Masih Ada Pertanyaan?
        </h2>
        <p class="text-xl text-white/90 mb-8">
            Tim kami siap membantu Anda kapan saja!
        </p>
        <a href="https://wa.me/6281234567890"
           class="inline-flex items-center gap-3 bg-white text-orange-600 px-8 py-4 rounded-xl font-bold hover:bg-gray-100 transition-all duration-300 shadow-2xl hover:scale-105">
            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
            </svg>
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
    const submitIcon = document.getElementById('submitIcon');

    if (contactForm) {
        contactForm.addEventListener('submit', function(e) {
            // Prevent double submission
            if (submitBtn.disabled) {
                e.preventDefault();
                return;
            }

            // Show loading state
            submitBtn.disabled = true;
            submitText.textContent = 'Mengirim...';
            submitSpinner.classList.remove('hidden');
            submitIcon.classList.add('hidden');
        });
    }

    // Auto-hide alerts after 5 seconds
    setTimeout(() => {
        const alerts = document.querySelectorAll('.alert');
        alerts.forEach(alert => {
            const bsAlert = new bootstrap.Alert(alert);
            bsAlert.close();
        });
    }, 5000);
});
</script>

@endsection
