<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Book extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $with = [
        'category',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(BookCategory::class);
    }
}
