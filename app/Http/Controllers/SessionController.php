<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * @deprecated
 */
class SessionController extends Controller
{
    public function create()
    {
        return view('sessions.create', [
            'title' => 'Login',
        ]);
    }

    public function store(LoginRequest $request)
    {
        $credentials = $request->only('email', 'password');

        if (auth()->attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->route('home');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    //    public function destroy(Request $request)
    public function destroy()
    {
        //        auth()->logout();
        Auth::logout();

        //        $request->session()->invalidate();
        //        $request->session()->regenerateToken();

        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect()->route('home');
    }
}
