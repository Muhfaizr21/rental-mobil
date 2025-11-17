@extends('layouts.app')
@section('content')

{{-- Hero Section --}}
<section class="bg-gradient-to-br from-slate-900 via-blue-900 to-slate-900 py-16 md:py-20 relative overflow-hidden">
    {{-- Animated Background --}}
    <div class="absolute inset-0 opacity-20">
        <div class="absolute top-10 left-10 w-64 h-64 bg-amber-500 rounded-full filter blur-3xl animate-pulse"></div>
        <div class="absolute bottom-10 right-10 w-80 h-80 bg-blue-500 rounded-full filter blur-3xl animate-pulse" style="animation-delay: 1s"></div>
    </div>

    <div class="max-w-7xl mx-auto px-4 md:px-6 relative z-10">
        <div class="text-center mb-8">
            <div class="inline-block bg-amber-500/20 text-amber-300 px-4 py-2 rounded-full text-sm font-bold mb-4 backdrop-blur-sm border border-amber-500/30">
                🚗 {{ $stats['available_cars'] }}+ UNIT TERSEDIA
            </div>
            <h1 class="text-4xl md:text-6xl font-black text-white mb-4">
                Pilih Mobil <span class="text-amber-400">Impian</span> Anda
            </h1>
            <p class="text-xl text-blue-100 max-w-2xl mx-auto">
                Armada terlengkap dengan harga terbaik untuk perjalanan nyaman Anda
            </p>
        </div>
    </div>
</section>

{{-- Cars Grid Section --}}
<section class="py-16 bg-gradient-to-b from-gray-50 to-white">
    <div class="max-w-7xl mx-auto px-4 md:px-6">
        {{-- Stats Bar --}}
        <div class="bg-white rounded-2xl shadow-lg p-6 mb-12 border border-gray-100">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-6 text-center">
                <div>
                    <div class="text-3xl font-black text-amber-600 mb-1">{{ $stats['total_cars'] }}</div>
                    <div class="text-sm text-gray-600">Total Mobil</div>
                </div>
                <div>
                    <div class="text-3xl font-black text-green-600 mb-1">{{ $stats['available_cars'] }}</div>
                    <div class="text-sm text-gray-600">Tersedia</div>
                </div>
                <div>
                    <div class="text-3xl font-black text-blue-600 mb-1">{{ $stats['min_year'] }}-{{ $stats['max_year'] }}</div>
                    <div class="text-sm text-gray-600">Range Tahun</div>
                </div>
                <div>
                    <div class="text-3xl font-black text-purple-600 mb-1">Rp {{ number_format($stats['min_price'] / 1000, 0) }}K+</div>
                    <div class="text-sm text-gray-600">Mulai Dari</div>
                </div>
            </div>
        </div>

        {{-- Cars Grid --}}
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse($cars as $car)
            <div class="group bg-white rounded-3xl shadow-lg hover:shadow-2xl transition-all duration-500 overflow-hidden border border-gray-100 hover:-translate-y-2">
                {{-- Car Image --}}
                <div class="relative bg-gradient-to-br from-blue-100 to-purple-200 h-56 overflow-hidden">
                    {{-- Car Icon --}}
                    <div class="absolute inset-0 flex items-center justify-center">
                        <svg class="w-32 h-32 text-blue-300 group-hover:scale-110 transition-transform duration-500" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M18.92 6.01C18.72 5.42 18.16 5 17.5 5h-11c-.66 0-1.21.42-1.42 1.01L3 12v8c0 .55.45 1 1 1h1c.55 0 1-.45 1-1v-1h12v1c0 .55.45 1 1 1h1c.55 0 1-.45 1-1v-8l-2.08-5.99zM6.85 7h10.29l1.08 3.11H5.77L6.85 7zM19 17H5v-5h14v5z"/>
                            <circle cx="7.5" cy="14.5" r="1.5"/>
                            <circle cx="16.5" cy="14.5" r="1.5"/>
                        </svg>
                    </div>

                    {{-- Status Badge --}}
                    <div class="absolute top-4 right-4 z-10">
                        @if($car->status == 'available')
                            <div class="bg-green-500 text-white px-3 py-1.5 rounded-full text-xs font-bold shadow-lg flex items-center gap-1.5">
                                <span class="w-2 h-2 bg-white rounded-full animate-pulse"></span>
                                TERSEDIA
                            </div>
                        @elseif($car->status == 'maintenance')
                            <div class="bg-yellow-500 text-white px-3 py-1.5 rounded-full text-xs font-bold shadow-lg">
                                MAINTENANCE
                            </div>
                        @else
                            <div class="bg-red-500 text-white px-3 py-1.5 rounded-full text-xs font-bold shadow-lg">
                                DISEWA
                            </div>
                        @endif
                    </div>

                    {{-- Popular Badge --}}
                    @if($loop->index < 3) {{-- Show popular for first 3 cars on current page --}}
                    <div class="absolute top-4 left-4 z-10">
                        <div class="bg-amber-500 text-white px-3 py-1.5 rounded-full text-xs font-bold shadow-lg">
                            ⭐ POPULER
                        </div>
                    </div>
                    @endif

                    {{-- Hover Overlay --}}
                    <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-end justify-center pb-6">
                        <a href="{{ route('landing.detail', $car->id) }}"
                           class="bg-white/90 backdrop-blur-sm px-4 py-2 rounded-lg text-sm font-semibold text-gray-900 hover:bg-white transition">
                            Lihat Detail Lengkap
                        </a>
                    </div>
                </div>

                {{-- Car Details --}}
                <div class="p-6">
                    {{-- Brand & Model --}}
                    <div class="mb-4">
                        <h3 class="text-2xl font-bold text-gray-900 mb-2 group-hover:text-blue-600 transition">
                            {{ $car->brand }} {{ $car->model }}
                        </h3>
                        <div class="flex items-center gap-3 text-sm text-gray-600">
                            <span class="flex items-center gap-1">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                </svg>
                                {{ $car->year }}
                            </span>
                            <span class="text-gray-300">•</span>
                            <span class="flex items-center gap-1">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/>
                                </svg>
                                {{ $car->plate_number }}
                            </span>
                        </div>
                    </div>

                    {{-- Features Tags --}}
                    <div class="flex flex-wrap gap-2 mb-4">
                        {{-- Field Baru: Kapasitas Kursi --}}
                        @if($car->seat_capacity)
                        <span class="px-3 py-1 bg-blue-50 text-blue-700 rounded-full text-xs font-medium">
                            {{ $car->seat_capacity }} Kursi
                        </span>
                        @endif

                        {{-- Field Baru: Transmisi --}}
                        @if($car->transmission)
                        <span class="px-3 py-1 bg-green-50 text-green-700 rounded-full text-xs font-medium">
                            {{ $car->transmission }}
                        </span>
                        @endif

                        {{-- Field Baru: Bahan Bakar --}}
                        @if($car->fuel_type)
                        <span class="px-3 py-1 bg-purple-50 text-purple-700 rounded-full text-xs font-medium">
                            {{ $car->fuel_type }}
                        </span>
                        @endif

                        {{-- Field Baru: Warna --}}
                        @if($car->color)
                        <span class="px-3 py-1 bg-orange-50 text-orange-700 rounded-full text-xs font-medium">
                            {{ $car->color }}
                        </span>
                        @endif

                        {{-- Fitur Standar --}}
                        <span class="px-3 py-1 bg-gray-50 text-gray-700 rounded-full text-xs font-medium">
                            AC Dingin
                        </span>
                    </div>

                    {{-- Price Section --}}
                    <div class="bg-gradient-to-r from-amber-50 to-orange-50 rounded-2xl p-4 mb-4 border border-amber-200">
                        <div class="flex items-end justify-between">
                            <div>
                                <div class="text-xs text-gray-600 mb-1">Mulai dari</div>
                                <div class="text-3xl font-black text-amber-600">
                                    Rp {{ number_format($car->price_per_day, 0, ',', '.') }}
                                </div>
                                <div class="text-xs text-gray-500">per hari</div>
                            </div>
                            <div class="text-right">
                                <div class="text-xs text-gray-600">Sewa 3+ Hari</div>
                                <div class="text-lg font-bold text-green-600">
                                    Diskon 10%
                                </div>
                                <div class="text-xs text-green-600 font-semibold">Hemat {{ number_format($car->price_per_day * 3 * 0.1, 0, ',', '.') }}</div>
                            </div>
                        </div>
                    </div>

                    {{-- Action Buttons --}}
                    <div class="space-y-2">
                        <a href="{{ route('landing.detail', $car->id) }}"
                           class="block w-full bg-gradient-to-r from-blue-500 to-blue-600 text-white text-center py-3 rounded-xl font-bold hover:from-blue-600 hover:to-blue-700 transition-all duration-300 shadow-lg hover:shadow-xl group-hover:scale-105">
                            Lihat Detail Lengkap
                        </a>

                        @if($car->status == 'available')
                        <a href="https://wa.me/6281234567890?text=Halo,%20saya%20ingin%20booking%20{{ $car->brand }}%20{{ $car->model }}%20({{ $car->plate_number }})%20-%20Rp%20{{ number_format($car->price_per_day, 0, ',', '.') }}/hari"
                           target="_blank"
                           class="block w-full bg-green-500 text-white text-center py-3 rounded-xl font-bold hover:bg-green-600 transition-all duration-300 flex items-center justify-center gap-2">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
                            </svg>
                            <span>Chat WhatsApp</span>
                        </a>
                        @endif
                    </div>
                </div>

                {{-- Quick Info Footer --}}
                <div class="bg-gray-50 px-6 py-3 border-t border-gray-100">
                    <div class="flex items-center justify-between text-xs text-gray-600">
                        <span class="flex items-center gap-1">
                            <svg class="w-4 h-4 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                            </svg>
                            Asuransi
                        </span>
                        <span class="flex items-center gap-1">
                            <svg class="w-4 h-4 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                            </svg>
                            Service Rutin
                        </span>
                        <span class="flex items-center gap-1">
                            <svg class="w-4 h-4 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                            </svg>
                            24/7 Support
                        </span>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-span-full text-center py-16">
                <svg class="w-24 h-24 text-gray-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
                <h3 class="text-2xl font-bold text-gray-900 mb-2">Mobil Tidak Ditemukan</h3>
                <p class="text-gray-600">Coba ubah filter pencarian Anda</p>
                <a href="{{ route('landing.home') }}"
                   class="inline-block mt-4 bg-amber-500 text-white px-6 py-3 rounded-xl font-bold hover:bg-amber-600 transition">
                    Tampilkan Semua Mobil
                </a>
            </div>
            @endforelse
        </div>

        {{-- Pagination --}}
        @if($cars->hasPages())
        <div class="mt-12 flex justify-center">
            <nav class="flex items-center gap-2">
                {{-- Previous Page Link --}}
                @if($cars->onFirstPage())
                    <span class="px-4 py-2 bg-gray-100 text-gray-400 rounded-xl cursor-not-allowed">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                        </svg>
                    </span>
                @else
                    <a href="{{ $cars->previousPageUrl() }}" class="px-4 py-2 bg-white text-gray-700 rounded-xl hover:bg-gray-50 transition shadow-sm border border-gray-200">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                        </svg>
                    </a>
                @endif

                {{-- Pagination Elements --}}
                @foreach($cars->getUrlRange(1, $cars->lastPage()) as $page => $url)
                    @if($page == $cars->currentPage())
                        <span class="px-4 py-2 bg-amber-500 text-white rounded-xl font-bold shadow-sm">
                            {{ $page }}
                        </span>
                    @else
                        <a href="{{ $url }}" class="px-4 py-2 bg-white text-gray-700 rounded-xl hover:bg-gray-50 transition shadow-sm border border-gray-200">
                            {{ $page }}
                        </a>
                    @endif
                @endforeach

                {{-- Next Page Link --}}
                @if($cars->hasMorePages())
                    <a href="{{ $cars->nextPageUrl() }}" class="px-4 py-2 bg-white text-gray-700 rounded-xl hover:bg-gray-50 transition shadow-sm border border-gray-200">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                        </svg>
                    </a>
                @else
                    <span class="px-4 py-2 bg-gray-100 text-gray-400 rounded-xl cursor-not-allowed">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                        </svg>
                    </span>
                @endif
            </nav>
        </div>
        @endif
    </div>
</section>

{{-- Additional Sections --}}
<section class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-4 md:px-6">
        {{-- Why Choose Us --}}
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-black text-gray-900 mb-4">
                Kenapa Memilih <span class="text-amber-500">RentGoid</span>?
            </h2>
            <p class="text-lg text-gray-600 max-w-2xl mx-auto">
                Pelayanan terbaik dengan armada terawat untuk pengalaman rental mobil yang tak terlupakan
            </p>
        </div>

        <div class="grid md:grid-cols-3 gap-8">
            <div class="text-center p-6">
                <div class="w-16 h-16 bg-blue-100 rounded-2xl flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-2">Terjamin & Terpercaya</h3>
                <p class="text-gray-600">Semua mobil melalui proses inspeksi ketat untuk memastikan kondisi prima</p>
            </div>

            <div class="text-center p-6">
                <div class="w-16 h-16 bg-green-100 rounded-2xl flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"/>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-2">Harga Terjangkau</h3>
                <p class="text-gray-600">Harga kompetitif dengan berbagai pilihan paket dan diskon menarik</p>
            </div>

            <div class="text-center p-6">
                <div class="w-16 h-16 bg-purple-100 rounded-2xl flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192L5.636 18.364M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-2">24/7 Support</h3>
                <p class="text-gray-600">Tim support siap membantu Anda kapan saja selama masa rental</p>
            </div>
        </div>
    </div>
</section>

<script>
// Debounce function untuk delay search
let searchTimeout;
document.getElementById('searchInput')?.addEventListener('input', function(e) {
    clearTimeout(searchTimeout);
    searchTimeout = setTimeout(() => {
        if (e.target.value.length >= 2 || e.target.value.length === 0) {
            document.getElementById('searchForm').submit();
        }
    }, 800); // Submit setelah 800ms tidak mengetik
});

// Clear search function
function clearSearch() {
    document.getElementById('searchInput').value = '';
    document.getElementById('searchForm').submit();
}

// Auto-submit ketika tekan Enter
document.getElementById('searchInput')?.addEventListener('keypress', function(e) {
    if (e.key === 'Enter') {
        e.preventDefault();
        document.getElementById('searchForm').submit();
    }
});
</script>

@endsection
