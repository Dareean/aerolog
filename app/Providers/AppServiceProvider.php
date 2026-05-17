<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        Gate::define('is-dispatcher', function ($user) {
            return $user->role === 'dispatcher';
        });

        Gate::define('is-pilot', function ($user) {
            return $user->role === 'pilot';
        });
    }
}