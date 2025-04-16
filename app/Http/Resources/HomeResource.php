<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class HomeResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'albums' => AlbumResource::collection($this->resource['albums']),
            'artists' => ArtistResource::collection($this->resource['artists']),
        ];
    }
}
