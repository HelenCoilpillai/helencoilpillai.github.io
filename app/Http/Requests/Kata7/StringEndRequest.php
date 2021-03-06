<?php

namespace App\Http\Requests\Kata7;

use Illuminate\Foundation\Http\FormRequest;

class StringEndRequest extends FormRequest
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
            'text' => ['required', 'max:30'],
            'text_ending' => ['required', 'max:30']
        ];
    }
}
