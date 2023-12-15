<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Movie;

class WatchlistSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::inRandomOrder()->each(function ($user) {
            for ($i = 0; $i < random_int(7, 25); $i++) {
                $movie = Movie::inRandomOrder()->first();
                $user->addMovieToWatchlist($movie);
            }
        });
    }
}
