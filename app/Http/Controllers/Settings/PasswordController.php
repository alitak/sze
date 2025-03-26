<?php

declare(strict_types=1);

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use App\Http\Requests\PasswordRequest;

class PasswordController extends Controller
{
    public function edit()
    {
        return view('settings.password-change');
    }

    public function update(PasswordRequest $request)
    {
        auth()->user()->update($request->only('password'));

        return redirect()->route('settings.password-change')
            ->with('success', 'Password changed successfully.');
    }
}
