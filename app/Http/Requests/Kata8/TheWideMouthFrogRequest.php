<?php

namespace App\Http\Requests\Kata8;

use Illuminate\Foundation\Http\FormRequest;

class TheWideMouthFrogRequest extends FormRequest
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
        $regexValidationForAlphabetsAndSpaces = 'regex:/^[a-zA-Z\s]*$/';
        return [
            'animal' => ['required', $regexValidationForAlphabetsAndSpaces]
        ];
    }

    public function messages()
    {
        return [
            'animal.regex' => 'The animal field must only contain alphabetic characters'
        ];
    }
}
