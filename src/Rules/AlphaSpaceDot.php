<?php declare(strict_types = 1);

namespace LaraRules\Rules;

use LaraRules\BaseRule;

class AlphaSpaceDot extends BaseRule
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
        return !!preg_match('/^[a-zA-Z. ]*$/', $value);
    }

    /**
     * Get the validation error message.
     *
     **/
    public function message() : string
    {
        return $this->getLocalizedErrorMessage(
            'alpha_space_dot',
            'The :attribute should only have letters, spaces and dots'
        );
    }
}
