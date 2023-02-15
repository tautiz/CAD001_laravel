<?php

namespace App\Http\Requests;

use App\Models\Product;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProductRequest extends FormRequest implements ProductRequestInterface
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
            'name'        => ['required', 'string', 'min:4', 'max:255'],
            'price'       => ['required', 'integer', 'min:0'],
            'category_id' => ['required', 'integer', 'exists:categories,id'],
            'status_id'   => ['required', 'integer', 'exists:statuses,id'],
            'slug'        => ['required', 'alpha_dash', 'min:3', 'max:255'],
            'description' => ['nullable', 'string', 'min:3'],
            'foto'        => ['nullable', 'file', 'max:1024'],
            'color'       => ['nullable', Rule::in(Product::COLORS)],
            'size'        => ['nullable', Rule::in(Product::SIZES)],
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages(): array
    {
        return [
            'name.required' => 'Privalomas produkto pavadinimas',
            'name.string'   => 'Pavadinima turi sudaryti lotyniški simboliai',
            'name.min'      => 'Minimalus pavadinimo ilgis privalo būti :min simboliai',
            'name.max'      => 'Maximalus pavadinimo ilgis privalo būti :max simboliai',
            // ....
        ];
    }
}
