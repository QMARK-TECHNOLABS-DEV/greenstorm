<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class Zipcode implements ValidationRule
{
    public function passes($attribute, $value)
    {
        // Basic validation: Check if the zipcode is exactly 5 digits.
        return preg_match('/^\d{5}$/', $value);
    }
    public function message()
    {
        return 'The :attribute must be a 5-digit zipcode.';
    }
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        //
    }
}
