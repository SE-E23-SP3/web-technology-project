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

    public function addGenre(Genre $genre) {
        if ($genre instanceof Genre) {
            $this->genres()->attach($genre->id);
        }
    }
    public function addTrailer(Trailer $trailer) {
        if ($trailer instanceof Trailer) {
            $this->trailers()->save($trailer);
            $this->refresh();
        }
    }
    public function addRating(User $user, int $rating) {
        if ($user instanceof User && is_int($rating)) {
            $this->ratings()->attach($user->id, ['rating' => $rating]);
        }
    }
    public function addCrew(Person $person, CrewType $crewType) {
        if ($person instanceof Person && $crewType instanceof CrewType) {
            $this->crew()->attach($person->id, ['crew_type_id' => $crewType->id]);
        }
    }
    public function addRole(Person $person, string $role) {
        if ($person instanceof Person && is_string($role)) {
            $this->roles()->attach($person->id, ['role' => $role]);
        }
    }

    public function genres() {
        return $this->belongsToMany(Genre::class);
    }
    public function trailers() {
        return $this->hasMany(Trailer::class);
    }
    public function ratings() {
        return $this->belongsToMany(User::class, 'movie_rating')->withPivot('rating')->as('movie_rating');
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
