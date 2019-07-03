<?php

namespace App\Services;

use App\Services\Interfaces\ValidationServiceInterface;
use Illuminate\Support\Facades\Validator;

class ValidationService implements ValidationServiceInterface
{
    /**
     * @param array $data
     * @param array $validationTypes
     * @param string $entity
     * @return mixed
     */
    public function validate(array $data, array $validationTypes, string $entity, string $action)
    {
        $validationRules = $this->getValidationRules($validationTypes, $entity, $action);

        $validator = Validator::make($data, $validationRules);

        return $this->checkValidation($validator);
    }

    /**
     * Prepare the validation rules
     *
     * @param array $validationTypes
     * @param string $entity
     * @param string $action
     * @return array
     */
    protected function getValidationRules(array $validationTypes, string $entity, string $action): array
    {
        $validationRules = [];

        foreach ($validationTypes as $type) {
            $method = $entity . ucfirst($type) . ucfirst($action);
            $validationRules = array_merge($validationRules, $this->$method());
        }

        return $validationRules;
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

    /**
     * Route url validation rules
     *
     * @return array
     */
    protected function routeUrlCreate(): array
    {
        return [
            'url' => [
                'required',
                'string',
                'max:255',
                'unique:routes,url',
                'regex:/^\/[A-Za-z1-9-_\/{}]*$/',
            ],
        ];
    }

    /**
     * Route name validation rules
     *
     * @return array
     */
    protected function routeMethodCreate(): array
    {
        return [
            'method' => [
                'required',
                'string',
                'max:255' ,
                'regex:/^(get|post|patch|put|delete)$/',
            ],
        ];
    }

    /**
     * Route properties validation rules
     *
     * @return array
     */
    protected function routeActionCreate(): array
    {
        return [
            'action' => [
                'required',
                'string',
                'max:255',
                'unique:routes,action',
                'regex:/^[A-Za-z]*@[A-Z-a-z1-9]*$/',
            ],
        ];
    }

    /**
     * Route name validation rule
     *
     * @return array
     */
    protected function routeNameCreate(): array
    {
        return [
            'name' => [
                'required',
                'string',
                'max:255',
                'unique:routes,name',
                'regex:/^[A-Za-z.\-_1-9]*$/',
            ],
        ];
    }

    /**
     * Route name validation rule
     *
     * @return array
     */
    protected function routeNameExists(): array
    {
        return [
            'name' => [
                'required',
                'string',
                'max:255',
                'exists:routes,name',
                'regex:/^[A-Za-z.\-_1-9]*$/',
            ],
        ];
    }

    /**
     * Route type validation rules
     *
     * @return array
     */
    protected function routeTypeCreate(): array
    {
        return [
            'type' => [
                'required',
                'string',
                'max:255',
                'regex:/^(web|admin|page|api)$/',
            ]
        ];
    }

    /**
     * Group title validation rule
     *
     * @return array
     */
    protected function groupTitleCreate(): array
    {
        return [
            'title' => [
                'required',
                'string',
                'max:255',
                'unique:groups,title',
                'regex:/^[a-zA-Z]*$/',
            ],
        ];
    }

    /**
     * Group properties validation rules
     *
     * @return array
     */
    protected function groupDescriptionCreate(): array
    {
        return [
            'description' => [
                'max:65535',
            ],
        ];
    }

    /**
     * Group title validation rule
     *
     * @return array
     */
    protected function groupTitleExists(): array
    {
        return [
            'title' => [
                'required',
                'string',
                'max:255',
                'exists:groups,title',
                'regex:/^[a-zA-Z]*$/',
            ],
        ];
    }
}
