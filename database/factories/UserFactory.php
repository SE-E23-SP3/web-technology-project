<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id' => $this->faker->unique()->randomNumber(),
            'username' => fake()->userName(),
            'email' => fake()->unique()->safeEmail(),
            'password' => fake()->unique()->sha256(),
            'parent_id' => null,
        ];
    }

    /*Child user*/
    @return \Database\Factories\UserFactory

    public function childUser(): UserFactory
{
    return $this->state(function (array $attributes) {
        return [
            'parent_id' => User::factory()->create()->id,
            'name' => $this->faker->userName(),
            'restrction_rating' => $this->faker->randomElement(['G', 'PG', 'PG-13', 'R', 'NC-17']),
            'restriction_genre' => $this->faker->randomElement(['Horror', 'Porn', 'Animation', 'Comedy', 'Fantasy', 'Romance', 'Science Fiction', 'Thriller']),
        ];
    });
}
