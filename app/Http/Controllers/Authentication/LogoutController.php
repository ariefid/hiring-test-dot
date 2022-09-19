<?php

namespace App\Http\Controllers\Authentication;

use App\Helpers\AuthenticationHelper;
use App\Http\Controllers\Controller;

class LogoutController extends Controller
{
    /**
     * Logout current device user.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function index(): \Illuminate\Http\RedirectResponse
    {
        AuthenticationHelper::logoutCurrentDevice();

        return redirect()->route('web.authentication.login')->with([
            'successMessage' => 'You have logged out successfully.',
        ]);
    }
}
