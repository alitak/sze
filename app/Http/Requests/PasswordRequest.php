<?php

declare(strict_types=1);

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class PasswordRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'old_password' => ['current_password'],
            'password'     => ['required', Password::defaults(), 'confirmed'],
        ];
    }
}
