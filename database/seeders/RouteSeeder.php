<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Route;

class RouteSeeder extends Seeder
{
    public function run(): void
    {
        Route::create([
            'route_code' => 'AL-101',
            'origin_airport' => 'WIII (Soekarno Hatta)',
            'destination_airport' => 'WAFF (Mutiara Sis Aljufri)',
            'airline_name' => 'AeroLog Airlines',
            'estimated_duration' => 150,
        ]);

        Route::create([
            'route_code' => 'AL-202',
            'origin_airport' => 'WARR (Juanda)',
            'destination_airport' => 'WIII (Soekarno Hatta)',
            'airline_name' => 'AeroLog Airlines',
            'estimated_duration' => 90,
        ]);

        Route::create([
            'route_code' => 'AL-303',
            'origin_airport' => 'WSSS (Changi)',
            'destination_airport' => 'RJTT (Haneda)',
            'airline_name' => 'AeroLog Airlines',
            'estimated_duration' => 420,
        ]);

        Route::create([
            'route_code' => 'AL-404',
            'origin_airport' => 'RJAA (Narita)',
            'destination_airport' => 'WSSS (Changi)',
            'airline_name' => 'AeroLog Airlines',
            'estimated_duration' => 430,
        ]);

        Route::create([
            'route_code' => 'AL-505',
            'origin_airport' => 'WAFF (Mutiara Sis Aljufri)',
            'destination_airport' => 'WARR (Juanda)',
            'airline_name' => 'AeroLog Airlines',
            'estimated_duration' => 110,
        ]);
    }
}