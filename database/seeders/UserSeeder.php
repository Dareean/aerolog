<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'username' => 'dispatcher_admin',
            'full_name' => 'Dispatcher Admin',
            'email' => 'dispatcher@aerolog.com',
            'password' => Hash::make('password'),
            'role' => 'dispatcher',
        ]);

        User::create([
            'username' => 'dareean89',
            'full_name' => 'Capt. Dareean',
            'email' => 'pilot@aerolog.com',
            'password' => Hash::make('password'),
            'role' => 'pilot',
        ]);
    }
}