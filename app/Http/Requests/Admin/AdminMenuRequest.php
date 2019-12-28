<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class AdminMenuRequest extends FormRequest
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
        $key = $this->isMethod('POST') ? '' : explode('/', $this->getRequestUri())[4];

        return [
            'status' => 'required|integer|between:0,1',
            'classes' => 'nullable|string|max:500',
            'title' => 'nullable|array',
            'description' => 'nullable|array'
            'styles' => 'nullable|array'
        ];
    }
}
