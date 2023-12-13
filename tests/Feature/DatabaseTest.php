<?php

namespace Tests\Feature;

use Database\Seeders\MovieSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class DatabaseTest extends TestCase
{
    use RefreshDatabase;

public function testInstantiateModel(): void
{
    $tables = [
        'movies',
        'genres',
        'users',
        'trailers',
    ];

    $this->seed();
    
    $this->assertDatabaseCount('movies', 30);
    $this->assertDatabaseCount('genres', 20);
    $this->assertDatabaseCount('users', 10);
    $this->assertDatabaseCount('people', 50);
    //$this->assertDatabaseCount('', 30);
    //idk this
}
}