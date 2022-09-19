<?php

namespace App\Helpers;

use Illuminate\Support\Collection;

class UtilHelper
{
    /**
     * Check string is email.
     *
     * @param  Collection  $collection
     * @return string|bool
     */
    public static function isEmail(Collection $collection): string|bool
    {
        $email = filter_var($collection[0], FILTER_SANITIZE_EMAIL);

        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }
}
