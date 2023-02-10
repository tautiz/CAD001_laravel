<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class FirstUppercaseRule implements Rule
{
    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value): bool
    {
        return ucfirst($value) === $value;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message(): string
    {
        return 'Laukelis :attribute nera iš didžiosios raides.';
    }
}
