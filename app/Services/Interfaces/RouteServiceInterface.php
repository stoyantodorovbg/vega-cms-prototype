<?php

namespace App\Services\Interfaces;

interface RouteServiceInterface
{
    /**
     * Check if the route properties are unique
     *
     * @param array $data
     * @return mixed
     */
    public function create(array $data);
}
