<?php

namespace App\Services\Interfaces;

interface ValidationServiceInterface
{
    /**
     * Validate data
     *
     * @param array $data
     * @param array $validationTypes
     * @param string $entity
     * @param string $action
     * @return mixed
     */
    public function validate(array $data, array $validationTypes, string $entity, string $action);
}
