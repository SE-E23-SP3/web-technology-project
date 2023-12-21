<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;
use App\Core\PasswordTools;
use Illuminate\Http\Response;



class SigninTest extends TestCase

{
    use RefreshDatabase;
    
    public function testSignin()
    {
        //Create user data
        $userData = [
            'username' => 'TestUser',
            'email' => 'TestUser@example.com',
            'hashedPassword' => PasswordTools::makeClientHash('TestUser@example.com', 'TestPassword1234'),
        ];
        //Post the user data to the signup route
        $this->postJson('/signup/submit', $userData);

        //Post the user data to the signup route  
        $response = $this->post('/login/submit', $userData);
        //Assert that the request was successful
        $response->assertStatus(Response::HTTP_FOUND);
    }
    public function testSignin_Wrong_Credentials()
    {
        //Create user data
        $userData = [
            'username' => 'TestUser',
            'email' => 'TestUser@example.com',
            'hashedPassword' => PasswordTools::makeClientHash('TestUser@example.com', 'TestPassword1234'),
        ];
        //Post the user data to the signup route
        $this->postJson('/signup/submit', $userData);

        //Post the user data to the login route with wrong password
        $response = $this->postJson('/login/submit', [
            'username' => 'TestUser',
            'email' => 'TestUser@example.com',
            'hashedPassword' => PasswordTools::makeClientHash('TestUser@example.com', 'WRONGPASSWORD')
        ]);
        //Assert that the request was unsuccessful
        $this->assertNotEquals(Response::HTTP_OK, $response->status());
    }
}