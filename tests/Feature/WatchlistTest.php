<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Illuminate\Support\Facades\DB;


class WatchlistTest extends TestCase
{
    use RefreshDatabase;    
public function testInstantiateModel(): void
{
    {
        $this->withoutMiddleware();
        $hashedPassword = Hash::make('asdfghjklæøasd');
        $userData = [
            'username' => 'TestUser',
            'email' => 'TestUser@example.com',
            'hashedPassword' => $hashedPassword
        ];
    
        $response = $this->post('/signup/submit', $userData);
    
        $response->assertStatus(202);
        $this->assertDatabaseHas('users', [
            'username' => 'TestUser',
            'email' => 'TestUser@example.com',
        ]);
    }
}

}