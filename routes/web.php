<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FlightLogController;
use App\Http\Controllers\RouteController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

require __DIR__.'/auth.php';

Route::middleware(['auth'])->group(function () {

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Route khusus Dispatcher
    Route::middleware(['role:dispatcher'])->group(function () {
        Route::resource('routes', RouteController::class);
    });

    // Route khusus Pilot & Dispatcher
    Route::middleware(['role:pilot'])->group(function () {
        Route::resource('flight-logs', FlightLogController::class)->except(['index']);
    });

    // Route index flight-logs bisa diakses keduanya
    Route::get('/flight-logs', [FlightLogController::class, 'index'])
        ->name('flight-logs.index');
});