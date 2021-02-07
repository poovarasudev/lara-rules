<?php declare(strict_types = 1);

namespace LaraRules\Rules;

use LaraRules\BaseRule;

class PhoneNumber extends BaseRule
{
    /**
     * Determine if the validation rule passes.
     *
     * @param $attribute
     * @param $value
     * @return bool
     */
    public function passes($attribute, $value) : bool
    {
        return (preg_match('/^(([+]){0,1}([0-9]){10,12}?$)/', $value) || preg_match('/^(([0-9]){10}?$)/', $value));
    }

    /**
     * Get the validation error message.
     *
     **/
    public function message() : string
    {
        return $this->getLocalizedErrorMessage(
            'telephone_number',
            'Please enter the valid :attribute'
        );
    }
}
