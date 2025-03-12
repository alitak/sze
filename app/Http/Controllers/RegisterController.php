<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;

class RegisterController extends Controller
{
    public function create()
    {
        if (auth()->check()) {
            return redirect()->route('home');
        }

        return view('register.create', [
            'title' => 'Register',
        ]);
    }

    public function store(RegisterRequest $request): RedirectResponse
    {
        if (auth()->check()) {
            return redirect()->route('home');
        }

        User::query()->create($request->validated());

        return redirect()->route('register.create')->with('success', 'Your account has been created.');
    }

}
