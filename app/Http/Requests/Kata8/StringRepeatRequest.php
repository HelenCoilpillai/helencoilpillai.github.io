<?php

namespace App\Http\Requests\Kata8;

use Illuminate\Foundation\Http\FormRequest;

class StringRepeatRequest extends FormRequest
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
        return [
            'textToRepeat' => ['required', 'max:20'],
            'repeatTimes' => ['required', 'numeric', 'max:50', 'min:1']
        ];
    }
}
