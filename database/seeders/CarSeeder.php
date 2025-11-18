<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Car;

class CarSeeder extends Seeder
{
    public function run(): void
    {
        $cars = [
            // *LEPAS KUNCI*

            // Ayla Manual 2023
            [
                'brand' => 'Daihatsu',
                'model' => 'Ayla Manual',
                'year' => 2023,
                'price_per_day' => 300000,
                'price_12_hours' => 200000,
                'price_24_hours' => 300000,
                'status' => 'available',
                'fuel_type' => 'Petrol',
                'transmission' => 'Manual',
                'seat_capacity' => 5,
                'rental_type' => 'lepas_kunci',
            ],

            // Agya Matic 2023-2025
            [
                'brand' => 'Toyota',
                'model' => 'Agya Matic',
                'year' => 2024,
                'price_per_day' => 350000,
                'price_12_hours' => 250000,
                'price_24_hours' => 350000,
                'status' => 'available',
                'fuel_type' => 'Petrol',
                'transmission' => 'Automatic',
                'seat_capacity' => 5,
                'rental_type' => 'lepas_kunci',
            ],

            // Brio Manual/Matic 2020-2025
            [
                'brand' => 'Honda',
                'model' => 'Brio Manual',
                'year' => 2023,
                'price_per_day' => 350000,
                'price_12_hours' => 250000,
                'price_24_hours' => 350000,
                'status' => 'available',
                'fuel_type' => 'Petrol',
                'transmission' => 'Manual',
                'seat_capacity' => 5,
                'rental_type' => 'lepas_kunci',
            ],
            [
                'brand' => 'Honda',
                'model' => 'Brio Matic',
                'year' => 2023,
                'price_per_day' => 350000,
                'price_12_hours' => 250000,
                'price_24_hours' => 350000,
                'status' => 'available',
                'fuel_type' => 'Petrol',
                'transmission' => 'Automatic',
                'seat_capacity' => 5,
                'rental_type' => 'lepas_kunci',
            ],

            // Jazz Manual/Matic 2016-2020
            [
                'brand' => 'Honda',
                'model' => 'Jazz Manual',
                'year' => 2019,
                'price_per_day' => 450000,
                'price_12_hours' => 350000,
                'price_24_hours' => 450000,
                'status' => 'available',
                'fuel_type' => 'Petrol',
                'transmission' => 'Manual',
                'seat_capacity' => 5,
                'rental_type' => 'lepas_kunci',
            ],
            [
                'brand' => 'Honda',
                'model' => 'Jazz Matic',
                'year' => 2019,
                'price_per_day' => 450000,
                'price_12_hours' => 350000,
                'price_24_hours' => 450000,
                'status' => 'available',
                'fuel_type' => 'Petrol',
                'transmission' => 'Automatic',
                'seat_capacity' => 5,
                'rental_type' => 'lepas_kunci',
            ],

            // Avanza Facelift Manual 2019-2021
            [
                'brand' => 'Toyota',
                'model' => 'Avanza Facelift Manual',
                'year' => 2020,
                'price_per_day' => 350000,
                'price_12_hours' => 250000,
                'price_24_hours' => 350000,
                'status' => 'available',
                'fuel_type' => 'Petrol',
                'transmission' => 'Manual',
                'seat_capacity' => 7,
                'rental_type' => 'lepas_kunci',
            ],

            // Avanza Robot Manual/Matic 2022-2025
            [
                'brand' => 'Toyota',
                'model' => 'Avanza Robot Manual',
                'year' => 2023,
                'price_per_day' => 400000,
                'price_12_hours' => 300000,
                'price_24_hours' => 400000,
                'status' => 'available',
                'fuel_type' => 'Petrol',
                'transmission' => 'Manual',
                'seat_capacity' => 7,
                'rental_type' => 'lepas_kunci',
            ],
            [
                'brand' => 'Toyota',
                'model' => 'Avanza Robot Matic',
                'year' => 2023,
                'price_per_day' => 400000,
                'price_12_hours' => 300000,
                'price_24_hours' => 400000,
                'status' => 'available',
                'fuel_type' => 'Petrol',
                'transmission' => 'Automatic',
                'seat_capacity' => 7,
                'rental_type' => 'lepas_kunci',
            ],

            // Xpander Matic 2018-2025
            [
                'brand' => 'Mitsubishi',
                'model' => 'Xpander Matic',
                'year' => 2023,
                'price_per_day' => 450000,
                'price_12_hours' => 350000,
                'price_24_hours' => 450000,
                'status' => 'available',
                'fuel_type' => 'Petrol',
                'transmission' => 'Automatic',
                'seat_capacity' => 7,
                'rental_type' => 'lepas_kunci',
            ],

            // New Veloz Q Matic 2023-2025
            [
                'brand' => 'Toyota',
                'model' => 'New Veloz Q Matic',
                'year' => 2024,
                'price_per_day' => 450000,
                'price_12_hours' => 350000,
                'price_24_hours' => 450000,
                'status' => 'available',
                'fuel_type' => 'Petrol',
                'transmission' => 'Automatic',
                'seat_capacity' => 7,
                'rental_type' => 'lepas_kunci',
            ],

            // New BRV Matic 2022-2025
            [
                'brand' => 'Honda',
                'model' => 'New BRV Matic',
                'year' => 2023,
                'price_per_day' => 450000,
                'price_12_hours' => 350000,
                'price_24_hours' => 450000,
                'status' => 'available',
                'fuel_type' => 'Petrol',
                'transmission' => 'Automatic',
                'seat_capacity' => 7,
                'rental_type' => 'lepas_kunci',
            ],

            // Innova Reborn Manual/Matic 2022-2025
            [
                'brand' => 'Toyota',
                'model' => 'Innova Reborn Manual',
                'year' => 2023,
                'price_per_day' => 600000,
                'price_12_hours' => null,
                'price_24_hours' => 600000,
                'status' => 'available',
                'fuel_type' => 'Petrol',
                'transmission' => 'Manual',
                'seat_capacity' => 7,
                'rental_type' => 'lepas_kunci',
            ],
            [
                'brand' => 'Toyota',
                'model' => 'Innova Reborn Matic',
                'year' => 2023,
                'price_per_day' => 600000,
                'price_12_hours' => null,
                'price_24_hours' => 600000,
                'status' => 'available',
                'fuel_type' => 'Petrol',
                'transmission' => 'Automatic',
                'seat_capacity' => 7,
                'rental_type' => 'lepas_kunci',
            ],

            // *MOBIL + DRIVER*

            // Hiace Commuter 2020-2025
            [
                'brand' => 'Toyota',
                'model' => 'Hiace Commuter',
                'year' => 2023,
                'price_per_day' => 1400000,
                'price_12_hours' => null,
                'price_24_hours' => 1400000,
                'status' => 'available',
                'fuel_type' => 'Diesel',
                'transmission' => 'Manual',
                'seat_capacity' => 14,
                'rental_type' => 'dengan_driver',
            ],

            // Hiace Premio 2020-2025
            [
                'brand' => 'Toyota',
                'model' => 'Hiace Premio',
                'year' => 2023,
                'price_per_day' => 1700000,
                'price_12_hours' => null,
                'price_24_hours' => 1700000,
                'status' => 'available',
                'fuel_type' => 'Diesel',
                'transmission' => 'Manual',
                'seat_capacity' => 10,
                'rental_type' => 'dengan_driver',
            ],

            // Hiace Commuter Luxury 2019
            [
                'brand' => 'Toyota',
                'model' => 'Hiace Commuter Luxury',
                'year' => 2019,
                'price_per_day' => 2000000,
                'price_12_hours' => null,
                'price_24_hours' => 2000000,
                'status' => 'available',
                'fuel_type' => 'Diesel',
                'transmission' => 'Manual',
                'seat_capacity' => 10,
                'rental_type' => 'dengan_driver',
            ],
        ];

        foreach ($cars as $car) {
            Car::create($car);
        }

        $this->command->info('Data mobil berhasil ditambahkan!');
    }
}
