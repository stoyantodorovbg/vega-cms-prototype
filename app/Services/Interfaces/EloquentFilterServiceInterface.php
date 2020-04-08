<?php

namespace App\Services\Interfaces;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;

interface EloquentFilterServiceInterface
{
    /**
     * Process requested filters
     *
     * @param Request $request
     * @param string $model
     * @return Builder
     */
    public function addFilters(Request $request, string $model): Builder;
}
