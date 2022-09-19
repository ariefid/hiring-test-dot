<?php

namespace App\Rules;

use App\Models\User;
use Illuminate\Contracts\Validation\DataAwareRule;
use Illuminate\Contracts\Validation\InvokableRule;
use Illuminate\Support\Facades\Hash;

class LoginPasswordIsMatch implements DataAwareRule, InvokableRule
{
    /**
     * Indicates whether the rule should be implicit.
     *
     * @var bool
     */
    public $implicit = true;

    /**
     * All of the data under validation.
     *
     * @var array
     */
    protected $data = [];

    /**
     * Set the data under validation.
     *
     * @param  array  $data
     * @return $this
     */
    public function setData($data)
    {
        $this->data = $data;

        return $this;
    }

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
         * Form field account.
         */
        $account = $this->data['account'];

        /**
         * Check email or username user is exists.
         */
        $user = User::query()->where(['email' => $account])->orWhere(['username' => $account])->first();

        /**
         * If User is exists and hash check is not match.
         */
        if ($user && ! Hash::check($value, $user->password)) {
            /**
             * Return validator is fail.
             */
            $fail('The :attribute doesn\'t match in our database.');
        }
    }
}
