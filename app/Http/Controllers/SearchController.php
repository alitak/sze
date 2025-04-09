<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Artist;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    //        $albums = Album::query()
    //            ->where(
    //                function ($query) {
    //                    $query->where('title', 'like', '%' . request('search') . '%')
    //                        ->orWhere('description', 'like', '%' . request('search') . '%');
    //                }
    //            )
    // //            ->where(function ($query) {
    // //                $query->where('artist_id', 3)
    // //                    ->orWhere('artist_id', 4);
    // //            })
    //            ->whereIn('artist_id', [3, 4])
    //            ->get();
    // WHERE `title` like '%Metallica%'
    public function __invoke(Request $request): void
    {
        $search = $request->input('search');

//        $artists = Artist::query()
//            ->search($search)
//            ->pluck('id');

//            ->orWhereIn('artist_id', $artists)
        $albums = Album::query()
            ->whereHas('artist', fn($query) => $query->search($search))
            ->orWhere(fn($query) => $query->doesntHave('label')->orWhereHas('label', fn($query) => $query->search($search)))
            ->search($search)
            ->get();

        dump($albums->toArray());
    }
}
