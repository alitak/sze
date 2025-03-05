<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Label extends Model
{
    protected $guarded = [];

    public function albums(): HasMany
    {
        return $this->hasMany(Album::class);
    }
}
