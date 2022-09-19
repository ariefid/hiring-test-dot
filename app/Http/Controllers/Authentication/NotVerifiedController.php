<?php

namespace App\Http\Controllers\Authentication;

use App\Helpers\AuthenticationHelper;
use App\Http\Controllers\Controller;

class NotVerifiedController extends Controller
{
    /**
     * Check if user not verified.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function index(): \Illuminate\Http\RedirectResponse
    {
        AuthenticationHelper::logout();

        return redirect()->route('web.authentication.login')->withErrors([
            'errorMessage' => 'You must verify your account.',
        ]);
    }
}
