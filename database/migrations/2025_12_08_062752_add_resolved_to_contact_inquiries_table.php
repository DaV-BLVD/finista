<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('contact_inquiries', function (Blueprint $table) {
            $table->boolean('is_resolved')->default(false)->after('message');
        });
    }

    public function down()
    {
        Schema::table('contact_inquiries', function (Blueprint $table) {
            $table->dropColumn('is_resolved');
        });
    }
};
