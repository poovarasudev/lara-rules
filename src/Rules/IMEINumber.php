<?php declare(strict_types = 1);

namespace LaraRules\Rules;

use LaraRules\BaseRule;

class IMEINumber extends BaseRule
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
        if (strlen($value) != 15) {
            return false;
        }

        $sum = 0;
        for ($i = 15; $i >= 1; $i--) {
            $tmp = (int)($value % 10);
            if ($i % 2 == 0) {
                $tmp = 2 * $tmp;
            }
            $sum += $this->sumOfDigits($tmp);
            $value = $value / 10;
        }

        return ($sum % 10 == 0);
    }

    public function sumOfDigits($value) {
        $tmp = 0;
        while ($value > 0) {
            $tmp = $tmp + $value % 10;
            $value = $value / 10;
        }
        return $tmp;
    }

    /**
     * Get the validation error message.
     *
     **/
    public function message() : string
    {
        return $this->getLocalizedErrorMessage(
            'imei',
            'The :attribute invalid IMEI'
        );
    }
}
