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
            $table->string('category'); // e.g., "Liquidity & Access"
            $table->string('title');    // Main title
            $table->string('subtitle')->nullable(); // Highlighted part
            $table->text('description')->nullable(); // Paragraph text
            $table->string('image')->nullable(); // Section image
            $table->integer('order_index')->default(0); // Sorting sections
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
