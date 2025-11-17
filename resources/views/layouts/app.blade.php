<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>{{ $title ?? 'Rental Mobil Premium' }}</title>
    @vite('resources/css/app.css')
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
</head>
<body class="bg-white text-gray-800 font-inter antialiased">

{{-- NAVBAR ENHANCED --}}
<nav id="navbar" class="fixed top-0 left-0 w-full bg-white/95 backdrop-blur-xl shadow-sm z-50 transition-all duration-500 border-b border-gray-100/50">
    <div class="max-w-7xl mx-auto px-4 md:px-6">
        <div class="flex justify-between items-center py-4">
            {{-- Logo Enhanced --}}
            <a href="/" class="flex items-center gap-3 group">
                <div class="relative">
                    <div class="w-12 h-12 bg-gradient-to-br from-blue-600 via-blue-700 to-blue-800 rounded-2xl flex items-center justify-center shadow-2xl group-hover:scale-110 transition-all duration-500 group-hover:rotate-3">
                        <svg class="w-7 h-7 text-white" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M18.92 6.01C18.72 5.42 18.16 5 17.5 5h-11c-.66 0-1.21.42-1.42 1.01L3 12v8c0 .55.45 1 1 1h1c.55 0 1-.45 1-1v-1h12v1c0 .55.45 1 1 1h1c.55 0 1-.45 1-1v-8l-2.08-5.99zM6.85 7h10.29l1.08 3.11H5.77L6.85 7zM19 17H5v-5h14v5z"/>
                            <circle cx="7.5" cy="14.5" r="1.5"/>
                            <circle cx="16.5" cy="14.5" r="1.5"/>
                        </svg>
                    </div>
                    <div class="absolute -top-1 -right-1 w-4 h-4 bg-gradient-to-r from-amber-400 to-orange-500 rounded-full border-2 border-white shadow-lg animate-pulse"></div>
                </div>
                <div class="flex flex-col">
                    <span class="text-2xl font-black tracking-tight">
                        <span class="bg-gradient-to-r from-blue-600 to-blue-800 bg-clip-text text-transparent">RentCar</span>
                        <span class="bg-gradient-to-r from-amber-500 to-orange-600 bg-clip-text text-transparent">ID</span>
                    </span>
                    <span class="text-xs text-gray-500 font-medium tracking-wide">PREMIUM RENTAL SERVICE</span>
                </div>
            </a>

            {{-- Desktop Menu Enhanced --}}
            <div class="hidden lg:flex items-center gap-8">
                <a href="/" class="relative group">
                    <div class="flex items-center gap-2 px-3 py-2 rounded-xl transition-all duration-300 group-hover:bg-blue-50">
                        <svg class="w-5 h-5 text-gray-600 group-hover:text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                        </svg>
                        <span class="font-semibold text-gray-700 group-hover:text-blue-600 transition-colors">Home</span>
                    </div>
                    <div class="absolute bottom-0 left-3 right-3 h-0.5 bg-gradient-to-r from-blue-600 to-blue-400 scale-x-0 group-hover:scale-x-100 transition-transform duration-300"></div>
                </a>

                <a href="/pricing" class="relative group">
                    <div class="flex items-center gap-2 px-3 py-2 rounded-xl transition-all duration-300 group-hover:bg-blue-50">
                        <svg class="w-5 h-5 text-gray-600 group-hover:text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                        </svg>
                        <span class="font-semibold text-gray-700 group-hover:text-blue-600 transition-colors">Daftar Mobil</span>
                    </div>
                    <div class="absolute bottom-0 left-3 right-3 h-0.5 bg-gradient-to-r from-blue-600 to-blue-400 scale-x-0 group-hover:scale-x-100 transition-transform duration-300"></div>
                </a>

                <a href="/contact" class="relative group">
                    <div class="flex items-center gap-2 px-3 py-2 rounded-xl transition-all duration-300 group-hover:bg-blue-50">
                        <svg class="w-5 h-5 text-gray-600 group-hover:text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                        </svg>
                        <span class="font-semibold text-gray-700 group-hover:text-blue-600 transition-colors">Contact</span>
                    </div>
                    <div class="absolute bottom-0 left-3 right-3 h-0.5 bg-gradient-to-r from-blue-600 to-blue-400 scale-x-0 group-hover:scale-x-100 transition-transform duration-300"></div>
                </a>
            </div>

            {{-- CTA Buttons Desktop Enhanced --}}
            <div class="hidden lg:flex items-center gap-3">
                {{-- WhatsApp Button Enhanced --}}
                <a href="https://wa.me/6281234567890"
                   class="group relative flex items-center gap-3 bg-gradient-to-r from-green-500 to-emerald-600 text-white px-6 py-3 rounded-2xl font-bold hover:shadow-2xl hover:shadow-green-500/30 transition-all duration-500 hover:scale-105 overflow-hidden">
                    <div class="relative z-10 flex items-center gap-2">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
                        </svg>
                        <span class="hidden xl:inline">Chat WhatsApp</span>
                    </div>
                    <div class="absolute inset-0 bg-gradient-to-r from-emerald-600 to-green-500 opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                </a>

                {{-- Book Now Button Enhanced --}}
                <a href="/pricing"
                   class="group relative flex items-center gap-3 bg-gradient-to-r from-amber-500 via-orange-500 to-red-500 text-white px-7 py-3 rounded-2xl font-bold hover:shadow-2xl hover:shadow-amber-500/30 transition-all duration-500 hover:scale-105 overflow-hidden">
                    <div class="relative z-10 flex items-center gap-2">
                        <svg class="w-5 h-5 group-hover:rotate-12 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                        </svg>
                        <span>Book Now</span>
                    </div>
                    <div class="absolute inset-0 bg-gradient-to-r from-red-500 via-orange-500 to-amber-500 opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                    <div class="absolute -inset-1 bg-gradient-to-r from-amber-400 to-orange-600 rounded-2xl blur opacity-0 group-hover:opacity-20 transition-opacity duration-500"></div>
                </a>
            </div>

            {{-- Mobile Menu Button Enhanced --}}
            <button onclick="toggleMenu()" class="lg:hidden p-3 rounded-2xl bg-gradient-to-br from-gray-50 to-gray-100 hover:from-blue-50 hover:to-blue-100 shadow-sm hover:shadow-md transition-all duration-300 group">
                <svg id="menuIcon" class="w-6 h-6 text-gray-700 group-hover:text-blue-600 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                </svg>
                <svg id="closeIcon" class="w-6 h-6 text-gray-700 group-hover:text-blue-600 transition-colors hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>

        {{-- Mobile Menu Enhanced --}}
        <div id="mobileMenu" class="hidden lg:hidden border-t border-gray-200/50 py-6 space-y-2 bg-white/95 backdrop-blur-xl">
            <a href="/" class="flex items-center gap-4 px-4 py-4 text-gray-700 hover:bg-gradient-to-r hover:from-blue-50 hover:to-blue-100 hover:text-blue-600 rounded-2xl transition-all duration-300 font-semibold group">
                <div class="w-10 h-10 bg-blue-100 rounded-xl flex items-center justify-center group-hover:bg-blue-600 transition-colors duration-300">
                    <svg class="w-5 h-5 text-blue-600 group-hover:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                    </svg>
                </div>
                <span>Home</span>
            </a>
            <a href="/pricing" class="flex items-center gap-4 px-4 py-4 text-gray-700 hover:bg-gradient-to-r hover:from-blue-50 hover:to-blue-100 hover:text-blue-600 rounded-2xl transition-all duration-300 font-semibold group">
                <div class="w-10 h-10 bg-blue-100 rounded-xl flex items-center justify-center group-hover:bg-blue-600 transition-colors duration-300">
                    <svg class="w-5 h-5 text-blue-600 group-hover:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                    </svg>
                </div>
                <span>Daftar Mobil</span>
            </a>
            <a href="/contact" class="flex items-center gap-4 px-4 py-4 text-gray-700 hover:bg-gradient-to-r hover:from-blue-50 hover:to-blue-100 hover:text-blue-600 rounded-2xl transition-all duration-300 font-semibold group">
                <div class="w-10 h-10 bg-blue-100 rounded-xl flex items-center justify-center group-hover:bg-blue-600 transition-colors duration-300">
                    <svg class="w-5 h-5 text-blue-600 group-hover:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                    </svg>
                </div>
                <span>Contact</span>
            </a>

            {{-- Mobile CTA Buttons Enhanced --}}
            <div class="px-4 pt-6 space-y-3 border-t border-gray-200/50 mt-4">
                <a href="https://wa.me/6281234567890"
                   class="flex items-center justify-center gap-3 w-full bg-gradient-to-r from-green-500 to-emerald-600 text-white py-4 rounded-2xl font-bold hover:shadow-lg hover:shadow-green-500/30 transition-all duration-300 group">
                    <svg class="w-5 h-5 group-hover:scale-110 transition-transform" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
                    </svg>
                    <span>Chat WhatsApp</span>
                </a>
                <a href="/pricing"
                   class="flex items-center justify-center gap-3 w-full bg-gradient-to-r from-amber-500 to-orange-600 text-white py-4 rounded-2xl font-bold hover:shadow-lg hover:shadow-amber-500/30 transition-all duration-300 group">
                    <svg class="w-5 h-5 group-hover:scale-110 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                    </svg>
                    <span>Book Now</span>
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

    // Toggle body scroll
    document.body.style.overflow = menu.classList.contains('hidden') ? 'auto' : 'hidden';
}

// Enhanced Navbar scroll effect
let lastScroll = 0;
const navbar = document.getElementById('navbar');

window.addEventListener('scroll', () => {
    const currentScroll = window.pageYOffset;

    if (currentScroll > 50) {
        navbar.classList.add('shadow-xl', 'bg-white/98');
        navbar.classList.remove('bg-white/95');
    } else {
        navbar.classList.remove('shadow-xl', 'bg-white/98');
        navbar.classList.add('bg-white/95');
    }

    lastScroll = currentScroll;
});

// Close mobile menu when clicking outside
document.addEventListener('click', (e) => {
    const menu = document.getElementById('mobileMenu');
    const menuButton = e.target.closest('button[onclick="toggleMenu()"]');

    if (!menu.contains(e.target) && !menuButton && !menu.classList.contains('hidden')) {
        toggleMenu();
    }
});

// Close mobile menu when clicking on links
document.querySelectorAll('#mobileMenu a').forEach(link => {
    link.addEventListener('click', () => {
        toggleMenu();
    });
});
</script>

{{-- MAIN CONTENT --}}
<main class="pt-20">
    @yield('content')
</main>

@include('components.chatbot')

{{-- FOOTER ENHANCED --}}
<footer class="mt-20 bg-gradient-to-br from-slate-900 via-gray-900 to-slate-800 text-white relative overflow-hidden">
    {{-- Animated Background --}}
    <div class="absolute inset-0 opacity-5">
        <div class="absolute top-10 left-10 w-72 h-72 bg-blue-500 rounded-full filter blur-3xl animate-pulse"></div>
        <div class="absolute top-1/2 right-20 w-96 h-96 bg-amber-500 rounded-full filter blur-3xl animate-pulse" style="animation-delay: 1s;"></div>
        <div class="absolute bottom-20 left-1/3 w-64 h-64 bg-emerald-500 rounded-full filter blur-3xl animate-pulse" style="animation-delay: 2s;"></div>
    </div>

    {{-- Grid Pattern --}}
    <div class="absolute inset-0 opacity-10 bg-gradient-to-br from-transparent via-blue-500/10 to-transparent"></div>

    <div class="max-w-7xl mx-auto px-4 md:px-6 py-16 relative z-10">
        {{-- Main Footer Content --}}
        <div class="grid grid-cols-1 lg:grid-cols-4 gap-8 mb-12">
            {{-- Brand Section Enhanced --}}
            <div class="lg:col-span-2">
                <div class="flex items-center gap-3 mb-6">
                    <div class="relative">
                        <div class="w-14 h-14 bg-gradient-to-br from-blue-600 via-blue-700 to-blue-800 rounded-2xl flex items-center justify-center shadow-2xl">
                            <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M18.92 6.01C18.72 5.42 18.16 5 17.5 5h-11c-.66 0-1.21.42-1.42 1.01L3 12v8c0 .55.45 1 1 1h1c.55 0 1-.45 1-1v-1h12v1c0 .55.45 1 1 1h1c.55 0 1-.45 1-1v-8l-2.08-5.99zM6.85 7h10.29l1.08 3.11H5.77L6.85 7zM19 17H5v-5h14v5z"/>
                                <circle cx="7.5" cy="14.5" r="1.5"/>
                                <circle cx="16.5" cy="14.5" r="1.5"/>
                            </svg>
                        </div>
                        <div class="absolute -top-1 -right-1 w-5 h-5 bg-gradient-to-r from-amber-400 to-orange-500 rounded-full border-2 border-slate-900 shadow-lg animate-ping"></div>
                    </div>
                    <div class="flex flex-col">
                        <span class="text-3xl font-black tracking-tight">
                            <span class="bg-gradient-to-r from-blue-400 to-blue-600 bg-clip-text text-transparent">RentCar</span>
                            <span class="bg-gradient-to-r from-amber-400 to-orange-500 bg-clip-text text-transparent">ID</span>
                        </span>
                        <span class="text-sm text-gray-400 font-medium tracking-wide mt-1">PREMIUM RENTAL SERVICE</span>
                    </div>
                </div>
                <p class="text-gray-300 leading-relaxed mb-6 max-w-lg text-lg">
                    Layanan rental mobil premium dengan armada terbaru, harga kompetitif, dan pelayanan 24/7. Pengalaman berkendara terbaik untuk perjalanan bisnis maupun liburan Anda.
                </p>
                <div class="flex gap-4">
                    <a href="#" class="group w-12 h-12 bg-white/10 hover:bg-blue-600 rounded-xl flex items-center justify-center transition-all duration-300 hover:scale-110 hover:shadow-lg hover:shadow-blue-500/25">
                        <svg class="w-5 h-5 text-gray-400 group-hover:text-white transition-colors" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                        </svg>
                    </a>
                    <a href="#" class="group w-12 h-12 bg-white/10 hover:bg-pink-600 rounded-xl flex items-center justify-center transition-all duration-300 hover:scale-110 hover:shadow-lg hover:shadow-pink-500/25">
                        <svg class="w-5 h-5 text-gray-400 group-hover:text-white transition-colors" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
                        </svg>
                    </a>
                    <a href="#" class="group w-12 h-12 bg-white/10 hover:bg-blue-400 rounded-xl flex items-center justify-center transition-all duration-300 hover:scale-110 hover:shadow-lg hover:shadow-blue-400/25">
                        <svg class="w-5 h-5 text-gray-400 group-hover:text-white transition-colors" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"/>
                        </svg>
                    </a>
                </div>
            </div>

            {{-- Quick Links Enhanced --}}
            <div>
                <h3 class="font-bold text-xl mb-6 bg-gradient-to-r from-amber-400 to-orange-500 bg-clip-text text-transparent">Menu Utama</h3>
                <ul class="space-y-4">
                    <li>
                        <a href="/" class="group flex items-center gap-3 text-gray-300 hover:text-white transition-all duration-300 hover:translate-x-2">
                            <div class="w-2 h-2 bg-amber-400 rounded-full group-hover:scale-150 transition-transform duration-300"></div>
                            <span class="font-medium">Home</span>
                        </a>
                    </li>
                    <li>
                        <a href="/pricing" class="group flex items-center gap-3 text-gray-300 hover:text-white transition-all duration-300 hover:translate-x-2">
                            <div class="w-2 h-2 bg-amber-400 rounded-full group-hover:scale-150 transition-transform duration-300"></div>
                            <span class="font-medium">Daftar Mobil</span>
                        </a>
                    </li>
                    <li>
                        <a href="/contact" class="group flex items-center gap-3 text-gray-300 hover:text-white transition-all duration-300 hover:translate-x-2">
                            <div class="w-2 h-2 bg-amber-400 rounded-full group-hover:scale-150 transition-transform duration-300"></div>
                            <span class="font-medium">Contact</span>
                        </a>
                    </li>
                    <li>
                        <a href="/pricing" class="group flex items-center gap-3 text-gray-300 hover:text-white transition-all duration-300 hover:translate-x-2">
                            <div class="w-2 h-2 bg-amber-400 rounded-full group-hover:scale-150 transition-transform duration-300"></div>
                            <span class="font-medium">Promo Spesial</span>
                        </a>
                    </li>
                </ul>
            </div>

            {{-- Contact Info Enhanced --}}
            <div>
                <h3 class="font-bold text-xl mb-6 bg-gradient-to-r from-emerald-400 to-green-500 bg-clip-text text-transparent">Hubungi Kami</h3>
                <ul class="space-y-5">
                    <li class="flex items-start gap-4 group cursor-pointer">
                        <div class="w-10 h-10 bg-green-500/20 rounded-xl flex items-center justify-center group-hover:bg-green-500 transition-colors duration-300">
                            <svg class="w-5 h-5 text-green-400 group-hover:text-white transition-colors" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
                            </svg>
                        </div>
                        <div class="flex-1">
                            <div class="text-sm text-gray-400 mb-1 font-medium">WhatsApp 24/7</div>
                            <a href="https://wa.me/6281234567890" class="text-white hover:text-green-400 transition-colors font-semibold text-lg">
                                +62 812-3456-7890
                            </a>
                        </div>
                    </li>
                    <li class="flex items-start gap-4 group cursor-pointer">
                        <div class="w-10 h-10 bg-blue-500/20 rounded-xl flex items-center justify-center group-hover:bg-blue-500 transition-colors duration-300">
                            <svg class="w-5 h-5 text-blue-400 group-hover:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                            </svg>
                        </div>
                        <div class="flex-1">
                            <div class="text-sm text-gray-400 mb-1 font-medium">Email Support</div>
                            <a href="mailto:support@rentcarid.com" class="text-white hover:text-blue-400 transition-colors font-semibold">
                                support@rentcarid.com
                            </a>
                        </div>
                    </li>
                    <li class="flex items-start gap-4 group cursor-pointer">
                        <div class="w-10 h-10 bg-amber-500/20 rounded-xl flex items-center justify-center group-hover:bg-amber-500 transition-colors duration-300">
                            <svg class="w-5 h-5 text-amber-400 group-hover:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                            </svg>
                        </div>
                        <div class="flex-1">
                            <div class="text-sm text-gray-400 mb-1 font-medium">Alamat Kantor</div>
                            <p class="text-white leading-relaxed">
                                Jl. Sunan Kalijaga No. 123<br>
                                Cirebon, Jawa Barat 45111
                            </p>
                        </div>
                    </li>
                </ul>
            </div>
        </div>

        {{-- Bottom Footer Enhanced --}}
        <div class="border-t border-gray-800 pt-8">
            <div class="flex flex-col lg:flex-row justify-between items-center gap-6">
                <div class="flex items-center gap-4">
                    <p class="text-gray-400 text-sm">
                        © {{ date('Y') }} <span class="text-white font-semibold">RentCarID Premium</span>. All rights reserved.
                    </p>
                    <div class="hidden md:flex items-center gap-4 text-sm">
                        <span class="w-1 h-1 bg-gray-600 rounded-full"></span>
                        <span class="text-gray-500">Made with ❤️ for better travel experience</span>
                    </div>
                </div>
                <div class="flex items-center gap-6 text-sm">
                    <a href="#" class="text-gray-400 hover:text-amber-400 transition-colors duration-300 font-medium">Privacy Policy</a>
                    <a href="#" class="text-gray-400 hover:text-amber-400 transition-colors duration-300 font-medium">Terms of Service</a>
                    <a href="#" class="text-gray-400 hover:text-amber-400 transition-colors duration-300 font-medium">Sitemap</a>
                </div>
            </div>
        </div>
    </div>

    {{-- Floating Elements --}}
    <div class="absolute bottom-10 right-10 w-20 h-20 bg-blue-500/10 rounded-full blur-xl animate-pulse"></div>
    <div class="absolute top-1/4 left-10 w-16 h-16 bg-amber-500/10 rounded-full blur-xl animate-pulse" style="animation-delay: 1.5s;"></div>
</footer>

<style>
@import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap');

.font-inter {
    font-family: 'Inter', sans-serif;
}

.antialiased {
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
}

/* Custom scrollbar */
::-webkit-scrollbar {
    width: 8px;
}

::-webkit-scrollbar-track {
    background: #f1f5f9;
}

::-webkit-scrollbar-thumb {
    background: linear-gradient(135deg, #3b82f6, #1d4ed8);
    border-radius: 10px;
}

::-webkit-scrollbar-thumb:hover {
    background: linear-gradient(135deg, #2563eb, #1e40af);
}

/* Smooth transitions */
* {
    transition-property: color, background-color, border-color, transform, box-shadow;
    transition-duration: 200ms;
    transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
}

/* Gradient text animation */
.gradient-text {
    background: linear-gradient(135deg, #3b82f6, #1d4ed8, #6366f1);
    background-size: 200% 200%;
    animation: gradient 3s ease infinite;
}

@keyframes gradient {
    0% { background-position: 0% 50%; }
    50% { background-position: 100% 50%; }
    100% { background-position: 0% 50%; }
}

/* Floating animation */
@keyframes float {
    0%, 100% { transform: translateY(0px); }
    50% { transform: translateY(-10px); }
}

.float-animation {
    animation: float 3s ease-in-out infinite;
}

/* Backdrop blur support */
@supports (backdrop-filter: blur(10px)) {
    .backdrop-blur-xl {
        backdrop-filter: blur(24px);
    }
}

/* Focus states for accessibility */
button:focus-visible,
a:focus-visible {
    outline: 2px solid #3b82f6;
    outline-offset: 2px;
    border-radius: 8px;
}

/* Reduced motion for accessibility */
@media (prefers-reduced-motion: reduce) {
    * {
        animation-duration: 0.01ms !important;
        animation-iteration-count: 1 !important;
        transition-duration: 0.01ms !important;
    }
}
</style>

</body>
</html>
