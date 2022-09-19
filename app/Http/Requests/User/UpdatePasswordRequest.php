<?php

namespace App\Http\Requests\User;

use App\Rules\CurrentPasswordIsMatch;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;

class UpdatePasswordRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'currentpassword' => [
                'required',
                Password::defaults(),
                new CurrentPasswordIsMatch,
            ],
            'newpassword' => [
                'required',
                Password::defaults(),
                'confirmed',
            ],
        ];
    }
}
