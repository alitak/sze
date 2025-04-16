<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\AlbumResource;
use App\Http\Resources\ArtistResource;
use App\Http\Resources\HomeResource;
use App\Models\Album;
use App\Models\Artist;
use App\Models\Label;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __invoke(Request $request)
    {
        $labels = Label::query()->limit(3)->get();
        $artists = Artist::query()->with(['albums' => ['artist', 'label']])->limit(3)->get();
        $albums = Album::query()->with('artist', 'label')
            ->limit(6)
            ->inRandomOrder()
            ->get();

//        return response()->json([
//            'data' => [
//                'albums' => AlbumResource::collection($albums),
//                'artists' => ArtistResource::collection($artists),
////                'labels' => LabelResource::collection($labels),
//            ],
//        ]);


        return HomeResource::make([
            'albums' => $albums,
            'artists' => $artists,
        ]);
    }
}
