<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\BookCategory;
use Illuminate\Database\Seeder;

class BooksSeeder extends Seeder
{
    public function run(): void
    {
//        $bookCategories = [];
//        foreach (BookCategory::all() as $bookCategory) {
//            $bookCategories[$bookCategory->title] = $bookCategory->id;
//        }

        $bookCategories = BookCategory::query()->pluck('id', 'title')->toArray();
        $books = [
            [
                'category_id' => $bookCategories['sci-fi'],
                'title'       => 'Az alapítvány',
            ],
            [
                'category_id' => $bookCategories['sci-fi'],
                'title'       => 'Hyperion',
            ],
        ];

        foreach ($books as $book) {
            Book::query()->firstOrCreate([
                'title' => $book['title'],
            ], [
                'category_id' => $book['category_id'],
            ]);
        }
    }
}
