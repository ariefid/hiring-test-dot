<?php

namespace App\Http\Controllers\Authentication;

use App\Http\Controllers\Controller;
use App\Http\Requests\Authentication\RegisterRequest;
use App\Models\User;

class RegisterController extends Controller
{
    /**
     * Display a register form.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): \Illuminate\Http\Response
    {
        $title = 'Register';

        return response()->view('authentication.register', compact('title'));
    }

    /**
     * Store a newly created user in storage.
     *
     * @param  RegisterRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(RegisterRequest $request): \Illuminate\Http\RedirectResponse
    {
        $account = collect($request->validated())->toArray();

        $create = User::create($account);

        $user = User::find($create->id);

        $user->markEmailAsVerified();

        return redirect()->route('web.authentication.login')->with([
            'successMessage' => 'Account '.$user->email.' has been created.',
        ]);
    }
}
