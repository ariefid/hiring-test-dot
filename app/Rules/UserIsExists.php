<?php

namespace App\Rules;

use App\Models\User;
use Illuminate\Contracts\Validation\InvokableRule;

class UserIsExists implements InvokableRule
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
        /**
         * Check email or username user is exists.
         */
        $user = User::query()->where(['email' => $value])->orWhere(['username' => $value])->first();

        /**
         * If User is null.
         */
        if (is_null($user)) {
            /**
             * Return validator is fail.
             */
            $fail('The :attribute doesn\'t match in our database.');
        }
    }
}
