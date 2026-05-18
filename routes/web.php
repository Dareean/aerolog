<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FlightLogController;
use App\Http\Controllers\RouteController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PilotsController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/flights/create', function () {
    return view('flights.create');
})->name('flights.create');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    
    // Pilot management (dispatcher only)
    Route::post('/pilots', [PilotsController::class, 'store'])->name('pilots.store');
    Route::put('/pilots/{pilot}', [PilotsController::class, 'update'])->name('pilots.update');
    Route::post('/pilots/{pilot}/toggle', [PilotsController::class, 'toggle'])->name('pilots.toggle');
    
    Route::post('/flight-logs', [FlightLogController::class, 'store'])->name('flight-logs.store');
    
    Route::post('/api/ai-briefing', [\App\Http\Controllers\AIBriefingController::class, 'generate'])->name('ai-briefing.generate');
});

require __DIR__.'/auth.php';
