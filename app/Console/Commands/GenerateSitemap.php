<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;
use App\Models\Car; // Model Mobil yang kamu sebutkan

class GenerateSitemap extends Command
{
    /**
     * Nama command untuk dijalankan di terminal
     */
    protected $signature = 'sitemap:generate';

    /**
     * Deskripsi command
     */
    protected $description = 'Generate sitemap.xml untuk website Rental Mobil';

    /**
     * Eksekusi logic sitemap
     */
    public function handle()
    {
        // Buat instance sitemap
        $sitemap = Sitemap::create();

        // ==========================================
        // 1. HALAMAN STATIS (Landing Page)
        // ==========================================
        // Kita pakai helper route() agar otomatis menyesuaikan domain

        // Home
        $sitemap->add(Url::create(route('landing.home'))
            ->setPriority(1.0)
            ->setChangeFrequency(Url::CHANGE_FREQUENCY_DAILY));

        // Pricing
        $sitemap->add(Url::create(route('landing.pricing'))
            ->setPriority(0.9)
            ->setChangeFrequency(Url::CHANGE_FREQUENCY_WEEKLY));

        // Contact
        $sitemap->add(Url::create(route('landing.contact'))
            ->setPriority(0.8)
            ->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY));

        // ==========================================
        // 2. HALAMAN DINAMIS (Detail Mobil)
        // ==========================================
        // Mengambil data dari tabel 'cars' lewat model Car
        
        // Cek apakah ada data mobil
        if (Car::count() > 0) {
            Car::all()->each(function (Car $car) use ($sitemap) {
                // Route di web.php kamu: Route::get('/car/{id}', 'detail')->name('landing.detail');
                
                $sitemap->add(Url::create(route('landing.detail', ['id' => $car->id]))
                    ->setPriority(0.7)
                    ->setChangeFrequency(Url::CHANGE_FREQUENCY_WEEKLY)
                    ->setLastModificationDate($car->updated_at));
            });
        }

        // ==========================================
        // 3. SIMPAN FILE
        // ==========================================
        
        $sitemap->writeToFile(public_path('sitemap.xml'));

        $this->info('Sitemap berhasil dibuat! Cek di: ' . public_path('sitemap.xml'));
    }
}