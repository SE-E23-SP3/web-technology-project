<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();// id is automatically incremented and acts as a primary key
            $table->string('username')->unique();
            $table->string('password', 256);// equivalent to hash length
            $table->rememberToken();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->timestamps();// creates created_at & updated_at TIMESTAMP
        });

        Schema::create('user_profiles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();// foreign key
            $table->string('name');
            $table->string('restriction_rating');
            // $table->string('restriction_genre'); (not implemented)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
