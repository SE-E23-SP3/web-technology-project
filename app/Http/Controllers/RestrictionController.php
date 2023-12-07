<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RestrictionController extends Controller
{
    // Method to handle genre/tag restrictions
    public function setGenreRestrictions(Request $request)
    {
        // Logic to handle genre/tag restrictions
        $genres = $request->input('genres');
        $restrictedGenres = array_map('trim', explode(',', $genres));
        $restrictedGenres = array_unique($restrictedGenres);

        //Filter & store the restricted genres
        $restrictedGenresList = ['Horror', 'Porn', 'Thriller', 'Romance'];
        $restrictedGenres = array_intersect($restrictedGenres, $restrictedGenresList);

        return response()->json(['message' => 'Genre restrictions set successfully']);
    }

    // Method to handle age rating settings
    /* Non-functional since the age rating is not implemented in database
    public function setAgeRatingRestriction(Request $request)
    {
        $ageRating = $request->input('ageRating');
        // Logic ect.
        return response()->json(['message' => 'Age rating restriction set successfully']);
    }
    */
}