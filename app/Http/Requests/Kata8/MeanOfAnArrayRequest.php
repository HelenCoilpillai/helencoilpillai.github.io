<?php

namespace App\Http\Requests\Kata8;

use Illuminate\Foundation\Http\FormRequest;

class MeanOfAnArrayRequest extends FormRequest
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
        $regexValidationForCommaSeparatedNumbers = 'regex:/^( |,)*\d+ *(?:, *\d+( |,)*)*$/';
        return [
            'marks' => ['required', $regexValidationForCommaSeparatedNumbers]
        ];
    }

    public function messages()
    {
        return [
            'marks.regex' => 'The marks field must only contain comma separated numbers'
        ];
    }
}
