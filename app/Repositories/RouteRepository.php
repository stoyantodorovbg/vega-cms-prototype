<?php

namespace App\Repositories;

use App\Models\Route;
use App\Services\Interfaces\RouteServiceInterface;
use App\Repositories\Interfaces\RouteRepositoryInterface;

class RouteRepository implements RouteRepositoryInterface
{
    /**
     * Create a route if its properties are unique
     *
     * @param array $data
     * @return mixed
     */
    public function create(array $data)
    {
        $validationData = resolve(RouteServiceInterface::class)->validateRouteProperties($data);

        if($validationData === true) {
            Route::create($data);
        }

        return $validationData;
    }
}
