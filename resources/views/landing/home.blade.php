@extends('layouts.app')
@section('content')

{{-- Hero Section dengan Video Background Effect --}}
<section class="relative bg-gradient-to-br from-slate-900 via-blue-900 to-slate-900 py-20 md:py-32 overflow-hidden">
    {{-- Animated Background --}}
    <div class="absolute inset-0 opacity-20">
        <div class="absolute top-20 left-10 w-72 h-72 bg-amber-500 rounded-full filter blur-3xl animate-pulse"></div>
        <div class="absolute bottom-20 right-10 w-96 h-96 bg-blue-500 rounded-full filter blur-3xl animate-pulse" style="animation-delay: 1s"></div>
        <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-96 h-96 bg-purple-500 rounded-full filter blur-3xl animate-pulse" style="animation-delay: 2s"></div>
    </div>

    {{-- Grid Pattern Overlay --}}
    <div class="absolute inset-0 bg-[url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNjAiIGhlaWdodD0iNjAiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PGRlZnM+PHBhdHRlcm4gaWQ9ImdyaWQiIHdpZHRoPSI2MCIgaGVpZ2h0PSI2MCIgcGF0dGVyblVuaXRzPSJ1c2VyU3BhY2VPblVzZSI+PHBhdGggZD0iTSAxMCAwIEwgMCAwIDAgMTAiIGZpbGw9Im5vbmUiIHN0cm9rZT0id2hpdGUiIHN0cm9rZS13aWR0aD0iMC41Ii8+PC9wYXR0ZXJuPjwvZGVmcz48cmVjdCB3aWR0aD0iMTAwJSIgaGVpZ2h0PSIxMDAlIiBmaWxsPSJ1cmwoI2dyaWQpIi8+PC9zdmc+')] opacity-10"></div>

    <div class="max-w-7xl mx-auto px-4 md:px-6 relative z-10">
        <div class="grid md:grid-cols-2 gap-12 items-center">
            {{-- Left Content --}}
            <div class="text-center md:text-left">
                {{-- Flash Badge --}}
                <div class="inline-flex items-center gap-2 bg-gradient-to-r from-amber-500/20 to-orange-500/20 text-amber-300 px-5 py-2.5 rounded-full text-sm font-semibold mb-6 backdrop-blur-sm border border-amber-500/30 animate-bounce">
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M11.3 1.046A1 1 0 0112 2v5h4a1 1 0 01.82 1.573l-7 10A1 1 0 018 18v-5H4a1 1 0 01-.82-1.573l7-10a1 1 0 011.12-.38z"/>
                    </svg>
                    PROMO SPESIAL - DISKON 25%
                </div>

                <h1 class="text-4xl md:text-6xl lg:text-7xl font-black text-white leading-tight mb-6">
                    Rental Mobil<br>
                    <span class="bg-gradient-to-r from-amber-400 via-orange-400 to-amber-500 bg-clip-text text-transparent">Premium</span>
                    <span class="text-amber-400">Terpercaya</span>
                </h1>

                <p class="text-lg md:text-xl text-blue-100 leading-relaxed mb-8 max-w-xl">
                    Lebih dari <span class="text-amber-400 font-bold">{{ $stats['total_cars'] ?? '50' }}+ unit mobil</span> terawat siap menemani perjalanan Anda. Proses booking hanya 5 menit! 🚗✨
                </p>

                {{-- CTA Buttons --}}
                <div class="flex flex-col sm:flex-row gap-4 mb-10">
                    <a href="/pricing" class="group relative bg-gradient-to-r from-amber-500 to-orange-600 text-white px-8 py-4 rounded-xl text-lg font-bold hover:from-amber-600 hover:to-orange-700 transition-all duration-300 shadow-2xl hover:shadow-amber-500/50 hover:scale-105 flex items-center justify-center gap-2">
                        <span>Pilih Mobil Sekarang</span>
                        <svg class="w-5 h-5 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                        </svg>
                        <span class="absolute -top-2 -right-2 bg-red-500 text-white text-xs px-2 py-1 rounded-full animate-pulse">HOT!</span>
                    </a>
                    <a href="https://wa.me/6281234567890" class="group bg-green-500 text-white px-8 py-4 rounded-xl text-lg font-bold hover:bg-green-600 transition-all duration-300 flex items-center justify-center gap-2 shadow-lg hover:scale-105">
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
                        </svg>
                        <span>WhatsApp Kami</span>
                    </a>
                </div>

                {{-- Trust Badges --}}
                <div class="flex flex-wrap items-center justify-center md:justify-start gap-6 text-sm text-blue-200">
                    <div class="flex items-center gap-2">
                        <svg class="w-5 h-5 text-green-400" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                        </svg>
                        <span>Asuransi Lengkap</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <svg class="w-5 h-5 text-green-400" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                        </svg>
                        <span>Tanpa Biaya Tersembunyi</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <svg class="w-5 h-5 text-green-400" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                        </svg>
                        <span>Support 24/7</span>
                    </div>
                </div>
            </div>

            {{-- Right Content - Stats & Social Proof --}}
            <div class="hidden md:block">
                <div class="relative">
                    {{-- Main Stats Card --}}
                    <div class="bg-white/10 backdrop-blur-xl rounded-3xl p-8 border border-white/20 shadow-2xl">
                        <div class="grid grid-cols-2 gap-6">
                            <div class="text-center p-4 bg-white/5 rounded-2xl border border-white/10">
                                <div class="text-4xl font-black bg-gradient-to-r from-amber-400 to-orange-400 bg-clip-text text-transparent mb-2">{{ $stats['total_customers'] ?? '1000' }}+</div>
                                <div class="text-blue-100 text-sm font-medium">Happy Customers</div>
                            </div>
                            <div class="text-center p-4 bg-white/5 rounded-2xl border border-white/10">
                                <div class="text-4xl font-black bg-gradient-to-r from-amber-400 to-orange-400 bg-clip-text text-transparent mb-2">{{ $stats['total_cars'] ?? '50' }}+</div>
                                <div class="text-blue-100 text-sm font-medium">Unit Mobil</div>
                            </div>
                            <div class="text-center p-4 bg-white/5 rounded-2xl border border-white/10">
                                <div class="text-4xl font-black bg-gradient-to-r from-amber-400 to-orange-400 bg-clip-text text-transparent mb-2">{{ $stats['rating'] ?? '4.9' }}⭐</div>
                                <div class="text-blue-100 text-sm font-medium">Rating Google</div>
                            </div>
                            <div class="text-center p-4 bg-white/5 rounded-2xl border border-white/10">
                                <div class="text-4xl font-black bg-gradient-to-r from-amber-400 to-orange-400 bg-clip-text text-transparent mb-2">24/7</div>
                                <div class="text-blue-100 text-sm font-medium">Customer Care</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Scroll Indicator --}}
    <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2 animate-bounce">
        <svg class="w-6 h-6 text-white/50" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"/>
        </svg>
    </div>
</section>

{{-- Featured Cars Section --}}
<section class="py-20 bg-gradient-to-b from-gray-50 to-white relative overflow-hidden">
    {{-- Background Decoration --}}
    <div class="absolute top-0 left-0 w-full h-32 bg-gradient-to-b from-slate-900 to-transparent opacity-5"></div>

    <div class="max-w-7xl mx-auto px-4 md:px-6 relative z-10">
        {{-- Section Header --}}
        <div class="text-center mb-16">
            <div class="inline-block bg-amber-100 text-amber-700 px-4 py-2 rounded-full text-sm font-bold mb-4">
                🚗 ARMADA TERLENGKAP
            </div>
            <h2 class="text-4xl md:text-5xl font-black text-gray-900 mb-4">
                Mobil Pilihan <span class="text-amber-600">Terpopuler</span>
            </h2>
            <p class="text-gray-600 text-lg max-w-2xl mx-auto">
                {{ $stats['available_cars'] ?? '45' }}+ unit tersedia dan siap untuk perjalanan nyaman Anda
            </p>
        </div>

        {{-- Car Cards Grid --}}
        <div class="grid md:grid-cols-3 gap-8 mb-12">
            @php
                // Default featured cars jika tidak ada data
                $defaultCars = [
                    (object)[
                        'id' => 1,
                        'brand' => 'Toyota',
                        'model' => 'Avanza',
                        'year' => 2023,
                        'fuel_type' => 'Petrol',
                        'price_per_day' => 350000,
                        'seat_capacity' => 7,
                        'transmission' => 'Manual'
                    ],
                    (object)[
                        'id' => 2,
                        'brand' => 'Honda',
                        'model' => 'Brio',
                        'year' => 2023,
                        'fuel_type' => 'Petrol',
                        'price_per_day' => 250000,
                        'seat_capacity' => 5,
                        'transmission' => 'Automatic'
                    ],
                    (object)[
                        'id' => 3,
                        'brand' => 'Mitsubishi',
                        'model' => 'Xpander',
                        'year' => 2023,
                        'fuel_type' => 'Petrol',
                        'price_per_day' => 450000,
                        'seat_capacity' => 7,
                        'transmission' => 'Automatic'
                    ]
                ];
                $featuredCars = $featuredCars ?? $defaultCars;
            @endphp

            @foreach($featuredCars as $car)
            <div class="group bg-white rounded-3xl shadow-lg hover:shadow-2xl transition-all duration-500 overflow-hidden border border-gray-100 hover:-translate-y-2">
                {{-- Image Placeholder dengan warna berdasarkan brand --}}
                <div class="relative bg-gradient-to-br
                    @if(str_contains(strtolower($car->brand), 'toyota')) from-blue-100 to-blue-200
                    @elseif(str_contains(strtolower($car->brand), 'honda')) from-purple-100 to-purple-200
                    @elseif(str_contains(strtolower($car->brand), 'mitsubishi')) from-red-100 to-orange-200
                    @else from-gray-100 to-gray-200 @endif
                    h-56 overflow-hidden">
                    <div class="absolute inset-0 flex items-center justify-center">
                        <svg class="w-32 h-32
                            @if(str_contains(strtolower($car->brand), 'toyota')) text-blue-300
                            @elseif(str_contains(strtolower($car->brand), 'honda')) text-purple-300
                            @elseif(str_contains(strtolower($car->brand), 'mitsubishi')) text-red-300
                            @else text-gray-300 @endif
                            group-hover:scale-110 transition-transform" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M18.92 6.01C18.72 5.42 18.16 5 17.5 5h-11c-.66 0-1.21.42-1.42 1.01L3 12v8c0 .55.45 1 1 1h1c.55 0 1-.45 1-1v-1h12v1c0 .55.45 1 1 1h1c.55 0 1-.45 1-1v-8l-2.08-5.99zM6.85 7h10.29l1.08 3.11H5.77L6.85 7zM19 17H5v-5h14v5z"/>
                            <circle cx="7.5" cy="14.5" r="1.5"/>
                            <circle cx="16.5" cy="14.5" r="1.5"/>
                        </svg>
                    </div>
                    <div class="absolute top-4 right-4 bg-green-500 text-white px-3 py-1 rounded-full text-xs font-bold">
                        AVAILABLE
                    </div>
                    @if($car->price_per_day <= 250000)
                    <div class="absolute top-4 left-4 bg-amber-500 text-white px-3 py-1 rounded-full text-xs font-bold">
                        BEST SELLER
                    </div>
                    @endif
                </div>

                <div class="p-6">
                    <div class="flex items-start justify-between mb-4">
                        <div>
                            <h3 class="text-2xl font-bold text-gray-900 mb-1">{{ $car->brand }} {{ $car->model }}</h3>
                            <p class="text-gray-500 text-sm">{{ $car->year }} • {{ $car->fuel_type ?? 'Petrol' }}</p>
                        </div>
                        <div class="text-right">
                            <div class="text-sm text-gray-500">Mulai dari</div>
                            <div class="text-2xl font-black text-amber-600">Rp {{ number_format($car->price_per_day, 0, ',', '.') }}</div>
                            <div class="text-xs text-gray-400">/hari</div>
                        </div>
                    </div>

                    {{-- Features --}}
                    <div class="flex flex-wrap gap-2 mb-6">
                        <span class="px-3 py-1 bg-blue-50 text-blue-700 rounded-full text-xs font-medium">{{ $car->seat_capacity ?? 5 }} Penumpang</span>
                        <span class="px-3 py-1 bg-green-50 text-green-700 rounded-full text-xs font-medium">{{ $car->transmission ?? 'Manual' }}</span>
                        <span class="px-3 py-1 bg-purple-50 text-purple-700 rounded-full text-xs font-medium">{{ $car->fuel_type ?? 'Petrol' }}</span>
                    </div>

                    <a href="{{ route('landing.detail', $car->id) }}" class="block w-full bg-gradient-to-r from-amber-500 to-orange-600 text-white text-center py-3 rounded-xl font-bold hover:from-amber-600 hover:to-orange-700 transition-all duration-300 shadow-lg hover:shadow-xl group-hover:scale-105">
                        Booking Sekarang
                    </a>
                </div>
            </div>
            @endforeach
        </div>

        {{-- View All Button --}}
        <div class="text-center">
            <a href="/pricing" class="inline-flex items-center gap-2 bg-gray-900 text-white px-8 py-4 rounded-xl font-bold hover:bg-gray-800 transition-all duration-300 shadow-lg hover:scale-105">
                <span>Lihat Semua Mobil ({{ $stats['available_cars'] ?? '45' }}+ Unit)</span>
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                </svg>
            </a>
        </div>
    </div>
</section>

{{-- Features Section dengan Icon Premium --}}
<section class="py-24 bg-gradient-to-br from-slate-900 to-blue-900 relative overflow-hidden">
    {{-- Background Pattern --}}
    <div class="absolute inset-0 opacity-10">
        <div class="absolute top-10 left-10 w-64 h-64 bg-amber-500 rounded-full filter blur-3xl"></div>
        <div class="absolute bottom-10 right-10 w-80 h-80 bg-blue-500 rounded-full filter blur-3xl"></div>
    </div>

    <div class="max-w-7xl mx-auto px-4 md:px-6 relative z-10">
        {{-- Section Header --}}
        <div class="text-center mb-16">
            <h2 class="text-4xl md:text-5xl font-black text-white mb-4">
                Kenapa Pilih <span class="text-amber-400">Kami?</span>
            </h2>
            <p class="text-blue-200 text-lg max-w-2xl mx-auto">
                Pengalaman rental terbaik dengan layanan profesional dan fasilitas lengkap
            </p>
        </div>

        {{-- Features Grid --}}
        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
            {{-- Feature 1 --}}
            <div class="group bg-white/10 backdrop-blur-xl p-8 rounded-2xl border border-white/20 hover:bg-white/20 transition-all duration-300 hover:-translate-y-2 hover:shadow-2xl">
                <div class="w-16 h-16 bg-gradient-to-br from-amber-400 to-orange-500 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform shadow-xl">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-white mb-3">Harga Transparan</h3>
                <p class="text-blue-200 leading-relaxed">Tanpa biaya tersembunyi. Semua harga sudah termasuk BBM dan driver (opsional).</p>
            </div>

            {{-- Feature 2 --}}
            <div class="group bg-white/10 backdrop-blur-xl p-8 rounded-2xl border border-white/20 hover:bg-white/20 transition-all duration-300 hover:-translate-y-2 hover:shadow-2xl">
                <div class="w-16 h-16 bg-gradient-to-br from-green-400 to-teal-500 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform shadow-xl">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-white mb-3">Mobil Terawat</h3>
                <p class="text-blue-200 leading-relaxed">Service rutin berkala, dicuci bersih, dan dicek kondisi sebelum disewakan.</p>
            </div>

            {{-- Feature 3 --}}
            <div class="group bg-white/10 backdrop-blur-xl p-8 rounded-2xl border border-white/20 hover:bg-white/20 transition-all duration-300 hover:-translate-y-2 hover:shadow-2xl">
                <div class="w-16 h-16 bg-gradient-to-br from-blue-400 to-purple-500 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform shadow-xl">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-white mb-3">Booking Cepat</h3>
                <p class="text-blue-200 leading-relaxed">Proses booking hanya 5 menit via WhatsApp atau website. Langsung konfirmasi!</p>
            </div>

            {{-- Feature 4 --}}
            <div class="group bg-white/10 backdrop-blur-xl p-8 rounded-2xl border border-white/20 hover:bg-white/20 transition-all duration-300 hover:-translate-y-2 hover:shadow-2xl">
                <div class="w-16 h-16 bg-gradient-to-br from-pink-400 to-red-500 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform shadow-xl">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192l-3.536 3.536M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z"/>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-white mb-3">Support 24/7</h3>
                <p class="text-blue-200 leading-relaxed">Tim customer service siap membantu kapan saja. Hubungi kami via chat atau telepon.</p>
            </div>
        </div>
    </div>
</section>

{{-- How It Works Section --}}
<section class="py-24 bg-white">
    <div class="max-w-7xl mx-auto px-4 md:px-6">
        <div class="text-center mb-16">
            <div class="inline-block bg-blue-100 text-blue-700 px-4 py-2 rounded-full text-sm font-bold mb-4">
                📋 MUDAH & CEPAT
            </div>
            <h2 class="text-4xl md:text-5xl font-black text-gray-900 mb-4">
                Cara Sewa Mobil di <span class="text-amber-600">3 Langkah</span>
            </h2>
            <p class="text-gray-600 text-lg max-w-2xl mx-auto">
                Proses booking yang simpel dan tidak ribet
            </p>
        </div>

        <div class="grid md:grid-cols-3 gap-8 relative">
            {{-- Connecting Line --}}
            <div class="hidden md:block absolute top-16 left-1/4 right-1/4 h-1 bg-gradient-to-r from-amber-400 via-orange-400 to-amber-400"></div>

            {{-- Step 1 --}}
            <div class="relative text-center">
                <div class="inline-flex items-center justify-center w-20 h-20 bg-gradient-to-br from-amber-400 to-orange-500 rounded-full text-white text-3xl font-black mb-6 shadow-2xl relative z-10">
                    1
                </div>
                <h3 class="text-2xl font-bold text-gray-900 mb-3">Pilih Mobil</h3>
                <p class="text-gray-600 leading-relaxed">Lihat daftar mobil dan pilih yang sesuai kebutuhan Anda</p>
            </div>

            {{-- Step 2 --}}
            <div class="relative text-center">
                <div class="inline-flex items-center justify-center w-20 h-20 bg-gradient-to-br from-blue-400 to-blue-600 rounded-full text-white text-3xl font-black mb-6 shadow-2xl relative z-10">
                    2
                </div>
                <h3 class="text-2xl font-bold text-gray-900 mb-3">Isi Data & Bayar</h3>
                <p class="text-gray-600 leading-relaxed">Lengkapi data booking dan lakukan pembayaran DP/full</p>
            </div>

            {{-- Step 3 --}}
            <div class="relative text-center">
                <div class="inline-flex items-center justify-center w-20 h-20 bg-gradient-to-br from-green-400 to-teal-500 rounded-full text-white text-3xl font-black mb-6 shadow-2xl relative z-10">
                    3
                </div>
                <h3 class="text-2xl font-bold text-gray-900 mb-3">Ambil & Nikmati</h3>
                <p class="text-gray-600 leading-relaxed">Mobil siap diambil sesuai jadwal. Selamat menikmati perjalanan!</p>
            </div>
        </div>

        <div class="text-center mt-12">
            <a href="/pricing" class="inline-flex items-center gap-2 bg-gradient-to-r from-amber-500 to-orange-600 text-white px-10 py-4 rounded-xl text-lg font-bold hover:from-amber-600 hover:to-orange-700 transition-all duration-300 shadow-xl hover:scale-105">
                <span>Mulai Booking Sekarang</span>
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                </svg>
            </a>
        </div>
    </div>
</section>

{{-- Testimonials Section --}}
<section class="py-24 bg-gradient-to-b from-gray-50 to-white">
    <div class="max-w-7xl mx-auto px-4 md:px-6">
        <div class="text-center mb-16">
            <div class="inline-block bg-green-100 text-green-700 px-4 py-2 rounded-full text-sm font-bold mb-4">
                ⭐ TESTIMONI PELANGGAN
            </div>
            <h2 class="text-4xl md:text-5xl font-black text-gray-900 mb-4">
                Apa Kata <span class="text-amber-600">Mereka?</span>
            </h2>
            <p class="text-gray-600 text-lg max-w-2xl mx-auto">
                Lebih dari {{ $stats['total_customers'] ?? '1000' }}+ pelanggan puas dengan layanan kami
            </p>
        </div>

        <div class="grid md:grid-cols-3 gap-8">
            {{-- Testimonial 1 --}}
            <div class="bg-white p-8 rounded-2xl shadow-lg border border-gray-100 hover:shadow-xl transition-all duration-300 hover:-translate-y-1">
                <div class="flex items-center gap-1 mb-4">
                    <span class="text-amber-400 text-2xl">★★★★★</span>
                </div>
                <p class="text-gray-700 leading-relaxed mb-6 italic">"Pelayanan sangat memuaskan! Mobil bersih, wangi, dan tepat waktu. Driver juga ramah. Pasti sewa lagi!"</p>
                <div class="flex items-center gap-4">
                    <div class="w-12 h-12 bg-gradient-to-br from-blue-400 to-blue-600 rounded-full flex items-center justify-center text-white font-bold text-lg">
                        B
                    </div>
                    <div>
                        <div class="font-bold text-gray-900">Budi Santoso</div>
                        <div class="text-sm text-gray-500">Pengusaha, Jakarta</div>
                    </div>
                </div>
            </div>

            {{-- Testimonial 2 --}}
            <div class="bg-white p-8 rounded-2xl shadow-lg border border-gray-100 hover:shadow-xl transition-all duration-300 hover:-translate-y-1">
                <div class="flex items-center gap-1 mb-4">
                    <span class="text-amber-400 text-2xl">★★★★★</span>
                </div>
                <p class="text-gray-700 leading-relaxed mb-6 italic">"Harga terjangkau dan transparan. Tidak ada biaya tambahan. Cocok banget untuk liburan keluarga!"</p>
                <div class="flex items-center gap-4">
                    <div class="w-12 h-12 bg-gradient-to-br from-pink-400 to-red-500 rounded-full flex items-center justify-center text-white font-bold text-lg">
                        S
                    </div>
                    <div>
                        <div class="font-bold text-gray-900">Siti Nurhaliza</div>
                        <div class="text-sm text-gray-500">Ibu Rumah Tangga</div>
                    </div>
                </div>
            </div>

            {{-- Testimonial 3 --}}
            <div class="bg-white p-8 rounded-2xl shadow-lg border border-gray-100 hover:shadow-xl transition-all duration-300 hover:-translate-y-1">
                <div class="flex items-center gap-1 mb-4">
                    <span class="text-amber-400 text-2xl">★★★★★</span>
                </div>
                <p class="text-gray-700 leading-relaxed mb-6 italic">"Recommended! Proses booking cepat via WhatsApp. Mobil terawat dengan baik. Top deh!"</p>
                <div class="flex items-center gap-4">
                    <div class="w-12 h-12 bg-gradient-to-br from-green-400 to-teal-500 rounded-full flex items-center justify-center text-white font-bold text-lg">
                        A
                    </div>
                    <div>
                        <div class="font-bold text-gray-900">Ahmad Fauzi</div>
                        <div class="text-sm text-gray-500">Karyawan Swasta</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- CTA Section --}}
<section class="py-24 bg-gradient-to-br from-amber-500 via-orange-500 to-orange-600 relative overflow-hidden">
    <div class="absolute inset-0 bg-[url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNjAiIGhlaWdodD0iNjAiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PGRlZnM+PHBhdHRlcm4gaWQ9ImdyaWQiIHdpZHRoPSI2MCIgaGVpZ2h0PSI2MCIgcGF0dGVyblVuaXRzPSJ1c2VyU3BhY2VPblVzZSI+PHBhdGggZD0iTSAxMCAwIEwgMCAwIDAgMTAiIGZpbGw9Im5vbmUiIHN0cm9rZT0id2hpdGUiIHN0cm9rZS13aWR0aD0iMC41Ii8+PC9wYXR0ZXJuPjwvZGVmcz48cmVjdCB3aWR0aD0iMTAwJSIgaGVpZ2h0PSIxMDAlIiBmaWxsPSJ1cmwoI2dyaWQpIi8+PC9zdmc+')] opacity-10"></div>

    <div class="max-w-4xl mx-auto px-4 md:px-6 text-center relative z-10">
        <h2 class="text-4xl md:text-5xl lg:text-6xl font-black text-white mb-6 leading-tight">
            Siap Untuk Perjalanan<br>Tak Terlupakan?
        </h2>
        <p class="text-xl text-white/90 mb-10 max-w-2xl mx-auto">
            Dapatkan mobil impian Anda sekarang dengan harga terbaik!
        </p>

        <div class="flex flex-col sm:flex-row gap-4 justify-center items-center">
            <a href="/pricing" class="group bg-white text-orange-600 px-10 py-5 rounded-xl text-xl font-black hover:bg-gray-100 transition-all duration-300 shadow-2xl hover:scale-105 flex items-center gap-3">
                <span>Booking Sekarang</span>
                <svg class="w-6 h-6 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                </svg>
            </a>
            <a href="https://wa.me/6281234567890" class="group bg-green-500 text-white px-10 py-5 rounded-xl text-xl font-black hover:bg-green-600 transition-all duration-300 shadow-2xl hover:scale-105 flex items-center gap-3">
                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
                </svg>
                <span>Chat WhatsApp</span>
            </a>
        </div>

        <div class="mt-12 flex flex-wrap items-center justify-center gap-8 text-white/80 text-sm">
            <div class="flex items-center gap-2">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                </svg>
                <span>Gratis Konsultasi</span>
            </div>
            <div class="flex items-center gap-2">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                </svg>
                <span>Proses Cepat 5 Menit</span>
            </div>
            <div class="flex items-center gap-2">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                </svg>
                <span>Support 24/7</span>
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
