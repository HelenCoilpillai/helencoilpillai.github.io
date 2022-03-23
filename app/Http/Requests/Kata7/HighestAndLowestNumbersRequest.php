<?php

namespace App\Http\Requests\Kata7;

use Illuminate\Foundation\Http\FormRequest;

class HighestAndLowestNumbersRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        $regexValidationForSpaceSeparatedNumbers = 'regex:/^( )*[+-]?[\d]+ *(?: [+-]?[\d]+( )*)*$/';
        return [
            'numbers' => ['required', $regexValidationForSpaceSeparatedNumbers]
        ];
    }

    /**
     * @return array
     */
    public function messages(): array
    {
        return [
            'numbers.regex' => 'The numbers field must only contain space separated numbers'
        ];
    }
}
