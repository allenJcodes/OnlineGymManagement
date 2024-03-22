<?php

namespace App\Http\Requests\ManageSubscription;

use Illuminate\Foundation\Http\FormRequest;

class ManageSubscriptionUpdateRequest extends FormRequest
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
            'name' => 'required|unique:subscription_types,name,'.$this->subscription->id,
            'price' => 'required|numeric|min:1',
            'number_of_months' => 'required|numeric|min:1',
            'description' => 'required',
            'inclusions' => 'required', 
        ];
    }

    public function messages ()
    {
        return [
            'price.min' => 'The subscription price should be at least 1 peso.',
            'number_of_months.min' => 'The duration should be at least 1 month.'
        ];
    }
}
