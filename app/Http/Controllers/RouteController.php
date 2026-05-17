<?php

namespace App\Http\Controllers;

use App\Models\Route;
use Illuminate\Http\Request;

class RouteController extends Controller
{
    public function index()
    {
        $routes = Route::all();
        return view('routes.index', compact('routes'));
    }

    public function create()
    {
        return view('routes.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'route_code' => 'required|unique:routes',
            'origin_airport' => 'required|string',
            'destination_airport' => 'required|string',
            'airline_name' => 'required|string',
            'estimated_duration' => 'required|integer',
        ]);

        Route::create($request->all());

        return redirect()->route('routes.index')
            ->with('success', 'Rute berhasil ditambahkan!');
    }

    public function edit(Route $route)
    {
        return view('routes.edit', compact('route'));
    }

    public function update(Request $request, Route $route)
    {
        $request->validate([
            'route_code' => 'required|unique:routes,route_code,'.$route->id,
            'origin_airport' => 'required|string',
            'destination_airport' => 'required|string',
            'airline_name' => 'required|string',
            'estimated_duration' => 'required|integer',
        ]);

        $route->update($request->all());

        return redirect()->route('routes.index')
            ->with('success', 'Rute berhasil diupdate!');
    }

    public function destroy(Route $route)
    {
        $route->delete();

        return redirect()->route('routes.index')
            ->with('success', 'Rute berhasil dihapus!');
    }
}