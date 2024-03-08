<?php

namespace App\Http\Requests\Equipment;

use Illuminate\Foundation\Http\FormRequest;

class EquipmentStoreRequest extends FormRequest
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
            'equipment_name' => 'required',
            'description' => 'required',
            'equipment_type_id' => 'required',
            'equipment_name' => 'required',
            'status' => 'required',
            'image' => 'nullable'
        ];
    }
}
