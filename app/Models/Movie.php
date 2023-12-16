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
        'duration',
        'release_date',
        'poster_url',
        'mpa_rating'
    ];

    public function addGenre(Genre $genre) {
        if ($genre instanceof Genre) {
            $this->genres()->attach($genre->id);
        }
    }
    public function addTrailer(string $string_url) {
        if (is_string($string_url)) {
            $this->trailers()->save(Trailer::factory()->create([
                'video_url' => $string_url,
                'movie_id' => $this->id
            ]));
            $this->refresh();
        }
    }
    public function addRating(User $user, int $rating) {
        if ($user instanceof User && is_int($rating)) {
            $this->ratings()->detach($user->id);
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
    public function addUserToWatchlist(User $user) {
        if ($user instanceof User) {
            $this->watchlistUsers()->attach($user->id);
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
        return $this->belongsToMany(CrewType::class, 'movie_crew')->withPivot('person_id')->as('movie_crew');
    }
    public function crew() {
        return $this->belongsToMany(Person::class, 'movie_crew')->withPivot('crew_type_id')->as('movie_crew');
    }
    public function roles() {
        return $this->belongsToMany(Person::class, 'movie_cast')->withPivot('role')->as('movie_cast');
    }
    public function watchlistUsers() {
        return $this->belongsToMany(User::class, 'watchlist')->as('watchlist');
    }
}
