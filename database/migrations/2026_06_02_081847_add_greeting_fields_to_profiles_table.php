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
        Schema::table('profiles', function (Blueprint $table) {
            $table->string('head_name')->nullable();
            $table->string('head_position')->nullable();
            $table->text('head_greeting')->nullable();
            $table->string('head_photo')->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('profiles', function (Blueprint $table) {
            $table->dropColumn(['head_name', 'head_position', 'head_greeting', 'head_photo']);
        });
    }
};
