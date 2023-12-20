<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;


class DatabaseTest extends TestCase
{
    use RefreshDatabase;    
public function testInstantiateModel(): void
{
    //Seed database
    $this->seed();
    
    //Test if database is seeded
    $this->assertDatabaseCount('movies', 30);
    $this->assertDatabaseCount('genres', 20);
    $this->assertDatabaseCount('users', 10);
    $this->assertDatabaseCount('people', 50);
    //MISSING REST
}

public function testInsertUser(): void
{
    //Assert that the user is not in the database
    $this->assertDatabaseMissing('users', [
        'username' => 'TestUser',
        'email' => 'TesterUser@example.com'
    ]);

    //Insert user into database
    DB::table('users')->insert([
        'username' => 'TestUser',
        'email' => 'TesterUser@example.com',
        'password' => Hash::make('asdfghjklæøasd')
    ]);

    //Assert that the user is in the database
    $this->assertDatabaseHas('users', [
        'username' => 'TestUser',
        'email' => 'TesterUser@example.com'
    ]);
}

public function testRemoveFromDatabase(): void
{
    //Delete user from database
    DB::table('users')->where('username', '=', 'TestUser')->delete();

    //Assert that the user is not in the database
    $this->assertDatabaseMissing('users', [
        'username' => 'TestUser',
        'email' => 'TesterUser@example.com'
    ]);
}
}