<?php declare(strict_types = 1);

namespace LaraRules\Rules;

use Illuminate\Support\Facades\Input;
use LaraRules\BaseRule;

class GreaterThan extends BaseRule
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
        return $value > Input::get($this->parameters[0]);
    }

    /**
     * Get the validation error message.
     *
     **/
    public function message() : string
    {
        return $this->getLocalizedErrorMessage(
            'greater_than',
            'The :attribute must be greater than ' . $this->parameters[0]
        );
    }
}
