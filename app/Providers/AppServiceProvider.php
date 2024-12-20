<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //Gives Super Admins access for all gates
        Gate::before(function ($user, $ability) {
            if ($user->role->name === 'Super Admin') {
                return true;
            }
        });

        Gate::define('delete-records', function ($user) {
            return $user->role->name === 'Admin';
        });

        Gate::define('view-users-page', function ($user) {
            if ($user->role->name === 'Admin') {
                return true;
            }
        });
    }
}
