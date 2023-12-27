<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Support\Facades\DB;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class MoviePageTest extends DuskTestCase
{
    use DatabaseTransactions;
    
    public function testNavigate_And_Test_Movie_Page(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
            ->assertSee('Action')  //Check that the page contains the text "Action"
            ->click('.movie-link') //Click on the first movie
            ->assertPathIs('/movie/*');

        //Get the current URL
        $url = $browser->driver->getCurrentURL();

        //Parse the URL to get the path
        $path = parse_url($url, PHP_URL_PATH);

        //Splitting the path into segments and get the last segment
        $segments = explode('/', $path);
        $movieId = end($segments);

        //Assert that the path is /movie/{movieId}
        $browser->assertPathIs('/movie/'.$movieId);

        // Fetch the movie data from the database
        $movieTitle = DB::table('movies')->where('id', $movieId)->value('title');
        $movieDescription = DB::table('movies')->where('id', $movieId)->value('description');
        $movieDuration = DB::table('movies')->where('id', $movieId)->value('duration');
        $movieReleaseDate = DB::table('movies')->where('id', $movieId)->value('release_date');
        $averageRating = DB::table('movie_rating')
        ->where('movie_id', $movieId)
        ->avg('rating');
        $averageRating = number_format($averageRating, 1);
        
        //Assert that the movie information is displayed correct on the page
        $browser->assertSee($movieTitle);
        $browser->assertSee($movieDescription);
        $browser->assertSee($movieDuration);
        $browser->assertSee($movieReleaseDate);
        $browser->assertSee($averageRating);
        
        
        });
    }
}