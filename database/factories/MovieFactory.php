<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Movie>
 */
class MovieFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->unique()->sentence(2),
            'description' => fake()->paragraph(true),
            'release_date' => fake()->Date(),
            'poster_url' => fake()->unique()->imageUrl(640, 480, 'animals', true)
        ];
    }
}
