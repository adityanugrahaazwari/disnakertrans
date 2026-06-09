<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Profiles (Singleton)
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->string('agency_name')->default('Disnakertrans Kab. Banjar');
            $table->text('vision')->nullable();
            $table->text('mission')->nullable();
            $table->string('organizational_structure')->nullable();
            $table->string('address')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->timestamps();
        });

        // Categories
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->timestamps();
        });

        // Posts (Berita/Pengumuman)
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->constrained()->onDelete('cascade');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('title');
            $table->string('slug')->unique();
            $table->text('content');
            $table->string('image')->nullable();
            $table->enum('status', ['draft', 'published'])->default('draft');
            $table->integer('views')->default(0);
            $table->timestamps();
        });

        // Employees (Pegawai)
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('nip')->unique()->nullable();
            $table->string('position');
            $table->string('photo')->nullable();
            $table->integer('order')->default(0);
            $table->timestamps();
        });

        // Trainings (Pelatihan)
        Schema::create('trainings', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->integer('quota')->default(0);
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->string('image')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });

        // Job Vacancies (Lowongan)
        Schema::create('job_vacancies', function (Blueprint $table) {
            $table->id();
            $table->string('company');
            $table->string('position');
            $table->text('requirements')->nullable();
            $table->date('deadline')->nullable();
            $table->boolean('is_verified')->default(false);
            $table->timestamps();
        });

        // Messages (Pesan/Pengaduan)
        Schema::create('messages', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->string('subject');
            $table->text('message');
            $table->boolean('is_read')->default(false);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('messages');
        Schema::dropIfExists('job_vacancies');
        Schema::dropIfExists('trainings');
        Schema::dropIfExists('employees');
        Schema::dropIfExists('posts');
        Schema::dropIfExists('categories');
        Schema::dropIfExists('profiles');
    }
};
