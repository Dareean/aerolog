<?php

namespace App\Http\Controllers;

use App\Models\FlightLog;
use App\Models\Route;
use Illuminate\Http\Request;

class FlightLogController extends Controller
{
    public function index()
    {
        if (auth()->user()->role === 'dispatcher') {
            $flightLogs = FlightLog::with(['user', 'route'])->get();
        } else {
            $flightLogs = FlightLog::with(['user', 'route'])
                ->where('user_id', auth()->id())
                ->get();
        }

        return view('flight-logs.index', compact('flightLogs'));
    }

    public function create()
    {
        $routes = Route::all();
        return view('flight-logs.create', compact('routes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'origin_airport' => 'required|string',
            'destination_airport' => 'required|string',
            'aircraft_code' => 'required|string',
            'fuel_consumption' => 'required|numeric',
            'departure_time' => 'required|date',
            'arrival_time' => 'required|date|after:departure_time',
            'cruise_altitude' => 'nullable|string',
            'landing_rate' => 'nullable|integer',
            'notes' => 'nullable|string',
        ]);

        $departure = \Carbon\Carbon::parse($request->departure_time);
        $arrival = \Carbon\Carbon::parse($request->arrival_time);
        $durationMinutes = $departure->diffInMinutes($arrival);
        $flightDate = $departure->toDateString();

        $route = Route::firstOrCreate(
            [
                'origin_airport' => $request->origin_airport,
                'destination_airport' => $request->destination_airport,
            ],
            [
                'route_code' => 'AL-USR',
                'airline_name' => 'AeroLog Airlines',
                'estimated_duration' => $durationMinutes, // Use actual duration as estimate if new
            ]
        );

        FlightLog::create([
            'route_id' => $route->id,
            'aircraft_code' => $request->aircraft_code,
            'fuel_consumption' => $request->fuel_consumption,
            'flight_duration' => $durationMinutes,
            'departure_time' => $departure,
            'arrival_time' => $arrival,
            'flight_date' => $flightDate,
            'cruise_altitude' => $request->cruise_altitude,
            'landing_rate' => $request->landing_rate,
            'notes' => $request->notes,
            'user_id' => auth()->id(),
        ]);

        return redirect()->route('dashboard')
            ->with('success', 'Flight log submitted successfully!');
    }

    public function show(FlightLog $flightLog)
    {
        return view('flight-logs.show', compact('flightLog'));
    }

    public function edit(FlightLog $flightLog)
    {
        $routes = Route::all();
        return view('flight-logs.edit', compact('flightLog', 'routes'));
    }

    public function update(Request $request, FlightLog $flightLog)
    {
        $request->validate([
            'route_id' => 'required|exists:routes,id',
            'aircraft_code' => 'required|string',
            'fuel_consumption' => 'required|numeric',
            'flight_duration' => 'required|integer',
            'flight_date' => 'required|date',
            'notes' => 'nullable|string',
        ]);

        $flightLog->update($request->all());

        return redirect()->route('flight-logs.index')
            ->with('success', 'Log penerbangan berhasil diupdate!');
    }

    public function destroy(FlightLog $flightLog)
    {
        $flightLog->delete();

        return redirect()->route('flight-logs.index')
            ->with('success', 'Log penerbangan berhasil dihapus!');
    }
}