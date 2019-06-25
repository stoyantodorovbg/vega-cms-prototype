<?php

namespace App\Repositories\Interfaces;

interface BaseRepositoryInterface
{
    /**
     * Check if a table row exists
     *
     * @param string $tableName
     * @param array $columnsData
     * @return bool
     */
    public function rowExists(string $tableName, array $columnsData): bool;
}
