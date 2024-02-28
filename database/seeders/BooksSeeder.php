<?php

namespace Database\Seeders;

use App\Models\Book;
use Illuminate\Database\Seeder;

class BooksSeeder extends Seeder
{
    public function run(): void
    {
        $books = [
            [
                'title' => 'Az alapítvány',
            ],
            [
                'title' => 'Hyperion',
            ],
        ];

        foreach ($books as $book) {
            Book::query()->firstOrCreate([
                'title' => $book['title'],
            ], [

            ]);
        }
    }
}
