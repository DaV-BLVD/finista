<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHeadersTable extends Migration
{
    public function up()
    {
        Schema::create('headers', function (Blueprint $table) {
            $table->id();

            $table->string('page')->unique(); // home, services, products, about, contact

            // Main content fields
            $table->string('badge_text')->nullable();
            $table->string('title');
            $table->string('subtitle')->nullable();
            $table->text('description')->nullable();

            // Buttons
            $table->string('button1_text')->nullable();
            $table->string('button1_link')->nullable();
            $table->string('button2_text')->nullable();
            $table->string('button2_link')->nullable();

            // Image (optional)
            $table->string('image')->nullable();

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('headers');
    }
}
