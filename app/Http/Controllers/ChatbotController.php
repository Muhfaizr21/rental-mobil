<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class ChatbotController extends Controller
{
    public function sendMessage(Request $request): JsonResponse
    {
        $request->validate([
            'message' => 'required|string|max:500'
        ]);

        $userMessage = strtolower($request->message);

        // Generate response berdasarkan konteks database
        $botResponse = $this->generateIntelligentResponse($userMessage);

        return response()->json([
            'success' => true,
            'bot_response' => $botResponse,
            'timestamp' => now()->format('H:i')
        ]);
    }

    private function generateIntelligentResponse(string $message): string
    {
        // Ambil data real-time dari database
        $availableCars = Car::where('status', 'available')->get();
        $pendingBookings = Booking::where('status', 'pending')->count();
        $totalCars = Car::count();

        // Konteks database untuk AI reasoning
        $context = [
            'available_cars' => $availableCars,
            'pending_bookings' => $pendingBookings,
            'total_cars' => $totalCars,
            'current_date' => now()->format('d F Y'),
            'company_info' => [
                'name' => 'Rental Mobil Professional',
                'hours' => 'Senin-Minggu, 08:00-21:00 WIB',
                'location' => 'Jakarta Pusat',
                'requirements' => 'KTP, SIM A, DP 30%',
                'phone' => '08123456789'
            ]
        ];

        // Pattern matching dengan AI-like reasoning
        return $this->analyzeMessage($message, $context);
    }

    private function analyzeMessage(string $message, array $context): string
    {
        $availableCarsList = $context['available_cars'];
        $company = $context['company_info'];

        // Greeting patterns
        if (preg_match('/hai|halo|hello|hi|selamat|pagi|siang|malam/', $message)) {
            $greetings = [
                "Halo! Selamat datang di {$company['name']}! 🚗 Ada yang bisa saya bantu?",
                "Hai! Saya asisten virtual rental mobil. Senang bertemu dengan Anda!",
                "Halo! Bagaimana saya bisa membantu kebutuhan rental mobil Anda hari ini?"
            ];
            return $greetings[array_rand($greetings)];
        }

        // Available cars inquiry
        if (preg_match('/mobil.*tersedia|available|ready|ada.*mobil|stock|sewa.*mobil/', $message)) {
            if ($availableCarsList->isEmpty()) {
                return "Maaf, saat ini semua mobil sedang tidak tersedia. 😔\nSilakan coba lagi nanti atau hubungi kami di {$company['phone']}.";
            }

            $response = "🚗 **MOBIL TERSEDIA SAAT INI:**\n\n";
            foreach ($availableCarsList as $car) {
                $price = number_format($car->price_per_day, 0, ',', '.');
                $response .= "• **{$car->brand} {$car->model}** ({$car->year})\n";
                $response .= "  📍 Plat: {$car->plate_number}\n";
                $response .= "  💰 Rp {$price}/hari\n";
                $response .= "  ✅ Status: Tersedia\n\n";
            }
            $response .= "Total: {$availableCarsList->count()} mobil ready untuk disewa!";
            return $response;
        }

        // Price inquiry
        if (preg_match('/harga|tarif|biaya|price|berapa.*harga|sewa.*per.*hari|rental.*fee/', $message)) {
            if ($availableCarsList->isEmpty()) {
                return "Silakan tanyakan tentang mobil tersedia terlebih dahulu untuk mengetahui harga.";
            }

            $response = "💰 **TARIF SEWA HARIAN:**\n\n";
            foreach ($availableCarsList as $car) {
                $price = number_format($car->price_per_day, 0, ',', '.');
                $response .= "• {$car->brand} {$car->model}: Rp {$price}/hari\n";
            }
            $response .= "\n💡 *Harga sudah termasuk pajak dan asuransi dasar*";
            return $response;
        }

        // Specific car price
        if (preg_match('/harga.*(avanza|brio|xpander)|(avanza|brio|xpander).*harga/', $message)) {
            $carModels = ['avanza' => 'Avanza', 'brio' => 'Brio', 'xpander' => 'Xpander'];

            foreach ($carModels as $key => $model) {
                if (strpos($message, $key) !== false) {
                    $car = Car::where('model', 'like', "%$model%")->where('status', 'available')->first();
                    if ($car) {
                        $price = number_format($car->price_per_day, 0, ',', '.');
                        return "💰 **{$car->brand} {$car->model}**: Rp {$price}/hari\n\nMobil tersedia untuk disewa sekarang!";
                    } else {
                        return "Maaf, {$model} saat ini tidak tersedia. Silakan pilih mobil lain yang ready.";
                    }
                }
            }
        }

        // Booking inquiry
        if (preg_match('/booking|pesan|sewa|rental|cara.*pesan|proses.*sewa|pemesanan/', $message)) {
            $response = "📋 **CARA BOOKING MOBIL:**\n\n";
            $response .= "1. **Pilih Mobil** - Tanyakan mobil tersedia ke saya\n";
            $response .= "2. **Tentukan Tanggal** - Start & end date rental\n";
            $response .= "3. **Isi Data Diri** - Nama, No HP lengkap\n";
            $response .= "4. **Bayar DP** - 30% dari total biaya\n";
            $response .= "5. **Ambil Mobil** - Di kantor kami\n\n";
            $response .= "📞 Langsung hubungi: {$company['phone']} untuk proses cepat!";
            return $response;
        }

        // Requirements inquiry
        if (preg_match('/syarat|ketentuan|requirement|persyaratan|dokumen|sim|ktp|jaminan/', $message)) {
            $response = "📄 **SYARAT & KETENTUAN RENTAL:**\n\n";
            $response .= "✅ **Dokumen Wajib:**\n";
            $response .= "• KTP asli (masih berlaku)\n";
            $response .= "• SIM A asli (minimal 1 tahun)\n\n";
            $response .= "💰 **Pembayaran:**\n";
            $response .= "• DP 30% saat booking\n";
            $response .= "• Pelunasan saat ambil mobil\n\n";
            $response .= "⏰ **Waktu Rental:**\n";
            $response .= "• Min. rental: 1 hari\n";
            $response .= "• Max. rental: 30 hari\n";
            return $response;
        }

        // Location inquiry
        if (preg_match('/lokasi|alamat|tempat|dimana|map|kantor/', $message)) {
            $response = "📍 **LOKASI KANTOR KAMI:**\n\n";
            $response .= "**{$company['name']}**\n";
            $response .= "Jl. Sudirman No. 123\n";
            $response .= "Jakarta Pusat 10210\n\n";
            $response .= "🕐 **Jam Operasional:**\n";
            $response .= "{$company['hours']}\n\n";
            $response .= "📱 **Kontak:** {$company['phone']}";
            return $response;
        }

        // Contact inquiry
        if (preg_match('/kontak|telpon|telepon|hp|whatsapp|wa|call/', $message)) {
            return "📞 **HUBUNGI KAMI:**\n\nWhatsApp: {$company['phone']}\nTelepon: {$company['phone']}\n\nKami siap membantu 24/7!";
        }

        // Thanks response
        if (preg_match('/terima kasih|thanks|makasih|thank you|thx/', $message)) {
            $thanks = [
                "Sama-sama! Senang bisa membantu 🚗",
                "Terima kasih kembali! Semoga harimu menyenangkan!",
                "Dengan senang hati! Jangan ragu bertanya lagi ya!"
            ];
            return $thanks[array_rand($thanks)];
        }

        // Default response
        $defaultResponses = [
            "Maaf, saya belum paham pertanyaannya. Coba tanyakan tentang:\n• Mobil tersedia\n• Harga sewa\n• Syarat rental\n• Cara booking",
            "Sebagai asisten rental, saya bisa bantu Anda dengan:\n🚗 Ketersediaan mobil\n💰 Info harga\n📋 Syarat sewa\n📞 Kontak kami",
            "Saya khusus membantu urusan rental mobil. Coba tanya:\n- 'Mobil apa yang tersedia?'\n- 'Berapa harga sewa Avanza?'\n- 'Apa syarat sewa mobil?'"
        ];

        return $defaultResponses[array_rand($defaultResponses)];
    }
}
