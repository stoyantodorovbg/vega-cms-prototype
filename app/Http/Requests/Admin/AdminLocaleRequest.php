<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class AdminLocaleRequest extends FormRequest
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
            'language' => 'required|string|max:50|unique:locales,language,  ' . $key,
            'code' => 'required|string|max:2|unique:locales,code,' . $key,
            'status' => 'required|integer|between:0,1',
            'add_to_url' => 'required|integer|between:0,1',
        ];
    }
}
