<?php

namespace App\Http\Requests\Equipment;

use Illuminate\Validation\Rule;
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
            'equipment_name' => ['required','string','max:255', Rule::unique('equipment', 'equipment_name')],
            'description_id' => 'required|string|max:255',
            'equipment_type_id' => 'required|integer',
            'status' => 'required|string|max:255',
            'image' => 'nullable|mimes:png,jpg,jpeg|max:5048',
        ];
    }

    public function attributes(): array
    {
        return [
            'equipment_type_id' => 'equipment type',
        ];
    }
}
