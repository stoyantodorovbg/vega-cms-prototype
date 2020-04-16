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

        // Admin groups show
        $this->createRoute('/groups/{group}',
            'get',
            'GroupsController@show',
            'admin-groups.show',
            'admin',
            'admin',
            'admins'
        );

        // Admin groups create
        $this->createRoute('/groups/create',
            'get',
            'GroupsController@create',
            'admin-groups.create',
            'admin',
            'admin',
            'admins'
        );

        // Admin groups store
        $this->createRoute('/groups/store',
            'post',
            'GroupsController@store',
            'admin-groups.store',
            'admin',
            'admin',
            'admins'
        );

//        // Admin groups edit
//        $this->createRoute('/groups/{group}/edit',
//            'get',
//            'GroupsController@edit',
//            'admin-groups.edit',
//            'admin',
//            'admin',
//            'admins'
//        );
//
//        // Admin groups update
//        $this->createRoute('/groups/{group}/update',
//            'patch',
//            'GroupsController@update',
//            'admin-groups.update',
//            'admin',
//            'admin',
//            'admins'
//        );

        // Admin users index
        $this->createRoute('/users',
            'get',
            'UsersController@index',
            'admin-users.index',
            'admin',
            'admin',
            'admins'
        );

        // Admin users show
        $this->createRoute('/users/{user}',
            'get',
            'UsersController@show',
            'admin-users.show',
            'admin',
            'admin',
            'admins'
        );

        // Admin users create
        $this->createRoute('/users/create',
            'get',
            'UsersController@create',
            'admin-users.create',
            'admin',
            'admin',
            'admins'
        );

        // Admin users store
        $this->createRoute('/users/store',
            'post',
            'UsersController@store',
            'admin-users.store',
            'admin',
            'admin',
            'admins'
        );

        // Admin users edit
        $this->createRoute('/users/{user}/edit',
            'get',
            'UsersController@edit',
            'admin-users.edit',
            'admin',
            'admin',
            'admins'
        );

        // Admin users update
        $this->createRoute('/users/{user}/update',
            'patch',
            'UsersController@update',
            'admin-users.update',
            'admin',
            'admin',
            'admins'
        );

        // Admin phrases index
        $this->createRoute('/phrases',
            'get',
            'PhrasesController@index',
            'admin-phrases.index',
            'admin',
            'admin',
            'admins'
        );

        // Admin phrases show
        $this->createRoute('/phrases/{phrase}',
            'get',
            'PhrasesController@show',
            'admin-phrases.show',
            'admin',
            'admin',
            'admins'
        );

        // Admin phrases create
        $this->createRoute('/phrases/create',
            'get',
            'PhrasesController@create',
            'admin-phrases.create',
            'admin',
            'admin',
            'admins'
        );

        // Admin phrases store
        $this->createRoute('/phrases/store',
            'post',
            'PhrasesController@store',
            'admin-phrases.store',
            'admin',
            'admin',
            'admins'
        );

        // Admin phrases edit
        $this->createRoute('/phrases/{phrase}/edit',
            'get',
            'PhrasesController@edit',
            'admin-phrases.edit',
            'admin',
            'admin',
            'admins'
        );

        // Admin phrases update
        $this->createRoute('/phrases/{phrase}/update',
            'patch',
            'PhrasesController@update',
            'admin-phrases.update',
            'admin',
            'admin',
            'admins'
        );

        // Admin locales index
        $this->createRoute('/locales',
            'get',
            'LocalesController@index',
            'admin-locales.index',
            'admin',
            'admin',
            'admins'
        );

        // Admin locales show
        $this->createRoute('/locales/{locale}',
            'get',
            'LocalesController@show',
            'admin-locales.show',
            'admin',
            'admin',
            'admins'
        );

        // Admin locales create
        $this->createRoute('/locales/create',
            'get',
            'LocalesController@create',
            'admin-locales.create',
            'admin',
            'admin',
            'admins'
        );

        // Admin locales store
        $this->createRoute('/locales/store',
            'post',
            'LocalesController@store',
            'admin-locales.store',
            'admin',
            'admin',
            'admins'
        );

        // Admin locales edit
        $this->createRoute('/locales/{locale}/edit',
            'get',
            'LocalesController@edit',
            'admin-locales.edit',
            'admin',
            'admin',
            'admins'
        );

        // Admin locales update
        $this->createRoute('/locales/{locale}/update',
            'patch',
            'LocalesController@update',
            'admin-locales.update',
            'admin',
            'admin',
            'admins'
        );

        // Admin routes index
        $this->createRoute('/routes',
            'get',
            'RoutesController@index',
            'admin-routes.index',
            'admin',
            'admin',
            'admins'
        );

        // Admin routes show
        $this->createRoute('/routes/{route}',
            'get',
            'RoutesController@show',
            'admin-routes.show',
            'admin',
            'admin',
            'admins'
        );

        // Admin routes create
        $this->createRoute('/routes/create',
            'get',
            'RoutesController@create',
            'admin-routes.create',
            'admin',
            'admin',
            'admins'
        );

        // Admin routes store
        $this->createRoute('/routes/store',
            'post',
            'RoutesController@store',
            'admin-routes.store',
            'admin',
            'admin',
            'admins'
        );

        // Admin routes edit
        $this->createRoute('/routes/{route}/edit',
            'get',
            'RoutesController@edit',
            'admin-routes.edit',
            'admin',
            'admin',
            'admins'
        );

        // Admin routes update
        $this->createRoute('/routes/{route}/update',
            'patch',
            'RoutesController@update',
            'admin-routes.update',
            'admin',
            'admin',
            'admins'
        );

        // Admin menus index
        $this->createRoute('/menus',
            'get',
            'MenusController@index',
            'admin-menus.index',
            'admin',
            'admin',
            'admins'
        );

        // Admin menus show
        $this->createRoute('/menus/{menu}',
            'get',
            'MenusController@show',
            'admin-menus.show',
            'admin',
            'admin',
            'admins'
        );

        // Admin menus create
        $this->createRoute('/menus/create',
            'get',
            'MenusController@create',
            'admin-menus.create',
            'admin',
            'admin',
            'admins'
        );

        // Admin menus store
        $this->createRoute('/menus/store',
            'post',
            'MenusController@store',
            'admin-menus.store',
            'admin',
            'admin',
            'admins'
        );

        // Admin menus edit
        $this->createRoute('/menus/{menu}/edit',
            'get',
            'MenusController@edit',
            'admin-menus.edit',
            'admin',
            'admin',
            'admins'
        );

        // Admin menus update
        $this->createRoute('/menus/{menu}/update',
            'patch',
            'MenusController@update',
            'admin-menus.update',
            'admin',
            'admin',
            'admins'
        );

        // Admin menu items index
        $this->createRoute('/menu-items/index/{menu}/{menuItem}',
            'get',
            'MenuItemsController@index',
            'admin-menu-items.index',
            'admin',
            'admin',
            'admins'
        );

        // Admin menu items create
        $this->createRoute('/menu-items/create',
            'get',
            'MenuItemsController@create',
            'admin-menu-items.create',
            'admin',
            'admin',
            'admins'
        );

        // Admin menu items show
        $this->createRoute('/menu-items/{menuItem}',
            'get',
            'MenuItemsController@show',
            'admin-menu-items.show',
            'admin',
            'admin',
            'admins'
        );

        // Admin menu items store
        $this->createRoute('/menu-items/store',
            'post',
            'MenuItemsController@store',
            'admin-menu-items.store',
            'admin',
            'admin',
            'admins'
        );

        // Admin menu items edit
        $this->createRoute('/menu-items/{menuItem}/edit',
            'get',
            'MenuItemsController@edit',
            'admin-menu-items.edit',
            'admin',
            'admin',
            'admins'
        );

        // Admin menu items update
        $this->createRoute('/menu-items/{menuItem}/update',
            'patch',
            'MenuItemsController@update',
            'admin-menu-items.update',
            'admin',
            'admin',
            'admins'
        );

        // Admin pages index
        $this->createRoute('/pages',
            'get',
            'PagesController@index',
            'admin-pages.index',
            'admin',
            'admin',
            'admins'
        );

        // Admin pages create
        $this->createRoute('/pages/create',
            'get',
            'PagesController@create',
            'admin-pages.create',
            'admin',
            'admin',
            'admins'
        );

        // Admin pages show
        $this->createRoute('/pages/{page}',
            'get',
            'PagesController@show',
            'admin-pages.show',
            'admin',
            'admin',
            'admins'
        );

        // Admin pages store
        $this->createRoute('/pages/store',
            'post',
            'PagesController@store',
            'admin-pages.store',
            'admin',
            'admin',
            'admins'
        );

        // Admin pages edit
        $this->createRoute('/pages/{page}/edit',
            'get',
            'PagesController@edit',
            'admin-pages.edit',
            'admin',
            'admin',
            'admins'
        );

        // Admin pages update
        $this->createRoute('/pages/{page}/update',
            'patch',
            'PagesController@update',
            'admin-pages.update',
            'admin',
            'admin',
            'admins'
        );

        // Admin containers index
        $this->createRoute('/containers',
            'get',
            'ContainersController@index',
            'admin-containers.index',
            'admin',
            'admin',
            'admins'
        );

        // Admin containers show
        $this->createRoute('/containers/{container}',
            'get',
            'ContainersController@show',
            'admin-containers.show',
            'admin',
            'admin',
            'admins'
        );

        // Admin containers create
        $this->createRoute('/containers/create',
            'get',
            'ContainersController@create',
            'admin-containers.create',
            'admin',
            'admin',
            'admins'
        );

        // Admin containers store
        $this->createRoute('/containers/store',
            'post',
            'ContainersController@store',
            'admin-containers.store',
            'admin',
            'admin',
            'admins'
        );

        // Admin containers edit
        $this->createRoute('/containers/{container}/edit',
            'get',
            'ContainersController@edit',
            'admin-containers.edit',
            'admin',
            'admin',
            'admins'
        );

        // Admin containers update
        $this->createRoute('/containers/{container}/update',
            'patch',
            'ContainersController@update',
            'admin-containers.update',
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

        // API Models destroy
        $this->createRoute('/admin/destroy',
            'delete',
            'Admin\\\DeleteController@destroy',
            'api-admin.destroy',
            'api',
            'api',
            'admins'
        );

        // API Menu get data
        $this->createRoute('/menu',
            'get',
            'MenuController@getData',
            'api.menu-data',
            'api',
            'api'
        );

        // API Derived Input get data
        $this->createRoute('/derived-input-data',
            'get',
            'DerivedDataController@getModelsData',
            'api.derived-input-data',
            'api',
            'api'
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
