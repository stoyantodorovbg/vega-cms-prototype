<?php

namespace App\Repositories\Interfaces;

use App\Models\Interfaces\RouteInterface;
use Illuminate\Database\Eloquent\Collection;

interface RouteRepositoryInterface
{
    /**
     * Fetch the names of the route groups
     *
     * @param RouteInterface $route
     * @return Collection
     */
    public function getRouteGroupsNames(RouteInterface $route): Collection;

    /**
     * Fetch the count of the route groups
     *
     * @param RouteInterface $route
     * @return int
     */
    public function getTheRouteGroupsCount(RouteInterface $route): int;
}
