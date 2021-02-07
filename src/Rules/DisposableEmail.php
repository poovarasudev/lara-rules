<?php declare(strict_types = 1);

namespace LaraRules\Rules;

use Exception;
use Illuminate\Support\Str;
use LaraRules\BaseRule;

class DisposableEmail extends BaseRule
{
    /**
     * Determine if the validation rule passes.
     *
     * By default, if the API fails to load, the email will
     * be accepted. However, you can override this by adding
     * a boolean parameter e.g. new DisposableEmail(true).
     *
     * @param $attribute
     * @param $value
     * @return bool
     */
    public function passes($attribute, $value) : bool
    {
        $url = 'https://open.kickbox.com/v1/disposable/' . Str::after($value, '@');

        try {
            return ! json_decode(file_get_contents($url), true)['disposable'];
        } catch (Exception $ex) {
            return ($this->parameters[0] ?? false) ? false : true;
        }
    }

    /**
     * Get the validation error message.
     *
     **/
    public function message() : string
    {
        return $this->getLocalizedErrorMessage(
            'disposable_email',
            'The :attribute must be a valid, non-disposable domain'
        );
    }
}
