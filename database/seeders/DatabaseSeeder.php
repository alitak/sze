<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            BookCategoriesSeeder::class,
            //            BooksSeeder::class,
        ]);

        User::query()->create([
            'name'     => 'Kukel Attila',
            'email'    => 'your.email+fakedata76414@gmail.com',
            'password' => '$2y$10$mNW2OphtVRI9e0CLf/8SkeKGvFgRi7v3HJ/QRHUokdxnm5l7zY1ka',
            'is_admin' => true,
        ]);

    }
}
