<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Route;

class RouteSeeder extends Seeder
{
    public function run(): void
    {
        Route::create([
            'route_code' => 'GA-101',
            'origin_airport' => 'WAAA',
            'destination_airport' => 'WIII',
            'airline_name' => 'Garuda Indonesia',
            'estimated_duration' => 120,
        ]);

        Route::create([
            'route_code' => 'GA-202',
            'origin_airport' => 'WIII',
            'destination_airport' => 'WADD',
            'airline_name' => 'Garuda Indonesia',
            'estimated_duration' => 90,
        ]);

        Route::create([
            'route_code' => 'GA-303',
            'origin_airport' => 'WAAA',
            'destination_airport' => 'WABB',
            'airline_name' => 'Garuda Indonesia',
            'estimated_duration' => 60,
        ]);
    }
}