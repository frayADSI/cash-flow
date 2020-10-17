<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InputTransactionRequest extends FormRequest
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
            'date' => 'required',
            'transaction_type' => 'required',
            'description' => 'required',
            'amount' => 'required',
            'rate_id' => 'required'
        ];
    }
}
