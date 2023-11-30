<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'release_date',
        'poster_url'
    ];

    public function genres() {
        return $this->belongsToMany(Genre::class);
    }
    public function trailers() {
        return $this->hasMany(Trailer::class);
    }
    public function ratings() {
        return $this->belongsToMany(User::class, 'movie_rating')->withPivot('Rating')->as('movie_rating');
    }
    public function crewTypes() {
        return $this->belongToMany(CrewType::class, 'person_movie_crew')->withPivot('person_id')->as('movie_crew');
    }
    public function crew() {
        return $this->belongToMany(Person::class, 'person_movie_crew')->withPivot('crew_type_id')->as('movie_crew');
    }
    public function roles() {
        return $this->belongToMany(Person::class, 'movie_cast')->withPivot('role')->as('movie_cast');
    }
    
}
