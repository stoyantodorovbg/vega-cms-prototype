<?php

namespace App\Services\Interfaces;

interface RouteServiceInterface
{
    /**
     * Create a route
     *
     * @param array $data
     * @return mixed
     */
    public function create(array $data);

    /**
     * Destroy a route
     *
     * @param array $data
     * @return mixed
     */
    public function destroy(array $data);

    /**
     * Synchronize routes
     *
     * @return array
     */
    public function synchronize(): array;

    /**
     * Make the route accessible for the group members
     *
     * @param array $data
     * @return mixed
     */
    public function addRouteToGroup(array $data);
}
