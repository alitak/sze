<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;

class RegisterRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name'     => ['required', 'string', 'min:1', 'max:255'],
            'email'    => ['required', Rule::unique('users', 'email'), 'email:rfc', 'max:255'],
            'password' => ['required', 'confirmed', Password::min(3)],
        ];
    }
}
