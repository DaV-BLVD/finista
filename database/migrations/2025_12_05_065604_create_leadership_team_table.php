<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('leadership_team', function (Blueprint $table) {
            $table->id();
            $table->string('name');            // Leader's name
            $table->string('position');        // Leader's position/title
            $table->text('description');       // Brief description/bio
            $table->string('image')->nullable(); // Optional profile image path
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('leadership_team');
    }
};
