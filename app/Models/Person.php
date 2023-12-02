<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name'
    ];

    public function addMovieRole(Movie $movie, string $role) {
        if ($movie instanceof Movie && is_string($role)) {
            $this->moviesAsRoles()->attach($movie->id, ['role' => $role]);
        }
    }
    public function addMovieCrew(Movie $movie, CrewType $crewType) {
        if ($movie instanceof Movie && $crewType instanceof CrewType) {
            $this->moviesAsCrew()->attach($movie->id, ['crew_role_id' => $crewType->id]);
        }
    }

    public function crewTypes() {
        return $this->belongToMany(CrewType::class, 'person_movie_crew')->withPivot('movie_id')->as('movie_crew');
    }
    public function moviesAsRoles() {
        return $this->belongToMany(Movie::class, 'movie_cast')->withPivot('role')->as('movie_cast');
    }
    public function moviesAsCrew() {
        return $this->belongToMany(Movie::class, 'person_movie_crew')->withPivot('crew_role_id')->as('movie_crew');
    }

}