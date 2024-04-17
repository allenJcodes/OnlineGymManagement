<?php

namespace App\Http\Requests\Scheduling;

use Carbon\Carbon;
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
            'date_time_start' => ['required', 'date', 'after:now', function ($attribute, $value, $fail) {
                $this->validateBusinessHours('start time', $value, $fail);
            }],
            'date_time_end' => ['required', 'date', 'after:date_time_start', function ($attribute, $value, $fail) {
                $this->validateBusinessHours('end time', $value, $fail);
            }],
        ];
    }
    
    public function validateBusinessHours($attribute, $value, $fail)
    {
        $startTime = Carbon::parse('07:00:00');
        $endTime = Carbon::parse('23:00:00');

        $timeString = Carbon::parse($value)->format('H:i:s'); 
        $time = Carbon::parse($timeString);

        if ($time->lt($startTime) || $time->gt($endTime)) {
            $fail('The ' . $attribute . ' is only allowed between ' . $startTime->format('h:i A') . ' and ' . $endTime->format('h:i A') . '.');
        }
    }
    
    public function messages()
    {
        return [
            'date_time_end.after' => 'The end date and time must be after the start date and time.',
            'date_time_start.after' => 'The start date and time must be a future date and time.',
        ];
    }
    
}
