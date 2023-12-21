<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;


class DatabaseTest extends TestCase
{
    use RefreshDatabase;    
public function testInstantiate_Model(): void
{
    //Seed database
    $this->seed();
    
    //Test if database is seeded
    $this->assertDatabaseCount('genres', 8);
    $this->assertDatabaseCount('crew_types', 30);
    $this->assertDatabaseCount('people', 50);
    $this->assertDatabaseCount('users', 10);
    $this->assertDatabaseCount('movies', 30);
}

public function testInsert_Into_Database(): void
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

public function testRemove_From_Database(): void
{
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

    //Delete user from database
    DB::table('users')->where('username', '=', 'TestUser')->delete();

    //Assert that the user is not in the database
    $this->assertDatabaseMissing('users', [
        'username' => 'TestUser',
        'email' => 'TesterUser@example.com'
    ]);
}

public function testCant_Insert_Duplicate_User(): void
{
    //Insert user into database
    DB::table('users')->insert([
        'username' => 'TestUser',
        'email' => 'TesterUser@example.com',
        'password' => Hash::make('asdfghjklæøasd')
    ]);

    //Assert that the user is not in the database
    $this->assertDatabaseHas('users', [
        'username' => 'TestUser',
        'email' => 'TesterUser@example.com'
    ]);
    
    //Insert user into database
    try{
        DB::table('users')->insert([
        'username' => 'TestUser',
        'email' => 'TesterUser@example.com',
        'password' => Hash::make('asdfghjklæøasd')
    ]);} catch (\Illuminate\Database\QueryException $e) {
    }

    //Assert that a duplicate entry error was thrown
    $this->assertEquals(23505, $e->getCode());
}
}