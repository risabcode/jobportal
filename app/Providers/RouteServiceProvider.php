<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * Redirect after login
     */
    public const HOME = '/admin';

    /**
     * Register the application's routes.
     */
    public function boot(): void
    {
        $this->routes(function () {

            /*
            |------------------------------------------------------------------
            | Public Website Routes
            |------------------------------------------------------------------
            */
            Route::middleware('web')
                ->group(base_path('routes/web.php'));

            /*
            |------------------------------------------------------------------
            | Admin Routes
            |------------------------------------------------------------------
            */
            Route::middleware('web')
                ->prefix('admin')
                ->group(base_path('routes/admin.php'));
        });
    }
}
