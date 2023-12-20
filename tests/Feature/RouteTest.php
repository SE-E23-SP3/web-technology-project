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
        //TJEK AUTH ROUTES (Måske login hvis man er logget ind)
        //BROWSER TESTS (INTERACTION)(SEE IF MOVIE NAME IS THE SAME AS DATABASE) (VIGTIGT)

        //Skriv om preformence er lort derfor ingen preformence test
    }
}