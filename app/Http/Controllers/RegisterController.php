<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;

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
        User::query()->create($request->validated());

        return redirect()->route('register.create')->with('success', 'Your account has been created.');
    }

}
