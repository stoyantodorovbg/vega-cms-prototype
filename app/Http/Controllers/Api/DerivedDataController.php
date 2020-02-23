<?php

namespace App\Http\Controllers\Api;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Str;
use Illuminate\Support\Collection;
use App\Http\Controllers\Controller;
use App\Http\Requests\DerivedDataRequest;
use App\Services\Interfaces\EloquentFilterServiceInterface;

class DerivedDataController extends Controller
{
    /**
     * @var EloquentFilterServiceInterface
     */
    protected $eloquentFilterService;

    /**
     * IndexController constructor.
     *
     * @param EloquentFilterServiceInterface $eloquentFilterService
     */
    public function __construct(EloquentFilterServiceInterface $eloquentFilterService)
    {
        $this->eloquentFilterService = $eloquentFilterService;
    }

    /**
     * Get models data
     *
     * @param DerivedDataRequest $request
     * @return \Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection
     */
    public function getModelsData(DerivedDataRequest $request)
    {
        $modelName = "\\App\\Models\\" . $request->model;

        $builder = $this->eloquentFilterService->addFilters($request, $modelName::query());

        $methodName = Str::camel($request->model) . 'Data';

        return [
            'options' => $this->$methodName($builder)
        ];
    }

    /**
     * Get derived data from MenuItem collection
     *
     * @param Builder $builder
     * @return Collection
     */
    protected function menuItemData(Builder $builder): Collection
    {
        return $builder->get()->map(function ($item) {
            return [
                'value' => $item->id,
                'text' => json_decode($item->title)->text
            ];
        });
    }
}
