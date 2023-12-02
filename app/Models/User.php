<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;

    protected $fillable = [
        'username',
        'password',
        'email'
    ];

    public function addRating(Movie $movie, int $rating) {
        if ($movie instanceof Movie && is_int($rating)) {
            $this->ratings()->attach($movie->id, ['rating' => $rating]);
        }
    }

    public function ratings() {
        return $this->belongsToMany(Movie::class, 'movie_rating')->withPivot('rating')->as('movie_rating');
    }
}
