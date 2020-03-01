<?php

namespace App\Providers;

use App\Services\RouteService;
use App\Services\GroupService;
use App\Services\PhraseService;
use App\Services\LocaleService;
use App\Services\MessageService;
use App\Services\FileCreateService;
use App\Services\ValidationService;
use App\Repositories\BaseRepository;
use App\Services\FileDestroyService;
use App\Repositories\RouteRepository;
use App\Repositories\GroupRepository;
use Illuminate\Support\ServiceProvider;
use App\Services\EloquentFilterService;
use App\Repositories\DefaultJsonStructureRepository;
use App\Services\Interfaces\GroupServiceInterface;
use App\Services\Interfaces\RouteServiceInterface;
use App\Services\Interfaces\PhraseServiceInterface;
use App\Services\Interfaces\LocaleServiceInterface;
use App\Services\Interfaces\MessageServiceInterface;
use App\Services\Interfaces\FileCreateServiceInterface;
use App\Services\Interfaces\ValidationServiceInterface;
use App\Repositories\Interfaces\BaseRepositoryInterface;
use App\Services\Interfaces\FileDestroyServiceInterface;
use App\Repositories\Interfaces\GroupRepositoryInterface;
use App\Repositories\Interfaces\RouteRepositoryInterface;
use App\Services\Interfaces\EloquentFilterServiceInterface;
use App\Repositories\Interfaces\DefaultJsonStructureRepositoryInterface;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register(): void
    {
        //Services
        $this->app->bind(RouteServiceInterface::class, RouteService::class);
        $this->app->bind(ValidationServiceInterface::class, ValidationService::class);
        $this->app->bind(GroupServiceInterface::class, GroupService::class);
        $this->app->bind(FileCreateServiceInterface::class, FileCreateService::class);
        $this->app->bind(FileDestroyServiceInterface::class, FileDestroyService::class);
        $this->app->bind(LocaleServiceInterface::class, LocaleService::class);
        $this->app->bind(MessageServiceInterface::class, MessageService::class);
        $this->app->bind(PhraseServiceInterface::class, PhraseService::class);
        $this->app->bind(EloquentFilterServiceInterface::class, EloquentFilterService::class);

        //Repositories
        $this->app->bind(GroupRepositoryInterface::class, GroupRepository::class);
        $this->app->bind(BaseRepositoryInterface::class, BaseRepository::class);
        $this->app->bind(RouteRepositoryInterface::class, RouteRepository::class);
        $this->app->bind(DefaultJsonStructureRepositoryInterface::class, DefaultJsonStructureRepository::class);
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
