<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Core\PasswordTools;
use Illuminate\Http\Response;


class SignupTest extends TestCase

{
    use RefreshDatabase;
    
    public function testSignup()
    {
        //Create user data
        $userData = [
            'username' => 'TestUser',
            'email' => 'TestUser@example.com',
            'hashedPassword' => PasswordTools::makeClientHash('TestUser@example.com', 'TestPassword1234'),
        ];
        //Post the user data to the signup route
        $response = $this->postJson('/signup/submit', $userData);
        //Assert that the request was successful
        $response->assertStatus(Response::HTTP_ACCEPTED);

        //Assert that the user is in the database
        $this->assertDatabaseHas('users', [
            'username' => 'TestUser',
            'email' => 'TestUser@example.com'
        ]);

    }
    
        public function testSignup_With_Wrong_criteria()
    {
        //Create user data with invalid email, username and password
        $userData = [
            'username' => 'T',
            'email' => 'T',
            'hashedPassword' => PasswordTools::makeClientHash('T', 'T'),
        ];
        //Post the user data to the signup route
        $response = $this->postJson('/signup/submit', $userData);
        //Assert that the request was unsuccessful
        $response->assertStatus(Response::HTTP_BAD_REQUEST);
    }
}