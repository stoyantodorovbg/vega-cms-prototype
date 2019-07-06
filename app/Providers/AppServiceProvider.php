<?php

namespace App\Providers;

use App\Services\GroupService;
use App\Services\LocaleService;
use App\Services\MessageService;
use App\Services\RouteService;
use App\Services\FileCreateService;
use App\Services\ValidationService;
use App\Repositories\BaseRepository;
use App\Services\FileDestroyService;
use App\Repositories\RouteRepository;
use App\Repositories\GroupRepository;
use Illuminate\Support\ServiceProvider;
use App\Services\Interfaces\GroupServiceInterface;
use App\Services\Interfaces\RouteServiceInterface;
use App\Services\Interfaces\LocaleServiceInterface;
use App\Services\Interfaces\MessageServiceInterface;
use App\Services\Interfaces\FileCreateServiceInterface;
use App\Services\Interfaces\ValidationServiceInterface;
use App\Repositories\Interfaces\BaseRepositoryInterface;
use App\Services\Interfaces\FileDestroyServiceInterface;
use App\Repositories\Interfaces\GroupRepositoryInterface;
use App\Repositories\Interfaces\RouteRepositoryInterface;

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
        $this->app->bind(FileDestroyServiceInterface::class, FileDestroyService::class);
        $this->app->bind(LocaleServiceInterface::class, LocaleService::class);
        $this->app->bind(MessageServiceInterface::class, MessageService::class);

        $this->app->bind(GroupRepositoryInterface::class, GroupRepository::class);
        $this->app->bind(BaseRepositoryInterface::class, BaseRepository::class);
        $this->app->bind(RouteRepositoryInterface::class, RouteRepository::class);
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
