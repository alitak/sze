<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Storage;

/**
 * @mixin IdeHelperAlbum
 */
class Album extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function artist(): BelongsTo
    {
        return $this->belongsTo(Artist::class);
    }

    public function label(): BelongsTo
    {
        return $this->belongsTo(Label::class);
    }

    public function durationForHumans(): Attribute
    {
        return Attribute::make(
            function (): string {
                $minutes = floor($this->duration / 60);
                $minutes = str_pad((string)$minutes, 2, '0', STR_PAD_LEFT);

                $seconds = $this->duration % 60;
                $seconds = str_pad((string)$seconds, 2, '0', STR_PAD_LEFT);

                return $minutes . ':' . $seconds;
            },
        );
    }

     public function imageUrl(): Attribute
    {
        return Attribute::make(fn () => $this->image
            ? Storage::disk('public')->url($this->image)
            : 'https://placehold.co/215x160'
        );
    }
}
