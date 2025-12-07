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
        Schema::create('feature_card_bullets', function (Blueprint $table) {
            $table->id();
            $table->foreignId('feature_card_id')->constrained()->onDelete('cascade');
            $table->text('bullet'); // Bullet text (can include HTML)
            $table->integer('order_index')->default(0); // Bullet order
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('feature_card_bullets');
    }
};
