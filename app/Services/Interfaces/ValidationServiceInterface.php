<?php

namespace App\Services\Interfaces;

interface ValidationServiceInterface
{
    /**
     * Check if the route properties are valid
     *
     * @param array $data
     * @return mixed
     */
    public function validateRouteProperties(array $data);

    /**
     * Check if the route name is valid
     *
     * @param array $data
     * @return array|bool
     */
    public function validateRouteName(array $data);

    /**
     * Check if the group properties are valid
     *
     * @param array $data
     * @return mixed
     */
    public function validateGroupProperties(array $data);
}
