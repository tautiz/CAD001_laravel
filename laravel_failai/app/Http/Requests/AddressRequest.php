<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddressRequest extends FormRequest
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
            'name'             => ['required', 'string', 'min:3', 'max:255'],
            'type'             => ['required', 'string',],
            'country'          => ['required', 'string'],
            'state'            => ['nullable', 'string'],
            'city'             => ['required', 'string'],
            'zip'              => ['required', 'string'],
            'street'           => ['required', 'string'],
            'house_number'     => ['required', 'string'],
            'apartment_number' => ['nullable', 'string'],
            'additional_info'  => ['nullable', 'string', 'min:3'],
            'user_id'          => ['required', 'exists:users,id'],
        ];
    }
}
