<?php

namespace App\Helpers;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;

class AuthenticationHelper
{
    /**
     * Validate login user.
     *
     * @param  \Illuminate\Support\Collection  $data
     * @return bool
     */
    public static function attempt(Collection $data): bool
    {
        $account = $data['account'] ?? $data['email'];
        $password = $data['password'];
        $remember = $data['remember'] ?? false;
        $email = UtilHelper::isEmail(collect($account));
        if ($email) {
            return Auth::attempt([
                'email' => $email,
                'password' => $password,
            ], $remember);
        }

        return Auth::attempt([
            'username' => $account,
            'password' => $password,
        ], $remember);
    }

    /**
     * User logout function.
     *
     * @return void
     */
    public static function logout(): void
    {
        Auth::logout();
    }

    /**
     * User logout from current device function.
     *
     * @return void
     */
    public static function logoutCurrentDevice(): void
    {
        Auth::logoutCurrentDevice();
    }
}
