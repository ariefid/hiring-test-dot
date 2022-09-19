<?php

namespace App\Http\Controllers\Authentication;

use App\Helpers\AuthenticationHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Authentication\LoginRequest;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Display a login form.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): \Illuminate\Http\Response
    {
        $title = 'Login';

        return response()->view('authentication.login', compact('title'));
    }

    /**
     * Check if user credentials right.
     *
     * @param  LoginRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(LoginRequest $request): \Illuminate\Http\RedirectResponse
    {
        $account = collect($request->validated());

        $auth = AuthenticationHelper::attempt($account->only(['account', 'password', 'remember']));

        if (! $auth) {
            return redirect()->route('web.authentication.login')->withInput($request->input())->withErrors([
                'errorMessage' => 'Account information doesn\'t match in our database.',
            ]);
        }

        $user = Auth::user();

        return redirect()->route('web.dashboard.index')->with([
            'successMessage' => 'Welcome back, '.($user->username ?? $user->email),
        ]);
    }
}
