<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Enums\MPARating;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('movies', function (Blueprint $table) {
            $table->id();// id is automatically incremented and acts as a primary key
            $table->string('title');
            $table->longText('description');
            $table->string('duration');
            $table->date('release_date');
            $table->string('poster_url');
            $table->enum('mpa_rating', MPARating::values());
            $table->timestamps();// creates created_at & updated_at TIMESTAMP
        });
    }
    
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('movies');
    }
};
