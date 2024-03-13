<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Contracts\View\View;

class RegisterController extends Controller
{
    public function create(): View
    {
        return view('register.create');
    }

    public function store(RegisterRequest $request)
    {
        $validated = $request->validated();
        $user = User::query()->create([
            'name'     => $validated['name'],
            'email'    => $validated['email'],
            'password' => bcrypt($validated['password']),
        ]);
//dd($user->created_at);
        return redirect()->route('books.index')->with('success', 'Sikeres regisztráció');
    }
}
