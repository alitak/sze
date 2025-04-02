<?php

declare(strict_types=1);

namespace App\Models;

use App\Models\Traits\HasImage;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Storage;

/**
 * @mixin IdeHelperLabel
 */
class Label extends Model
{
    use HasImage;

    protected $guarded = [];

    public function albums(): HasMany
    {
        return $this->hasMany(Album::class);
    }
}
