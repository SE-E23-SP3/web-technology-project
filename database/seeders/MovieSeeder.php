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
        //Changed it so it makes 300 movies instead
        Movie::factory()->count(300)->create()->each(function ($movie) {
            $selectedGenres = [];
            //Adds two different genres to the movies
            for ($i = 0; $i < 2; $i++) {
                $genre = Genre::whereNotIn('id', $selectedGenres)->inRandomOrder()->first();
                if (!$genre) {
                    break;
                }
                $selectedGenres[] = $genre->id;
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
