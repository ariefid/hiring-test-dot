<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\InvokableRule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class CurrentPasswordIsMatch implements InvokableRule
{
    /**
     * Indicates whether the rule should be implicit.
     *
     * @var bool
     */
    public $implicit = true;

    /**
     * Run the validation rule.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     * @return void
     */
    public function __invoke($attribute, $value, $fail): void
    {
        $user = Auth::check() ? Auth::user() : null;

        /**
         * Check if Auth User.
         */
        if (! empty($user)) {
            /**
             * Check password hash if not match.
             */
            if (! Hash::check($value, $user->password)) {
                /**
                 * Return validator is fail.
                 */
                $fail('The :attribute doesn\'t match in our database.');
            }
        }
    }
}
