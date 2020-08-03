<?php

declare(strict_types=1);

namespace App\Http\Rules;

use Illuminate\Contracts\Validation\Rule;

class UpperCaseRule implements Rule
{
    public function passes($attribute, $value)
    {
        return $value === strtoupper($value);
    }

    public function message()
    {
        return 'The :attribute must be in Upper Case';
    }
}
