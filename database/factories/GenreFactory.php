<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Genre;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Genre>
 */
class GenreFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $genreNames = ['Action', 'Drama', 'Comedy', 'Horror', 'Romantic', 'Rom-Com', 'Fantasy', 'Sci-fi'];

        return [
            'genre_name' => $this->faker->unique()->randomElement($genreNames),
        ];
    }
}
