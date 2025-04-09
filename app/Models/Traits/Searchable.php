<?php

declare(strict_types=1);

namespace App\Models\Traits;

use Illuminate\Database\Eloquent\Builder;

trait Searchable
{
    public function scopeSearch(Builder $query, string|array $search): void
    {
        $search = explode(' ', (string)$search);

//        if (is_string($search)) {
//            $search = [$search];
//        }

        foreach ($search as $word) {
            foreach ($this->searchable as $column) {
                $query->orWhere($column, 'LIKE', '%' . $word . '%');
            }
        }
    }
}
