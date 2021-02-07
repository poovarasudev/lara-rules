<?php declare(strict_types = 1);

namespace LaraRules\Rules;

use LaraRules\BaseRule;

class Longitude extends BaseRule
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
        return (($value > -180) && ($value < 180));
    }

    /**
     * Get the validation error message.
     *
     **/
    public function message() : string
    {
        return $this->getLocalizedErrorMessage(
            'longitude',
            'The :attribute is not a valid longitude'
        );
    }
}
