<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class SessionsController extends Controller
{
    public function create()
    {
        return view('sessions.create');
    }

    public function store(Request $request)
    {
//        Auth::attempt()
        if (auth()->attempt([
                'email'    => $request->email,
                'password' => $request->password,
            ]) === false) {
            throw ValidationException::withMessages(['email' => 'Invalid email/password']);
//            return back()->withErrors(['email' => 'Invalid email/password']);
        }

        session()->regenerate();

        return redirect()->route('home');
    }

    public function destroy()
    {
        auth()->logout();

        return redirect()->route('home');
    }
}
