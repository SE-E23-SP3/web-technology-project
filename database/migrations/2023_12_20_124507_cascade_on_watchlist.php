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
        Schema::table('watchlist', function (Blueprint $table) {
            $table->foreignId('user_id')->cascadeOnDelete()->change();
            $table->foreignId('movie_id')->cascadeOnDelete()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('watchlist', function (Blueprint $table) {
            $table->foreignId('user_id')->change();
            $table->foreignId('movie_id')->change();
        });
    }
};
