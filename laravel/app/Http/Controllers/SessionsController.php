<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Http\Requests\SessionRequest;
use App\Models\User;

class SessionsController extends Controller
{
    public function create()
    {
        return view('sessions.create');
    }

    public function store(SessionRequest $request)
    {
        if (!auth()->attempt($request->validated())) {
            return redirect('/login')
                ->withInput()
                ->withErrors(['email' => 'Hibás bejelentkezési adatok']);
        }

        return redirect('/posts')->with('message', 'Sikeres bejelentkezés');
    }

    public function destroy()
    {
        auth()->logout();

        return redirect('/');
    }
}
