<?php

namespace Database\Seeders;

use App\Models\BookCategory;
use Illuminate\Database\Seeder;

class BookCategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        BookCategory::query()->firstOrCreate([
            'title' => 'fantasy',
        ]);
        BookCategory::query()->firstOrCreate([
            'title' => 'sci-fi',
        ]);
    }
}
