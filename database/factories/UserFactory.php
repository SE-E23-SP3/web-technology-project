<?php

namespace Database\Factories;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

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
            
        ];
    }

    

    /*Child user*/

    public function childUser(): UserFactory
    {
        return $this->state(function (array $attributes) {
            $genres = ['Animation', 'Comedy', 'Fantasy'];

            return [
                'parent_id' => User::factory(),
                'name' => $this->faker->userName(),
                'restriction_genre' => $genres[array_rand($genres)],
            ];
        });
    }
}