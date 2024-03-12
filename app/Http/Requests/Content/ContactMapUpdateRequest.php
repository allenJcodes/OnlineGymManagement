<?php

namespace App\Http\Requests\Content;

use Illuminate\Foundation\Http\FormRequest;

class ContactMapUpdateRequest extends FormRequest
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
            'content' => ['required', 'regex:/^[-]?(([0-8]?[0-9]|[1-8][0-9]|90)(\.\d+)?),\s*[-]?((1?[0-7]?[0-9]|180)(\.\d+)?)$/']
        ];
    }

    public function attributes(): array
    {
        return [
            'content' => 'map coordinates',
        ];
    }
}
