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
        Schema::create('more_products', function (Blueprint $table) {
            $table->id();
            $table->enum('type', ['large', 'regular', 'cta'])->default('regular');
            $table->string('title');
            $table->text('description')->nullable();
            $table->string('icon')->nullable();
            $table->string('image')->nullable();
            $table->enum('color', ['primary', 'secondary'])->default('primary');
            $table->integer('column_span')->default(1); // 1 or 2
            $table->string('button_text')->nullable();
            $table->string('button_url')->nullable();
            $table->integer('order_index')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('more_products');
    }
};
