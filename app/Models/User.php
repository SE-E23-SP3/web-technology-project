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

    public function ratings() {
        return $this->belongsToMany(Movie::class, 'movie_rating')->withPivot('rating')->as('movie_rating');
    }
}
