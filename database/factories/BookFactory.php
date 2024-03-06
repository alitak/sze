<?php

namespace Database\Factories;

use App\Models\BookCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

class BookFactory extends Factory
{
    public function definition(): array
    {
        return [
            'category_id' => BookCategory::factory(),
            'title'       => $this->faker->words(asText: true),
            'author'      => $this->faker->name(),
            'year'        => $this->faker->year(),
        ];
    }
}
