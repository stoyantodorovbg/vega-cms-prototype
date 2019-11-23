<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class AdminUserRequest extends FormRequest
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
     *
     * @return array
     */
    public function rules()
    {
        $key = $this->isMethod('POST') ? '' : $this->user->id;

        return [
            'name' => 'required|string|max:30',
            'email' => 'required|email|max:50|unique:users,email,' . $key,
            'password' => 'required|string|max:50|min:5|confirmed'
        ];
    }
}
