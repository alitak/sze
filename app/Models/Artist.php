<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Storage;

class Artist extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function albums(): HasMany
    {
        return $this->hasMany(Album::class);
    }

    public function imageUrl(): Attribute
    {
        return Attribute::make(fn () => $this->image
            ? Storage::disk('public')->url($this->image)
            : 'https://placehold.co/220x160'
        );
    }
}
