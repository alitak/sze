<?php

declare(strict_types=1);

namespace App\Models;

use App\Models\Traits\HasImage;
use App\Models\Traits\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @mixin IdeHelperLabel
 */
class Label extends Model
{
    use HasImage;
    use Searchable;

    private array $searchable = [
        'name',
    ];

    protected $guarded = [];

    public function albums(): HasMany
    {
        return $this->hasMany(Album::class);
    }
}
