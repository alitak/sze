<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class BookCategory extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function books(): HasMany
    {
        return $this->hasMany(Book::class, 'category_id');
    }
}
