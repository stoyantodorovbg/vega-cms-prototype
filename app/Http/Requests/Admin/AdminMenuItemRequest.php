<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class AdminMenuItemRequest extends FormRequest
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
            'menu_id' => 'required|integer|between:0,20',
            'parent_id' => 'nullable|integer|between:0,20',
            'status' => 'required|integer|between:0,1',
            'url' => 'nullable|string|max:500',
            'title' => 'nullable|array',
            'description' => 'nullable|array',
            'classes' => 'nullable|string|max:500',
            'styles' => 'nullable|array'
        ];
    }
}
