<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FlightLogController;
use App\Http\Controllers\RouteController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/flights/create', function () {
    return view('flights.create');
})->name('flights.create');

Route::get('/login', function () {
    return view('auth.login');
})->name('login');
