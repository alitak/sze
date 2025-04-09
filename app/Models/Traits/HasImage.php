<?php

declare(strict_types=1);

namespace App\Models\Traits;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Support\Facades\Storage;

trait HasImage
{
    public function imageUrl(): Attribute
    {
        return Attribute::make(fn () => $this->image
            ? Storage::disk('public')->url($this->image)
            : 'https://placehold.co/215x160'
        );
    }
}
