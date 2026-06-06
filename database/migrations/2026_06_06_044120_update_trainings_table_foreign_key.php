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
        try {
            Schema::table('trainings', function (Blueprint $table) {
                $table->dropForeign(['category_id']);
            });
        } catch (\Exception $e) {
            // Foreign key might already be dropped
        }

        Schema::table('trainings', function (Blueprint $table) {
            $table->foreign('category_id')->references('id')->on('training_categories')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('trainings', function (Blueprint $table) {
            $table->dropForeign(['category_id']);
        });

        Schema::table('trainings', function (Blueprint $table) {
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('set null');
        });
    }
};
