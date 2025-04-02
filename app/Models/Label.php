<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Storage;

/**
 * @mixin IdeHelperLabel
 */
class Label extends Model
{
    protected $guarded = [];

    public function albums(): HasMany
    {
        return $this->hasMany(Album::class);
    }

    public function imageUrl(): Attribute
    {
        return Attribute::make(fn () => $this->image
            ? Storage::disk('public')->url($this->image)
            : 'https://placehold.co/215x160'
        );
    }
}
