<?php declare(strict_types = 1);

namespace LaraRules\Rules;

use Illuminate\Support\Facades\Storage;
use LaraRules\BaseRule;

class FileExists extends BaseRule
{
    /**
     * Determine if the validation rule passes.
     *
     * The rule has two parameters:
     * 1. The disk defined in your config file.
     * 2. The directory to search within.
     *
     * @param $attribute
     * @param $value
     * @return bool
     */
    public function passes($attribute, $value) : bool
    {
        $path = rtrim($this->parameters[1] ?? '', '/');
        $file = ltrim($value, '/');

        return Storage::disk($this->parameters[0])->exists("$path/$file");
    }

    /**
     * Get the validation error message.
     *
     **/
    public function message() : string
    {
        return $this->getLocalizedErrorMessage(
            'file_exists',
            'The file specified for :attribute does not exist'
        );
    }
}
