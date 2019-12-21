<?php

namespace App\Repositories\Interfaces;

use App\Models\Route;
use Illuminate\Support\Collection;

interface RouteRepositoryInterface
{
    /**
     * Fetch the names of the route groups
     *
     * @param Route $route
     * @return Collection
     */
    public function getRouteGroupsTitles(Route $route): Collection;

    /**
     * Fetch the count of the route groups
     *
     * @param Route $route
     * @return int
     */
    public function getTheRouteGroupsCount(Route $route): int;
}
