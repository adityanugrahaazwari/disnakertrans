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
        Schema::table('heroes', function (Blueprint $table) {
            $table->string('badge_text')->nullable()->after('subtitle');
            $table->string('button_text_2')->nullable()->after('button_url');
            $table->string('button_url_2')->nullable()->after('button_text_2');
            $table->string('stat_1_count')->nullable()->after('button_url_2');
            $table->string('stat_1_text')->nullable()->after('stat_1_count');
            $table->string('stat_2_count')->nullable()->after('stat_1_text');
            $table->string('stat_2_text')->nullable()->after('stat_2_count');
            $table->string('stat_3_count')->nullable()->after('stat_2_text');
            $table->string('stat_3_text')->nullable()->after('stat_3_count');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('heroes', function (Blueprint $table) {
            $table->dropColumn([
                'badge_text',
                'button_text_2',
                'button_url_2',
                'stat_1_count',
                'stat_1_text',
                'stat_2_count',
                'stat_2_text',
                'stat_3_count',
                'stat_3_text',
            ]);
        });
    }
};
