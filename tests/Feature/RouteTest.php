<?php

namespace Tests\Feature;
use Tests\TestCase;

class RouteTest extends TestCase
{
    public function testRoutes()
    {
        $appURL = env('APP_URL');
        $urls = [
            '/',
            '/login',
            '/signup',
        ];

        foreach ($urls as $url) {
            $response = $this->get($url);
            if((int)$response->status() !== 200){
                echo $appURL . $url . ' ---(FAILED)---';
                $this->assertTrue(false);
            } else {
                $this->assertTrue(true);
            }
        }
        //ROUTE TIL ALLE
        //TJEK AUTH ROUTES
        //ROUTE KNAPPER

        //DB VIRKER WATCHLIST
        //DB VIRKER FAVORITES

        //HTTP test user creation

        //BROWSER TESTS (INTERACTION)
    }
}