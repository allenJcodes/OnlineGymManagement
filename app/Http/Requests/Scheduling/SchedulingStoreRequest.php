<?php

namespace App\Http\Requests\Scheduling;

use Illuminate\Foundation\Http\FormRequest;

class SchedulingStoreRequest extends FormRequest
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
            'class_name' => 'required',
            'staff_id' => 'required',
            'date_time_start' => 'required',
            'date_time_end' => 'required',
            // 'max_clients' => 'required|numeric',
            'number_of_attendees' => 'required|numeric',
        ];
    }
}
