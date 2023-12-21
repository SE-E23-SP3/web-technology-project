<?php

namespace Tests\Feature;

use App\Models\Movie;
use App\Models\User;
use Doctrine\DBAL\Logging\Middleware;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Illuminate\Http\Response;
use App\Core\PasswordTools;
use Illuminate\Support\Facades\Hash;

class AccountTest extends TestCase
{
    use RefreshDatabase;

    public function testUpdate_Username()
    {
        //Create instance of user
        $user = User::factory()->create([
            'username' => 'oldUsername',
        ]);

        //Check if user is created
        $this->assertDatabaseHas('users', [
            'id' => $user->id,
            'username' => 'oldUsername',
        ]);

        //Update username
        $response = $this->actingAs($user)->putJson('/account/submit/updateusername', [
            'username' => 'newUsername',
        ]);

        //Check if username is updated
        $response->assertStatus(202);
        $this->assertDatabaseHas('users', [
            'id' => $user->id,
            'username' => 'newUsername',
        ]);
    }

    public function testCant_Update_Username_With_Wrong_Criteria()
    {
        //Create instance of user
        $user = User::factory()->create([
            'username' => 'oldUsername',
        ]);

        //Check if user is created
        $this->assertDatabaseHas('users', [
            'id' => $user->id,
            'username' => 'oldUsername',
        ]);

        //Update username with wrong criteria
        $response = $this->actingAs($user)->putJson('/account/submit/updateusername', [
            'username' => 'new',
        ]);

        //Check if username is updated
        $response->assertStatus(400);
        //Check if username is not updated
        $this->assertDatabaseHas('users', [
            'id' => $user->id,
            'username' => 'oldUsername',
        ]);
    }

    public function testUpdate_Email()
    {
        
        // create instance of user
        $user = User::factory()->create([
            'email' => 'oldEmail@example.com',
            'password' =>Hash::make(PasswordTools::makeClientHash('oldEmail@example.com', 'TestPassword1234')),
        ]);
        
    
        // check if user is created
        $this->assertDatabaseHas('users', [
            'id' => $user->id,
            'email' => 'oldEmail@example.com',
        ]);
    
        // update email
        $response = $this->actingAs($user)->putJson('/account/submit/updateemail', [
            'newEmail' => 'newEmail@example.com',
            'passwordHashedWithOldEmail' => PasswordTools::makeClientHash('oldEmail@example.com', 'TestPassword1234'),
            'passwordHashedWithNewEmail' => PasswordTools::makeClientHash('newEmail@example.com', 'TestPassword1234')
        ]);
    
        // check if email is updated
        $response->assertStatus(202);
        $this->assertDatabaseHas('users', [
            'id' => $user->id,
            'email' => 'newemail@example.com',
        ]);
    }

    public function testUpdate_Email_With_Wrong_Criteria()
    {
        // create instance of user
        $user = User::factory()->create([
            'email' => 'oldEmail@example.com',
            'password' =>Hash::make(PasswordTools::makeClientHash('oldEmail@example.com', 'TestPassword1234')),
        ]);
    
        // check if user is created
        $this->assertDatabaseHas('users', [
            'id' => $user->id,
            'email' => 'oldEmail@example.com',
        ]);
    
        // update email with wrong criteria
        $response = $this->actingAs($user)->putJson('/account/submit/updateemail', [
            'newEmail' => 't',
            'passwordHashedWithOldEmail' => PasswordTools::makeClientHash('oldEmail@example.com', 'TestPassword1234'),
            'passwordHashedWithNewEmail' => PasswordTools::makeClientHash('t', 'TestPassword1234')
        ]);
    
        // check if email is updated
        $response->assertStatus(400);
        $this->assertDatabaseHas('users', [
            'id' => $user->id,
            'email' => 'oldEmail@example.com',
        ]);
    }

    public function testUpdate_Email_With_Wrong_Password()
    {
        // create instance of user
        $user = User::factory()->create([
            'email' => 'oldEmail@example.com',
            'password' =>Hash::make(PasswordTools::makeClientHash('oldEmail@example.com', 'TestPassword1234')),
        ]);
    
        // check if user is created
        $this->assertDatabaseHas('users', [
            'id' => $user->id,
            'email' => 'oldEmail@example.com',
        ]);
    
        // update email with wrong password
        $response = $this->actingAs($user)->putJson('/account/submit/updateemail', [
            'newEmail' => 't',
            'passwordHashedWithOldEmail' => PasswordTools::makeClientHash('oldEmail@example.com', 'WrongPassword1234'),
            'passwordHashedWithNewEmail' => PasswordTools::makeClientHash('t', 'TestPassword1234')
        ]);
    
        // check if email is updated
        $response->assertStatus(400);
        $this->assertDatabaseHas('users', [
            'id' => $user->id,
            'email' => 'oldEmail@example.com',
        ]);
    }

    public function testChange_Password()
    {
        // create instance of user
        $user = User::factory()->create([
            'email' => 'Email@example.com',
            'password' =>Hash::make(PasswordTools::makeClientHash('Email@example.com', 'oldPassword1234')),
        ]);

        // check if user is created
        $this->assertDatabaseHas('users', [
            'id' => $user->id,
        ]);

        // change password
        $response = $this->actingAs($user)->putJson('/account/submit/updatepassword', [
            'oldPassword' => PasswordTools::makeClientHash('Email@example.com', 'oldPassword1234'),
            'newPassword' => PasswordTools::makeClientHash('Email@example.com', 'newPassword1234'),
        ]);

        // check if password is updated
        $response->assertStatus(202);
        $this->assertDatabaseHas('users', [
            'id' => $user->id,
        ]);
        $this->assertTrue(Hash::check(PasswordTools::makeClientHash('Email@example.com', 'newPassword1234'), $user->fresh()->password));
    }

    public function testChange_Password_With_Wrong_old_Password()
    {
        // create instance of user
        $user = User::factory()->create([
            'email' => 'Email@example.com',
            'password' =>Hash::make(PasswordTools::makeClientHash('Email@example.com', 'oldPassword1234')),
        ]);

        // check if user is created
        $this->assertDatabaseHas('users', [
            'id' => $user->id,
        ]);

        // change password with wrong oldPassword
        $response = $this->actingAs($user)->putJson('/account/submit/updatepassword', [
            'oldPassword' => PasswordTools::makeClientHash('Email@example.com', 'WrongPassword1234'),
            'newPassword' => PasswordTools::makeClientHash('Email@example.com', 'newPassword1234'),
        ]);

        // check if password is updated
        $response->assertStatus(401);
        $this->assertDatabaseHas('users', [
            'id' => $user->id,
        ]);
        $this->assertTrue(Hash::check(PasswordTools::makeClientHash('Email@example.com', 'oldPassword1234'), $user->fresh()->password));
    }
}