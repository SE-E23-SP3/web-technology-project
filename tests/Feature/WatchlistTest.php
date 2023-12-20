<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;
use App\Models\Movie;
use Illuminate\Support\Facades\DB;


class WatchlistTest extends TestCase
{
    use RefreshDatabase;    
    public function testUser_Can_Add_Movie_To_Watchlist()
    {
        // Creating an instance of user and movie
        $user = User::factory()->create();
        $movie = Movie::factory()->create();

        // Trying to add the movie to the watchlist
        $response = $this->actingAs($user)->post('/watchlist/add/' . $movie->id);

        // Asserting that the user was redirected
        $response->assertRedirect();
        // Asserting that the session has a message
        $response->assertSessionHas('message', 'Movie added to watchlist!');
        // Asserting that the movie was added to the watchlist
        $this->assertDatabaseHas('watchlist', [
            'user_id' => $user->id,
            'movie_id' => $movie->id,
        ]);
        // Asserting that the watchlist has one movie
        $this->assertDatabaseCount('watchlist', 1);
    }

    public function testUser_Can_Remove_Movie_From_Watchlist()
    {
        // Creating an instance of user and movie and adding the movie to the watchlist
        $user = User::factory()->create();
        $movie = Movie::factory()->create();
        $user->addMovieToWatchlist($movie);

        // Asserting that the movie was added to the watchlist
        $this->assertDatabaseHas('watchlist', [
            'user_id' => $user->id,
            'movie_id' => $movie->id,
        ]);
        //Removing the movie from the watchlist
        DB::table('watchlist')->where('user_id', '=', $user->id)->where('movie_id', '=', $movie->id)->delete();
        //Asserting that the movie was removed from the watchlist
        $this->assertDatabaseMissing('watchlist', [
            'user_id' => $user->id,
            'movie_id' => $movie->id,
        ]);
    }    

    public function testGuest_Cant_Add_Movie_To_Watchlist()
    {
        // Creating an instance of user and a movie
        $movie = Movie::factory()->create();

        // Trying to add the movie to the watchlist as guest
        $response = $this->post('/watchlist/add/' . $movie->id);

        // Asserting that the user was redirected
        $response->assertRedirect();
        // Asserting that the watchlist is empty
        $this->assertDatabaseCount('watchlist', 0);
    }
}