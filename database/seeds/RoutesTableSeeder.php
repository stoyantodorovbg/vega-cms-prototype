<?php

use App\Models\Route;
use App\Services\Interfaces\RouteServiceInterface;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Artisan;

class RoutesTableSeeder extends Seeder
{
    /**
     * @var RouteServiceInterface
     */
    protected $routeService;

    /**
     * GroupsTableSeeder constructor.
     * @param RouteServiceInterface $routeService
     */
    public function __construct(RouteServiceInterface $routeService)
    {
        $this->routeService = $routeService;
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        // Set locale
        $routes = $this->routeService->getRoutes();
        if (! $this->routeService->checkForExistingRoute($routes, 'locales.set-locale')) {
            Artisan::call('generate:route /set-locale post LocaleController@setLocale locales.set-locale web front');
        } else {
            factory(Route::class)->create([
                'url' => '/set-locale',
                'method' => 'post',
                'action' => 'LocaleController@setLocale',
                'name' => 'locales.set-locale',
            ]);
        }
    }
}
