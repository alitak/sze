<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class AlbumFactory extends Factory
{
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(3),
            'artist' => $this->faker->name(),
            'year' => $this->faker->year(),
            'label' => $this->faker->company(),
            'duration' => $this->faker->randomDigit(),
        ];
    }
}
