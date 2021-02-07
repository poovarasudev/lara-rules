<?php declare(strict_types = 1);

namespace LaraRules\Support;

use Carbon\Carbon;

class BaseHelper
{
    /**
     * Check whether the value is null or empty
     *
     * @param $value
     * @return bool
     */
    public static function isNullOrEmpty($value)
    {
        return ($value == '' || $value == null);
    }

    /**
    * Get carbon object from date string
    */
    public static function getCarbonFromDateString($date)
    {
        return self::isNullOrEmpty($date) ? null : self::getCarbon($date);
    }

    /**
     * Get carbon from date string.
     *
     * @param $date
     * @return Carbon
     */
    public static function getCarbon($date)
    {
        $format = 'Y-m-d H:i:s';
        $isStartOfDay = $isEndOfMonth = $formatForMonthYear = false;
        if (preg_match('/^(\d{4})-(\d{1,2})-(\d{1,2})$/', $date)) {
            $format = 'Y-m-d';
            $isStartOfDay = true;
        } elseif (preg_match('/^(\d{1,2})\/(\d{1,2})\/(\d{4})$/', $date)) {
            $format = 'd/m/Y';
            $isStartOfDay = true;
        } elseif (preg_match('/^(\d{1,2})\/(\d{1,2})\/(\d{4})(?:\s+(\d{2}):(\d{2}):(\d{2}))?$/', $date)) {
            $format = 'd/m/Y H:i:s';
        } elseif (preg_match('/^(\d{1,2})\/(\d{1,2})\/(\d{4})(?:\s+(\d{2}):(\d{2}))?$/', $date)) {
            $format = 'd/m/Y H:i';
        } elseif (preg_match('/^(\d{1,2})\/(\d{4})$/', $date)) {
            $format = 'm/Y';
            $formatForMonthYear = true;
            $isEndOfMonth = true;
        } elseif (preg_match('/^(\d{1,2}):(\d{1,2}):(\d{1,2})$/', $date)) {
            $format = 'H:i:s';
        }
    }
}
