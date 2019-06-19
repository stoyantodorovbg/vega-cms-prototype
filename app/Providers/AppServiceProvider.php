<?php

namespace App\Providers;

use App\Services\RouteService;
use App\Services\ValidationService;
use App\Repositories\RouteRepository;
use Illuminate\Support\ServiceProvider;
use App\Services\Interfaces\RouteServiceInterface;
use App\Services\Interfaces\ValidationServiceInterface;
use App\Repositories\Interfaces\RouteRepositoryInterface;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(RouteServiceInterface::class, RouteService::class);
        $this->app->bind(ValidationServiceInterface::class, ValidationService::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
