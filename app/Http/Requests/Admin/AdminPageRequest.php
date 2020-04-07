<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class AdminPageRequest extends FormRequest
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
            'url' => 'required|string|max:500',
            'col_width' => 'required|integer|between:1,12',
            'status' => 'required|integer|between:0,1',
            'title' => 'nullable|string|max:255',
            'description' => 'nullable|string|max:65535',
            'outer_row_classes' => 'nullable|string|max:255',
            'inner_row_classes' => 'nullable|string|max:255',
            'classes' => 'nullable|string|max:255',
            'styles' => 'nullable|array',
            'meta_tags' => 'nullable|array',
        ];
    }
}
