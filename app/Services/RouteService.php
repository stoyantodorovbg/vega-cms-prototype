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
        $validatedData = $this->validationService->validateRouteProperties($data);

        if ($validatedData === true &&
            ($route = Route::create($data)) &&
            $this->writeRoute($route)
        ) {
            return true;
        }

        return $validatedData;
    }

    /**
     * destroy route
     *
     * @param array $data
     * @return array|bool|mixed
     */
    public function destroy(array $data)
    {
        $validatedData = $this->validationService->validateRouteName($data);

        if ($validatedData === true) {
            $route = Route::where('name', $data['name'])->first();
            $this->eraseRoute($route);
            $route->delete();
        }

        return $validatedData;
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
}
