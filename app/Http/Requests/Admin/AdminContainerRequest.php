<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class AdminContainerRequest extends FormRequest
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
            'parent_containers[]' => 'array',
            'status' => 'nullable|integer|between:0,1',
            'semantic_tag' => 'nullable|string|max:255',
            'row_position' => 'nullable|integer',
            'col_position' => 'nullable|integer',
            'col_width' => 'nullable|integer|between:1,12',
            'row_classes' => 'nullable|string|max:255',
            'classes' => 'nullable|string|max:255',
            'title' => 'nullable|array',
            'summary' => 'nullable|array',
            'body' => 'nullable|array',
            'styles' => 'nullable|array',
        ];
    }
}
