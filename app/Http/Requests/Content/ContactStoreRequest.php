<?php

namespace App\Http\Requests\Content;

use Illuminate\Foundation\Http\FormRequest;

class ContactStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'contact_detail_type_id' => 'required',
            'label' => 'required|string|max:255',
            'content' => 'required|string',
        ];
    }

    public function messages ()
    {
        return [
            'contact_detail_type_id.required' => 'The contact detail type is required.'
        ];
    }
}
