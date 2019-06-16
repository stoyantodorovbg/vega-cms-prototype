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
            'url' => ['required', 'unique:routes,url', 'regex:/^\/[A-Za-z1-9-_\/{}]*$/'],
            'method' => ['required', 'unique:routes,method', 'regex:/^[A-Za-z]*@[A-Z-a-z1-9]*$/'],
            'name' => ['required', 'unique:routes,name', 'regex:/^[A-Za-z.\-_1-9]*$/'],
        ]);

        if($validator->fails()) {
            return $validator->errors()->all();
        }

        return true;
    }
}
