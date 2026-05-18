<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\FlightLog;
use App\Models\User;
use App\Models\Route;
use Carbon\Carbon;

class FlightLogSeeder extends Seeder
{
    public function run(): void
    {
        // Get all pilot users to attach the logs to randomly
        $pilots = User::where('role', 'pilot')->get();
        
        // Ensure we have pilots, if not we skip
        if ($pilots->isEmpty()) {
            return;
        }

        // Get routes to randomly assign
        $routes = Route::all();
        if ($routes->isEmpty()) {
            return;
        }

        FlightLog::create([
            'user_id' => $pilots->random()->id,
            'route_id' => $routes->random()->id,
            'aircraft_code' => 'AL-8492',
            'fuel_consumption' => 12400.5,
            'flight_duration' => 120,
            'departure_time' => Carbon::now()->subHours(4),
            'arrival_time' => Carbon::now()->subHours(2),
            'flight_date' => Carbon::now()->subHours(4)->toDateString(),
            'cruise_altitude' => '35,000 ft',
            'landing_rate' => -150,
            'notes' => 'Smooth flight, no issues.',
        ]);

        FlightLog::create([
            'user_id' => $pilots->random()->id,
            'route_id' => $routes->random()->id,
            'aircraft_code' => 'AL-1022',
            'fuel_consumption' => 8500.2,
            'flight_duration' => 95,
            'departure_time' => Carbon::now()->subHours(6)->subMinutes(35),
            'arrival_time' => Carbon::now()->subHours(5),
            'flight_date' => Carbon::now()->subHours(6)->toDateString(),
            'cruise_altitude' => '33,000 ft',
            'landing_rate' => -210,
            'notes' => 'Slight turbulence on approach.',
        ]);

        FlightLog::create([
            'user_id' => $pilots->random()->id,
            'route_id' => $routes->random()->id,
            'aircraft_code' => 'AL-4001',
            'fuel_consumption' => 14000.0,
            'flight_duration' => 180,
            'departure_time' => Carbon::now()->subDays(1)->subHours(3),
            'arrival_time' => Carbon::now()->subDays(1),
            'flight_date' => Carbon::now()->subDays(1)->toDateString(),
            'cruise_altitude' => '37,000 ft',
            'landing_rate' => -550, // HARD LANDING
            'notes' => 'Unexpected downdraft near runway threshold.',
        ]);

        FlightLog::create([
            'user_id' => $pilots->random()->id,
            'route_id' => $routes->random()->id,
            'aircraft_code' => 'AL-9099',
            'fuel_consumption' => 6200.0,
            'flight_duration' => 60,
            'departure_time' => Carbon::now()->subDays(2)->subHours(1),
            'arrival_time' => Carbon::now()->subDays(2),
            'flight_date' => Carbon::now()->subDays(2)->toDateString(),
            'cruise_altitude' => '28,000 ft',
            'landing_rate' => -110,
            'notes' => 'Perfect conditions.',
        ]);
    }
}
