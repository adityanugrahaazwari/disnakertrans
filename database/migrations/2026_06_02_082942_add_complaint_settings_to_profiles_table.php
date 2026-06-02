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
            $table->string('pengaduan_title')->nullable();
            $table->text('pengaduan_description')->nullable();
            $table->string('pengaduan_wa')->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('profiles', function (Blueprint $table) {
            $table->dropColumn(['pengaduan_title', 'pengaduan_description', 'pengaduan_wa']);
        });
    }
};
