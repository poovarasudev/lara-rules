<?php declare(strict_types = 1);

namespace LaraRules\Rules;

use Carbon\Carbon;
use LaraRules\BaseRule;

class MustBeWeekDay extends BaseRule
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
        return (new Carbon($value))->isWeekDay();
    }

    /**
     * Get the validation error message.
     *
     **/
    public function message() : string
    {
        return $this->getLocalizedErrorMessage(
            'must_be_week_day',
            'The :attribute must be a weekday'
        );
    }
}
