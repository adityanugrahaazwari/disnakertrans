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
            $table->string('nama_kepala')->nullable();
            $table->string('jabatan_kepala')->nullable();
            $table->text('sambutan_kepala')->nullable();
            $table->string('foto_kepala')->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('profiles', function (Blueprint $table) {
            $table->dropColumn(['nama_kepala', 'jabatan_kepala', 'sambutan_kepala', 'foto_kepala']);
        });
    }
};
