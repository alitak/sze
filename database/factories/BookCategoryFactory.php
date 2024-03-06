<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class BookCategoryFactory extends Factory
{
    public function definition(): array
    {
        return [
            'title' => $this->faker->words(asText: true),
        ];
    }
}
