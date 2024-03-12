<?php

namespace App\Http\Requests\EquipmentType;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class EquipmentTypeUpdateRequest extends FormRequest
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
            'name' => ['required','string','max:255', Rule::unique('equipment_types', 'name')->ignore($this->equipment_type->id)],
        ];
    }
}
