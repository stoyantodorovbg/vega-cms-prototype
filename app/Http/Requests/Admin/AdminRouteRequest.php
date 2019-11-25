<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class AdminRouteRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'url' => ['required', 'string', 'max:255', 'unique:routes,url', 'regex:/^\/[A-Za-z1-9-_\/{}]*$/'],
            'method' => ['required', 'string', 'max:255', 'regex:/^(get|post|patch|put|delete)$/'],
            'action' => ['required', 'string', 'max:255', 'unique:routes,action', 'regex:/^[A-Za-z\\\]*@[A-Z-a-z1-9]*$/'],
            'name' => ['required', 'string', 'max:255', 'unique:routes,name', 'regex:/^[A-Za-z.\-_1-9]*$/'],
            'route_type' => ['string', 'max:255', 'regex:/^(web|admin|page|api)$/'],
            'action_type' => ['string', 'max:255', 'regex:/^(front|admin|api)$/']
        ];
    }
}
