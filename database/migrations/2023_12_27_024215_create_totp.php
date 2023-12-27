<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use App\Enums\HotpAlgorithms;
use App\Enums\HotpDigits;

use App\Models\User;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void {
        Schema::create('totps', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('encrypted_secret', 256);
            $table->enum('length', HotpDigits::values());
            $table->enum('algo', HotpAlgorithms::values());
            $table->integer('start_time');
            $table->integer('interval');
            $table->foreignIdFor(User::class)->unique();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void {
        Schema::dropIfExists('totps');
    }
};
