<?php
namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;
use App\Models\Genre;

class GenreSeeder extends Seeder
{
    public function run(): void
    {
        $genreNames = ['Action', 'Drama', 'Comedy', 'Horror', 'Romantic', 'Rom-Com', 'Fantasy', 'Sci-fi'];

        foreach ($genreNames as $genreName) {
            Genre::create(['genre_name' => $genreName]);
        }
    }
}
