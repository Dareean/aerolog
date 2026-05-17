<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FlightLogController;
use App\Http\Controllers\RouteController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/flights/create', function () {
    return view('flights.create');
})->name('flights.create');

Route::get('/login', function () {
    return view('auth.login');
})->name('login');
