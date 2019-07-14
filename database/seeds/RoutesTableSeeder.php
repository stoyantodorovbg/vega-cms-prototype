<?php

use App\Models\Group;
use App\Models\Route;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Artisan;
use App\Services\Interfaces\RouteServiceInterface;

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
        // Guest welcome page
        $routes = $this->routeService->getRoutes();
        if (! $this->routeService->checkForExistingRoute($routes, 'welcome')) {
            Artisan::call('generate:route /welcome get WelcomeController@index welcome web front');
        } else {
            factory(Route::class)->create([
                'url' => '/welcome',
                'method' => 'get',
                'action' => 'WelcomeController@index',
                'name' => 'welcome',
            ]);
        }

        // Ordinary user home page
        $routes = $this->routeService->getRoutes();
        if (! $this->routeService->checkForExistingRoute($routes, 'home')) {
            Artisan::call('generate:route /home get HomeController@index home web front');
            Artisan::call('attach:route-to-group home ordinaryUsers');
        } else {
            $route = factory(Route::class)->create([
                'url' => '/home',
                'method' => 'get',
                'action' => 'HomeController@index',
                'name' => 'home',
            ]);

            Group::where('title', 'ordinaryUsers')->first()->routes()->attach($route->id);
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

        // Admin dashboards index
        $routes = $this->routeService->getRoutes();
        if (! $this->routeService->checkForExistingRoute($routes, 'admin-dashboards.index')) {
            Artisan::call('generate:route /dashboard get DashboardsController@index admin-dashboards.index admin admin');
            Artisan::call('attach:route-to-group admin-dashboards.index admins');
        } else {
            $route = factory(Route::class)->create([
                'url' => '/dashboard',
                'method' => 'get',
                'action' => 'DashboardsController@index',
                'name' => 'admin-dashboards.index',
            ]);

            Group::where('title', 'admins')->first()->routes()->attach($route->id);
        }
    }
}
