<?php declare(strict_types = 1);

namespace LaraRules\Rules;

use LaraRules\Support\LaraIso3166Alpha2;
use LaraRules\Support\LaraIso3166Alpha3;
use LaraRules\BaseRule;

class CountryCode extends BaseRule
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
        $array = ($this->parameters[0] ?? 2) === 2 ? LaraIso3166Alpha2::$codes : LaraIso3166Alpha3::$codes;

        return array_key_exists(strtoupper($value), $array);
    }

    /**
     * Get the validation error message.
     *
     **/
    public function message() : string
    {
        return $this->getLocalizedErrorMessage(
            'country_code',
            'The :attribute must be a valid ISO 3166-1 alpha-' . ($this->parameters[0] ?? 2) . ' country code'
        );
    }
}
