<?php declare(strict_types = 1);

namespace LaraRules\Rules;

use LaraRules\BaseRule;

class TelephoneNumber extends BaseRule
{
    /**
     * Determine if the validation rule passes.
     *
     * The telephone number must be 6 - 15 characters in length,
     * and comprised entirely of integers.
     *
     * @param $attribute
     * @param $value
     * @return bool
     */
    public function passes($attribute, $value) : bool
    {
        return preg_match('/^[0-9]{6,15}$/', $value) > 0;
    }

    /**
     * Get the validation error message.
     *
     **/
    public function message() : string
    {
        return $this->getLocalizedErrorMessage(
            'telephone_number',
            'The :attribute must be a valid telephone number (6 - 15 digits in length)'
        );
    }
}
