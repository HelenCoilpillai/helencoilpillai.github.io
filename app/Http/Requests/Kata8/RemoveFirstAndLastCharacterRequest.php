<?php

namespace App\Http\Requests\Kata8;

use Illuminate\Foundation\Http\FormRequest;

class RemoveFirstAndLastCharacterRequest extends FormRequest
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
            'input' => ['required', 'max:20']
        ];
    }
}
