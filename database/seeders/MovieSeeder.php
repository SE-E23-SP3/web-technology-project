<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Movie;
use App\Models\Genre;
use App\Models\User;
use App\Models\Person;
use App\Models\CrewType;

class MovieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Movie::factory()->count(30)->create()->each(function ($movie) {
            for ($i = 0; $i < random_int(2, 6); $i++) {
                $genre = Genre::inRandomOrder()->first();
                $movie->addGenre($genre);
            }
            for ($i = 0; $i < random_int(5, 20); $i++) {
                $user = User::inRandomOrder()->first();
                $movie->addRating($user, random_int(0, 10));
            }
            for ($i = 0; $i < random_int(20, 40); $i++) {
                $person = Person::inRandomOrder()->first();
                $crewType = CrewType::inRandomOrder()->first();
                $movie->addCrew($person, $crewType);
            }
            for ($i = 0; $i < random_int(20, 30); $i++) {
                $person = Person::inRandomOrder()->first();
                $movie->addRole($person, fake()->firstName());
            }
            $movie->addTrailer('https://www.youtube.com/embed/KAOdjqyG37A');
        });
    }
}
