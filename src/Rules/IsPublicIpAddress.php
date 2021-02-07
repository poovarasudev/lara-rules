<?php declare(strict_types = 1);

namespace LaraRules\Rules;

use LaraRules\BaseRule;
use LaraRules\Support\Ip;

class IsPublicIpAddress extends BaseRule
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
        return Ip::isPublicIp($value);
    }

    /**
     * Get the validation error message.
     *
     **/
    public function message() : string
    {
        return $this->getLocalizedErrorMessage(
            'is_public_ip_address',
            'The :attribute must be a public ip address'
        );
    }
}
