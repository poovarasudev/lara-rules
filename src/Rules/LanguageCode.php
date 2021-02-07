<?php declare(strict_types = 1);

namespace LaraRules\Rules;

use LaraRules\Support\LaraIso6391Alpha2;
use LaraRules\Support\LaraIso6391Alpha3;
use LaraRules\BaseRule;

class LanguageCode extends BaseRule
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
        $array = ($this->parameters[0] ?? 2) === 2 ? LaraIso6391Alpha2::$codes : LaraIso6391Alpha3::$codes;

        return array_key_exists(strtoupper($value), $array);
    }

    /**
     * Get the validation error message.
     *
     **/
    public function message() : string
    {
        return $this->getLocalizedErrorMessage(
            'language_code',
            'The :attribute must be a valid ISO 639-1 alpha-' . ($this->parameters[0] ?? 2) . ' language code'
        );
    }
}
