<?php

namespace App\Repositories\Interfaces;

use Illuminate\Support\Collection;

interface DefaultJsonStructureRepositoryInterface
{
    /**
     * Retrieves defaut fields structure data for a JSON model fields
     *
     * @param string $model
     * @return Collection
     */
    public function getJsonStructureFields(string $model): Collection;
}
