<?php

namespace Tests\Feature;
use Tests\TestCase;

class RouteTest extends TestCase
{
    public function testRoutes_Accessible()
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
        //BROWSER TESTS (INTERACTION)(SEE IF MOVIE NAME IS THE SAME AS DATABASE) (VIGTIGT)
        //TJEK AUTH ROUTES (Måske login hvis man er logget ind)
        //Tjek EDIT PROFILE PAGE 

        //Skriv om preformence er lort derfor ingen preformence test
    }
}