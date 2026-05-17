<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\FlightLog;
use App\Models\Route;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        if ($user->role === 'pilot') {
            $airports = [
                'WSSS (Changi)',
                'RJTT (Haneda)',
                'RJAA (Narita)',
                'WAFF (Mutiara Sis Aljufri)',
                'WARR (Juanda)',
                'WIII (Soekarno Hatta)'
            ];
            
            $flightLogs = FlightLog::where('user_id', $user->id)->get();
            $totalFlightHours = $flightLogs->sum('flight_duration') / 60; // Assuming duration is in minutes
            $avgLandingRate = $flightLogs->avg('landing_rate') ?? 0;
            
            // Fatigue status logic (dummy basic logic)
            $fatigueStatus = $totalFlightHours > 100 ? 'WARNING' : 'CLEARED TO FLY';
            
            return view('dashboard', compact('airports', 'totalFlightHours', 'avgLandingRate', 'fatigueStatus', 'flightLogs'));
            
        } elseif ($user->role === 'dispatcher') {
            $recentLogs = FlightLog::with(['user', 'route'])->latest()->take(20)->get();
            
            return view('dashboard', compact('recentLogs'));
        }

        return view('dashboard');
    }
}
