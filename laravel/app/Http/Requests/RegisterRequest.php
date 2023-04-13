<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class RegisterRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['string', 'min:3', 'max:255'],
            'email' => ['string', 'max:255', 'email:rfc,dns', 'unique:users,email'],
            'password' => ['string', Password::min(1)],
        ];
    }

}
