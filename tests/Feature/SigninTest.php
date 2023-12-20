<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;



class SigninTest extends TestCase

{/*
    use RefreshDatabase;
    
    public function testSignin()
    {
        //Create an instance of user
        $user = User::factory()->create([
            'password' => Hash::make('testpassword')
        ]);

    
        $response = $this->postJson('/login/submit', [
            'email' => $user->email,
            'hashedPassword' => $user->password
        ]);
    
        $response->assertStatus(Response::HTTP_ACCEPTED);
    }*/
}