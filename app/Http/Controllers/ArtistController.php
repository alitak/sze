<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;

class ArtistController extends Controller
{
    public function index(): View
    {
        return view('artists.index', [
            'title' => 'Artists',
        ]);
    }

    public function show($id): View
    {
        return view('artists.show', [
            'title' => 'Artist',
            'id'    => $id,
        ]);
    }
}
