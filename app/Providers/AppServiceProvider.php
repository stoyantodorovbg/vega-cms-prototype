<?php

namespace App\Providers;

use App\Services\RouteService;
use App\Repositories\RouteRepository;
use Illuminate\Support\ServiceProvider;
use App\Services\Interfaces\RouteServiceInterface;
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

        $this->app->bind(RouteRepositoryInterface::class, RouteRepository::class);
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
