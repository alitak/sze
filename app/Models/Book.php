<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
//    protected $table = 'books';
    public $timestamps = false;

    protected $guarded = [
        'id',
    ];

//    protected $fillable = [
//        'title',
//    ];

}
