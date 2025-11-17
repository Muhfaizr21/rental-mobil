@extends('layouts.app')

@section('title', $car->brand . ' ' . $car->model . ' - Rental Mobil')

@section('content')

{{-- Hero Section --}}
<section class="bg-gradient-to-br from-slate-900 via-blue-900 to-slate-900 py-12 md:py-16 relative overflow-hidden">
    <div class="absolute inset-0 opacity-20">
        <div class="absolute top-10 left-10 w-64 h-64 bg-amber-500 rounded-full filter blur-3xl animate-pulse"></div>
        <div class="absolute bottom-10 right-10 w-80 h-80 bg-blue-500 rounded-full filter blur-3xl animate-pulse" style="animation-delay: 1s"></div>
    </div>

    <div class="max-w-7xl mx-auto px-4 md:px-6 relative z-10">
        <div class="flex flex-col md:flex-row items-start justify-between gap-8">
            {{-- Car Info --}}
            <div class="flex-1">
                <nav class="flex items-center gap-2 text-sm text-blue-200 mb-6">
                    <a href="{{ route('landing.home') }}" class="hover:text-white transition">Home</a>
                    <span class="text-blue-400">/</span>
                    <a href="{{ route('landing.pricing') }}" class="hover:text-white transition">Mobil</a>
                    <span class="text-blue-400">/</span>
                    <span class="text-white">{{ $car->brand }} {{ $car->model }}</span>
                </nav>

                <div class="mb-4">
                    @if($car->status == 'available')
                        <div class="inline-block bg-green-500 text-white px-4 py-2 rounded-full text-sm font-bold mb-4 shadow-lg">
                            <span class="w-2 h-2 bg-white rounded-full animate-pulse inline-block mr-2"></span>
                            TERSEDIA UNTUK DISEWA
                        </div>
                    @elseif($car->status == 'maintenance')
                        <div class="inline-block bg-yellow-500 text-white px-4 py-2 rounded-full text-sm font-bold mb-4 shadow-lg">
                            🔧 SEDANG MAINTENANCE
                        </div>
                    @else
                        <div class="inline-block bg-red-500 text-white px-4 py-2 rounded-full text-sm font-bold mb-4 shadow-lg">
                            ⏳ SEDANG DISEWA
                        </div>
                    @endif
                </div>

                <h1 class="text-4xl md:text-5xl font-black text-white mb-4">
                    {{ $car->brand }} <span class="text-amber-400">{{ $car->model }}</span>
                </h1>

                <div class="flex flex-wrap items-center gap-6 text-blue-100 mb-6">
                    <div class="flex items-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                        </svg>
                        <span>Tahun {{ $car->year }}</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/>
                        </svg>
                        <span>{{ $car->plate_number }}</span>
                    </div>
                    {{-- Field Baru: Warna --}}
                    @if($car->color)
                    <div class="flex items-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-2.343M11 7.343l1.657-1.657a2 2 0 012.828 0l2.829 2.829a2 2 0 010 2.828l-8.486 8.485M7 17h.01"/>
                        </svg>
                        <span>{{ $car->color }}</span>
                    </div>
                    @endif
                    <div class="flex items-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                        </svg>
                        <span>Kondisi Prima</span>
                    </div>
                </div>

                {{-- Price --}}
                <div class="bg-gradient-to-r from-amber-500 to-orange-500 rounded-2xl p-6 text-white mb-6">
                    <div class="flex items-end justify-between">
                        <div>
                            <div class="text-sm opacity-90 mb-1">Harga Sewa</div>
                            <div class="text-4xl font-black">Rp {{ number_format($car->price_per_day, 0, ',', '.') }}</div>
                            <div class="text-sm opacity-90">per hari</div>
                        </div>
                        <div class="text-right">
                            <div class="text-sm opacity-90">Sewa 3+ Hari</div>
                            <div class="text-xl font-black">Diskon 10%</div>
                            <div class="text-xs opacity-90">Hemat hingga Rp {{ number_format($car->price_per_day * 3 * 0.1, 0, ',', '.') }}</div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Car Image/Icon --}}
            <div class="w-full md:w-96">
                <div class="bg-gradient-to-br from-blue-500 to-purple-600 rounded-3xl p-8 text-center">
                    <div class="bg-white/20 backdrop-blur-sm rounded-2xl p-6 mb-4">
                        <svg class="w-32 h-32 mx-auto text-white" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M18.92 6.01C18.72 5.42 18.16 5 17.5 5h-11c-.66 0-1.21.42-1.42 1.01L3 12v8c0 .55.45 1 1 1h1c.55 0 1-.45 1-1v-1h12v1c0 .55.45 1 1 1h1c.55 0 1-.45 1-1v-8l-2.08-5.99zM6.85 7h10.29l1.08 3.11H5.77L6.85 7zM19 17H5v-5h14v5z"/>
                            <circle cx="7.5" cy="14.5" r="1.5"/>
                            <circle cx="16.5" cy="14.5" r="1.5"/>
                        </svg>
                    </div>
                    <div class="text-white text-sm">
                        <div class="font-semibold">{{ $car->brand }} {{ $car->model }}</div>
                        <div class="opacity-90">{{ $car->year }} • {{ $car->plate_number }}</div>
                        {{-- Field Baru: Kapasitas Kursi --}}
                        @if($car->seat_capacity)
                        <div class="opacity-90 mt-1">{{ $car->seat_capacity }} Kursi • {{ $car->transmission ?? 'Manual' }}</div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Main Content --}}
<section class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-4 md:px-6">
        <div class="grid lg:grid-cols-3 gap-12">
            {{-- Left Column - Details & Features --}}
            <div class="lg:col-span-2">
                {{-- Features --}}
                <div class="bg-gray-50 rounded-2xl p-8 mb-8">
                    <h2 class="text-2xl font-black text-gray-900 mb-6">Fitur & Spesifikasi</h2>
                    <div class="grid md:grid-cols-2 gap-6">
                        {{-- Field Baru: Bahan Bakar --}}
                        @if($car->fuel_type)
                        <div class="flex items-center gap-4 p-4 bg-white rounded-xl shadow-sm">
                            <div class="w-12 h-12 bg-blue-100 rounded-xl flex items-center justify-center">
                                <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 15a4 4 0 004 4h9a5 5 0 10-.1-9.999 5.002 5.002 0 10-9.78 2.096A4.001 4.001 0 003 15z"/>
                                </svg>
                            </div>
                            <div>
                                <div class="font-semibold text-gray-900">Bahan Bakar</div>
                                <div class="text-sm text-gray-600">{{ $car->fuel_type }}</div>
                            </div>
                        </div>
                        @endif

                        {{-- Field Baru: Transmisi --}}
                        @if($car->transmission)
                        <div class="flex items-center gap-4 p-4 bg-white rounded-xl shadow-sm">
                            <div class="w-12 h-12 bg-green-100 rounded-xl flex items-center justify-center">
                                <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/>
                                </svg>
                            </div>
                            <div>
                                <div class="font-semibold text-gray-900">Transmisi</div>
                                <div class="text-sm text-gray-600">{{ $car->transmission }}</div>
                            </div>
                        </div>
                        @endif

                        {{-- Field Baru: Kapasitas Kursi --}}
                        @if($car->seat_capacity)
                        <div class="flex items-center gap-4 p-4 bg-white rounded-xl shadow-sm">
                            <div class="w-12 h-12 bg-purple-100 rounded-xl flex items-center justify-center">
                                <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z"/>
                                </svg>
                            </div>
                            <div>
                                <div class="font-semibold text-gray-900">Kapasitas</div>
                                <div class="text-sm text-gray-600">{{ $car->seat_capacity }} Kursi</div>
                            </div>
                        </div>
                        @endif

                        {{-- Field Baru: Warna --}}
                        @if($car->color)
                        <div class="flex items-center gap-4 p-4 bg-white rounded-xl shadow-sm">
                            <div class="w-12 h-12 bg-orange-100 rounded-xl flex items-center justify-center">
                                <svg class="w-6 h-6 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-2.343M11 7.343l1.657-1.657a2 2 0 012.828 0l2.829 2.829a2 2 0 010 2.828l-8.486 8.485M7 17h.01"/>
                                </svg>
                            </div>
                            <div>
                                <div class="font-semibold text-gray-900">Warna</div>
                                <div class="text-sm text-gray-600">{{ $car->color }}</div>
                            </div>
                        </div>
                        @endif

                        {{-- Fitur Standar --}}
                        <div class="flex items-center gap-4 p-4 bg-white rounded-xl shadow-sm">
                            <div class="w-12 h-12 bg-red-100 rounded-xl flex items-center justify-center">
                                <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z"/>
                                </svg>
                            </div>
                            <div>
                                <div class="font-semibold text-gray-900">Digital AC</div>
                                <div class="text-sm text-gray-600">Kontrol suhu presisi</div>
                            </div>
                        </div>

                        <div class="flex items-center gap-4 p-4 bg-white rounded-xl shadow-sm">
                            <div class="w-12 h-12 bg-indigo-100 rounded-xl flex items-center justify-center">
                                <svg class="w-6 h-6 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                                </svg>
                            </div>
                            <div>
                                <div class="font-semibold text-gray-900">Kamera Mundur</div>
                                <div class="text-sm text-gray-600">Parkir lebih mudah</div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Description --}}
                <div class="bg-white rounded-2xl p-8 border border-gray-200">
                    <h2 class="text-2xl font-black text-gray-900 mb-4">Deskripsi Mobil</h2>
                    <div class="prose prose-lg text-gray-700">
                        <p>
                            <strong>{{ $car->brand }} {{ $car->model }}</strong> adalah pilihan tepat untuk kebutuhan transportasi keluarga dan bisnis Anda.
                            Dengan tahun produksi {{ $car->year }}, mobil ini masih dalam kondisi prima dan terawat dengan baik.
                        </p>

                        {{-- Deskripsi berdasarkan spesifikasi --}}
                        @if($car->fuel_type || $car->transmission || $car->seat_capacity)
                        <p>
                            Mobil ini dilengkapi dengan
                            @if($car->fuel_type) sistem bahan bakar <strong>{{ $car->fuel_type }}</strong>@endif
                            @if($car->transmission) transmisi <strong>{{ $car->transmission }}</strong>@endif
                            @if($car->seat_capacity) kapasitas <strong>{{ $car->seat_capacity }} kursi</strong>@endif
                            yang nyaman untuk perjalanan jarak jauh.
                        </p>
                        @endif

                        <p>
                            Dilengkapi dengan berbagai fitur keselamatan dan kenyamanan terkini, {{ $car->brand }} {{ $car->model }}
                            siap menemani perjalanan Anda dengan aman dan nyaman. Setiap unit melalui proses pengecekan
                            berkala untuk memastikan performa optimal.
                        </p>
                        <ul class="mt-4 space-y-2">
                            <li>✅ Service rutin terjamin</li>
                            <li>✅ Bahan bakar irit</li>
                            <li>✅ Kapasitas bagasi luas</li>
                            <li>✅ Sistem audio premium</li>
                            <li>✅ Ban cadangan tersedia</li>
                            @if($car->color)
                            <li>✅ Warna {{ $car->color }} yang elegan</li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>

            {{-- Right Column - Booking & Contact --}}
            <div class="space-y-6">
                {{-- Booking Card --}}
                <div class="bg-gradient-to-br from-blue-500 to-blue-600 rounded-2xl p-6 text-white">
                    <h3 class="text-xl font-black mb-4">Sewa Sekarang</h3>

                    @if($car->status == 'available')
                        <div class="space-y-4">
                            <div class="bg-white/20 backdrop-blur-sm rounded-xl p-4">
                                <div class="text-sm opacity-90">Harga Normal</div>
                                <div class="text-2xl font-black">Rp {{ number_format($car->price_per_day, 0, ',', '.') }}/hari</div>
                            </div>

                            <div class="bg-white/20 backdrop-blur-sm rounded-xl p-4">
                                <div class="text-sm opacity-90">Sewa 3+ Hari</div>
                                <div class="text-xl font-black">Rp {{ number_format($car->price_per_day * 0.9, 0, ',', '.') }}/hari</div>
                                <div class="text-xs opacity-90">Hemat 10%</div>
                            </div>

                            <a href="https://wa.me/6281234567890?text=Halo,%20saya%20ingin%20booking%20{{ $car->brand }}%20{{ $car->model }}%20({{ $car->plate_number }})%20untuk%20..."
                               class="block w-full bg-white text-blue-600 text-center py-4 rounded-xl font-bold hover:bg-gray-100 transition-all duration-300 shadow-lg hover:scale-105">
                                📞 Booking via WhatsApp
                            </a>
                        </div>
                    @else
                        <div class="text-center py-8">
                            <div class="text-6xl mb-4">⏳</div>
                            <div class="font-semibold mb-2">Mobil Sedang Tidak Tersedia</div>
                            <div class="text-sm opacity-90">Silakan pilih mobil lain yang tersedia</div>
                            <a href="{{ route('landing.home') }}"
                               class="inline-block mt-4 bg-white/20 text-white px-6 py-2 rounded-lg hover:bg-white/30 transition">
                                Lihat Mobil Lain
                            </a>
                        </div>
                    @endif
                </div>

                {{-- Contact Info --}}
                <div class="bg-white rounded-2xl p-6 border border-gray-200 shadow-sm">
                    <h3 class="text-lg font-bold text-gray-900 mb-4">Butuh Bantuan?</h3>
                    <div class="space-y-3">
                        <a href="https://wa.me/6281234567890"
                           class="flex items-center gap-3 p-3 bg-green-50 text-green-700 rounded-xl hover:bg-green-100 transition">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
                            </svg>
                            <div>
                                <div class="font-semibold">Chat WhatsApp</div>
                                <div class="text-sm opacity-75">Respon cepat 24/7</div>
                            </div>
                        </a>

                        <div class="flex items-center gap-3 p-3 bg-blue-50 text-blue-700 rounded-xl">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                            </svg>
                            <div>
                                <div class="font-semibold">(021) 1234-5678</div>
                                <div class="text-sm opacity-75">Customer Service</div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Quick Facts --}}
                <div class="bg-gray-50 rounded-2xl p-6">
                    <h3 class="text-lg font-bold text-gray-900 mb-4">Fakta Cepat</h3>
                    <div class="space-y-3">
                        <div class="flex justify-between items-center py-2 border-b border-gray-200">
                            <span class="text-gray-600">Brand</span>
                            <span class="font-semibold">{{ $car->brand }}</span>
                        </div>
                        <div class="flex justify-between items-center py-2 border-b border-gray-200">
                            <span class="text-gray-600">Model</span>
                            <span class="font-semibold">{{ $car->model }}</span>
                        </div>
                        <div class="flex justify-between items-center py-2 border-b border-gray-200">
                            <span class="text-gray-600">Tahun</span>
                            <span class="font-semibold">{{ $car->year }}</span>
                        </div>
                        <div class="flex justify-between items-center py-2 border-b border-gray-200">
                            <span class="text-gray-600">Plat Nomor</span>
                            <span class="font-semibold">{{ $car->plate_number }}</span>
                        </div>
                        {{-- Field Baru: Warna --}}
                        @if($car->color)
                        <div class="flex justify-between items-center py-2 border-b border-gray-200">
                            <span class="text-gray-600">Warna</span>
                            <span class="font-semibold">{{ $car->color }}</span>
                        </div>
                        @endif
                        {{-- Field Baru: Bahan Bakar --}}
                        @if($car->fuel_type)
                        <div class="flex justify-between items-center py-2 border-b border-gray-200">
                            <span class="text-gray-600">Bahan Bakar</span>
                            <span class="font-semibold">{{ $car->fuel_type }}</span>
                        </div>
                        @endif
                        {{-- Field Baru: Transmisi --}}
                        @if($car->transmission)
                        <div class="flex justify-between items-center py-2 border-b border-gray-200">
                            <span class="text-gray-600">Transmisi</span>
                            <span class="font-semibold">{{ $car->transmission }}</span>
                        </div>
                        @endif
                        {{-- Field Baru: Kapasitas Kursi --}}
                        @if($car->seat_capacity)
                        <div class="flex justify-between items-center py-2 border-b border-gray-200">
                            <span class="text-gray-600">Kapasitas</span>
                            <span class="font-semibold">{{ $car->seat_capacity }} Kursi</span>
                        </div>
                        @endif
                        <div class="flex justify-between items-center py-2">
                            <span class="text-gray-600">Status</span>
                            <span class="font-semibold {{ $car->status == 'available' ? 'text-green-600' : ($car->status == 'maintenance' ? 'text-yellow-600' : 'text-red-600') }}">
                                {{ $car->status == 'available' ? 'Tersedia' : ($car->status == 'maintenance' ? 'Maintenance' : 'Disewa') }}
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Related Cars --}}
        @if(isset($relatedCars) && $relatedCars->count() > 0)
        <div class="mt-16">
            <h2 class="text-3xl font-black text-gray-900 mb-8">Mobil Serupa Lainnya</h2>
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($relatedCars as $relatedCar)
                <a href="{{ route('landing.detail', $relatedCar->id) }}"
                   class="group bg-white rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 overflow-hidden border border-gray-100 hover:-translate-y-1">
                    <div class="bg-gradient-to-br from-blue-100 to-purple-100 h-40 flex items-center justify-center">
                        <svg class="w-16 h-16 text-blue-400 group-hover:scale-110 transition-transform" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M18.92 6.01C18.72 5.42 18.16 5 17.5 5h-11c-.66 0-1.21.42-1.42 1.01L3 12v8c0 .55.45 1 1 1h1c.55 0 1-.45 1-1v-1h12v1c0 .55.45 1 1 1h1c.55 0 1-.45 1-1v-8l-2.08-5.99zM6.85 7h10.29l1.08 3.11H5.77L6.85 7zM19 17H5v-5h14v5z"/>
                            <circle cx="7.5" cy="14.5" r="1.5"/>
                            <circle cx="16.5" cy="14.5" r="1.5"/>
                        </svg>
                    </div>
                    <div class="p-4">
                        <h3 class="font-bold text-gray-900 group-hover:text-blue-600 transition">{{ $relatedCar->brand }} {{ $relatedCar->model }}</h3>
                        <div class="flex items-center justify-between mt-2">
                            <span class="text-sm text-gray-600">{{ $relatedCar->year }}</span>
                            <span class="font-bold text-amber-600">Rp {{ number_format($relatedCar->price_per_day, 0, ',', '.') }}/hari</span>
                        </div>
                    </div>
                </a>
                @endforeach
            </div>
        </div>
        @endif
    </div>
</section>

@endsection
