<?php

namespace Tests\Feature;
use Tests\TestCase;
use App\Models\Movie;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Response;

class RouteTest extends TestCase
{
    use RefreshDatabase;
    
    public function testRoutes_Accessible()
    {
        //Create instance of movie and user
        $movie = Movie::factory()->create();
        $user = User::factory()->create();

        $appURL = env('APP_URL');
        //List of routes that should be accessible without authentication
        $unauth_urls = [
            '/health',
            '/',
            '/login',
            '/signup',
            '/movie/'. $movie->id,
        ];
        //List of routes that shouldn't be accessible without authentication
        $auth_urls = [
            '/account',
            '/user-profile',
            '/logout',
            '/watchlist',
            '/ratings',
        ];

        //Loop through the routes that should be accessible without authentication
        foreach ($unauth_urls as $url) {
            $response = $this->get($url);
            if((int)$response->status() !== Response::HTTP_OK){
                echo $appURL . $url . ' (FAILED)';
                echo $response->status();
                $this->assertTrue(false);
            } else {
                $this->assertTrue(true);
            }
        }

        //Loop through the routes that shouldn't be accessible without authentication as a logged in user

        foreach ($auth_urls as $url) {
            $response = $this->actingAs($user)->get($url);
            if((int)$response->status() !== Response::HTTP_OK &&
            $response->status() !== Response::HTTP_FOUND){
                echo $appURL . $url . ' (FAILED)';
                echo $response->status();
                $this->assertTrue(false);
            } else {
                $this->assertTrue(true);
            }
        }
    }

    public function testGuest_Cant_Access_Auth_Routes()
    {
        $appURL = env('APP_URL');

        //List of routes that shouldn't be accessible without authentication
        $auth_urls = [
            '/account',
            '/user-profile',
            '/logout',
            '/watchlist',
            '/ratings',
        ];

        //Loop through the routes that shouldn't be accessible without authentication
        foreach ($auth_urls as $url) {
            $response = $this->get($url);
            if((int)$response->status() !== Response::HTTP_OK){
                $this->assertTrue(true);
            } else {
                echo $appURL . $url . ' (FAILED)';
                echo $response->status();
                $this->assertTrue(false);
            }
        }
    }
}