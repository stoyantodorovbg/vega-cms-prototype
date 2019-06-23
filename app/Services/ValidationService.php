<?php

namespace App\Services;

use App\Services\Interfaces\ValidationServiceInterface;
use Illuminate\Support\Facades\Validator;

class ValidationService implements ValidationServiceInterface
{
    /**
     * Check if the route properties are valid
     *
     * @param array $data
     * @return mixed
     */
    public function validateRouteProperties(array $data)
    {
        $validator = Validator::make($data, [
            'url' => [
                'required',
                'string',
                'max:255',
                'unique:routes,url',
                'regex:/^\/[A-Za-z1-9-_\/{}]*$/'
            ],
            'method' => [
                'required',
                'string',
                'max:255' ,
                'regex:/^(get|post|patch|put|delete)$/'
            ],
            'action' => [
                'required',
                'string',
                'max:255',
                'unique:routes,action',
                'regex:/^[A-Za-z]*@[A-Z-a-z1-9]*$/'
            ],
            'name' => [
                'required',
                'string',
                'max:255',
                'unique:routes,name',
                'regex:/^[A-Za-z.\-_1-9]*$/'
            ],
            'type' => [
                'required',
                'string',
                'max:255',
                'regex:/^(web|admin|page|api)$/'
            ],
        ]);

        return $this->checkValidation($validator);
    }

    /**
     * Check if the route name is valid
     *
     * @param array $data
     * @return array|bool
     */
    public function validateRouteName(array $data)
    {
        $validator = Validator::make($data, [
            'name' => [
                'required',
                'string',
                'max:255',
                'exists:routes,name',
                'regex:/^[A-Za-z.\-_1-9]*$/'
            ],
        ]);

        return $this->checkValidation($validator);
    }

    /**
     * Check if the group properties are valid
     *
     * @param array $data
     * @return mixed
     */
    public function validateGroupProperties(array $data)
    {
        $validator = Validator::make($data, [
            'title' => [
                'required',
                'string',
                'max:255',
                'unique:groups,title',
                'regex:/^[a-z]*$/'
            ],
            'description' => [
                'max:65535'
            ],
        ]);

        return $this->checkValidation($validator);
    }

    /**
     * Validate route title
     *
     * @param array $data
     * @return array|bool
     */
    public function validateGroupTitle(array $data)
    {
        $validator = Validator::make($data, [
            'title' => [
                'required',
                'string',
                'max:255',
                'exists:groups,title',
                'regex:/^[a-z]*$/'
            ],
        ]);

        return $this->checkValidation($validator);
    }

    /**
     * Check the validation result
     *
     * @param Validator $validator
     * @return array|bool
     */
    protected function checkValidation($validator)
    {
        if($validator->fails()) {
            return $validator->errors()->all();
        }

        return true;
    }
}
