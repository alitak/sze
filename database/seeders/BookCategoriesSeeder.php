<?php

namespace Database\Seeders;

use App\Models\BookCategory;
use Illuminate\Database\Seeder;

class BookCategoriesSeeder extends Seeder
{

    public array $categories = [
        'Literary fiction',
        'Mystery',
        'New adult',
        'Romance',
        'Satire',
        'Science fiction',
        'Short story',
        'Thriller',
        'Western',
        'Women’s fiction',
        'Young adult',
        'Art & photography',
        'Autobiography/Memoir',
        'Biography',
        'Essays',
        'Food & drink',
        'History',
        'How-To/Guides',
        'Humanities & social sciences',
        'Humor',
        'Parenting',
        'Philosophy',
        'Religion & spirituality',
        'Science & technology',
        'Self-help',
        'Travel',
        'True crime',
    ];

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach ($this->categories as $category) {
            BookCategory::query()->firstOrCreate([
                'title' => $category,
            ]);
        }
    }
}
