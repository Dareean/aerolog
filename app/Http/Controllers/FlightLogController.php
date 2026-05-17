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
            'route_id' => 'required|exists:routes,id',
            'aircraft_code' => 'required|string',
            'fuel_consumption' => 'required|numeric',
            'flight_duration' => 'required|integer',
            'flight_date' => 'required|date',
            'notes' => 'nullable|string',
        ]);

        FlightLog::create([
            ...$request->all(),
            'user_id' => auth()->id(),
        ]);

        return redirect()->route('flight-logs.index')
            ->with('success', 'Log penerbangan berhasil ditambahkan!');
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