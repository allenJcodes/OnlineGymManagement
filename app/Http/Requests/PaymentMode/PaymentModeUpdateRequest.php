<?php

namespace App\Http\Requests\PaymentMode;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class PaymentModeUpdateRequest extends FormRequest
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
            'name' => ['required','string', 'max:255', Rule::unique('mode_of_payments', 'name')->ignore($this->payment_mode->id)],
            'account_no' => ['required_without:image'],
            'image' => ['required_without:account_no'],
        ];
    }
}
