<?php declare(strict_types = 1);

namespace LaraRules\Rules;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use LaraRules\BaseRule;
use Symfony\Component\HttpFoundation\IpUtils;

class IsOldPassword extends BaseRule
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
        return Hash::check($value, Auth::user()->password);
    }

    /**
     * Get the validation error message.
     *
     **/
    public function message() : string
    {
        return $this->getLocalizedErrorMessage(
            'is_old_password',
            'The :attribute is incorrect'
        );
    }
}
