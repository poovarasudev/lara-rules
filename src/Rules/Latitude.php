<?php declare(strict_types = 1);

namespace LaraRules\Rules;

use LaraRules\BaseRule;

class Latitude extends BaseRule
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
        return (($value > -90) && ($value < 90));
    }

    /**
     * Get the validation error message.
     *
     **/
    public function message() : string
    {
        return $this->getLocalizedErrorMessage(
            'latitude',
            'The :attribute is not a valid latitude'
        );
    }
}
