<?php

declare(strict_types=1);

namespace App\Models;

use App\Models\Traits\HasImage;
use App\Models\Traits\Searchable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @mixin IdeHelperArtist
 */
class Artist extends Model
{
    use HasFactory;
    use HasImage;
    use Searchable;

    protected $guarded = [];

    private array $searchable = [
        'name',
    ];

    public function albums(): HasMany
    {
        return $this->hasMany(Album::class);
    }
}
