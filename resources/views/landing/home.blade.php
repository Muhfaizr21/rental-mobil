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
                    <span class="text-amber-400 font-bold">RentGoid merupakan perusahaan penyedia layanan transportasi profesional yang berfokus pada jasa rental mobil. Kami beroperasi di Cirebon, Jawa Barat, dengan komitmen memberikan pelayanan terbaik bagi setiap pelanggan. </span> "{{ $stats['total_cars'] ?? '50' }}" mobil keren siap nemenin perjalanan kalian. Booking cuma 5 menit, gas langsung jalan! 🚗💨
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
                                <div class="text-4xl font-black bg-gradient-to-r from-amber-300 to-amber-400 bg-clip-text text-transparent mb-2">500+</div>
                                <div class="text-gray-300 text-sm font-medium">Pelanggan</div>
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

{{-- Social Media Section - Final Optimized Version --}}
<section class="py-24 bg-[#0A0D14] relative overflow-hidden">

    <div class="absolute top-0 left-0 right-0 h-40 bg-gradient-to-b from-amber-500/20 to-transparent"></div>

    <div class="max-w-6xl mx-auto px-4 relative z-10">

        <div class="text-center mb-20">
            <div class="inline-flex items-center gap-2 px-5 py-2 rounded-full
                bg-black/40 border border-amber-400/40 text-amber-300 text-sm font-bold shadow-lg shadow-amber-400/20">
                ⭐ FOLLOW KITA YUK!
            </div>

            <h2 class="text-4xl md:text-5xl font-extrabold text-white mt-6">
                Temukan Kami <span class="text-yellow-400">Di Social Media</span>
            </h2>

            <p class="text-gray-400 mt-4 text-lg max-w-xl mx-auto">
                Promo eksklusif, update unit terbaru, dan konten harian seputar rental mobil premium.
            </p>
        </div>
        <br/>
        <div class="grid md:grid-cols-2 gap-8">

            <a href="https://instagram.com/rentgo.id" target="_blank"
                class="group p-10 rounded-3xl bg-[#0F131C] border border-white/10 hover:border-amber-400/40
                transition-all duration-300 shadow-xl hover:shadow-amber-500/30 relative">

                <div class="absolute inset-0 bg-gradient-to-br from-amber-400/10 to-transparent opacity-0 group-hover:opacity-100 transition"></div>

                <div class="relative z-10 text-center">

                    <div class="mx-auto w-16 h-16 bg-gradient-to-br from-amber-400 to-yellow-600
                        rounded-2xl flex items-center justify-center shadow-xl mb-6">
                        <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M7 2C4.24 2 2 4.24 2 7v10c0 2.76 2.24 5 5 5h10c2.76 0 5-2.24 5-5V7c0-2.76-2.24-5-5-5H7zm10 2a3 3 0 013 3v10a3 3 0 01-3 3H7a3 3 0 01-3-3V7a3 3 0 013-4h10zM12 7a5 5 0 100 10 5 5 0 000-10zm0 2a3 3 0 110 6 3 3 0 010-6z"/>
                        </svg>
                    </div>

                    <h3 class="text-2xl font-bold text-white">Instagram</h3>
                    <p class="text-amber-400 font-bold mt-1">@ RENTGO.ID</p>

                    <p class="text-gray-400 text-sm mt-4">
                        Foto unit premium, promo eksklusif, dan konten harian. 📸
                    </p>

                    <button class="mt-6 px-6 py-3 rounded-xl bg-gradient-to-r from-amber-500 to-yellow-600
                        text-white font-bold inline-flex items-center gap-2 shadow-lg shadow-amber-500/40
                        group-hover:scale-105 transition">
                        Follow Sekarang
                        <span>→</span>
                    </button>
                </div>
            </a>

            <a href="https://tiktok.com/@rentgo.id" target="_blank"
                class="group p-10 rounded-3xl bg-[#0F131C] border border-white/10 hover:border-amber-400/40
                transition-all duration-300 shadow-xl hover:shadow-amber-500/30 relative">

                <div class="absolute inset-0 bg-gradient-to-br from-amber-400/10 to-transparent opacity-0 group-hover:opacity-100 transition"></div>

                <div class="relative z-10 text-center">

                  <div class="mx-auto w-16 h-16 bg-gradient-to-br from-amber-400 to-yellow-600
    rounded-2xl flex items-center justify-center shadow-xl mb-6">

    <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 24 24">
        <path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.15C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/>
    </svg>
</div>

                    <h3 class="text-2xl font-bold text-white">TikTok</h3>
                    <p class="text-amber-400 font-bold mt-1">@ RENTGO.ID</p>

                    <p class="text-gray-400 text-sm mt-4">
                        Konten viral, cinematic unit, dan promo cepat. 🎥🔥
                    </p>

                    <button class="mt-6 px-6 py-3 rounded-xl bg-gradient-to-r from-amber-500 to-yellow-600
                        text-white font-bold inline-flex items-center gap-2 shadow-lg shadow-amber-500/40
                        group-hover:scale-105 transition">
                        Follow Sekarang
                        <span>→</span>
                    </button>
                </div>
            </a>

        </div>
    </div>

    <div class="absolute bottom-0 left-0 right-0 h-40 bg-gradient-to-t from-amber-500/20 to-transparent"></div>

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
            <a href="https://wa.me/6285601700507" class="group bg-gray-800 text-white px-10 py-5 rounded-xl text-xl font-black hover:bg-gray-700 transition-all duration-300 shadow-2xl hover:scale-105 flex items-center gap-3 border border-gray-600">
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
