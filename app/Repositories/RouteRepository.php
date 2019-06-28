<?php

namespace App\Repositories;

use Illuminate\Support\Facades\DB;
use App\Models\Interfaces\RouteInterface;
use Illuminate\Database\Eloquent\Collection;
use App\Repositories\Interfaces\RouteRepositoryInterface;

class RouteRepository implements RouteRepositoryInterface
{
    /**
     * Fetch the names of the route groups
     *
     * @param RouteInterface $route
     * @return Collection
     */
    public function getRouteGroupsNames(RouteInterface $route): Collection
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
     * @param RouteInterface $route
     * @return int
     */
    public function getTheRouteGroupsCount(RouteInterface $route): int
    {
        return DB::table('routes')
            ->join('group_route', 'routes.id', '=', 'group_route.route_id')
            ->select('groups.title')
            ->where('routes.name', $route->name)
            ->count();
    }
}
