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
            'instructor_id' => 'required',
            'date_time_start' => 'required',
            'date_time_end' => 'required|date|after:date_time_start',
        ];
    }

    public function messages ()
    {
        return [
            'date_time_end.after' => 'The date and time end should be after date and time start.'
        ];
    }
}
