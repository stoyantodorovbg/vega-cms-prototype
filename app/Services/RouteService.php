<?php

namespace App\Services;

use App\Models\Route;
use App\Models\Interfaces\RouteInterface;
use App\Services\Interfaces\RouteServiceInterface;
use App\Services\Interfaces\ValidationServiceInterface;

class RouteService implements RouteServiceInterface
{
    /**
     * @var ValidationServiceInterface
     */
    protected $validationService;

    /**
     * RouteService constructor.
     * @param ValidationServiceInterface $validationService
     */
    public function __construct(
        ValidationServiceInterface $validationService
    ) {
        $this->validationService = $validationService;
    }

    /**
     * Create a route
     *
     * @param array $data
     * @return mixed
     */
    public function create(array $data)
    {
        $validatedData = $this->validationService->validate(
            $data,
            ['url', 'method', 'action', 'name', 'type'],
            'route',
            'create'
        );

        if ($validatedData === true &&
            ($route = Route::create($data)) &&
            $this->writeRoute($route)
        ) {
            return true;
        }

        return $validatedData;
    }

    /**
     * Destroy route
     *
     * @param array $data
     * @return array|bool
     */
    public function destroy(array $data)
    {
        $validatedData = $this->validationService->validate(
            $data,
            ['name'],
            'route',
            'destroy'
        );

        if ($validatedData === true) {
            $route = Route::where('name', $data['name'])->first();
            $this->eraseRoute($route);
            $route->delete();
        }

        return $validatedData;
    }

    /**
     * Synchronize routes
     *
     * @return array
     */
    public function synchronize(): array
    {
        $feedback = [];

        foreach (config('filesystems.route_types') as $routeType) {
            $feedback[] = $this->synchronizeDBRoutes($routeType);
            $feedback[] = $this->synchronizeFile($routeType);
        }

        return $feedback;
    }

    /**
     * Make the route accessible for the group members
     *
     * @param array $data
     * @return mixed
     */
    public function addRouteToGroup(array $data)
    {
        $validatedDataRoute = $this->validationService->validate($data, ['name'], 'route');
        $validatedDataGroup = $this->validationService->validate($data, ['title'], 'group');

        if ($validatedDataRoute === true && $validatedDataGroup === true) {

            return true;
        }

        $result = [];

        if (is_array($validatedDataRoute)) {
            array_merge($result, $validatedDataRoute);
        }

        if (is_array($validatedDataGroup)) {
            array_merge($result, $validatedDataGroup);
        }

        return $result;
    }

    /**
     * Write a route in a route file
     *
     * @param RouteInterface $route
     * @return bool
     */
    protected function writeRoute(RouteInterface $route): bool
    {
        if (! $this->checkForExistingRoute($this->getRoutes($route->type), $route)) {
            file_put_contents($this->getRoutePath($route->type), $this->createRouteString($route), FILE_APPEND);

            return true;
        }

        return false;
    }

    /**
     * Check for route collision in the appropriate route file
     *
     * @param array $fileContent
     * @param RouteInterface $route
     * @return bool
     */
    protected function checkForExistingRoute(array $fileContent, RouteInterface $route): bool
    {
        foreach ($fileContent as $row) {
            if ($row) {
                $rowArray = explode($row, "'");

                foreach($rowArray as $item) {
                    if($item === $route->url || $item === $route->method || $item === $route->name) {
                        return true;
                    }
                }
            }
        }

        return false;
    }

    /**
     * Erase a route from the route file if it exists
     *
     * @param RouteInterface $route
     * @return void
     */
    protected function eraseRoute(RouteInterface $route): void
    {
        $routesArray = $this->getRoutes($route->type);

        if($routesArray) {
            foreach ($routesArray as $key => $routeLine) {
                if(strpos($routeLine, $route->name) !== false) {
                    break;
                }
            }

            unset($routesArray[$key]);

            file_put_contents($this->getRoutePath($route->type), '');

            foreach ($routesArray as $line) {
                file_put_contents($this->getRoutePath($route->type), "$line\n", FILE_APPEND);
            }
        }
    }

    /**
     * Get the routes from the required route file
     *
     * @param string $routeType
     * @return array
     */
    protected function getRoutes(string $routeType): array
    {
        return file($this->getRoutePath($routeType), FILE_IGNORE_NEW_LINES);
    }

    /**
     * Get the path to the route file
     *
     * @param string $routeType
     * @return string
     */
    protected function getRoutePath(string $routeType): string
    {
        return base_path(). '/routes/' . $routeType . '.php';
    }

    /**
     * Create a route string from the stored route data
     *
     * @param RouteInterface $route
     * @return string
     */
    protected function createRouteString(RouteInterface $route): string
    {
        return "Route::$route->method('$route->url', '$route->action')->name('$route->name');\n";
    }

    /**
     * Synchronize routes for a route file
     *
     * @param string $routeType
     * @return array
     */
    protected function synchronizeFile(string $routeType): array
    {
        $routes = $this->getRoutes($routeType);

        $feedback = [];

        foreach ($routes as $route) {
            $routeName = $this->getRouteSubstr($route, "/->name\('.+'/", "'");

            if($routeName &&
                ($method = $this->getRouteSubstr(
                    $route,
                    '/[a-z]*\(/',
                    '('
                )) &&
                ($url = $this->getRouteSubstr(
                    $route,
                    "/Route::[a-z]+\('[\/a-zA-Z0-9{}]+'/",
                    "'"
                )) &&
                ($action = $this->getRouteSubstr(
                    $route,
                    "/Route::[a-z]+\('[\/a-zA-Z0-9{}]+'.+'[a-zA-Z@0-9]+'/",
                    "'"
                )) &&
                ! Route::where('name', $routeName)->first()
            ) {
                $route = Route::create([
                    'method' => $method,
                    'url' => $url,
                    'action' => $action,
                    'name' => $routeName,
                    'type' => $routeType,
                ]);

                $feedback[] = $this->synchronizedRouteFeedback($route, 'DB');
            }
        }

        return $feedback;
    }

    /**
     * Get a key part of the route string
     *
     * @param string $route
     * @param string $regex
     * @param string $delimiter
     * @return bool|mixed
     */
    protected function getRouteSubstr(string $route, string $regex, string $delimiter)
    {
       preg_match($regex, $route, $result);

        if(isset($result[0])) {
            $routeArr = explode($delimiter, $result[0]);
            array_pop($routeArr);

            return end($routeArr);
        }

        return false;
    }

    /**
     * If a route is stored in DB but is missing in the route files,
     * the method writes it in a route file
     *
     * @param string $routeType
     * @return array
     */
    protected function synchronizeDBRoutes(string $routeType): array
    {
        $dbRoutes = Route::where('type', $routeType)->get();
        $fileRoutes = $this->getRoutes($routeType);

        $fileRouteNames = $this->getFileRouteNames($fileRoutes);

        $feedback = [];

        foreach ($dbRoutes as $dbRoute) {
            if (! array_key_exists($dbRoute->name, $fileRouteNames)) {
                $this->writeRoute($dbRoute);
                $feedback[] = $this->synchronizedRouteFeedback($dbRoute, $dbRoute->type . '.php');
            }
        }

        return $feedback;
    }

    /**
     * Get the names of all routes in a route file
     *
     * @param array $routes
     * @return array
     */
    protected function getFileRouteNames(array $routes): array
    {
        $fileRouteNames = [];

        foreach ($routes as $route) {
            $fileRouteNames[] = $this->getRouteSubstr($route, "/->name\('.+'/", "'");
        }

        return $fileRouteNames;
    }

    /**
     * Create a feedback for a synchronized route
     *
     * @param Route $route
     * @return string
     */
    protected function synchronizedRouteFeedback(Route $route, string $location): string
    {
        return 'A route with name ' . $route->name .
            ', url ' . $route->url .
            ', action ' . $route->action .
            ' is stored in ' . $location . '.';
    }
}
