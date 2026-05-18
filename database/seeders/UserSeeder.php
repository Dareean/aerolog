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
            'username' => 'tenri',
            'full_name' => 'Capt. Andi Besse Opu Tenri',
            'email' => 'tenri@aerolog.com',
            'password' => Hash::make('password'),
            'role' => 'pilot',
        ]);

        User::create([
            'username' => 'dareean',
            'full_name' => 'Capt. Dareean A. Raffi Mardin',
            'email' => 'dareean@aerolog.com',
            'password' => Hash::make('password'),
            'role' => 'pilot',
        ]);

        User::create([
            'username' => 'dimas',
            'full_name' => 'Capt. Muh. Dimas Syahputra',
            'email' => 'dimas@aerolog.com',
            'password' => Hash::make('password'),
            'role' => 'pilot',
        ]);

        User::create([
            'username' => 'fadil',
            'full_name' => 'Capt. Moh. Afadil Agis Pratama',
            'email' => 'fadil@aerolog.com',
            'password' => Hash::make('password'),
            'role' => 'pilot',
        ]);
    }
}