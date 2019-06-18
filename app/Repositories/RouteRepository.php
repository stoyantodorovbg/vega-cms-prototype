<?php

namespace App\Repositories;

use App\Models\Route;
use App\Repositories\Interfaces\RouteRepositoryInterface;

class RouteRepository implements RouteRepositoryInterface
{
    /**
     * Create a route if its properties are unique
     *
     * @param $routeData
     * @param $validationData
     * @return mixed
     */
    public function create($routeData, $validationData)
    {
        if($validationData === true) {
            return Route::create($routeData);
        }

        return false;
    }
}
