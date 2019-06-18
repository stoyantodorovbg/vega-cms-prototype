<?php

namespace App\Services;

use App\Models\Interfaces\RouteInterface;
use App\Repositories\Interfaces\RouteRepositoryInterface;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use App\Services\Interfaces\RouteServiceInterface;

class RouteService implements RouteServiceInterface
{
    /**
     * @var RouteRepositoryInterface
     */
    private $routeRepository;

    /**
     * RouteService constructor.
     * @param RouteRepositoryInterface $routeRepository
     */
    public function __construct(RouteRepositoryInterface $routeRepository)
    {
        $this->routeRepository = $routeRepository;
    }

    /**
     * Create a route
     *
     * @param array $data
     * @return mixed
     */
    public function create(array $data)
    {
        $validatedData = $this->validateRouteProperties($data);

        if (($route = $this->routeRepository->create($data, $validatedData)) && $this->writeRoute($route)) {
            return true;
        }

        return $validatedData;
    }

    /**
     * Check if the route properties are unique
     *
     * @param array $data
     * @return mixed
     */
    public function validateRouteProperties(array $data)
    {
        $validator = Validator::make($data, [
            'url' => ['required', 'unique:routes,url', 'regex:/^\/[A-Za-z1-9-_\/{}]*$/'],
            'method' => ['required', 'string'],
            'action' => ['required', 'unique:routes,action', 'regex:/^[A-Za-z]*@[A-Z-a-z1-9]*$/'],
            'name' => ['required', 'unique:routes,name', 'regex:/^[A-Za-z.\-_1-9]*$/'],
            'type' => ['required', 'string'],
        ]);

        if($validator->fails()) {
            return $validator->errors()->all();
        }

        return true;
    }

    /**
     * Write a route in a route file
     *
     * @param RouteInterface $route
     * @return bool
     */
    protected function writeRoute(RouteInterface $route): bool
    {
        if (! $this->checkForExistingRoute($this->getRouteFile($route->type), $route)) {
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
                        dd([$item , $route->url, $route->method, $route->name, $rowArray]);
                        return true;
                    }
                }
            }
        }

        return false;
    }

    /**
     * Get the required route file
     *
     * @param string $routeType
     * @return array
     */
    protected function getRouteFile(string $routeType): array
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
