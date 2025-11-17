<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Car;

class CarSeeder extends Seeder
{
    public function run(): void
    {
        $cars = [
            // Toyota Series
            [
                'brand' => 'Toyota',
                'model' => 'Avanza',
                'plate_number' => 'B 1234 ABC',
                'year' => 2022,
                'price_per_day' => 250000,
                'status' => 'available',
                'color' => 'White',
                'fuel_type' => 'Petrol',
                'transmission' => 'Manual',
                'seat_capacity' => 7,
            ],
            [
                'brand' => 'Toyota',
                'model' => 'Innova',
                'plate_number' => 'B 2345 BCD',
                'year' => 2023,
                'price_per_day' => 450000,
                'status' => 'available',
                'color' => 'Silver',
                'fuel_type' => 'Diesel',
                'transmission' => 'Automatic',
                'seat_capacity' => 8,
            ],
            [
                'brand' => 'Toyota',
                'model' => 'Fortuner',
                'plate_number' => 'B 3456 CDE',
                'year' => 2023,
                'price_per_day' => 650000,
                'status' => 'rented',
                'color' => 'Black',
                'fuel_type' => 'Diesel',
                'transmission' => 'Automatic',
                'seat_capacity' => 7,
            ],
            [
                'brand' => 'Toyota',
                'model' => 'Calya',
                'plate_number' => 'B 4567 DEF',
                'year' => 2022,
                'price_per_day' => 200000,
                'status' => 'available',
                'color' => 'Red',
                'fuel_type' => 'Petrol',
                'transmission' => 'Manual',
                'seat_capacity' => 7,
            ],

            // Honda Series
            [
                'brand' => 'Honda',
                'model' => 'Brio',
                'plate_number' => 'B 5678 EFG',
                'year' => 2023,
                'price_per_day' => 200000,
                'status' => 'available',
                'color' => 'Blue',
                'fuel_type' => 'Petrol',
                'transmission' => 'Manual',
                'seat_capacity' => 5,
            ],
            [
                'brand' => 'Honda',
                'model' => 'HR-V',
                'plate_number' => 'B 6789 FGH',
                'year' => 2023,
                'price_per_day' => 500000,
                'status' => 'maintenance',
                'color' => 'White',
                'fuel_type' => 'Petrol',
                'transmission' => 'Automatic',
                'seat_capacity' => 5,
            ],
            [
                'brand' => 'Honda',
                'model' => 'CR-V',
                'plate_number' => 'B 7890 GHI',
                'year' => 2022,
                'price_per_day' => 600000,
                'status' => 'available',
                'color' => 'Black',
                'fuel_type' => 'Petrol',
                'transmission' => 'Automatic',
                'seat_capacity' => 5,
            ],
            [
                'brand' => 'Honda',
                'model' => 'Mobilio',
                'plate_number' => 'B 8901 HIJ',
                'year' => 2021,
                'price_per_day' => 280000,
                'status' => 'rented',
                'color' => 'Silver',
                'fuel_type' => 'Petrol',
                'transmission' => 'Manual',
                'seat_capacity' => 7,
            ],

            // Mitsubishi Series
            [
                'brand' => 'Mitsubishi',
                'model' => 'Xpander',
                'plate_number' => 'B 9012 IJK',
                'year' => 2023,
                'price_per_day' => 350000,
                'status' => 'rented',
                'color' => 'White',
                'fuel_type' => 'Petrol',
                'transmission' => 'Manual',
                'seat_capacity' => 7,
            ],
            [
                'brand' => 'Mitsubishi',
                'model' => 'Pajero Sport',
                'plate_number' => 'B 0123 JKL',
                'year' => 2023,
                'price_per_day' => 700000,
                'status' => 'available',
                'color' => 'Gray',
                'fuel_type' => 'Diesel',
                'transmission' => 'Automatic',
                'seat_capacity' => 7,
            ],
            [
                'brand' => 'Mitsubishi',
                'model' => 'Outlander',
                'plate_number' => 'B 1123 KLM',
                'year' => 2022,
                'price_per_day' => 550000,
                'status' => 'maintenance',
                'color' => 'Black',
                'fuel_type' => 'Petrol',
                'transmission' => 'Automatic',
                'seat_capacity' => 7,
            ],

            // Suzuki Series
            [
                'brand' => 'Suzuki',
                'model' => 'Ertiga',
                'plate_number' => 'B 2234 LMN',
                'year' => 2022,
                'price_per_day' => 300000,
                'status' => 'available',
                'color' => 'Silver',
                'fuel_type' => 'Petrol',
                'transmission' => 'Manual',
                'seat_capacity' => 7,
            ],
            [
                'brand' => 'Suzuki',
                'model' => 'Jimny',
                'plate_number' => 'B 3345 MNO',
                'year' => 2023,
                'price_per_day' => 400000,
                'status' => 'available',
                'color' => 'Green',
                'fuel_type' => 'Petrol',
                'transmission' => 'Manual',
                'seat_capacity' => 4,
            ],
            [
                'brand' => 'Suzuki',
                'model' => 'XL7',
                'plate_number' => 'B 4456 NOP',
                'year' => 2023,
                'price_per_day' => 380000,
                'status' => 'rented',
                'color' => 'White',
                'fuel_type' => 'Petrol',
                'transmission' => 'Automatic',
                'seat_capacity' => 7,
            ],

            // Daihatsu Series
            [
                'brand' => 'Daihatsu',
                'model' => 'Terios',
                'plate_number' => 'B 5567 OPQ',
                'year' => 2022,
                'price_per_day' => 320000,
                'status' => 'available',
                'color' => 'Red',
                'fuel_type' => 'Petrol',
                'transmission' => 'Manual',
                'seat_capacity' => 7,
            ],
            [
                'brand' => 'Daihatsu',
                'model' => 'Ayla',
                'plate_number' => 'B 6678 PQR',
                'year' => 2023,
                'price_per_day' => 180000,
                'status' => 'available',
                'color' => 'Yellow',
                'fuel_type' => 'Petrol',
                'transmission' => 'Manual',
                'seat_capacity' => 5,
            ],

            // Nissan Series
            [
                'brand' => 'Nissan',
                'model' => 'Livina',
                'plate_number' => 'B 7789 QRS',
                'year' => 2022,
                'price_per_day' => 270000,
                'status' => 'maintenance',
                'color' => 'Silver',
                'fuel_type' => 'Petrol',
                'transmission' => 'Manual',
                'seat_capacity' => 7,
            ],
            [
                'brand' => 'Nissan',
                'model' => 'X-Trail',
                'plate_number' => 'B 8890 RST',
                'year' => 2023,
                'price_per_day' => 520000,
                'status' => 'available',
                'color' => 'Blue',
                'fuel_type' => 'Petrol',
                'transmission' => 'Automatic',
                'seat_capacity' => 5,
            ],

            // Wuling Series
            [
                'brand' => 'Wuling',
                'model' => 'Cortez',
                'plate_number' => 'B 9901 STU',
                'year' => 2023,
                'price_per_day' => 420000,
                'status' => 'available',
                'color' => 'White',
                'fuel_type' => 'Petrol',
                'transmission' => 'Automatic',
                'seat_capacity' => 7,
            ],

            // Hyundai Series
            [
                'brand' => 'Hyundai',
                'model' => 'Creta',
                'plate_number' => 'B 1012 TUV',
                'year' => 2023,
                'price_per_day' => 480000,
                'status' => 'rented',
                'color' => 'Orange',
                'fuel_type' => 'Petrol',
                'transmission' => 'Automatic',
                'seat_capacity' => 5,
            ],
        ];

        foreach ($cars as $car) {
            Car::create($car);
        }

        $this->command->info('20 data mobil berhasil ditambahkan!');
    }
}
