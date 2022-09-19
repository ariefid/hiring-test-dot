<?php

namespace App\Http\Requests\Authentication;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;

class RegisterRequest extends FormRequest
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
            'email' => [
                'required',
                'max:100',
                'email:rfc,dns,spoof,filter',
                'unique:App\Models\User,email',
            ],
            'username' => [
                'required',
                'min:5',
                'max:30',
                'unique:App\Models\User,username',
            ],
            'password' => [
                'required',
                Password::defaults(),
                'confirmed',
            ],
        ];
    }
}
