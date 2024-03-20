<?php

namespace App\Http\Requests\PaymentMode;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class PaymentModeStoreRequest extends FormRequest
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
            'name' => ['required','string', 'max:255', Rule::unique('mode_of_payments', 'name')],
            'account_no' => ['required_without:image'],
            'image' => ['required_without:account_no'],
        ];
    }
}
