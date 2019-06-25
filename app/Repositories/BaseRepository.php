<?php

namespace App\Repositories;

use Illuminate\Support\Facades\DB;
use App\Repositories\Interfaces\BaseRepositoryInterface;

class BaseRepository implements BaseRepositoryInterface
{
    /**
     * Check if a table row exists
     *
     * @param string $tableName
     * @param array $columnsData
     * @return bool
     */
    public function rowExists(string $tableName, array $columnsData): bool
    {
        $results = DB::table($tableName)
            ->select('*');

        foreach ($columnsData as $key => $value) {
            $results->where($key, $value);
        }

        if ($results->get()->count()) {
            return true;
        }

        return false;
    }
}
