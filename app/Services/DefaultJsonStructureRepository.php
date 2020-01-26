<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;
use App\Models\DefaultJsonStructure;
use App\Repositories\Interfaces\DefaultJsonStructureRepositoryInterface;

class DefaultJsonStructureRepository implements DefaultJsonStructureRepositoryInterface
{
    /**
     * Retrieves defaut fields structure data for a JSON model fields
     *
     * @param string $model
     * @return Collection
     */
    public function getJsonStructureFields(string $model): Collection
    {
        return DB::table('default_json_structures')
            ->select('field', 'structure')
            ->where('model', $model)
            ->get();
    }
}
