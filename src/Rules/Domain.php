<?php declare(strict_types = 1);

namespace LaraRules\Rules;

use LaraRules\BaseRule;

class Domain extends BaseRule
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
        return preg_match('/^([\w-]+\.)*[\w\-]+\.\w{2,10}$/', $value) > 0;
    }

    /**
     * Get the validation error message.
     *
     **/
    public function message() : string
    {
        return $this->getLocalizedErrorMessage(
            'domain',
            'The :attribute must be a valid domain without an http protocol e.g. google.com, www.google.com'
        );
    }
}
