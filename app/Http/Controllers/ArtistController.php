<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Artist;
use Illuminate\Contracts\View\View;

class ArtistController extends Controller
{
    public function index(): View
    {
        return view('artists.index', [
            'title'   => 'Artists',
            'artists' => Artist::query()->get(),
        ]);
    }

    public function show(Artist $artist): View
    {
        return view('artists.show', [
            'title'  => $artist->name,
            'artist' => $artist,
        ]);
    }
}
