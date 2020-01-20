<?php

namespace App\Services;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;
use App\Services\Interfaces\EloquentFilterServiceInterface;

class EloquentFilterService implements EloquentFilterServiceInterface
{
    /**
     * Process requested filters
     *
     * @param Request $request
     * @param Builder $builder
     * @return Builder
     */
    public function addFilters(Request $request, Builder $builder): Builder
    {
        if(isset($request->validated()['filters'])) {
            $filters = json_decode($request->validated()['filters'], true);

            foreach ($filters as $fieldName => $filter) {
                foreach ($filter['types'] as $methodName => $value) {
                    $builder = $this->$methodName($builder, $fieldName, $value['value']);
                }
            }

        }

        return $builder;
    }

    /**
     * Search for exact matching
     *
     * @param Builder $builder
     * @param string $fieldName
     * @param string $value
     * @return Builder
     */
    protected function exact(Builder $builder, string $fieldName, $value): Builder
    {
        return $builder->where($fieldName, $value);
    }

    /**
     * Search for partial matching
     *
     * @param Builder $builder
     * @param string $fieldName
     * @param string $value
     * @return Builder
     */
    protected function like(Builder $builder, string $fieldName, string $value): Builder
    {
        return $builder->where($fieldName, 'like', '%' . $value . '%');
    }

    /**
     * Search for greater values
     *
     * @param Builder $builder
     * @param string $fieldName
     * @param string $value
     * @return Builder
     */
    protected function greaterThen(Builder $builder, string $fieldName, string $value): Builder
    {
        return $builder->where($fieldName, '>', $value);
    }
    /**
     * Search for less values
     *
     * @param Builder $builder
     * @param string $fieldName
     * @param string $value
     * @return Builder
     */
    protected function lessThen(Builder $builder, string $fieldName, string $value): Builder
    {
        return $builder->where($fieldName, '<', $value);
    }

}
