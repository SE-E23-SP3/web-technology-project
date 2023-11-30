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

    public function crewTypes() {
        return $this->belongToMany(CrewType::class, 'person_movie_crew')->withPivot('movie_id')->as('movie_crew');
    }
    public function moviesAsRoles() {
        return $this->belongToMany(Movie::class, 'movie_cast')->withPivot('role')->as('movie_cast');
    }
    public function MoviesAsCrew() {
        return $this->belongToMany(Movie::class, 'person_movie_crew')->withPivot('crew_role_id')->as('movie_crew');
    }

}