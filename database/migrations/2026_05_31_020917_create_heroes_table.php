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
        Schema::create('heroes', function (Blueprint $blueprint) {
            $blueprint->id();
            $blueprint->string('title')->nullable();
            $blueprint->text('subtitle')->nullable();
            $blueprint->string('image');
            $blueprint->string('button_text')->nullable();
            $blueprint->string('button_url')->nullable();
            $blueprint->boolean('is_active')->default(true);
            $blueprint->integer('order')->default(0);
            $blueprint->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('heroes');
    }
};
