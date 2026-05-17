<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Route extends Model
{
    protected $fillable = [
        'route_code',
        'origin_airport',
        'destination_airport',
        'airline_name',
        'estimated_duration',
    ];

    public function flightLogs()
    {
        return $this->hasMany(FlightLog::class);
    }
}