@extends('layouts.app')
@section('content')

{{-- Hero Section dengan vibe yang lebih casual --}}
<section class="relative bg-gradient-to-br from-gray-900 via-gray-800 to-black py-20 md:py-32 overflow-hidden">
    {{-- Animated Background --}}
    <div class="absolute inset-0 opacity-10">
        <div class="absolute top-20 left-10 w-72 h-72 bg-amber-400 rounded-full filter blur-3xl animate-pulse opacity-20"></div>
        <div class="absolute bottom-20 right-10 w-96 h-96 bg-gray-600 rounded-full filter blur-3xl animate-pulse opacity-30" style="animation-delay: 1s"></div>
    </div>

    <div class="max-w-7xl mx-auto px-4 md:px-6 relative z-10">
        <div class="grid md:grid-cols-2 gap-12 items-center">
            {{-- Left Content --}}
            <div class="text-center md:text-left">
                {{-- Flash Badge yang lebih fun --}}


                <h1 class="text-4xl md:text-6xl lg:text-7xl font-black text-white leading-tight mb-6">
                    Sewa Mobil<br>

                    <span class="text-amber-400">Tanpa Perlu Mikir Ribet</span>
                </h1>

                <p class="text-lg md:text-xl text-gray-300 leading-relaxed mb-8 max-w-xl">
                    <span class="text-amber-400 font-bold">Rentgoid merupakan sebuah usaha yang bergerak di bidang transportasi yaitu rental mobil. Berbasis di Cirebon, Jawa Barat. </span> "{{ $stats['total_cars'] ?? '50' }}+" mobil keren siap nemenin perjalanan kalian. Booking cuma 5 menit, gas langsung jalan! 🚗💨
                </p>

                {{-- CTA Buttons --}}
                <div class="flex flex-col sm:flex-row gap-4 mb-10">
                    <a href="/pricing" class="group relative bg-gradient-to-r from-amber-600 to-amber-700 text-white px-8 py-4 rounded-xl text-lg font-bold hover:from-amber-700 hover:to-amber-800 transition-all duration-300 shadow-2xl hover:shadow-amber-600/30 hover:scale-105 flex items-center justify-center gap-2 border border-amber-500/30">
                        <span>Lihat Mobil Dulu</span>
                        <svg class="w-5 h-5 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                        </svg>

                    </a>
                    <a href="https://wa.me/6285601700507" class="group bg-gray-800 text-white px-8 py-4 rounded-xl text-lg font-bold hover:bg-gray-700 transition-all duration-300 flex items-center justify-center gap-2 shadow-lg hover:scale-105 border border-gray-600">
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
                        </svg>
                        <span>Chat WhatsApp</span>
                    </a>
                </div>

                {{-- Trust Badges --}}
                <div class="flex flex-wrap items-center justify-center md:justify-start gap-6 text-sm text-gray-400">
                    <div class="flex items-center gap-2">
                        <svg class="w-5 h-5 text-amber-400" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                        </svg>
                        <span>Asuransi Lengkap</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <svg class="w-5 h-5 text-amber-400" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                        </svg>
                        <span>Harga Jelas, No Tipu-Tipu</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <svg class="w-5 h-5 text-amber-400" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                        </svg>
                        <span>Bantuan 24 Jam</span>
                    </div>
                </div>
            </div>

            {{-- Right Content - Stats & Social Proof --}}
            <div class="hidden md:block">
                <div class="relative">
                    {{-- Main Stats Card --}}
                    <div class="bg-gray-800/80 backdrop-blur-xl rounded-3xl p-8 border border-amber-500/20 shadow-2xl">
                        <div class="grid grid-cols-2 gap-6">
                            <div class="text-center p-4 bg-gray-700/50 rounded-2xl border border-amber-500/10">
                                <div class="text-4xl font-black bg-gradient-to-r from-amber-300 to-amber-400 bg-clip-text text-transparent mb-2">{{ $stats['total_customers'] ?? '1000' }}+</div>
                                <div class="text-gray-300 text-sm font-medium">Teman Setia</div>
                            </div>
                            <div class="text-center p-4 bg-gray-700/50 rounded-2xl border border-amber-500/10">
                                <div class="text-4xl font-black bg-gradient-to-r from-amber-300 to-amber-400 bg-clip-text text-transparent mb-2">{{ $stats['total_cars'] ?? '50' }}+</div>
                                <div class="text-gray-300 text-sm font-medium">Mobil </div>
                            </div>
                            <div class="text-center p-4 bg-gray-700/50 rounded-2xl border border-amber-500/10">
                                <div class="text-4xl font-black bg-gradient-to-r from-amber-300 to-amber-400 bg-clip-text text-transparent mb-2">{{ $stats['rating'] ?? '4.9' }}⭐</div>
                                <div class="text-gray-300 text-sm font-medium">Rating Google</div>
                            </div>
                            <div class="text-center p-4 bg-gray-700/50 rounded-2xl border border-amber-500/10">
                                <div class="text-4xl font-black bg-gradient-to-r from-amber-300 to-amber-400 bg-clip-text text-transparent mb-2">24/7</div>
                                <div class="text-gray-300 text-sm font-medium">Siap Bantu</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Scroll Indicator --}}
    <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2 animate-bounce">
        <svg class="w-6 h-6 text-amber-400/50" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"/>
        </svg>
    </div>
</section>

{{-- Featured Cars Section --}}
<section class="py-20 bg-gradient-to-b from-gray-900 to-gray-800 relative overflow-hidden">
    <div class="max-w-7xl mx-auto px-4 md:px-6 relative z-10">
        {{-- Section Header --}}
        <div class="text-center mb-16">
            <div class="inline-block bg-amber-500/20 text-amber-300 px-4 py-2 rounded-full text-sm font-bold mb-4 border border-amber-500/30">
                🚗 PILIH MOBIL FAVORIT KALIAN
            </div>
            <h2 class="text-4xl md:text-5xl font-black text-white mb-4">
                Armada <span class="text-amber-400">Terlengkap</span> Kami
            </h2>
            <p class="text-gray-400 text-lg max-w-2xl mx-auto">
                {{ $stats['available_cars'] ?? '45' }}+ mobil siap nemenin adventure kamu
            </p>
        </div>

        {{-- Car Cards Grid --}}
        <div class="grid md:grid-cols-3 gap-8 mb-12">
            @php
                // Default featured cars dengan mobil yang lebih relatable
                $defaultCars = [
                    (object)[
                        'id' => 1,
                        'brand' => 'Toyota',
                        'model' => 'Fortuner',
                        'year' => 2023,
                        'fuel_type' => 'Bensin',
                        'price_per_day' => 850000,
                        'seat_capacity' => 7,
                        'transmission' => 'Automatic'
                    ],
                    (object)[
                        'id' => 2,
                        'brand' => 'Honda',
                        'model' => 'HR-V',
                        'year' => 2023,
                        'fuel_type' => 'Bensin',
                        'price_per_day' => 650000,
                        'seat_capacity' => 5,
                        'transmission' => 'Automatic'
                    ],
                    (object)[
                        'id' => 3,
                        'brand' => 'Mitsubishi',
                        'model' => 'Pajero Sport',
                        'year' => 2023,
                        'fuel_type' => 'Bensin',
                        'price_per_day' => 950000,
                        'seat_capacity' => 7,
                        'transmission' => 'Automatic'
                    ]
                ];
                $featuredCars = $featuredCars ?? $defaultCars;
            @endphp

            @foreach($featuredCars as $car)
            <div class="group bg-gray-800 rounded-3xl shadow-2xl hover:shadow-amber-500/10 transition-all duration-500 overflow-hidden border border-gray-700 hover:border-amber-500/30 hover:-translate-y-2">
                {{-- Image Placeholder --}}
                <div class="relative bg-gradient-to-br from-gray-900 to-gray-700 h-56 overflow-hidden">
                    <div class="absolute inset-0 flex items-center justify-center">
                        <svg class="w-32 h-32 text-amber-400/20 group-hover:text-amber-400/30 transition-colors group-hover:scale-110 transition-transform" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M18.92 6.01C18.72 5.42 18.16 5 17.5 5h-11c-.66 0-1.21.42-1.42 1.01L3 12v8c0 .55.45 1 1 1h1c.55 0 1-.45 1-1v-1h12v1c0 .55.45 1 1 1h1c.55 0 1-.45 1-1v-8l-2.08-5.99zM6.85 7h10.29l1.08 3.11H5.77L6.85 7zM19 17H5v-5h14v5z"/>
                            <circle cx="7.5" cy="14.5" r="1.5"/>
                            <circle cx="16.5" cy="14.5" r="1.5"/>
                        </svg>
                    </div>
                    <div class="absolute top-4 right-4 bg-green-600 text-white px-3 py-1 rounded-full text-xs font-bold border border-green-400">
                        READY
                    </div>
                    @if($car->price_per_day <= 650000)
                    <div class="absolute top-4 left-4 bg-amber-600 text-white px-3 py-1 rounded-full text-xs font-bold border border-amber-400">
                        FAVORIT!
                    </div>
                    @endif
                </div>

                <div class="p-6">
                    <div class="flex items-start justify-between mb-4">
                        <div>
                            <h3 class="text-2xl font-bold text-white mb-1">{{ $car->brand }} {{ $car->model }}</h3>
                            <p class="text-gray-400 text-sm">Tahun {{ $car->year }} • {{ $car->fuel_type ?? 'Bensin' }}</p>
                        </div>
                        <div class="text-right">
                            <div class="text-sm text-gray-400">Mulai dari</div>
                            <div class="text-2xl font-black text-amber-400">Rp {{ number_format($car->price_per_day, 0, ',', '.') }}</div>
                            <div class="text-xs text-gray-500">/hari</div>
                        </div>
                    </div>

                    {{-- Features --}}
                    <div class="flex flex-wrap gap-2 mb-6">
                        <span class="px-3 py-1 bg-amber-500/20 text-amber-300 rounded-full text-xs font-medium border border-amber-500/30">{{ $car->seat_capacity ?? 5 }} Kursi</span>
                        <span class="px-3 py-1 bg-blue-500/20 text-blue-300 rounded-full text-xs font-medium border border-blue-500/30">{{ $car->transmission ?? 'Matic' }}</span>
                        <span class="px-3 py-1 bg-gray-700 text-gray-300 rounded-full text-xs font-medium border border-gray-600">AC Dingin</span>
                    </div>

                    <a href="{{ route('landing.detail', $car->id) }}" class="block w-full bg-gradient-to-r from-amber-600 to-amber-700 text-white text-center py-3 rounded-xl font-bold hover:from-amber-700 hover:to-amber-800 transition-all duration-300 shadow-lg hover:shadow-xl group-hover:scale-105 border border-amber-500/30">
                        Gas Booking!
                    </a>
                </div>
            </div>
            @endforeach
        </div>

        {{-- View All Button --}}
        <div class="text-center">
            <a href="/pricing" class="inline-flex items-center gap-2 bg-gray-800 text-white px-8 py-4 rounded-xl font-bold hover:bg-gray-700 transition-all duration-300 shadow-lg hover:scale-105 border border-gray-600">
                <span>Liat Semua Mobil ({{ $stats['available_cars'] ?? '45' }}+)</span>
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                </svg>
            </a>
        </div>
    </div>
</section>

{{-- Features Section --}}
<section class="py-24 bg-gradient-to-br from-black via-gray-900 to-gray-800 relative overflow-hidden">
    <div class="max-w-7xl mx-auto px-4 md:px-6 relative z-10">
        {{-- Section Header --}}
        <div class="text-center mb-16">
            <h2 class="text-4xl md:text-5xl font-black text-white mb-4">
                Kenapa Harus <span class="text-amber-400">Sama Kita?</span>
            </h2>
            <p class="text-gray-400 text-lg max-w-2xl mx-auto">
                Karena kita beda dari yang lain, lebih santai tapi tetep profesional!
            </p>
        </div>

        {{-- Features Grid --}}
        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
            {{-- Feature 1 --}}
            <div class="group bg-gray-800/50 backdrop-blur-xl p-8 rounded-2xl border border-amber-500/20 hover:bg-amber-500/10 transition-all duration-300 hover:-translate-y-2 hover:shadow-2xl hover:border-amber-500/40">
                <div class="w-16 h-16 bg-gradient-to-br from-amber-500 to-amber-600 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform shadow-xl">
                    <span class="text-2xl">💸</span>
                </div>
                <h3 class="text-xl font-bold text-white mb-3">Harga Pas di Kantong</h3>
                <p class="text-gray-400 leading-relaxed">Gak ada biaya tambahan yang bikin kaget. Semua udah termasuk, tinggal bayar dan jalan!</p>
            </div>

            {{-- Feature 2 --}}
            <div class="group bg-gray-800/50 backdrop-blur-xl p-8 rounded-2xl border border-amber-500/20 hover:bg-amber-500/10 transition-all duration-300 hover:-translate-y-2 hover:shadow-2xl hover:border-amber-500/40">
                <div class="w-16 h-16 bg-gradient-to-br from-amber-500 to-amber-600 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform shadow-xl">
                    <span class="text-2xl">✨</span>
                </div>
                <h3 class="text-xl font-bold text-white mb-3">Mobil Kinclong Terawat</h3>
                <p class="text-gray-400 leading-relaxed">Dijamin bersih, wangi, dan servis rutin. Mobilnya kayak baru, pokoknya!</p>
            </div>

            {{-- Feature 3 --}}
            <div class="group bg-gray-800/50 backdrop-blur-xl p-8 rounded-2xl border border-amber-500/20 hover:bg-amber-500/10 transition-all duration-300 hover:-translate-y-2 hover:shadow-2xl hover:border-amber-500/40">
                <div class="w-16 h-16 bg-gradient-to-br from-amber-500 to-amber-600 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform shadow-xl">
                    <span class="text-2xl">⚡</span>
                </div>
                <h3 class="text-xl font-bold text-white mb-3">Booking Kilat</h3>
                <p class="text-gray-400 leading-relaxed">5 menit selesai via WhatsApp! Gak pake ribet, langsung konfirmasi.</p>
            </div>

            {{-- Feature 4 --}}
            <div class="group bg-gray-800/50 backdrop-blur-xl p-8 rounded-2xl border border-amber-500/20 hover:bg-amber-500/10 transition-all duration-300 hover:-translate-y-2 hover:shadow-2xl hover:border-amber-500/40">
                <div class="w-16 h-16 bg-gradient-to-br from-amber-500 to-amber-600 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform shadow-xl">
                    <span class="text-2xl">🛟</span>
                </div>
                <h3 class="text-xl font-bold text-white mb-3">Teman 24 Jam</h3>
                <p class="text-gray-400 leading-relaxed">Ada masalah? Hubungi kita kapan aja. Kita siap bantu, bahkan tengah malam!</p>
            </div>
        </div>
    </div>
</section>

{{-- How It Works Section --}}
<section class="py-24 bg-gray-900">
    <div class="max-w-7xl mx-auto px-4 md:px-6">
        <div class="text-center mb-16">
            <div class="inline-block bg-amber-500/20 text-amber-300 px-4 py-2 rounded-full text-sm font-bold mb-4 border border-amber-500/30">
                📝 GAMPANG BANGET
            </div>
            <h2 class="text-4xl md:text-5xl font-black text-white mb-4">
                Cuma <span class="text-amber-400">3 Langkah</span> Doang!
            </h2>
            <p class="text-gray-400 text-lg max-w-2xl mx-auto">
                Gak percaya? Coba aja, gak sampe 10 menit udah selesai
            </p>
        </div>

        <div class="grid md:grid-cols-3 gap-8 relative">
            {{-- Connecting Line --}}
            <div class="hidden md:block absolute top-16 left-1/4 right-1/4 h-1 bg-gradient-to-r from-amber-500 via-amber-400 to-amber-500"></div>

            {{-- Step 1 --}}
            <div class="relative text-center">
                <div class="inline-flex items-center justify-center w-20 h-20 bg-gradient-to-br from-amber-500 to-amber-600 rounded-full text-white text-3xl font-black mb-6 shadow-2xl relative z-10 border border-amber-400">
                    1
                </div>
                <h3 class="text-2xl font-bold text-white mb-3">Pilih Mobil</h3>
                <p class="text-gray-400 leading-relaxed">Cari yang kalian suka, dari yang ekonomis sampai yang premium</p>
            </div>

            {{-- Step 2 --}}
            <div class="relative text-center">
                <div class="inline-flex items-center justify-center w-20 h-20 bg-gradient-to-br from-amber-500 to-amber-600 rounded-full text-white text-3xl font-black mb-6 shadow-2xl relative z-10 border border-amber-400">
                    2
                </div>
                <h3 class="text-2xl font-bold text-white mb-3">Isi Data & Bayar</h3>
                <p class="text-gray-400 leading-relaxed">Lengkapi data dan bayar DP atau full</p>
            </div>

            {{-- Step 3 --}}
            <div class="relative text-center">
                <div class="inline-flex items-center justify-center w-20 h-20 bg-gradient-to-br from-amber-500 to-amber-600 rounded-full text-white text-3xl font-black mb-6 shadow-2xl relative z-10 border border-amber-400">
                    3
                </div>
                <h3 class="text-2xl font-bold text-white mb-3">Jalan & Nikmatin!</h3>
                <p class="text-gray-400 leading-relaxed">Mobil siap, tinggal ambil dan nikmatin perjalanan, Enjoyy</p>
            </div>
        </div>

        <div class="text-center mt-12">
            <a href="/pricing" class="inline-flex items-center gap-2 bg-gradient-to-r from-amber-600 to-amber-700 text-white px-10 py-4 rounded-xl text-lg font-bold hover:from-amber-700 hover:to-amber-800 transition-all duration-300 shadow-xl hover:scale-105 border border-amber-500/30">
                <span>Coba Sekarang</span>
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                </svg>
            </a>
        </div>
    </div>
</section>

{{-- Testimonials Section --}}
<section class="py-24 bg-gradient-to-b from-gray-800 to-gray-900">
    <div class="max-w-7xl mx-auto px-4 md:px-6">
        <div class="text-center mb-16">
            <div class="inline-block bg-amber-500/20 text-amber-300 px-4 py-2 rounded-full text-sm font-bold mb-4 border border-amber-500/30">
                💬 KATA MEREKA YANG UDAH COBA
            </div>
            <h2 class="text-4xl md:text-5xl font-black text-white mb-4">
                Dengerin <span class="text-amber-400">Cerita Mereka</span>
            </h2>
            <p class="text-gray-400 text-lg max-w-2xl mx-auto">
                Jangan percaya kata kita, percaya aja sama yang udah nyoba
            </p>
        </div>

        <div class="grid md:grid-cols-3 gap-8">
            {{-- Testimonial 1 --}}
            <div class="bg-gray-800 p-8 rounded-2xl shadow-2xl border border-amber-500/20 hover:border-amber-500/40 transition-all duration-300 hover:-translate-y-1">
                <div class="flex items-center gap-1 mb-4">
                    <span class="text-amber-400 text-2xl">★★★★★</span>
                </div>
                <p class="text-gray-300 leading-relaxed mb-6 italic">"Udah beberapa kali sewa Mobil disini, gak pernah kecewa! Mobilnya selalu bersih dan siap jalan jauh. Adminnya fast respon banget, jadi gak perlu nunggu lama. Pokoknya kalau mau rental mobil yang aman dan terpercaya, pilih rentgo aja yaa guysssss, SANGATTTTT PUAS DAN HARGA PAS POKOKNYA🚗💨"</p>
                <div class="flex items-center gap-4">
                    <div class="w-12 h-12 bg-gradient-to-br from-amber-500 to-amber-600 rounded-full flex items-center justify-center text-white font-bold text-lg">
                        N
                    </div>
                    <div>
                        <div class="font-bold text-white">Najwa Azzahra</div>
                        <div class="text-sm text-gray-400"></div>
                    </div>
                </div>
            </div>

            {{-- Testimonial 2 --}}
            <div class="bg-gray-800 p-8 rounded-2xl shadow-2xl border border-amber-500/20 hover:border-amber-500/40 transition-all duration-300 hover:-translate-y-1">
                <div class="flex items-center gap-1 mb-4">
                    <span class="text-amber-400 text-2xl">★★★★★</span>
                </div>
                <p class="text-gray-300 leading-relaxed mb-6 italic">"Kemarin sempat sewa mobil buat liburan keluarga, pelayanannya top buangeeett! Mobil datang tepat waktu, sepanjang perjalanan nyaman banget, nggak ada kendala sama sekali. Terima kasih banyak, sukses terus untuk usahanya rent goooooo❤️‍🔥"</p>
                <div class="flex items-center gap-4">
                    <div class="w-12 h-12 bg-gradient-to-br from-amber-500 to-amber-600 rounded-full flex items-center justify-center text-white font-bold text-lg">
                        I
                    </div>
                    <div>
                        <div class="font-bold text-white">indira meidina</div>
                        <div class="text-sm text-gray-400"></div>
                    </div>
                </div>
            </div>

            {{-- Testimonial 3 --}}
            <div class="bg-gray-800 p-8 rounded-2xl shadow-2xl border border-amber-500/20 hover:border-amber-500/40 transition-all duration-300 hover:-translate-y-1">
                <div class="flex items-center gap-1 mb-4">
                    <span class="text-amber-400 text-2xl">★★★★★</span>
                </div>
                <p class="text-gray-300 leading-relaxed mb-6 italic">"mobilnya bagus bagus, affordable price, reccomended banget pokonya buat kalian yg mau sewa mobil di rentgo in aja✨🫵🏻"</p>
                <div class="flex items-center gap-4">
                    <div class="w-12 h-12 bg-gradient-to-br from-amber-500 to-amber-600 rounded-full flex items-center justify-center text-white font-bold text-lg">
                        M
                    </div>
                    <div>
                        <div class="font-bold text-white">Marisa Alfazriah</div>
                        <div class="text-sm text-gray-400"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- CTA Section --}}
<section class="py-24 bg-gradient-to-br from-gray-900 via-amber-900 to-black relative overflow-hidden">
    <div class="max-w-4xl mx-auto px-4 md:px-6 text-center relative z-10">
        <h2 class="text-4xl md:text-5xl lg:text-6xl font-black text-white mb-6 leading-tight">
            Udah Siap<br>Jalan-Jalan?
        </h2>
        <p class="text-xl text-amber-100/90 mb-10 max-w-2xl mx-auto">
            Jangan nunggu besok, mobil impian lo udah nunggu dari sekarang!
        </p>

        <div class="flex flex-col sm:flex-row gap-4 justify-center items-center">
            <a href="/pricing" class="group bg-amber-500 text-gray-900 px-10 py-5 rounded-xl text-xl font-black hover:bg-amber-400 transition-all duration-300 shadow-2xl hover:scale-105 flex items-center gap-3 border border-amber-400">
                <span>Yuk, Booking Sekarang!</span>
                <svg class="w-6 h-6 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                </svg>
            </a>
            <a href="https://wa.me/6281234567890" class="group bg-gray-800 text-white px-10 py-5 rounded-xl text-xl font-black hover:bg-gray-700 transition-all duration-300 shadow-2xl hover:scale-105 flex items-center gap-3 border border-gray-600">
                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
                </svg>
                <span>Chat Langsung</span>
            </a>
        </div>

        <div class="mt-12 flex flex-wrap items-center justify-center gap-8 text-amber-200/80 text-sm">
            <div class="flex items-center gap-2">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                </svg>
                <span>Konsultasi Gratis</span>
            </div>
            <div class="flex items-center gap-2">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                </svg>
                <span>Proses 5 Menit</span>
            </div>
            <div class="flex items-center gap-2">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                </svg>
                <span>Bantuan 24/7</span>
            </div>
        </div>
    </div>
</section>

<style>
@keyframes float {
    0%, 100% { transform: translateY(0px); }
    50% { transform: translateY(-10px); }
}
.animate-float {
    animation: float 3s ease-in-out infinite;
}
</style>

@endsection
