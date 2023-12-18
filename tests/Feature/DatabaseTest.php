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

    $this->seed();
    
    $this->assertDatabaseCount('movies', 30);
    $this->assertDatabaseCount('genres', 20);
    $this->assertDatabaseCount('users', 10);
    $this->assertDatabaseCount('people', 50);
    //MISSING REST
}

public function testInsertUser(): void
{
    $this->assertDatabaseMissing('users', [
        'username' => 'TestUser',
        'email' => 'TesterUser@example.com'
    ]);

    DB::table('users')->insert([
        'username' => 'TestUser',
        'email' => 'TesterUser@example.com',
        'password' => Hash::make('asdfghjklæøasd')
    ]);

    $this->assertDatabaseHas('users', [
        'username' => 'TestUser',
        'email' => 'TesterUser@example.com'
    ]);
}

public function testRemoveFromDatabase(): void
{
    DB::table('users')->where('username', '=', 'TestUser')->delete();

    $this->assertDatabaseMissing('users', [
        'username' => 'TestUser',
        'email' => 'TesterUser@example.com'
    ]);
}
}