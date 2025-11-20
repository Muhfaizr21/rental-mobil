<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>{{ $title ?? 'RentGo.id - Rental Car Indonesia' }}</title>
    @vite('resources/css/app.css')
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800&family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>
<body class="bg-black text-white font-inter antialiased">

{{-- NAVBAR DARK GOLD THEME - FIXED & ENLARGED --}}
<nav id="navbar" class="fixed top-0 left-0 w-full bg-black/95 backdrop-blur-xl shadow-2xl shadow-amber-500/10 z-50 transition-all duration-500 border-b border-amber-500/20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 md:px-8">
        <div class="flex justify-between items-center py-3 md:py-5">
            {{-- Logo di Kiri - RESPONSIVE SIZE --}}
            <a href="/" class="flex items-center gap-2 md:gap-4 group flex-shrink-0">
                <div class="w-10 h-10 md:w-14 md:h-14 transition-transform duration-300 group-hover:scale-110 group-hover:rotate-3">
                    <img src="{{ asset('assets/logo.jpeg') }}"
                         alt="Rentgo Logo"
                         class="">
                </div>
                <span class="text-xl md:text-3xl font-black tracking-tight">
                    <span class="bg-gradient-to-r from-yellow-300 via-amber-400 to-orange-500 bg-clip-text text-transparent">
                        Rentgo
                    </span>
                    <span class="text-gray-300 text-sm md:text-base">.ID</span>
                </span>
            </a>

            {{-- Menu dan CTA di Kanan - RESPONSIVE --}}
            <div class="flex items-center gap-4 md:gap-8">
                {{-- Desktop Menu - RESPONSIVE HIDING --}}
                <div class="hidden lg:flex items-center gap-4 md:gap-6">
                    <a href="/" class="relative group">
                        <div class="flex items-center gap-1 md:gap-2 px-3 md:px-4 py-2 md:py-3 rounded-xl transition-all duration-300 group-hover:bg-amber-500/10">
                            <svg class="w-4 h-4 md:w-5 md:h-5 text-gray-400 group-hover:text-amber-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                            </svg>
                            <span class="font-semibold text-gray-300 group-hover:text-amber-400 transition-colors text-sm md:text-base">Home</span>
                        </div>
                        <div class="absolute bottom-0 left-2 right-2 md:left-4 md:right-4 h-0.5 bg-gradient-to-r from-amber-500 to-orange-500 scale-x-0 group-hover:scale-x-100 transition-transform duration-300"></div>
                    </a>

                    <a href="/pricing" class="relative group">
                        <div class="flex items-center gap-1 md:gap-2 px-3 md:px-4 py-2 md:py-3 rounded-xl transition-all duration-300 group-hover:bg-amber-500/10">
                            <svg class="w-4 h-4 md:w-5 md:h-5 text-gray-400 group-hover:text-amber-400 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4"/>
                            </svg>
                            <span class="font-semibold text-gray-300 group-hover:text-amber-400 transition-colors text-sm md:text-base">Daftar Mobil</span>
                        </div>
                        <div class="absolute bottom-0 left-2 right-2 md:left-4 md:right-4 h-0.5 bg-gradient-to-r from-amber-500 to-orange-500 scale-x-0 group-hover:scale-x-100 transition-transform duration-300"></div>
                    </a>

                    <a href="/contact" class="relative group">
                        <div class="flex items-center gap-1 md:gap-2 px-3 md:px-4 py-2 md:py-3 rounded-xl transition-all duration-300 group-hover:bg-amber-500/10">
                            <svg class="w-4 h-4 md:w-5 md:h-5 text-gray-400 group-hover:text-amber-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                            </svg>
                            <span class="font-semibold text-gray-300 group-hover:text-amber-400 transition-colors text-sm md:text-base">Contact</span>
                        </div>
                        <div class="absolute bottom-0 left-2 right-2 md:left-4 md:right-4 h-0.5 bg-gradient-to-r from-amber-500 to-orange-500 scale-x-0 group-hover:scale-x-100 transition-transform duration-300"></div>
                    </a>
                </div>

                {{-- CTA Buttons Desktop - RESPONSIVE HIDING --}}
                <div class="hidden lg:flex items-center gap-2 md:gap-3">
                    <a href="https://wa.me/6285601700507"
                       class="group relative flex items-center gap-2 md:gap-3 bg-gradient-to-r from-green-600 to-emerald-700 text-white px-3 md:px-5 py-2 md:py-3 rounded-xl font-bold hover:shadow-xl hover:shadow-green-500/30 transition-all duration-300 hover:scale-105 overflow-hidden border border-green-500/30">
                        <div class="relative z-10 flex items-center gap-1 md:gap-2">
                            <svg class="w-4 h-4 md:w-5 md:h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
                            </svg>
                            <span class="text-xs md:text-sm font-bold">WhatsApp</span>
                        </div>
                    </a>

                    <a href="/pricing"
                       class="group relative flex items-center gap-2 md:gap-3 bg-gradient-to-r from-amber-500 via-orange-500 to-yellow-600 text-black px-4 md:px-6 py-2 md:py-3 rounded-xl font-black hover:shadow-xl hover:shadow-amber-500/40 transition-all duration-300 hover:scale-105 overflow-hidden border-2 border-amber-400/50">
                        <div class="relative z-10 flex items-center gap-1 md:gap-2">
                            <svg class="w-4 h-4 md:w-5 md:h-5 group-hover:rotate-12 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                            </svg>
                            <span class="text-xs md:text-sm font-black">Book Now</span>
                        </div>
                    </a>
                </div>

                {{-- Mobile Menu Button --}}
                <button onclick="toggleMenu()" class="lg:hidden p-2 md:p-3 rounded-xl bg-amber-500/10 hover:bg-amber-500/20 border border-amber-500/30 shadow-sm hover:shadow-lg hover:shadow-amber-500/20 transition-all duration-300 group">
                    <svg id="menuIcon" class="w-5 h-5 md:w-6 md:h-6 text-amber-400 group-hover:text-amber-300 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>
                    <svg id="closeIcon" class="w-5 h-5 md:w-6 md:h-6 text-amber-400 group-hover:text-amber-300 transition-colors hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>
        </div>

        {{-- Mobile Menu --}}
        <div id="mobileMenu" class="hidden lg:hidden border-t border-amber-500/20 py-4 space-y-2 bg-black/95 backdrop-blur-xl max-h-[80vh] overflow-y-auto">
            <a href="/" class="flex items-center gap-3 px-4 py-3 text-gray-300 hover:bg-gradient-to-r hover:from-amber-500/10 hover:to-orange-500/10 hover:text-amber-400 rounded-xl transition-all duration-300 font-medium group">
                <div class="w-8 h-8 md:w-10 md:h-10 bg-amber-500/10 border border-amber-500/30 rounded-lg flex items-center justify-center group-hover:bg-amber-500 group-hover:border-amber-400 transition-colors duration-300">
                    <svg class="w-4 h-4 md:w-5 md:h-5 text-amber-400 group-hover:text-black transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                    </svg>
                </div>
                <span class="text-base md:text-lg">Home</span>
            </a>
            <a href="/pricing" class="flex items-center gap-3 px-4 py-3 text-gray-300 hover:bg-gradient-to-r hover:from-amber-500/10 hover:to-orange-500/10 hover:text-amber-400 rounded-xl transition-all duration-300 font-medium group">
                <div class="w-8 h-8 md:w-10 md:h-10 bg-amber-500/10 border border-amber-500/30 rounded-lg flex items-center justify-center group-hover:bg-amber-500 group-hover:border-amber-400 transition-colors duration-300">
                    <svg class="w-4 h-4 md:w-5 md:h-5 text-amber-400 group-hover:text-black transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4"/>
                    </svg>
                </div>
                <span class="text-base md:text-lg">Daftar Mobil</span>
            </a>
            <a href="/contact" class="flex items-center gap-3 px-4 py-3 text-gray-300 hover:bg-gradient-to-r hover:from-amber-500/10 hover:to-orange-500/10 hover:text-amber-400 rounded-xl transition-all duration-300 font-medium group">
                <div class="w-8 h-8 md:w-10 md:h-10 bg-amber-500/10 border border-amber-500/30 rounded-lg flex items-center justify-center group-hover:bg-amber-500 group-hover:border-amber-400 transition-colors duration-300">
                    <svg class="w-4 h-4 md:w-5 md:h-5 text-amber-400 group-hover:text-black transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                    </svg>
                </div>
                <span class="text-base md:text-lg">Contact</span>
            </a>

            {{-- Mobile CTA Buttons --}}
            <div class="px-4 pt-4 space-y-3 border-t border-amber-500/20 mt-4">
                <a href="https://wa.me/6285601700507"
                   class="flex items-center justify-center gap-3 w-full bg-gradient-to-r from-green-600 to-emerald-700 text-white py-3 md:py-4 rounded-xl font-bold hover:shadow-lg hover:shadow-green-500/30 transition-all duration-300 border border-green-500/30">
                    <svg class="w-4 h-4 md:w-5 md:h-5" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
                    </svg>
                    <span class="text-sm md:text-base">Chat WhatsApp</span>
                </a>
                <a href="/pricing"
                   class="flex items-center justify-center gap-3 w-full bg-gradient-to-r from-amber-500 to-orange-600 text-black py-3 md:py-4 rounded-xl font-black hover:shadow-lg hover:shadow-amber-500/30 transition-all duration-300 border-2 border-amber-400/50">
                    <svg class="w-4 h-4 md:w-5 md:h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                    </svg>
                    <span class="text-sm md:text-base">Book Now</span>
                </a>
            </div>
        </div>
    </div>
</nav>

<script>
function toggleMenu() {
    const menu = document.getElementById('mobileMenu');
    const menuIcon = document.getElementById('menuIcon');
    const closeIcon = document.getElementById('closeIcon');

    menu.classList.toggle('hidden');
    menuIcon.classList.toggle('hidden');
    closeIcon.classList.toggle('hidden');
    document.body.style.overflow = menu.classList.contains('hidden') ? 'auto' : 'hidden';
}

// Navbar scroll effect
const navbar = document.getElementById('navbar');
window.addEventListener('scroll', () => {
    if (window.pageYOffset > 50) {
        navbar.classList.add('shadow-2xl', 'bg-black/95');
        navbar.classList.remove('bg-black/90');
    } else {
        navbar.classList.remove('shadow-2xl', 'bg-black/95');
        navbar.classList.add('bg-black/90');
    }
});

// Close mobile menu on click outside
document.addEventListener('click', (e) => {
    const menu = document.getElementById('mobileMenu');
    const menuButton = e.target.closest('button[onclick="toggleMenu()"]');
    if (!menu.contains(e.target) && !menuButton && !menu.classList.contains('hidden')) {
        toggleMenu();
    }
});

// Close mobile menu on link click
document.querySelectorAll('#mobileMenu a').forEach(link => {
    link.addEventListener('click', () => toggleMenu());
});

// Prevent body scroll when mobile menu is open
document.addEventListener('DOMContentLoaded', function() {
    const originalStyle = document.body.style.cssText;
    window.addEventListener('resize', function() {
        if (window.innerWidth >= 1024) {
            document.body.style.cssText = originalStyle;
        }
    });
});
</script>

{{-- MAIN CONTENT --}}
<main class="pt-16 md:pt-24">
    @yield('content')
</main>

@include('components.chatbot')

{{-- FOOTER - RESPONSIVE UPDATE --}}
<footer class="mt-12 md:mt-20 bg-gradient-to-br from-zinc-950 via-black to-zinc-900 text-white relative overflow-hidden border-t border-amber-500/20">
    <div class="absolute inset-0 opacity-10">
        <div class="absolute top-20 left-10 md:left-20 w-60 md:w-96 h-60 md:h-96 bg-amber-500 rounded-full filter blur-3xl animate-pulse"></div>
        <div class="absolute top-1/2 right-10 md:right-32 w-40 md:w-80 h-40 md:h-80 bg-orange-600 rounded-full filter blur-3xl animate-pulse" style="animation-delay: 1.5s;"></div>
        <div class="absolute bottom-20 left-1/4 md:left-1/3 w-40 md:w-72 h-40 md:h-72 bg-yellow-500 rounded-full filter blur-3xl animate-pulse" style="animation-delay: 3s;"></div>
    </div>

    <div class="max-w-7xl mx-auto px-4 md:px-6 py-12 md:py-16 relative z-10">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 md:gap-12 mb-8 md:mb-12">
            <div class="md:col-span-2">
                <div class="flex items-center gap-3 mb-6">
                    <div class="w-12 h-12 md:w-16 md:h-16 bg-gradient-to-br from-amber-400 via-yellow-500 to-orange-600 rounded-2xl flex items-center justify-center shadow-2xl shadow-amber-500/50">
                        <svg class="w-6 h-6 md:w-9 md:h-9 text-black" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M18.92 6.01C18.72 5.42 18.16 5 17.5 5h-11c-.66 0-1.21.42-1.42 1.01L3 12v8c0 .55.45 1 1 1h1c.55 0 1-.45 1-1v-1h12v1c0 .55.45 1 1 1h1c.55 0 1-.45 1-1v-8l-2.08-5.99zM6.85 7h10.29l1.08 3.11H5.77L6.85 7zM19 17H5v-5h14v5z"/>
                            <circle cx="7.5" cy="14.5" r="1.5"/>
                            <circle cx="16.5" cy="14.5" r="1.5"/>
                        </svg>
                    </div>
                    <div class="flex flex-col">
                        <span class="text-4xl font-black tracking-tight font-montserrat">
                            <span class="bg-gradient-to-r from-amber-400 via-yellow-300 to-orange-500 bg-clip-text text-transparent">RentGo</span>
                            <span class="text-gray-500 text-2xl">.id</span>
                        </span>
                        <span class="text-xs md:text-sm text-amber-500 font-medium tracking-widest uppercase mt-1">Car Rental Indonesia</span>
                    </div>
                </div>
                <p class="text-gray-400 leading-relaxed mb-6 max-w-lg text-base md:text-lg">
                    Pengalaman rental mobil premium dengan armada eksklusif, layanan profesional 24/7, dan harga terbaik.
                </p>

            </div>

            <div>
                <h3 class="font-bold text-lg md:text-xl mb-4 md:mb-6 bg-gradient-to-r from-amber-400 to-orange-500 bg-clip-text text-transparent">Menu Utama</h3>
                <ul class="space-y-3 md:space-y-4">
                    <li><a href="/" class="group flex items-center gap-3 text-gray-400 hover:text-amber-400 transition-all duration-300 hover:translate-x-2">
                        <div class="w-2 h-2 bg-amber-500 rounded-full group-hover:scale-150 transition-transform duration-300"></div>
                        <span class="font-medium text-sm md:text-base">Home</span>
                    </a></li>
                    <li><a href="/pricing" class="group flex items-center gap-3 text-gray-400 hover:text-amber-400 transition-all duration-300 hover:translate-x-2">
                        <div class="w-2 h-2 bg-amber-500 rounded-full group-hover:scale-150 transition-transform duration-300"></div>
                        <span class="font-medium text-sm md:text-base">Daftar Mobil</span>
                    </a></li>
                    <li><a href="/contact" class="group flex items-center gap-3 text-gray-400 hover:text-amber-400 transition-all duration-300 hover:translate-x-2">
                        <div class="w-2 h-2 bg-amber-500 rounded-full group-hover:scale-150 transition-transform duration-300"></div>
                        <span class="font-medium text-sm md:text-base">Contact</span>
                    </a></li>
                </ul>
            </div>

            <div>
                <h3 class="font-bold text-lg md:text-xl mb-4 md:mb-6 bg-gradient-to-r from-emerald-400 to-green-500 bg-clip-text text-transparent">Hubungi Kami</h3>
                <ul class="space-y-4 md:space-y-5">
                    <li class="flex items-start gap-3 md:gap-4 group cursor-pointer">
                        <div class="w-8 h-8 md:w-10 md:h-10 bg-green-500/20 border border-green-500/30 rounded-xl flex items-center justify-center group-hover:bg-green-500 group-hover:border-green-400 transition-colors duration-300 flex-shrink-0">
                            <svg class="w-4 h-4 md:w-5 md:h-5 text-green-400 group-hover:text-black transition-colors" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
                            </svg>
                        </div>
                        <div class="flex-1 min-w-0">
                            <div class="text-xs md:text-sm text-gray-500 mb-1 font-medium">WhatsApp 24/7</div>
                            <a href="https://wa.me/6285601700507" class="text-white hover:text-green-400 transition-colors font-semibold text-sm md:text-lg break-words">
                                +62 856-0170-0507
                            </a>
                        </div>
                    </li>
                    <li class="flex items-start gap-3 md:gap-4 group cursor-pointer">
                        <div class="w-8 h-8 md:w-10 md:h-10 bg-blue-500/20 border border-blue-500/30 rounded-xl flex items-center justify-center group-hover:bg-blue-500 group-hover:border-blue-400 transition-colors duration-300 flex-shrink-0">
                            <svg class="w-4 h-4 md:w-5 md:h-5 text-blue-400 group-hover:text-black transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                            </svg>
                        </div>
                        <div class="flex-1 min-w-0">
                            <div class="text-xs md:text-sm text-gray-500 mb-1 font-medium">Email Support</div>
                            <a href="mailto:rentgo.idcirebon@gmail.com" class="text-white hover:text-blue-400 transition-colors font-semibold text-sm md:text-base break-words">
                                rentgo.idcirebon@gmail.com
                            </a>
                        </div>
                    </li>
                    <li class="flex items-start gap-3 md:gap-4 group cursor-pointer">
                        <div class="w-8 h-8 md:w-10 md:h-10 bg-amber-500/20 border border-amber-500/30 rounded-xl flex items-center justify-center group-hover:bg-amber-500 group-hover:border-amber-400 transition-colors duration-300 flex-shrink-0">
                            <svg class="w-4 h-4 md:w-5 md:h-5 text-amber-400 group-hover:text-black transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                            </svg>
                        </div>
                        <div class="flex-1 min-w-0">
                            <div class="text-xs md:text-sm text-gray-500 mb-1 font-medium">Alamat Kantor 1</div>
                            <p class="text-white leading-relaxed text-sm md:text-base">
                                Jl. Flamboyan XIII No D.341 Griya Cempaka Arum Wanasaba Lor Talun - Kab. Cirebon (45171)
                            </p>
                        </div>
                    </li>
                    <li class="flex items-start gap-3 md:gap-4 group cursor-pointer">
                        <div class="w-8 h-8 md:w-10 md:h-10 bg-amber-500/20 border border-amber-500/30 rounded-xl flex items-center justify-center group-hover:bg-amber-500 group-hover:border-amber-400 transition-colors duration-300 flex-shrink-0">
                            <svg class="w-4 h-4 md:w-5 md:h-5 text-amber-400 group-hover:text-black transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                            </svg>
                        </div>
                        <div class="flex-1 min-w-0">
                            <div class="text-xs md:text-sm text-gray-500 mb-1 font-medium">Alamat Kantor 2</div>
                            <p class="text-white leading-relaxed text-sm md:text-base">
                                Jl. Ki Sulaeman Blok Gembulu RT.003 RW.002 Deda Megu Cilik, Weru, Kab Cirebon
                            </p>
                        </div>
                    </li>
                </ul>
            </div>
        </div>

        <div class="border-t border-amber-500/20 pt-6 md:pt-8">
            <div class="flex flex-col lg:flex-row justify-between items-center gap-4 md:gap-6">
                <div class="flex items-center gap-4">
                    <p class="text-gray-500 text-xs md:text-sm">
                        © {{ date('Y') }} <span class="text-amber-400 font-semibold">RentGo.id</span>. All rights reserved.
                    </p>
                </div>
                <div class="flex items-center gap-4 md:gap-6 text-xs md:text-sm">
                    <a href="#" class="text-gray-500 hover:text-amber-400 transition-colors duration-300 font-medium">Privacy Policy</a>
                    <a href="#" class="text-gray-500 hover:text-amber-400 transition-colors duration-300 font-medium">Terms of Service</a>
                    <a href="#" class="text-gray-500 hover:text-amber-400 transition-colors duration-300 font-medium">Sitemap</a>
                </div>
            </div>
        </div>
    </div>

    <div class="absolute bottom-10 right-10 w-16 h-16 md:w-24 md:h-24 bg-amber-500/10 rounded-full blur-2xl animate-pulse"></div>
    <div class="absolute top-1/3 left-10 w-12 h-12 md:w-20 md:h-20 bg-orange-500/10 rounded-full blur-2xl animate-pulse" style="animation-delay: 2s;"></div>
</footer>

<style>
.font-inter {
    font-family: 'Inter', sans-serif;
}

.font-montserrat {
    font-family: 'Montserrat', sans-serif;
}

.antialiased {
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
}

/* Custom scrollbar untuk webkit browsers */
::-webkit-scrollbar {
    width: 8px;
}

::-webkit-scrollbar-track {
    background: #0a0a0a;
}

::-webkit-scrollbar-thumb {
    background: linear-gradient(135deg, #f59e0b, #d97706);
    border-radius: 10px;
}

::-webkit-scrollbar-thumb:hover {
    background: linear-gradient(135deg, #fbbf24, #f59e0b);
}

/* Touch-friendly interactions */
@media (hover: none) and (pointer: coarse) {
    /* Adjust hover effects for touch devices */
    .hover\\:scale-105:hover {
        transform: none;
    }

    .hover\\:shadow-lg:hover {
        box-shadow: none;
    }

    .group:hover .group-hover\\:scale-110 {
        transform: none;
    }
}

/* Improved focus styles for accessibility */
button:focus-visible,
a:focus-visible {
    outline: 2px solid #f59e0b;
    outline-offset: 2px;
    border-radius: 8px;
}

/* Mobile optimizations */
@media (max-width: 640px) {
    /* Prevent horizontal scrolling */
    body {
        overflow-x: hidden;
        width: 100%;
    }

    /* Improve tap targets */
    button, a {
        min-height: 44px;
        min-width: 44px;
    }

    /* Optimize text readability */
    p, span, div {
        word-wrap: break-word;
        overflow-wrap: break-word;
    }
}

/* Tablet optimizations */
@media (min-width: 641px) and (max-width: 1024px) {
    /* Adjust spacing for tablet */
    .container {
        padding-left: 1rem;
        padding-right: 1rem;
    }
}

/* Animation optimizations for reduced motion */
@media (prefers-reduced-motion: reduce) {
    * {
        animation-duration: 0.01ms !important;
        animation-iteration-count: 1 !important;
        transition-duration: 0.01ms !important;
    }
}

/* iOS specific fixes */
@supports (-webkit-touch-callout: none) {
    /* Fix for Safari on iOS */
    .backdrop-blur-xl {
        backdrop-filter: blur(24px);
        -webkit-backdrop-filter: blur(24px);
    }

    /* Fix for Safari height issues */
    .h-screen {
        height: 100vh;
        height: -webkit-fill-available;
    }
}

/* Selection styling */
::selection {
    background-color: #f59e0b;
    color: #000;
}

::-moz-selection {
    background-color: #f59e0b;
    color: #000;
}

/* Safe area insets for modern devices */
@supports (padding: max(0px)) {
    .safe-area-padding {
        padding-left: max(1rem, env(safe-area-inset-left));
        padding-right: max(1rem, env(safe-area-inset-right));
        padding-bottom: max(1rem, env(safe-area-inset-bottom));
    }
}

/* Optimize images for different screens */
img {
    max-width: 100%;
    height: auto;
}
</style>

</body>
</html>
