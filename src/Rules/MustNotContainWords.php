<?php declare(strict_types = 1);

namespace LaraRules\Rules;

use LaraRules\BaseRule;

class MustNotContainWords extends BaseRule
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
        $response = true;
        foreach($this->parameters as $parameter) {
            if ($value == $parameter) {
                $response = false;
                break;
            }
        }
        return $response;
    }

    /**
     * Get the validation error message.
     *
     **/
    public function message() : string
    {
        return $this->getLocalizedErrorMessage(
            'must_not_contain_words',
            'The :attribute contains some of the forbidden words'
        );
    }
}
