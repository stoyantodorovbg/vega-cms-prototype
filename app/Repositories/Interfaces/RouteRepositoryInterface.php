<?php

namespace App\Repositories\Interfaces;

interface RouteRepositoryInterface
{
    /**
     * Create a route if its properties are unique
     *
     * @param array $data
     * @return mixed
     */
    public function create(array $data);
}
