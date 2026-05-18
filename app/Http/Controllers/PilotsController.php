<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class PilotsController extends Controller
{
    protected function ensureDispatcher()
    {
        if (auth()->guest() || auth()->user()->role !== 'dispatcher') {
            abort(403);
        }
    }

    public function store(Request $request)
    {
        $this->ensureDispatcher();

        $data = $request->validate([
            'full_name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8',
        ]);

        $pilot = User::create([
            'username' => strtolower(preg_replace('/[^a-z0-9]+/i', '_', explode(' ', $data['full_name'])[0])) . time(),
            'full_name' => $data['full_name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'role' => 'pilot',
            'is_active' => $request->boolean('is_active', true),
        ]);

        return redirect(url()->previous() . '#pilot-management')->with('success', 'Pilot account created.');
    }

    public function update(Request $request, User $pilot)
    {
        $this->ensureDispatcher();

        if ($pilot->role !== 'pilot') {
            abort(404);
        }

        $data = $request->validate([
            'full_name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $pilot->id,
            'password' => 'nullable|string|min:8',
            'is_active' => 'nullable|boolean',
        ]);

        $pilot->full_name = $data['full_name'];
        $pilot->email = $data['email'];
        if (!empty($data['password'])) {
            $pilot->password = Hash::make($data['password']);
        }
        if (isset($data['is_active'])) {
            $pilot->is_active = (bool) $data['is_active'];
        }

        $pilot->save();

        return redirect(url()->previous() . '#pilot-management')->with('success', 'Pilot account updated.');
    }

    public function toggle(Request $request, User $pilot)
    {
        $this->ensureDispatcher();

        if ($pilot->role !== 'pilot') {
            abort(404);
        }

        $pilot->is_active = !$pilot->is_active;
        $pilot->save();

        return redirect(url()->previous() . '#pilot-management')->with('success', 'Pilot account status updated.');
    }
}
