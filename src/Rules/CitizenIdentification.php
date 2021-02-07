<?php declare(strict_types = 1);

namespace LaraRules\Rules;

use LaraRules\Support\LaraIso3166Alpha2;
use LaraRules\Support\LaraIso3166Alpha3;
use LaraRules\BaseRule;

class CitizenIdentification extends BaseRule
{
    /**
     * Determine if the validation rule passes.
     *
     * The rule requires one parameter:
     * 1. The identification type to use ('USA' or 'US, 'GBR' or 'GB', 'FRA' or 'FR', 'BRA' or 'BR').
     *
     * @param $attribute
     * @param $value
     * @return bool
     */
    public function passes($attribute, $value) : bool
    {
        $array = ($this->parameters[0] ?? 2) === 2 ? LaraIso3166Alpha2::$codes : LaraIso3166Alpha3::$codes;

        switch (mb_strtoupper($this->parameters[0] ?? 'USA')) {

            case 'US':
            case 'USA':
                return $this->verifyUnitedStates($value);

            case 'GB':
            case 'GBR':
                return $this->verifyUnitedKingdom($value);

            case 'FR':
            case 'FRA':
                return $this->verifyFrance($value);

            case 'BR':
            case 'BRA':
                return $this->verifyBrazil($value);

            default:
                return false;

        }
    }

    /**
     * Get the validation error message.
     *
     **/
    public function message() : string
    {
        return $this->getLocalizedErrorMessage(
            'citizen_identification',
            'The :attribute must be a valid form of identification'
        );
    }

    /**
     * Verify whether the given value is a valid French citizen number.
     *
     * @param $value
     * @return bool
     */
    protected function verifyFrance($value) : bool
    {
        return preg_match('/^[1,2][ ]?[0-9]{2}[ ]?[0,1,2,3,5][0-9][ ]?[0-9A-Z]{5}[ ]?[0-9]{3}[ ]?[0-9]{2}$/', $value) > 0;
    }

    /**
     * Verify whether the given value is a valid United Kingdom citizen number.
     *
     * @param $value
     * @return bool
     */
    protected function verifyUnitedKingdom($value) : bool
    {
        return preg_match('/^[A-CEGHJ-PR-TW-Z]{1}[A-CEGHJ-NPR-TW-Z]{1}[0-9]{6}[A-DFM]{0,1}$/', $value) > 0;
    }

    /**
     * Verify whether the given value is a valid United States citizen number.
     *
     * @param $value
     * @return bool
     */
    protected function verifyUnitedStates($value) : bool
    {
        return preg_match('/^(?!000|666)[0-8][0-9]{2}-(?!00)[0-9]{2}-(?!0000)[0-9]{4}$/', $value) > 0;
    }

    /**
     * Verify whether the given value is a valid Brazil citizen number.
     *
     * @param $value
     * @return bool
     */
    protected function verifyBrazil($value) : bool
    {
        $value = preg_replace('/[^0-9]/is', '', $value);

        if (strlen($value) !== 11 || preg_match('/(\d)\1{10}/', $value)) {
            return false;
        }

        for ($t = 9; $t < 11; $t++) {
            for ($d = 0, $c = 0; $c < $t; $c++) {
                $d += $value[$c] * (($t + 1) - $c);
            }

            $d = ((10 * $d) % 11) % 10;

            if ($value[$c] != $d) {
                return false;
            }
        }

        return true;
    }
}
