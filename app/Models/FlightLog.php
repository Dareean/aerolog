<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FlightLog extends Model
{
    protected $fillable = [
        'user_id',
        'route_id',
        'aircraft_code',
        'fuel_consumption',
        'flight_duration',
        'flight_date',
        'notes',
        'cruise_altitude',
        'landing_rate',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function route()
    {
        return $this->belongsTo(Route::class);
    }
}