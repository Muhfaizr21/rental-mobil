@extends('layouts.app')

@section('title', $car->brand . ' ' . $car->model . ' - Rental Mobil')

@section('content')

{{-- Hero Section --}}
<section class="bg-gradient-to-br from-gray-900 via-gray-800 to-black py-12 md:py-16 relative overflow-hidden">
    <div class="absolute inset-0 opacity-20">
        <div class="absolute top-10 left-10 w-64 h-64 bg-amber-500 rounded-full filter blur-3xl animate-pulse opacity-30"></div>
        <div class="absolute bottom-10 right-10 w-80 h-80 bg-amber-600 rounded-full filter blur-3xl animate-pulse opacity-20" style="animation-delay: 1s"></div>
    </div>

    <div class="max-w-7xl mx-auto px-4 md:px-6 relative z-10">
        <div class="flex flex-col md:flex-row items-start justify-between gap-8">
            {{-- Car Info --}}
            <div class="flex-1">
                <nav class="flex items-center gap-2 text-sm text-gray-400 mb-6">
                    <a href="{{ route('landing.home') }}" class="hover:text-amber-400 transition">Home</a>
                    <span class="text-gray-600">/</span>
                    <a href="{{ route('landing.pricing') }}" class="hover:text-amber-400 transition">Mobil</a>
                    <span class="text-gray-600">/</span>
                    <span class="text-amber-400">{{ $car->brand }} {{ $car->model }}</span>
                </nav>

                <div class="mb-4">
                    @if($car->status == 'available')
                        <div class="inline-block bg-green-600 text-white px-4 py-2 rounded-full text-sm font-bold mb-4 shadow-lg border border-green-400">
                            <span class="w-2 h-2 bg-white rounded-full animate-pulse inline-block mr-2"></span>
                            ✅ SIAP JALAN - BISA DISEWA
                        </div>
                    @elseif($car->status == 'maintenance')
                        <div class="inline-block bg-yellow-600 text-white px-4 py-2 rounded-full text-sm font-bold mb-4 shadow-lg border border-yellow-400">
                            🔧 LAGI SERVIS NIH
                        </div>
                    @else
                        <div class="inline-block bg-red-600 text-white px-4 py-2 rounded-full text-sm font-bold mb-4 shadow-lg border border-red-400">
                            ⏳ SEDANG DISEWA
                        </div>
                    @endif
                </div>

                <h1 class="text-4xl md:text-5xl font-black text-white mb-4">
                    {{ $car->brand }} <span class="text-amber-400">{{ $car->model }}</span>
                </h1>

                <div class="flex flex-wrap items-center gap-6 text-gray-300 mb-6">
                    <div class="flex items-center gap-2">
                        <svg class="w-5 h-5 text-amber-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                        </svg>
                        <span>Tahun {{ $car->year }}</span>
                    </div>

                    <div class="flex items-center gap-2">
                        <svg class="w-5 h-5 text-amber-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                        </svg>
                        <span>Kondisi Prima & Terawat</span>
                    </div>
                </div>

                {{-- Price --}}
                <div class="bg-gradient-to-r from-amber-600 to-amber-700 rounded-2xl p-6 text-white mb-6 border border-amber-500/30">
                    <div class="flex items-end justify-between">
                        <div>
                            <div class="text-sm opacity-90 mb-1">Harga Sewa Per Hari</div>
                            <div class="text-4xl font-black">Rp {{ number_format($car->price_per_day, 0, ',', '.') }}</div>
                            <div class="text-sm opacity-90">Sudah termasuk asuransi</div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Car Image --}}
            <div class="w-full md:w-96">
                @php
                    $hasImage = false;
                    $imageUrl = null;
                    $galleryCount = 0;

                    // Cek gambar utama
                    if ($car->image) {
                        if (file_exists(public_path('storage/cars/' . $car->image))) {
                            $imageUrl = url('storage/cars/' . $car->image);
                            $hasImage = true;
                        } elseif (file_exists(public_path('storage/' . $car->image))) {
                            $imageUrl = url('storage/' . $car->image);
                            $hasImage = true;
                        }
                    }

                    // Cek gallery images
                    if ($car->images) {
                        $galleryImages = is_string($car->images) ? json_decode($car->images, true) : $car->images;
                        $galleryCount = is_array($galleryImages) ? count($galleryImages) : 0;

                        // Jika tidak ada gambar utama, ambil dari gallery
                        if (!$hasImage && $galleryCount > 0) {
                            $firstImage = $galleryImages[0];
                            if (file_exists(public_path('storage/cars/gallery/' . $firstImage))) {
                                $imageUrl = url('storage/cars/gallery/' . $firstImage);
                                $hasImage = true;
                            } elseif (file_exists(public_path('storage/' . $firstImage))) {
                                $imageUrl = url('storage/' . $firstImage);
                                $hasImage = true;
                            }
                        }
                    }
                @endphp

                @if($hasImage && $imageUrl)
                    <div class="bg-gradient-to-br from-amber-600 to-amber-700 rounded-3xl p-4 text-center border border-amber-500/30 overflow-hidden">
                        <img src="{{ $imageUrl }}"
                             alt="{{ $car->brand }} {{ $car->model }}"
                             class="w-full h-64 object-cover rounded-2xl mb-4">

                        @if($galleryCount > 1)
                        <div class="bg-black/60 backdrop-blur-sm text-white px-3 py-2 rounded-full text-sm font-medium border border-white/20 inline-flex items-center gap-2">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M21 19V5c0-1.1-.9-2-2-2H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2zM8.5 13.5l2.5 3.01L14.5 12l4.5 6H5l3.5-4.5z"/>
                            </svg>
                            <span>{{ $galleryCount }} Foto</span>
                        </div>
                        @endif

                        <div class="text-white text-sm mt-3">
                            <div class="font-semibold text-lg">{{ $car->brand }} {{ $car->model }}</div>
                            @if($car->seat_capacity)
                            <div class="opacity-90 mt-1">{{ $car->seat_capacity }} Kursi • {{ $car->transmission ?? 'Manual' }}</div>
                            @endif
                        </div>
                    </div>
                @else
                    {{-- Fallback Car Icon --}}
                    <div class="bg-gradient-to-br from-amber-600 to-amber-700 rounded-3xl p-8 text-center border border-amber-500/30">
                        <div class="bg-white/10 backdrop-blur-sm rounded-2xl p-6 mb-4 border border-white/20">
                            <svg class="w-32 h-32 mx-auto text-white" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M18.92 6.01C18.72 5.42 18.16 5 17.5 5h-11c-.66 0-1.21.42-1.42 1.01L3 12v8c0 .55.45 1 1 1h1c.55 0 1-.45 1-1v-1h12v1c0 .55.45 1 1 1h1c.55 0 1-.45 1-1v-8l-2.08-5.99zM6.85 7h10.29l1.08 3.11H5.77L6.85 7zM19 17H5v-5h14v5z"/>
                                <circle cx="7.5" cy="14.5" r="1.5"/>
                                <circle cx="16.5" cy="14.5" r="1.5"/>
                            </svg>
                        </div>
                        <div class="text-white text-sm">
                            <div class="font-semibold text-lg">{{ $car->brand }} {{ $car->model }}</div>
                            @if($car->seat_capacity)
                            <div class="opacity-90 mt-1">{{ $car->seat_capacity }} Kursi • {{ $car->transmission ?? 'Manual' }}</div>
                            @endif
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</section>

{{-- Main Content --}}
<section class="py-16 bg-gray-900">
    <div class="max-w-7xl mx-auto px-4 md:px-6">
        <div class="grid lg:grid-cols-3 gap-12">
            {{-- Left Column - Details & Features --}}
            <div class="lg:col-span-2">
                {{-- Features --}}
                <div class="bg-gray-800 rounded-2xl p-8 mb-8 border border-amber-500/20">
                    <h2 class="text-2xl font-black text-white mb-6">🛠️ Fitur & Spesifikasi</h2>
                    <div class="grid md:grid-cols-2 gap-6">
                        {{-- Field Baru: Bahan Bakar --}}

                        {{-- Field Baru: Transmisi --}}
                        @if($car->transmission)
                        <div class="flex items-center gap-4 p-4 bg-gray-700 rounded-xl border border-amber-500/10 hover:border-amber-500/30 transition">
                            <div class="w-12 h-12 bg-amber-500/20 rounded-xl flex items-center justify-center border border-amber-500/30">
                                <span class="text-xl">⚙️</span>
                            </div>
                            <div>
                                <div class="font-semibold text-white">Transmisi</div>
                                <div class="text-sm text-gray-400">{{ $car->transmission }}</div>
                            </div>
                        </div>
                        @endif

                        {{-- Field Baru: Kapasitas Kursi --}}
                        @if($car->seat_capacity)
                        <div class="flex items-center gap-4 p-4 bg-gray-700 rounded-xl border border-amber-500/10 hover:border-amber-500/30 transition">
                            <div class="w-12 h-12 bg-amber-500/20 rounded-xl flex items-center justify-center border border-amber-500/30">
                                <span class="text-xl">👥</span>
                            </div>
                            <div>
                                <div class="font-semibold text-white">Kapasitas</div>
                                <div class="text-sm text-gray-400">{{ $car->seat_capacity }} Kursi</div>
                            </div>
                        </div>
                        @endif



                        {{-- Fitur Standar --}}
                        <div class="flex items-center gap-4 p-4 bg-gray-700 rounded-xl border border-amber-500/10 hover:border-amber-500/30 transition">
                            <div class="w-12 h-12 bg-amber-500/20 rounded-xl flex items-center justify-center border border-amber-500/30">
                                <span class="text-xl">❄️</span>
                            </div>
                            <div>
                                <div class="font-semibold text-white">Digital AC</div>
                                <div class="text-sm text-gray-400">Dijamin dingin!</div>
                            </div>
                        </div>

                        <div class="flex items-center gap-4 p-4 bg-gray-700 rounded-xl border border-amber-500/10 hover:border-amber-500/30 transition">
                            <div class="w-12 h-12 bg-amber-500/20 rounded-xl flex items-center justify-center border border-amber-500/30">
                                <span class="text-xl">📷</span>
                            </div>
                            <div>
                                <div class="font-semibold text-white">Kamera Mundur</div>
                                <div class="text-sm text-gray-400">Parkir gampang banget</div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Description --}}
                <div class="bg-gray-800 rounded-2xl p-8 border border-amber-500/20">
                    <h2 class="text-2xl font-black text-white mb-4">📖 Cerita Singkat Tentang Mobil Ini</h2>
                    <div class="text-gray-300 space-y-4">
                        <p>
                            <strong class="text-amber-400">{{ $car->brand }} {{ $car->model }}</strong> ini adalah pilihan yang tepat buat lo yang butuh mobil yang nyaman dan terpercaya.
                            Dengan tahun {{ $car->year }}, mobil ini masih muda banget dan pasti masih oke performanya!
                        </p>

                        {{-- Deskripsi berdasarkan spesifikasi --}}
                        @if($car->fuel_type || $car->transmission || $car->seat_capacity)
                        <p>
                            Mobil ini punya
                            @if($car->fuel_type) bahan bakar <strong class="text-amber-400">{{ $car->fuel_type }}</strong>@endif
                            @if($car->transmission) transmisi <strong class="text-amber-400">{{ $car->transmission }}</strong>@endif
                            @if($car->seat_capacity) kapasitas <strong class="text-amber-400">{{ $car->seat_capacity }} kursi</strong>@endif
                            yang bakal bikin perjalanan lo makin seru!
                        </p>
                        @endif

                        <p>
                            Dilengkapi dengan fitur-fitur keamanan dan kenyamanan terbaru, {{ $car->brand }} {{ $car->model }}
                            siap nemenin lo jalan-jalan dengan aman dan nyaman. Kita jamin mobil ini udah dicek berkala
                            biar performanya selalu optimal.
                        </p>
                        <div class="mt-6 space-y-2">
                            <div class="flex items-center gap-3 text-green-400">
                                <span class="text-lg">✅</span>
                                <span>Servis rutin terjamin</span>
                            </div>
                            <div class="flex items-center gap-3 text-green-400">
                                <span class="text-lg">✅</span>
                                <span>Bahan bakar irit banget</span>
                            </div>
                            <div class="flex items-center gap-3 text-green-400">
                                <span class="text-lg">✅</span>
                                <span>Bagasi luas, muat banyak</span>
                            </div>
                            <div class="flex items-center gap-3 text-green-400">
                                <span class="text-lg">✅</span>
                                <span>Sound system joss</span>
                            </div>
                            <div class="flex items-center gap-3 text-green-400">
                                <span class="text-lg">✅</span>
                                <span>Ban serep lengkap</span>
                            </div>
                            @if($car->color)
                            <div class="flex items-center gap-3 text-green-400">
                                <span class="text-lg">✅</span>
                                <span>Warna {{ $car->color }} yang kece</span>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            {{-- Right Column - Booking & Contact --}}
            <div class="space-y-6">
                {{-- Booking Card --}}
                <div class="bg-gradient-to-br from-amber-600 to-amber-700 rounded-2xl p-6 text-white border border-amber-500/30">
                    <h3 class="text-xl font-black mb-4">🚀 Gas Sewa Sekarang!</h3>

                    @if($car->status == 'available')
                        <div class="space-y-4">
                            <div class="bg-white/10 backdrop-blur-sm rounded-xl p-4 border border-white/20">
                                <div class="text-sm opacity-90">Harga Sewa</div>
                                <div class="text-2xl font-black">Rp {{ number_format($car->price_per_day, 0, ',', '.') }}/hari</div>
                            </div>

                            <a href="https://wa.me/6285601700507?text=Halo,%20saya%20ingin%20booking%20{{ $car->brand }}%20{{ $car->model }}%20({{ $car->plate_number }})%20-%20Rp%20{{ number_format($car->price_per_day, 0, ',', '.') }}/hari"
                               class="block w-full bg-white text-amber-600 text-center py-4 rounded-xl font-bold hover:bg-gray-100 transition-all duration-300 shadow-lg hover:scale-105 border border-white">
                                💬 Langsung Chat WhatsApp
                            </a>
                        </div>
                    @else
                        <div class="text-center py-8">
                            <div class="text-6xl mb-4">😔</div>
                            <div class="font-semibold mb-2">Yah, Mobil Lagi Gak Tersedia</div>
                            <div class="text-sm opacity-90">Coba liat mobil lain yang ready dulu ya</div>
                            <a href="{{ route('landing.home') }}"
                               class="inline-block mt-4 bg-white/20 text-white px-6 py-2 rounded-lg hover:bg-white/30 transition border border-white/20">
                                👀 Liat Mobil Lain
                            </a>
                        </div>
                    @endif
                </div>

                {{-- Contact Info --}}
                <div class="bg-gray-800 rounded-2xl p-6 border border-amber-500/20">
                    <h3 class="text-lg font-bold text-white mb-4">🤔 Butuh Bantuan?</h3>
                    <div class="space-y-3">
                        <a href="https://wa.me/6285601700507"
                           class="flex items-center gap-3 p-3 bg-green-600/20 text-green-400 rounded-xl hover:bg-green-600/30 transition border border-green-500/30">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
                            </svg>
                            <div>
                                <div class="font-semibold">Chat WhatsApp</div>
                                <div class="text-sm opacity-75">Dijawab cepet 24 jam!</div>
                            </div>
                        </a>

                        <div class="flex items-center gap-3 p-3 bg-blue-600/20 text-blue-400 rounded-xl border border-blue-500/30">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                            </svg>
                            <div>
                                <div class="font-semibold">6285601700507</div>
                                <div class="text-sm opacity-75">Customer Service Ramah</div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Quick Facts --}}
                <div class="bg-gray-800 rounded-2xl p-6 border border-amber-500/20">
                    <h3 class="text-lg font-bold text-white mb-4">📋 Fakta Cepat</h3>
                    <div class="space-y-3">
                        <div class="flex justify-between items-center py-2 border-b border-gray-700">
                            <span class="text-gray-400">Brand</span>
                            <span class="font-semibold text-white">{{ $car->brand }}</span>
                        </div>
                        <div class="flex justify-between items-center py-2 border-b border-gray-700">
                            <span class="text-gray-400">Model</span>
                            <span class="font-semibold text-white">{{ $car->model }}</span>
                        </div>
                        <div class="flex justify-between items-center py-2 border-b border-gray-700">
                            <span class="text-gray-400">Tahun</span>
                            <span class="font-semibold text-white">{{ $car->year }}</span>
                        </div>



                        {{-- Field Baru: Transmisi --}}
                        @if($car->transmission)
                        <div class="flex justify-between items-center py-2 border-b border-gray-700">
                            <span class="text-gray-400">Transmisi</span>
                            <span class="font-semibold text-white">{{ $car->transmission }}</span>
                        </div>
                        @endif
                        {{-- Field Baru: Kapasitas Kursi --}}
                        @if($car->seat_capacity)
                        <div class="flex justify-between items-center py-2 border-b border-gray-700">
                            <span class="text-gray-400">Kapasitas</span>
                            <span class="font-semibold text-white">{{ $car->seat_capacity }} Kursi</span>
                        </div>
                        @endif
                        {{-- Field Baru: Warna --}}

                        <div class="flex justify-between items-center py-2">
                            <span class="text-gray-400">Status</span>
                            <span class="font-semibold {{ $car->status == 'available' ? 'text-green-400' : ($car->status == 'maintenance' ? 'text-yellow-400' : 'text-red-400') }}">
                                {{ $car->status == 'available' ? 'Siap Jalan' : ($car->status == 'maintenance' ? 'Lagi Servis' : 'Udh Disewa') }}
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Related Cars --}}
        @if(isset($relatedCars) && $relatedCars->count() > 0)
        <div class="mt-16">
            <h2 class="text-3xl font-black text-white mb-8">🚗 Mobil Serupa Lainnya</h2>
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($relatedCars as $relatedCar)
                <a href="{{ route('landing.detail', $relatedCar->id) }}"
                   class="group bg-gray-800 rounded-2xl shadow-lg hover:shadow-amber-500/10 transition-all duration-300 overflow-hidden border border-gray-700 hover:border-amber-500/30 hover:-translate-y-1">
                    <div class="bg-gradient-to-br from-gray-900 to-gray-700 h-40 flex items-center justify-center">
                        <svg class="w-16 h-16 text-amber-400/30 group-hover:text-amber-400/50 group-hover:scale-110 transition-transform" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M18.92 6.01C18.72 5.42 18.16 5 17.5 5h-11c-.66 0-1.21.42-1.42 1.01L3 12v8c0 .55.45 1 1 1h1c.55 0 1-.45 1-1v-1h12v1c0 .55.45 1 1 1h1c.55 0 1-.45 1-1v-8l-2.08-5.99zM6.85 7h10.29l1.08 3.11H5.77L6.85 7zM19 17H5v-5h14v5z"/>
                            <circle cx="7.5" cy="14.5" r="1.5"/>
                            <circle cx="16.5" cy="14.5" r="1.5"/>
                        </svg>
                    </div>
                    <div class="p-4">
                        <h3 class="font-bold text-white group-hover:text-amber-400 transition">{{ $relatedCar->brand }} {{ $relatedCar->model }}</h3>
                        <div class="flex items-center justify-between mt-2">
                            <span class="text-sm text-gray-400">{{ $relatedCar->year }}</span>
                            <span class="font-bold text-amber-400">Rp {{ number_format($relatedCar->price_per_day, 0, ',', '.') }}/hari</span>
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
