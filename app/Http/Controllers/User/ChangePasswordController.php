<?php

namespace App\Http\Controllers\User;

use App\Helpers\AuthenticationHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\UpdatePasswordRequest;
use App\Models\User;

class ChangePasswordController extends Controller
{
    /**
     * Display a change password view.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): \Illuminate\Http\Response
    {
        $title = 'Change Password';

        return response()->view('user.change-password', compact('title'));
    }

    /**
     * Update current user password in storage.
     *
     * @param  UpdatePasswordRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdatePasswordRequest $request): \Illuminate\Http\RedirectResponse
    {
        $account = $request->validated();

        $user = User::find($request->user()->id);
        $user->update(['password' => $account['newpassword']]);

        AuthenticationHelper::logoutCurrentDevice();

        return redirect()->route('web.authentication.login')->with([
            'successMessage' => 'Password has been changed. Please, login again.',
        ]);
    }
}
