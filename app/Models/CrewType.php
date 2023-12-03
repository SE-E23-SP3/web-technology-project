<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CrewType extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'type'
    ];

    public function people() {
        return $this->belongToMany(Person::class, 'person_movie_crew')->withPivot('movie_id')->as('movie_crew');
    }
    public function movies() {
        return $this->belongToMany(Movie::class, 'person_movie_crew')->withPivot('person_id')->as('movie_crew');
    }
}
