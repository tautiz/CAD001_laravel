<?php

namespace App\Http\Requests;

use App\Rules\FirstUppercaseRule;
use App\Rules\PersonalCodeRule;
use Illuminate\Foundation\Http\FormRequest;

class PersonStoreRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'name'          => ['required', 'string', 'min:3', 'max:255', new FirstUppercaseRule()],
            'surname'       => ['required', 'string', 'min:3', 'max:255', new FirstUppercaseRule()],
            'personal_code' => ['sometimes', new PersonalCodeRule()],
            'email'         => ['required', 'email'],
            'phone'         => ['nullable', 'string', 'min:4', 'max:255'],
        ];
    }
}
