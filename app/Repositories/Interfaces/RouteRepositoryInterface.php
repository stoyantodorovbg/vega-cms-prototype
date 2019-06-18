<?php

namespace App\Repositories\Interfaces;

interface RouteRepositoryInterface
{
    /**
     * Create a route if its properties are unique
     *
     * @param $routeData
     * @param $validationData
     * @return mixed
     */
    public function create($routeData, $validationData);
}
