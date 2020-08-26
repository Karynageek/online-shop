<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DepositRequest extends FormRequest {

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    // read more on validation at http://laravel.com/docs/validation

    public function rules() {
        return [
            'finished_at' => 'required|date|after:tomorrow',
            'interest_rate' => 'required|numeric',
            'sum' => 'required|numeric'
        ];
    }

    public function attributes() {
        return [
            'finished_at' => 'date finish',
            'interest_rate' => 'interest rate'
        ];
    }

}
