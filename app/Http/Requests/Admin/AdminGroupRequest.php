<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class AdminGroupRequest extends FormRequest
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
        $validation = [
            'description' => 'string|max:65535',
            'status' => 'required|integer|between:0,1'
        ];

        if($this->isMethod('POST')) {
            $validation['title'] = 'required|string|max:30|regex:/^[a-zA-Z]*$/|unique:groups,title';
        }

        return $validation;
    }
}
