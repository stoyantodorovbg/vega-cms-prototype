<?php

namespace App\Repositories;

use App\Models\Route;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Collection;
use App\Repositories\Interfaces\RouteRepositoryInterface;

class RouteRepository implements RouteRepositoryInterface
{
    /**
     * Fetch the names of the route groups
     *
     * @param Route $route
     * @return Collection
     */
    public function getRouteGroupsNames(Route $route): Collection
    {
        return DB::table('routes')
            ->join('group_route', 'routes.id', '=', 'group_route.route_id')
            ->select('groups.title')
            ->where('routes.name', $route->name)
            ->get();
    }

    /**
     * Fetch the count of the route groups
     *
     * @param Route $route
     * @return int
     */
    public function getTheRouteGroupsCount(Route $route): int
    {
        return DB::table('routes')
            ->join('group_route', 'routes.id', '=', 'group_route.route_id')
            ->select('groups.title')
            ->where('routes.name', $route->name)
            ->count();
    }
}
