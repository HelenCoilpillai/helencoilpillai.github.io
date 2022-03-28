<?php

namespace App\Http\Requests\Kata8;

use Illuminate\Foundation\Http\FormRequest;

class ReverseWordRequest extends FormRequest
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
            'reverseWordsText' => ['required', 'max:50']
        ];
    }

    public function messages()
    {
        return [
            'reverseWordsText.required' => "The 'Reverse Words Text' field is required",
            'reverseWordsText.max' => "The 'Reverse Words Text' must not be greater than 50 characters"
        ];
    }
}
