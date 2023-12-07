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
            
        ];
    }

    /*Child user*/
    @return \Database\Factories\UserFactory
    public function childUser(): UserFactory
    {
        return $this->state(function (array $attributes) {
            //Commented $ratings out since it is not implemented in the database
            //$ratings = ['G', 'PG', 'PG-13'];
            $genres = ['Animation', 'Comedy', 'Fantasy'];
    
            return [
            'parent_id' => $mainUser->id,
            'name' => $this->faker->userName(),
            'restriction_genre' => $genres[array_rand($genres)],
            ];
        });
    }
}
