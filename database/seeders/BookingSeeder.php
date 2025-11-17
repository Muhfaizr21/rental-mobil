<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Booking;
use App\Models\Car;
use Carbon\Carbon;

class BookingSeeder extends Seeder
{
    public function run(): void
    {
        $cars = Car::all();

        if ($cars->isEmpty()) {
            $this->command->info('Tidak ada data mobil! Jalankan CarSeeder terlebih dahulu.');
            return;
        }

        $statuses = ['pending', 'approved', 'completed', 'rejected'];

        $bookings = [];

        for ($i = 1; $i <= 30; $i++) {

            $car = $cars->random();

            // Random date logic
            $start = Carbon::now()->addDays(rand(-15, 15));
            $end = (clone $start)->addDays(rand(1, 5));

            // Price otomatis per hari x durasi
            $duration = $start->diffInDays($end);
            $totalPrice = $car->price_per_day * $duration;

            $bookings[] = [
                'car_id' => $car->id,
                'customer_name' => fake()->name(),
                'customer_phone' => fake()->phoneNumber(),
                'start_date' => $start,
                'end_date' => $end,
                'total_price' => $totalPrice,
                'status' => $statuses[array_rand($statuses)],
            ];
        }

        foreach ($bookings as $booking) {
            Booking::create($booking);
        }

        $this->command->info('BookingSeeder sukses! 30 data booking dummy telah dibuat.');
        $this->command->info('Total booking sekarang: ' . Booking::count());
    }
}
