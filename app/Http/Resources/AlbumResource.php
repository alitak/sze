<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AlbumResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->description,
            'artist' => $this->artist->name,
            'artist_image' => $this->artist->image_url,
            'label' => $this->label?->name,
            'image' => $this->image_url,
            'year' => $this->year,
            'duration' => $this->duration,
        ];
    }
}
