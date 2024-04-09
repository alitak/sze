<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Http\Request;
use Laravel\Scout\Searchable;

class Book extends Model
{
    use HasFactory;
    use Searchable;

    protected $guarded = ['id'];

    protected $with = [
        'category',
    ];

    public function toSearchableArray(): array
    {
        return [
            'title' => $this->title,
        ];
    }

    public static function makeAllSearchable()
    {
        self::makeAllSearchable();
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(BookCategory::class);
    }

    public function scopeSearchForAdmin(Builder $query, Request $request)
    {
        return $query
            ->when(
                $request->title,
                function (Builder $query, string $title) {
                    // where (title LIKE "%great Brain%" OR title LIKE "%great%" OR title LIKE "%Brain%)"
                    $query->where(function (Builder $query) use ($title) {
                        return $query->where('title', 'LIKE', '%' . $title . '%')
                            ->when(
                                str_contains($title, ' '),
                                function (Builder $query) use ($title) {
                                    foreach (explode(' ', $title) as $search) {
                                        $query->orWhere('title', 'LIKE', '%' . $search . '%');
                                    }
                                }
                            );
                    });
                })
            ->when(
                $request->category,
                fn (Builder $query, $categoryId) => $query->where('category_id', $categoryId),
            )
            ->when(
                $request->year['from'] && $request->year['to'],
                fn (Builder $query) => $query->whereBetween('year', $request->year)
//                ->where('year', '>=', $request->year['from'])
//                ->where('year', '<=', $request->year['to'])
            );
    }

}
