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
            'price' => 'required|numeric',
            'number_of_months' => 'required|numeric',
            'description' => 'required',
            'inclusions' => 'required',
            'best_option' => 'required',
        ];
    }
}