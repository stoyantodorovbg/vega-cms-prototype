<?php

namespace App\Services;

use Illuminate\Support\Facades\Validator;
use App\Services\Interfaces\RouteServiceInterface;

class RouteService implements RouteServiceInterface
{
    /**
     * Check if the route properties are unique
     *
     * @param array $data
     * @return mixed
     */
    public function validateRouteProperties(array $data)
    {
        $validator = Validator::make($data, [
            'url' => ['required', 'unique:routes,url'],
            'method' => ['required', 'unique:routes,method'],
            'name' => ['required', 'unique:routes,name'],
        ]);

        if($validator->fails()) {
            return $validator->errors()->all();
        }

        return true;
    }
}
