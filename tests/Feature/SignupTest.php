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
            'email' => 'testuser@example.com',
            'hashedPassword' => PasswordTools::makeClientHash('TestUser@example.com', 'TestPassword1234'),
        ];
        //Post the user data to the signup route
        $response = $this->postJson('/signup/submit', $userData);
        //Assert that the request was successful
        $response->assertStatus(Response::HTTP_ACCEPTED);

        //Assert that the user is in the database
        $this->assertDatabaseHas('users', [
            'username' => 'TestUser',
            'email' => 'testuser@example.com'
        ]);

    }
    
        public function testSignup_With_Wrong_criteria_Username()
    {
        //Create user data with invalid username
        $userData = [
            'username' => 'T',
            'email' => 'TestUser@example.com',
            'hashedPassword' => PasswordTools::makeClientHash('TestUser@example.com', 'TestPassword1234'),
        ];
        //Post the user data to the signup route
        $response = $this->postJson('/signup/submit', $userData);
        //Assert that the request was unsuccessful
        $response->assertStatus(Response::HTTP_BAD_REQUEST);
    }

    public function testSignup_With_Wrong_criteria_Email()
    {
        //Create user data with invalid email
        $userData = [
            'username' => 'TestUser',
            'email' => 'T',
            'hashedPassword' => PasswordTools::makeClientHash('TestUser@example.com', 'TestPassword1234'),
        ];
        //Post the user data to the signup route
        $response = $this->postJson('/signup/submit', $userData);
        //Assert that the request was unsuccessful
        $response->assertStatus(Response::HTTP_BAD_REQUEST);
    }

    public function testSignup_With_Wrong_criteria_Password()
    {
        //Create user data with invalid password
        $userData = [
            'username' => 'TestUser',
            'email' => 'TestUser@example.com',
            'hashedPassword' => 'T',
        ];
        //Post the user data to the signup route
        $response = $this->postJson('/signup/submit', $userData);
        //Assert that the request was unsuccessful
        $response->assertStatus(Response::HTTP_BAD_REQUEST);
    }

    public function testSignup_Username_Taken()
    {
        //Create user data
        $userData = [
            'username' => 'TestUser',
            'email' => 'testuser@example.com',
            'hashedPassword' => PasswordTools::makeClientHash('TestUser@example.com', 'TestPassword1234'),
        ];
        //Post the user data to the signup route
        $response = $this->postJson('/signup/submit', $userData);
        //Assert that the request was successful
        $response->assertStatus(Response::HTTP_ACCEPTED);
        
        //Create new user data
        $userData2 = [
            'username' => 'TestUser',
            'email' => 'testuser2@example.com',
            'hashedPassword' => PasswordTools::makeClientHash('TestUser@example.com', 'TestPassword1234'),
        ];
        //Post the new user data to the signup route
        $response = $this->postJson('/signup/submit', $userData2);
        //Assert that the request was unsuccessful
        $this->assertNotEquals(Response::HTTP_ACCEPTED, $response->status());
    }

    public function testSignup_Email_Taken()
    {
        //Create user data
        $userData = [
            'username' => 'TestUser',
            'email' => 'testuser@example.com',
            'hashedPassword' => PasswordTools::makeClientHash('TestUser@example.com', 'TestPassword1234'),
        ];
        //Post the user data to the signup route
        $response = $this->postJson('/signup/submit', $userData);
        //Assert that the request was successful
        $response->assertStatus(Response::HTTP_ACCEPTED);
        
        //Create new user data
        $userData2 = [
            'username' => 'TestUser2',
            'email' => 'testuser@example.com',
            'hashedPassword' => PasswordTools::makeClientHash('TestUser@example.com', 'TestPassword1234'),
        ];
        //Post the new user data to the signup route
        $response = $this->postJson('/signup/submit', $userData2);
        //Assert that the request was unsuccessful
        $this->assertNotEquals(Response::HTTP_ACCEPTED, $response->status());
    }
}