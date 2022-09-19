<?php

namespace App\Http\Requests\Authentication;

use App\Rules\LoginPasswordIsMatch;
use App\Rules\UserIsExists;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class LoginRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::guest();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'account' => [
                'required',
                new UserIsExists,
            ],
            'password' => [
                'required',
                new LoginPasswordIsMatch,
            ],
            'remember' => [
                'sometimes',
                'boolean',
            ],
        ];
    }
}
