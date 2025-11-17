@extends('layouts.app')
@section('content')

{{-- Hero Section --}}
<section class="bg-gradient-to-br from-gray-900 via-gray-800 to-black py-16 md:py-20 relative overflow-hidden">
    {{-- Animated Background --}}
    <div class="absolute inset-0 opacity-20">
        <div class="absolute top-10 left-10 w-64 h-64 bg-amber-500 rounded-full filter blur-3xl animate-pulse opacity-30"></div>
        <div class="absolute bottom-10 right-10 w-80 h-80 bg-amber-600 rounded-full filter blur-3xl animate-pulse opacity-20" style="animation-delay: 1s"></div>
    </div>

    <div class="max-w-7xl mx-auto px-4 md:px-6 relative z-10">
        <div class="text-center mb-8">
            <div class="inline-block bg-amber-500/20 text-amber-300 px-4 py-2 rounded-full text-sm font-bold mb-4 backdrop-blur-sm border border-amber-500/30">
                🚗 {{ $stats['available_cars'] }}+ UNIT SIAP JALAN
            </div>
            <h1 class="text-4xl md:text-6xl font-black text-white mb-4">
                Cari Mobil <span class="text-amber-400">Favorit</span> Kalian
            </h1>
            <p class="text-xl text-gray-300 max-w-2xl mx-auto">
                Armada lengkap dengan harga bersahabat buat perjalanan nyaman Kalian
            </p>
        </div>
    </div>
</section>

{{-- Cars Grid Section --}}
<section class="py-16 bg-gradient-to-b from-gray-900 to-gray-800">
    <div class="max-w-7xl mx-auto px-4 md:px-6">
        {{-- Stats Bar --}}
        <div class="bg-gray-800 rounded-2xl shadow-lg p-6 mb-12 border border-amber-500/20">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-6 text-center">
                <div>
                    <div class="text-3xl font-black text-amber-400 mb-1">{{ $stats['total_cars'] }}</div>
                    <div class="text-sm text-gray-400">Total Mobil</div>
                </div>
                <div>
                    <div class="text-3xl font-black text-green-400 mb-1">{{ $stats['available_cars'] }}</div>
                    <div class="text-sm text-gray-400">Siap Jalan</div>
                </div>
                <div>
                    <div class="text-3xl font-black text-blue-400 mb-1">{{ $stats['min_year'] }}-{{ $stats['max_year'] }}</div>
                    <div class="text-sm text-gray-400">Range Tahun</div>
                </div>
                <div>
                    <div class="text-3xl font-black text-purple-400 mb-1">Rp {{ number_format($stats['min_price'] / 1000, 0) }}K+</div>
                    <div class="text-sm text-gray-400">Mulai Dari</div>
                </div>
            </div>
        </div>

        {{-- Cars Grid --}}
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse($cars as $car)
            <div class="group bg-gray-800 rounded-3xl shadow-2xl hover:shadow-amber-500/10 transition-all duration-500 overflow-hidden border border-gray-700 hover:border-amber-500/30 hover:-translate-y-2">
                {{-- Car Image --}}
                <div class="relative bg-gradient-to-br from-gray-900 to-gray-700 h-56 overflow-hidden">
                    {{-- Car Icon --}}
                    <div class="absolute inset-0 flex items-center justify-center">
                        <svg class="w-32 h-32 text-amber-400/20 group-hover:text-amber-400/30 transition-colors group-hover:scale-110 transition-transform duration-500" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M18.92 6.01C18.72 5.42 18.16 5 17.5 5h-11c-.66 0-1.21.42-1.42 1.01L3 12v8c0 .55.45 1 1 1h1c.55 0 1-.45 1-1v-1h12v1c0 .55.45 1 1 1h1c.55 0 1-.45 1-1v-8l-2.08-5.99zM6.85 7h10.29l1.08 3.11H5.77L6.85 7zM19 17H5v-5h14v5z"/>
                            <circle cx="7.5" cy="14.5" r="1.5"/>
                            <circle cx="16.5" cy="14.5" r="1.5"/>
                        </svg>
                    </div>

                    {{-- Status Badge --}}
                    <div class="absolute top-4 right-4 z-10">
                        @if($car->status == 'available')
                            <div class="bg-green-600 text-white px-3 py-1.5 rounded-full text-xs font-bold shadow-lg flex items-center gap-1.5 border border-green-400">
                                <span class="w-2 h-2 bg-white rounded-full animate-pulse"></span>
                                SIAP JALAN
                            </div>
                        @elseif($car->status == 'maintenance')
                            <div class="bg-yellow-600 text-white px-3 py-1.5 rounded-full text-xs font-bold shadow-lg border border-yellow-400">
                                SEDANG SERVIS
                            </div>
                        @else
                            <div class="bg-red-600 text-white px-3 py-1.5 rounded-full text-xs font-bold shadow-lg border border-red-400">
                                UDAH DISEWA
                            </div>
                        @endif
                    </div>

                    {{-- Popular Badge --}}
                    @if($loop->index < 3)
                    <div class="absolute top-4 left-4 z-10">
                        <div class="bg-amber-600 text-white px-3 py-1.5 rounded-full text-xs font-bold shadow-lg border border-amber-400">
                            ⭐ FAVORIT
                        </div>
                    </div>
                    @endif

                    {{-- Hover Overlay --}}
                    <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-end justify-center pb-6">
                        <a href="{{ route('landing.detail', $car->id) }}"
                           class="bg-amber-500/90 backdrop-blur-sm px-4 py-2 rounded-lg text-sm font-semibold text-white hover:bg-amber-500 transition">
                            Liat Detail Lengkap
                        </a>
                    </div>
                </div>

                {{-- Car Details --}}
                <div class="p-6">
                    {{-- Brand & Model --}}
                    <div class="mb-4">
                        <h3 class="text-2xl font-bold text-white mb-2 group-hover:text-amber-400 transition">
                            {{ $car->brand }} {{ $car->model }}
                        </h3>
                        <div class="flex items-center gap-3 text-sm text-gray-400">
                            <span class="flex items-center gap-1">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                </svg>
                                {{ $car->year }}
                            </span>


                        </div>
                    </div>

                    {{-- Features Tags --}}
                    <div class="flex flex-wrap gap-2 mb-4">
                        {{-- Field Baru: Kapasitas Kursi --}}
                        @if($car->seat_capacity)
                        <span class="px-3 py-1 bg-amber-500/20 text-amber-300 rounded-full text-xs font-medium border border-amber-500/30">
                            {{ $car->seat_capacity }} Kursi
                        </span>
                        @endif

                        {{-- Field Baru: Transmisi --}}
                        @if($car->transmission)
                        <span class="px-3 py-1 bg-blue-500/20 text-blue-300 rounded-full text-xs font-medium border border-blue-500/30">
                            {{ $car->transmission }}
                        </span>
                        @endif

                        {{-- Field Baru: Bahan Bakar --}}
                        @if($car->fuel_type)
                        <span class="px-3 py-1 bg-purple-500/20 text-purple-300 rounded-full text-xs font-medium border border-purple-500/30">
                            {{ $car->fuel_type }}
                        </span>
                        @endif

                        {{-- Field Baru: Warna --}}


                        {{-- Fitur Standar --}}
                        <span class="px-3 py-1 bg-gray-700 text-gray-300 rounded-full text-xs font-medium border border-gray-600">
                            AC Dingin
                        </span>
                    </div>

                    {{-- Price Section --}}
                    <div class="bg-gradient-to-r from-amber-500/10 to-orange-500/10 rounded-2xl p-4 mb-4 border border-amber-500/20">
                        <div class="flex items-end justify-between">
                            <div>
                                <div class="text-xs text-gray-400 mb-1">Mulai dari</div>
                                <div class="text-3xl font-black text-amber-400">
                                    Rp {{ number_format($car->price_per_day, 0, ',', '.') }}
                                </div>
                                <div class="text-xs text-gray-500">per hari</div>
                            </div>

                        </div>
                    </div>

                    {{-- Action Buttons --}}
                    <div class="space-y-2">
                        <a href="{{ route('landing.detail', $car->id) }}"
                           class="block w-full bg-gradient-to-r from-amber-600 to-amber-700 text-white text-center py-3 rounded-xl font-bold hover:from-amber-700 hover:to-amber-800 transition-all duration-300 shadow-lg hover:shadow-xl group-hover:scale-105 border border-amber-500/30">
                            Liat Detail Lengkap
                        </a>

                        @if($car->status == 'available')
                        <a href="https://wa.me/6285601700507?text=Halo,%20saya%20ingin%20booking%20{{ $car->brand }}%20{{ $car->model }}%20%20-%20Rp%20{{ number_format($car->price_per_day, 0, ',', '.') }}/hari"
                           target="_blank"
                           class="block w-full bg-green-600 text-white text-center py-3 rounded-xl font-bold hover:bg-green-700 transition-all duration-300 flex items-center justify-center gap-2 border border-green-500/30">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
                            </svg>
                            <span>Chat WhatsApp</span>
                        </a>
                        @endif
                    </div>
                </div>

                {{-- Quick Info Footer --}}
                <div class="bg-gray-900 px-6 py-3 border-t border-gray-700">
                    <div class="flex items-center justify-between text-xs text-gray-400">
                        <span class="flex items-center gap-1">
                            <svg class="w-4 h-4 text-green-400" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                            </svg>
                            Asuransi Lengkap
                        </span>
                        <span class="flex items-center gap-1">
                            <svg class="w-4 h-4 text-green-400" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                            </svg>
                            Servis Rutin
                        </span>
                        <span class="flex items-center gap-1">
                            <svg class="w-4 h-4 text-green-400" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                            </svg>
                            Bantuan 24/7
                        </span>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-span-full text-center py-16">
                <svg class="w-24 h-24 text-gray-600 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
                <h3 class="text-2xl font-bold text-white mb-2">Waduh, Mobilnya Gak Ketemu</h3>
                <p class="text-gray-400">Coba deh cari dengan kata kunci lain</p>
                <a href="{{ route('landing.home') }}"
                   class="inline-block mt-4 bg-amber-600 text-white px-6 py-3 rounded-xl font-bold hover:bg-amber-700 transition border border-amber-500/30">
                    Tampilin Semua Mobil
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
                    <span class="px-4 py-2 bg-gray-700 text-gray-500 rounded-xl cursor-not-allowed border border-gray-600">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                        </svg>
                    </span>
                @else
                    <a href="{{ $cars->previousPageUrl() }}" class="px-4 py-2 bg-gray-800 text-gray-300 rounded-xl hover:bg-gray-700 transition shadow-sm border border-gray-600 hover:border-amber-500/30">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                        </svg>
                    </a>
                @endif

                {{-- Pagination Elements --}}
                @foreach($cars->getUrlRange(1, $cars->lastPage()) as $page => $url)
                    @if($page == $cars->currentPage())
                        <span class="px-4 py-2 bg-amber-600 text-white rounded-xl font-bold shadow-sm border border-amber-500">
                            {{ $page }}
                        </span>
                    @else
                        <a href="{{ $url }}" class="px-4 py-2 bg-gray-800 text-gray-300 rounded-xl hover:bg-gray-700 transition shadow-sm border border-gray-600 hover:border-amber-500/30">
                            {{ $page }}
                        </a>
                    @endif
                @endforeach

                {{-- Next Page Link --}}
                @if($cars->hasMorePages())
                    <a href="{{ $cars->nextPageUrl() }}" class="px-4 py-2 bg-gray-800 text-gray-300 rounded-xl hover:bg-gray-700 transition shadow-sm border border-gray-600 hover:border-amber-500/30">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                        </svg>
                    </a>
                @else
                    <span class="px-4 py-2 bg-gray-700 text-gray-500 rounded-xl cursor-not-allowed border border-gray-600">
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
<section class="py-16 bg-gray-900">
    <div class="max-w-7xl mx-auto px-4 md:px-6">
        {{-- Why Choose Us --}}
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-black text-white mb-4">
                Kenapa Pilih <span class="text-amber-400">RentGoid</span>?
            </h2>
            <p class="text-lg text-gray-400 max-w-2xl mx-auto">
                Pelayanan terbaik dengan mobil terawat buat pengalaman rental yang memorable
            </p>
        </div>

        <div class="grid md:grid-cols-3 gap-8">
            <div class="text-center p-6">
                <div class="w-16 h-16 bg-amber-500/20 rounded-2xl flex items-center justify-center mx-auto mb-4 border border-amber-500/30">
                    <span class="text-2xl">🛡️</span>
                </div>
                <h3 class="text-xl font-bold text-white mb-2">Terjamin & Terpercaya</h3>
                <p class="text-gray-400">Semua mobil kita cek ketat biar lo jalan dengan tenang</p>
            </div>

            <div class="text-center p-6">
                <div class="w-16 h-16 bg-amber-500/20 rounded-2xl flex items-center justify-center mx-auto mb-4 border border-amber-500/30">
                    <span class="text-2xl">💰</span>
                </div>
                <h3 class="text-xl font-bold text-white mb-2">Harga Pas di Kantong</h3>
                <p class="text-gray-400">Harga kompetitif dengan banyak pilihan diskon yang worth it</p>
            </div>

            <div class="text-center p-6">
                <div class="w-16 h-16 bg-amber-500/20 rounded-2xl flex items-center justify-center mx-auto mb-4 border border-amber-500/30">
                    <span class="text-2xl">🛟</span>
                </div>
                <h3 class="text-xl font-bold text-white mb-2">Teman 24 Jam</h3>
                <p class="text-gray-400">Tim support siap bantu lo kapan aja selama masa rental</p>
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

@endsection@extends('layouts.app')
@section('content')

{{-- Hero Section --}}
<section class="bg-gradient-to-br from-gray-900 via-gray-800 to-black py-16 md:py-20 relative overflow-hidden">
    {{-- Animated Background --}}
    <div class="absolute inset-0 opacity-20">
        <div class="absolute top-10 left-10 w-64 h-64 bg-amber-500 rounded-full filter blur-3xl animate-pulse opacity-30"></div>
        <div class="absolute bottom-10 right-10 w-80 h-80 bg-amber-600 rounded-full filter blur-3xl animate-pulse opacity-20" style="animation-delay: 1s"></div>
    </div>

    <div class="max-w-7xl mx-auto px-4 md:px-6 relative z-10">
        <div class="text-center mb-8">
            <div class="inline-block bg-amber-500/20 text-amber-300 px-4 py-2 rounded-full text-sm font-bold mb-4 backdrop-blur-sm border border-amber-500/30">
                🚗 {{ $stats['available_cars'] }}+ UNIT SIAP JALAN
            </div>
            <h1 class="text-4xl md:text-6xl font-black text-white mb-4">
                Cari Mobil <span class="text-amber-400">Favorit</span> Lo
            </h1>
            <p class="text-xl text-gray-300 max-w-2xl mx-auto">
                Armada lengkap dengan harga bersahabat buat perjalanan nyaman lo
            </p>
        </div>
    </div>
</section>

{{-- Cars Grid Section --}}
<section class="py-16 bg-gradient-to-b from-gray-900 to-gray-800">
    <div class="max-w-7xl mx-auto px-4 md:px-6">
        {{-- Stats Bar --}}
        <div class="bg-gray-800 rounded-2xl shadow-lg p-6 mb-12 border border-amber-500/20">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-6 text-center">
                <div>
                    <div class="text-3xl font-black text-amber-400 mb-1">{{ $stats['total_cars'] }}</div>
                    <div class="text-sm text-gray-400">Total Mobil</div>
                </div>
                <div>
                    <div class="text-3xl font-black text-green-400 mb-1">{{ $stats['available_cars'] }}</div>
                    <div class="text-sm text-gray-400">Siap Jalan</div>
                </div>
                <div>
                    <div class="text-3xl font-black text-blue-400 mb-1">{{ $stats['min_year'] }}-{{ $stats['max_year'] }}</div>
                    <div class="text-sm text-gray-400">Range Tahun</div>
                </div>
                <div>
                    <div class="text-3xl font-black text-purple-400 mb-1">Rp {{ number_format($stats['min_price'] / 1000, 0) }}K+</div>
                    <div class="text-sm text-gray-400">Mulai Dari</div>
                </div>
            </div>
        </div>

        {{-- Cars Grid --}}
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse($cars as $car)
            <div class="group bg-gray-800 rounded-3xl shadow-2xl hover:shadow-amber-500/10 transition-all duration-500 overflow-hidden border border-gray-700 hover:border-amber-500/30 hover:-translate-y-2">
                {{-- Car Image --}}
                <div class="relative bg-gradient-to-br from-gray-900 to-gray-700 h-56 overflow-hidden">
                    {{-- Car Icon --}}
                    <div class="absolute inset-0 flex items-center justify-center">
                        <svg class="w-32 h-32 text-amber-400/20 group-hover:text-amber-400/30 transition-colors group-hover:scale-110 transition-transform duration-500" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M18.92 6.01C18.72 5.42 18.16 5 17.5 5h-11c-.66 0-1.21.42-1.42 1.01L3 12v8c0 .55.45 1 1 1h1c.55 0 1-.45 1-1v-1h12v1c0 .55.45 1 1 1h1c.55 0 1-.45 1-1v-8l-2.08-5.99zM6.85 7h10.29l1.08 3.11H5.77L6.85 7zM19 17H5v-5h14v5z"/>
                            <circle cx="7.5" cy="14.5" r="1.5"/>
                            <circle cx="16.5" cy="14.5" r="1.5"/>
                        </svg>
                    </div>

                    {{-- Status Badge --}}
                    <div class="absolute top-4 right-4 z-10">
                        @if($car->status == 'available')
                            <div class="bg-green-600 text-white px-3 py-1.5 rounded-full text-xs font-bold shadow-lg flex items-center gap-1.5 border border-green-400">
                                <span class="w-2 h-2 bg-white rounded-full animate-pulse"></span>
                                SIAP JALAN
                            </div>
                        @elseif($car->status == 'maintenance')
                            <div class="bg-yellow-600 text-white px-3 py-1.5 rounded-full text-xs font-bold shadow-lg border border-yellow-400">
                                SEDANG SERVIS
                            </div>
                        @else
                            <div class="bg-red-600 text-white px-3 py-1.5 rounded-full text-xs font-bold shadow-lg border border-red-400">
                                UDAH DISEWA
                            </div>
                        @endif
                    </div>

                    {{-- Popular Badge --}}
                    @if($loop->index < 3)
                    <div class="absolute top-4 left-4 z-10">
                        <div class="bg-amber-600 text-white px-3 py-1.5 rounded-full text-xs font-bold shadow-lg border border-amber-400">
                            ⭐ FAVORIT
                        </div>
                    </div>
                    @endif

                    {{-- Hover Overlay --}}
                    <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-end justify-center pb-6">
                        <a href="{{ route('landing.detail', $car->id) }}"
                           class="bg-amber-500/90 backdrop-blur-sm px-4 py-2 rounded-lg text-sm font-semibold text-white hover:bg-amber-500 transition">
                            Liat Detail Lengkap
                        </a>
                    </div>
                </div>

                {{-- Car Details --}}
                <div class="p-6">
                    {{-- Brand & Model --}}
                    <div class="mb-4">
                        <h3 class="text-2xl font-bold text-white mb-2 group-hover:text-amber-400 transition">
                            {{ $car->brand }} {{ $car->model }}
                        </h3>
                        <div class="flex items-center gap-3 text-sm text-gray-400">
                            <span class="flex items-center gap-1">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                </svg>
                                {{ $car->year }}
                            </span>
                            <span class="text-gray-600">•</span>
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
                        <span class="px-3 py-1 bg-amber-500/20 text-amber-300 rounded-full text-xs font-medium border border-amber-500/30">
                            {{ $car->seat_capacity }} Kursi
                        </span>
                        @endif

                        {{-- Field Baru: Transmisi --}}
                        @if($car->transmission)
                        <span class="px-3 py-1 bg-blue-500/20 text-blue-300 rounded-full text-xs font-medium border border-blue-500/30">
                            {{ $car->transmission }}
                        </span>
                        @endif

                        {{-- Field Baru: Bahan Bakar --}}
                        @if($car->fuel_type)
                        <span class="px-3 py-1 bg-purple-500/20 text-purple-300 rounded-full text-xs font-medium border border-purple-500/30">
                            {{ $car->fuel_type }}
                        </span>
                        @endif

                        {{-- Field Baru: Warna --}}
                        @if($car->color)
                        <span class="px-3 py-1 bg-orange-500/20 text-orange-300 rounded-full text-xs font-medium border border-orange-500/30">
                            {{ $car->color }}
                        </span>
                        @endif

                        {{-- Fitur Standar --}}
                        <span class="px-3 py-1 bg-gray-700 text-gray-300 rounded-full text-xs font-medium border border-gray-600">
                            AC Dingin
                        </span>
                    </div>

                    {{-- Price Section --}}
                    <div class="bg-gradient-to-r from-amber-500/10 to-orange-500/10 rounded-2xl p-4 mb-4 border border-amber-500/20">
                        <div class="flex items-end justify-between">
                            <div>
                                <div class="text-xs text-gray-400 mb-1">Mulai dari</div>
                                <div class="text-3xl font-black text-amber-400">
                                    Rp {{ number_format($car->price_per_day, 0, ',', '.') }}
                                </div>
                                <div class="text-xs text-gray-500">per hari</div>
                            </div>

                        </div>
                    </div>

                    {{-- Action Buttons --}}
                    <div class="space-y-2">
                        <a href="{{ route('landing.detail', $car->id) }}"
                           class="block w-full bg-gradient-to-r from-amber-600 to-amber-700 text-white text-center py-3 rounded-xl font-bold hover:from-amber-700 hover:to-amber-800 transition-all duration-300 shadow-lg hover:shadow-xl group-hover:scale-105 border border-amber-500/30">
                            Liat Detail Lengkap
                        </a>

                        @if($car->status == 'available')
                        <a href="https://wa.me/6281234567890?text=Halo,%20saya%20ingin%20booking%20{{ $car->brand }}%20{{ $car->model }}%20({{ $car->plate_number }})%20-%20Rp%20{{ number_format($car->price_per_day, 0, ',', '.') }}/hari"
                           target="_blank"
                           class="block w-full bg-green-600 text-white text-center py-3 rounded-xl font-bold hover:bg-green-700 transition-all duration-300 flex items-center justify-center gap-2 border border-green-500/30">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
                            </svg>
                            <span>Chat WhatsApp</span>
                        </a>
                        @endif
                    </div>
                </div>

                {{-- Quick Info Footer --}}
                <div class="bg-gray-900 px-6 py-3 border-t border-gray-700">
                    <div class="flex items-center justify-between text-xs text-gray-400">
                        <span class="flex items-center gap-1">
                            <svg class="w-4 h-4 text-green-400" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                            </svg>
                            Asuransi Lengkap
                        </span>
                        <span class="flex items-center gap-1">
                            <svg class="w-4 h-4 text-green-400" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                            </svg>
                            Servis Rutin
                        </span>
                        <span class="flex items-center gap-1">
                            <svg class="w-4 h-4 text-green-400" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                            </svg>
                            Bantuan 24/7
                        </span>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-span-full text-center py-16">
                <svg class="w-24 h-24 text-gray-600 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
                <h3 class="text-2xl font-bold text-white mb-2">Waduh, Mobilnya Gak Ketemu</h3>
                <p class="text-gray-400">Coba deh cari dengan kata kunci lain</p>
                <a href="{{ route('landing.home') }}"
                   class="inline-block mt-4 bg-amber-600 text-white px-6 py-3 rounded-xl font-bold hover:bg-amber-700 transition border border-amber-500/30">
                    Tampilin Semua Mobil
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
                    <span class="px-4 py-2 bg-gray-700 text-gray-500 rounded-xl cursor-not-allowed border border-gray-600">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                        </svg>
                    </span>
                @else
                    <a href="{{ $cars->previousPageUrl() }}" class="px-4 py-2 bg-gray-800 text-gray-300 rounded-xl hover:bg-gray-700 transition shadow-sm border border-gray-600 hover:border-amber-500/30">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                        </svg>
                    </a>
                @endif

                {{-- Pagination Elements --}}
                @foreach($cars->getUrlRange(1, $cars->lastPage()) as $page => $url)
                    @if($page == $cars->currentPage())
                        <span class="px-4 py-2 bg-amber-600 text-white rounded-xl font-bold shadow-sm border border-amber-500">
                            {{ $page }}
                        </span>
                    @else
                        <a href="{{ $url }}" class="px-4 py-2 bg-gray-800 text-gray-300 rounded-xl hover:bg-gray-700 transition shadow-sm border border-gray-600 hover:border-amber-500/30">
                            {{ $page }}
                        </a>
                    @endif
                @endforeach

                {{-- Next Page Link --}}
                @if($cars->hasMorePages())
                    <a href="{{ $cars->nextPageUrl() }}" class="px-4 py-2 bg-gray-800 text-gray-300 rounded-xl hover:bg-gray-700 transition shadow-sm border border-gray-600 hover:border-amber-500/30">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                        </svg>
                    </a>
                @else
                    <span class="px-4 py-2 bg-gray-700 text-gray-500 rounded-xl cursor-not-allowed border border-gray-600">
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
<section class="py-16 bg-gray-900">
    <div class="max-w-7xl mx-auto px-4 md:px-6">
        {{-- Why Choose Us --}}
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-black text-white mb-4">
                Kenapa Pilih <span class="text-amber-400">RentGoid</span>?
            </h2>
            <p class="text-lg text-gray-400 max-w-2xl mx-auto">
                Pelayanan terbaik dengan mobil terawat buat pengalaman rental yang memorable
            </p>
        </div>

        <div class="grid md:grid-cols-3 gap-8">
            <div class="text-center p-6">
                <div class="w-16 h-16 bg-amber-500/20 rounded-2xl flex items-center justify-center mx-auto mb-4 border border-amber-500/30">
                    <span class="text-2xl">🛡️</span>
                </div>
                <h3 class="text-xl font-bold text-white mb-2">Terjamin & Terpercaya</h3>
                <p class="text-gray-400">Semua mobil kita cek ketat biar lo jalan dengan tenang</p>
            </div>

            <div class="text-center p-6">
                <div class="w-16 h-16 bg-amber-500/20 rounded-2xl flex items-center justify-center mx-auto mb-4 border border-amber-500/30">
                    <span class="text-2xl">💰</span>
                </div>
                <h3 class="text-xl font-bold text-white mb-2">Harga Pas di Kantong</h3>
                <p class="text-gray-400">Harga kompetitif dengan banyak pilihan diskon yang worth it</p>
            </div>

            <div class="text-center p-6">
                <div class="w-16 h-16 bg-amber-500/20 rounded-2xl flex items-center justify-center mx-auto mb-4 border border-amber-500/30">
                    <span class="text-2xl">🛟</span>
                </div>
                <h3 class="text-xl font-bold text-white mb-2">Teman 24 Jam</h3>
                <p class="text-gray-400">Tim support siap bantu lo kapan aja selama masa rental</p>
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
