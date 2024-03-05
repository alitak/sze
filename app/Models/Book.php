<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Book extends Model
{
    protected $guarded = ['id'];

    public function category(): BelongsTo
    {
        return $this->belongsTo(BookCategory::class);
    }
}
