<?php declare(strict_types = 1);

namespace LaraRules\Rules;

use Illuminate\Support\Facades\Input;
use LaraRules\BaseRule;
use LaraRules\Support\BaseHelper;

class DateBeforeEqual extends BaseRule
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
        $date = BaseHelper::getCarbonFromDateString(Input::get($this->parameters[0]));
        $value = BaseHelper::getCarbonFromDateString($value);
        return $date >= $value;
    }

    /**
     * Get the validation error message.
     *
     **/
    public function message() : string
    {
        return $this->getLocalizedErrorMessage(
            'before_equal',
            'The :attribute must be before or equal to \'' . $this->parameters[0] . '\'.'
        );
    }
}
