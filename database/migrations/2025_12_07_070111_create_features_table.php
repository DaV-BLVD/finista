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
        Schema::create('features', function (Blueprint $table) {
            $table->id();
            $table->string('category');
            $table->string('title_line1');       // First line of title
            $table->string('title_line2')->nullable(); // Optional second line
            $table->enum('highlight', ['primary', 'secondary'])->default('primary'); // Highlight color
            $table->text('description')->nullable();  // Short description
            $table->string('image')->nullable();      // Image path
            $table->string('icon_bg')->nullable();    // Optional icon background color
            $table->longText('points')->nullable();   // Optional feature points or bullet list
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('features');
    }
};
