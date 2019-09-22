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
        $this->createRoute('/welcome',
            'get',
            'WelcomeController@index',
            'welcome',
            'web',
            'front'
        );

        // Ordinary user home page
        $this->createRoute('/home',
            'get',
            'HomeController@index',
            'home',
            'web',
            'front',
            'ordinaryUsers'
        );

        // Set locale
        $this->createRoute('/set-locale',
            'post',
            'LocalesController@setLocale',
            'locales.set-locale',
            'web',
            'front'
        );

        // Admin dashboards index
        $this->createRoute('/dashboard',
            'get',
            'DashboardsController@index',
            'admin-dashboards.index',
            'admin',
            'admin',
            'admins'
        );

        // Admin groups index
        $this->createRoute('/groups',
            'get',
            'GroupsController@index',
            'admin-groups.index',
            'admin',
            'admin',
            'admins'
        );

        // API Models index
        $this->createRoute('/admin/index',
            'get',
            'Admin\\\IndexController@data',
            'api-admin.index',
            'api',
            'api',
            'admins'
        );
    }

    /**
     * Create a route
     *
     * @param string $url
     * @param string $method
     * @param string $action
     * @param string $name
     * @param string $routeType
     * @param string $actionType
     * @param string $groupName
     */
    protected function createRoute(string $url,
                                   string $method,
                                   string $action,
                                   string $name,
                                   string $routeType,
                                   string $actionType,
                                   string $groupName = ''
    ): void {
        $routes = $this->routeService->getRoutes();
        if (! $this->routeService->checkForExistingRoute($routes, $name)) {
            Artisan::call("generate:route $url $method $action $name $routeType $actionType");
            if($groupName) {
                Artisan::call("attach:route-to-group $name $groupName");
            }
        } else {
            $route = factory(Route::class)->create([
                'url' => $url,
                'method' => $method,
                'action' => $action,
                'name' => $name,
            ]);

            if ($groupName) {
                Group::where('title', $groupName)->first()->routes()->attach($route->id);
            }
        }
    }
}
