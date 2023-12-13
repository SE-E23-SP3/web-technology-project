<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
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
    }
}
