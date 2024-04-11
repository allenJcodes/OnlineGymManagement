<?php

namespace App\Http\Requests\Equipment;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class EquipmentUpdateRequest extends FormRequest
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
            'equipment_name' => ['required','string','max:255', Rule::unique('equipment', 'equipment_name')->ignore($this->equipment->id)],
            'equipment_description_id' => 'required|string|max:255',
            'equipment_type_id' => 'required|integer',
            'image' => 'mimes:png,jpg,jpeg|max:5048',

            'available' => 'nullable|numeric',
            'not_available' => 'nullable|numeric',
            'under_maintenance' => 'nullable|numeric',
        ];
    }

    public function attributes(): array
    {
        return [
            'equipment_type_id' => 'equipment type',
            'equipment_description_id' => 'equipment description',
        ];
    }
}
