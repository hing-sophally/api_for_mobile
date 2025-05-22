<?php

namespace App\Providers;

use Illuminate\Support\Facades\Route;

use Illuminate\Support\ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $this->mapApiRoutes();
        $this->mapWebRoutes();
        $this->mapCustomRoutes();
    }

    protected function mapApiRoutes(): void
    {
        Route::middleware('api')
            ->prefix('api')
            ->group(base_path('routes/api.php'));
    }


    protected function mapWebRoutes(): void
    {
        Route::middleware('web')
            ->group(base_path('routes/web.php'));
    }

    protected function mapCustomRoutes(): void
    {
        Route::middleware('api')
            ->prefix('api')
            ->group(base_path('routes/myroutes.php')); // fixed to point to myroutes.php
    }
}
