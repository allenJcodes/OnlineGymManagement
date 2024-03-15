<?php

namespace App\Http\Requests\Users;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UserUpdateRequest extends FormRequest
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
        $id = $this->route('id');

        return [
            'first_name' => ['required', 'string', 'max:255', 'min:2'],
            'middle_name' => ['nullable','string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255', 'min:2'],
            'email' => ['required', 'email', 'string', 'max:255', Rule::unique('users', 'email')->ignore($id)],
            'password' => ['nullable', 'string'],
            'user_role' => ['required'],
            'description' => ['required', 'string'],
            'profile_image' => ['nullable']
        ];
    }
}
