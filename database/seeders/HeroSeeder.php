<?php

namespace Database\Seeders;

use App\Models\Hero;
use Illuminate\Database\Seeder;

class HeroSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Sinkronisasi data awal Hero Section sesuai dengan tampilan landing page
        Hero::updateOrCreate(
            ['id' => 1],
            [
                'badge_text' => 'Pusat Ketenagakerjaan Resmi',
                'title' => 'Masa Depan Karirmu <br><span style="color: var(--accent);">Mulai di Sini.</span>',
                'subtitle' => 'Kami menjembatani pencari kerja dengan peluang terbaik dan meningkatkan kompetensi tenaga kerja Kabupaten Banjar melalui pelatihan profesional.',
                'image' => null, // Biarkan null agar fallback ke image statis jika belum upload
                'button_text' => 'Cari Lowongan',
                'button_url' => '/jobs',
                'button_text_2' => 'Ikuti Pelatihan',
                'button_url_2' => '/trainings',
                'stat_1_count' => '500+',
                'stat_1_text' => 'Lowongan Aktif',
                'stat_2_count' => '50+',
                'stat_2_text' => 'Program Pelatihan',
                'stat_3_count' => '10k+',
                'stat_3_text' => 'Tenaga Terampil',
                'order' => 1,
                'is_active' => true,
            ]
        );
    }
}
