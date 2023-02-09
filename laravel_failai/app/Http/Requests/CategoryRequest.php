<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
            'name'        => ['required', 'string', 'min:3', 'max:255'],
            'slug'        => ['required', 'alpha_dash', 'min:3', 'max:255', 'unique:categories,slug'],
            'description' => ['nullable', 'string', 'min:3', 'max:255'],
            'image'       => ['nullable'],
            'status_id'   => ['required', 'integer', 'exists:statuses,id'],
            'parent_id'   => ['nullable', 'integer', 'exists:categories,id'],
            'sort_order'  => ['nullable', 'integer', 'min:0'],
        ];
    }
}
