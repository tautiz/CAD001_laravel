<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => ['required', 'string', 'min:4', 'max:255'],
            'price' => ['required','integer', 'min:0'],

            'category_id' => ['required','integer', 'exists:categories,id'],
            'status_id' => ['required','integer', 'exists:statuses,id'],

            'slug' => ['required', 'string', 'min:3', 'max:255'],

            'description' => ['nullable', 'string', 'min:3'],
            'image' => ['nullable'],
            'color' => ['nullable', 'in_array:Red,Green,Blue,Black,White'],
            'size' => ['nullable', 'in_array:XS,S,M,L,XL'],
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.required' => 'Privalomas produkto pavadinimas',
            'name.string' => 'Pavadinima turi sudaryti lotyniški simboliai',
            'name.min' => 'Minimalus pavadinimo ilgis privalo būti :min simboliai',
            'name.max' => 'Maximalus pavadinimo ilgis privalo būti :max simboliai',
            // ....
        ];
    }
}
