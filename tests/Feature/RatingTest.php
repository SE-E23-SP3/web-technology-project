<?php

namespace Tests\Feature;

use App\Models\Movie;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RatingTest extends TestCase
{
    use RefreshDatabase;

    public function testUser_Can_Rate_Movie()
    {
        //Create an instance of user and movie
        $user = User::factory()->create();
        $movie = Movie::factory()->create();

        //Rate movie as user
        $response = $this->actingAs($user)->post('/movies/' . $movie->id . '/rate', [
            'rating' => 5,
        ]);

        //Assert that the user was redirected
        $response->assertRedirect();
        //Assert that the session has a message
        $response->assertSessionHas('message', 'Movie rated!');
        $this->assertDatabaseHas('movie_rating', [
            'user_id' => $user->id,
            'movie_id' => $movie->id,
            'rating' => 5,
        ]);
    }

    public function testGuest_Cant_Rate_Movie()
    {
        //Create an instance of movie
        $movie = Movie::factory()->create();
        //Rate movie as guest
        $response = $this->post('/movies/' . $movie->id . '/rate', [
            'rating' => 5,
        ]);
        //Assert that the session has an error
        $response->assertSessionHas('error', 'User not found!');
        //Assert that the movie was not rated
        $this->assertDatabaseMissing('movie_rating', [
            'movie_id' => $movie->id,
            'rating' => 5,
        ]);
    }
}