<?php

namespace App\Providers;

use App\Services\GroupService;
use App\Services\RouteService;
use App\Services\FileCreateService;
use App\Services\ValidationService;
use App\Repositories\GroupRepository;
use Illuminate\Support\ServiceProvider;
use App\Services\Interfaces\GroupServiceInterface;
use App\Services\Interfaces\RouteServiceInterface;
use App\Services\Interfaces\FileCreateServiceInterface;
use App\Services\Interfaces\ValidationServiceInterface;
use App\Repositories\Interfaces\GroupRepositoryInterface;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->app->bind(RouteServiceInterface::class, RouteService::class);
        $this->app->bind(ValidationServiceInterface::class, ValidationService::class);
        $this->app->bind(GroupServiceInterface::class, GroupService::class);
        $this->app->bind(FileCreateServiceInterface::class, FileCreateService::class);

        $this->app->bind(GroupRepositoryInterface::class, GroupRepository::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(): void
    {
        //
    }
}
