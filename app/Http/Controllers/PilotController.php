<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class PilotController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'username' => ['required', 'string', 'max:255', 'unique:users'],
            'full_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Password::defaults()],
        ]);

        User::create([
            'username' => $request->username,
            'full_name' => $request->full_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'pilot',
            'is_active' => true,
        ]);

        return redirect()->route('dashboard')->with('success', 'Pilot account created successfully.');
    }

    public function update(Request $request, User $pilot)
    {
        if ($pilot->role !== 'pilot') {
            abort(403);
        }

        $request->validate([
            'username' => ['required', 'string', 'max:255', 'unique:users,username,'.$pilot->id],
            'full_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,'.$pilot->id],
        ]);

        $pilot->update([
            'username' => $request->username,
            'full_name' => $request->full_name,
            'email' => $request->email,
        ]);

        return redirect()->route('dashboard')->with('success', 'Pilot account updated successfully.');
    }

    public function destroy(User $pilot)
    {
        if ($pilot->role !== 'pilot') {
            abort(403);
        }

        // Toggle active status (soft delete logic as requested)
        $pilot->update([
            'is_active' => !$pilot->is_active
        ]);

        $status = $pilot->is_active ? 'reactivated' : 'deactivated';
        return redirect()->route('dashboard')->with('success', "Pilot account {$status} successfully.");
    }
}
