<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileRequest;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function edit()
    {
        return view('profile.edit', [
            'user' => auth()->user(),
        ]);
    }

    public function update(ProfileRequest $request)
    {
//        auth()->user()->update($request->validated());
        auth()->user()->update([
            'name' => $request->get('name'),
        ]);

        return redirect()->route('profile.edit')->with('success', 'Profile updated successfully');
    }
}
