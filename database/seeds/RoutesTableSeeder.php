<?php

use App\Models\Group;
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
        if (! $this->routeService->checkForExistingRoute($routes, 'home')) {
            Artisan::call('generate:route /home get HomeController@index home web front');
        } else {
            factory(Route::class)->create([
                'url' => '/home',
                'method' => 'get',
                'action' => 'HomeController@index',
                'name' => 'home',
            ]);
        }

        // Set locale
        $routes = $this->routeService->getRoutes();
        if (! $this->routeService->checkForExistingRoute($routes, 'locales.set-locale')) {
            Artisan::call('generate:route /set-locale post LocalesController@setLocale locales.set-locale web front');
        } else {
            factory(Route::class)->create([
                'url' => '/set-locale',
                'method' => 'post',
                'action' => 'LocaleController@setLocale',
                'name' => 'locales.set-locale',
            ]);
        }

        // Admin dashboard index
        $routes = $this->routeService->getRoutes();
        if (! $this->routeService->checkForExistingRoute($routes, 'admin-dashboard.index')) {
            Artisan::call('generate:route /dashboard get DashboardsController@index admin-dashboard.index admin admin');
            Artisan::call('attach:route-to-group admin-dashboard.index admins');
        } else {
            $route = factory(Route::class)->create([
                'url' => '/dashboard',
                'method' => 'get',
                'action' => 'DashboardsController@index',
                'name' => 'admin-dashboard.index',
            ]);

            Group::where('title', 'admins')->first()->routes()->attach($route->id);
        }
    }
}
