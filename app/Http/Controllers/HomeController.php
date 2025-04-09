<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Artist;
use App\Models\Label;
use Illuminate\Contracts\View\View;

class HomeController extends Controller
{
    public function __invoke(): View
    {
        $labels = Label::query()->limit(3)->get();
        $artists = Artist::query()->limit(3)->get();
        $albums = Album::query()->with('artist')
            ->limit(6)
//            ->latest()
            ->inRandomOrder()
            ->get();

        return view('home', [
            'labels'  => $labels,
            'artists' => $artists,
            'albums'  => $albums,
        ]);
    }
}
