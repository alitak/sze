<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;

/**
 * @deprecated
 */
class RegisterController extends Controller
{
    public function create()
    {
        return view('register.create', [
            'title' => 'Register',
        ]);
    }

    public function store(RegisterRequest $request): RedirectResponse
    {
        $user = User::query()->create($request->validated());

        auth()->login($user);
        //        auth()->loginUsingId($user->id);

        return redirect()->route('home')->with('success', 'Your account has been created.');
    }
}
