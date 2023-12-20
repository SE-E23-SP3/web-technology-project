<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Illuminate\Support\Facades\Hash;


class SignupTest extends TestCase

{/*
    use RefreshDatabase;
    
    public function testSignup()
    {
        //$hashedPassword = Hash::make('asdfghjklæøasd');
        $userData = [
            'username' => 'TestUser',
            'email' => 'TestUser@example.com',
            'password' => 'Skrrrbrrrrr124'
        ];
    
        $response = $this->postJson('/signup/submit', $userData);
    
        $response->assertStatus(202);
        $this->assertDatabaseHas('users', [
            'username' => 'TestUser',
            'email' => 'TestUser@example.com',
        ]);
    }*/
}