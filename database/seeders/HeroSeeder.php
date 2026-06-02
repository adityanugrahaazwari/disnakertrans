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
        // Data sample untuk Hero Section (Singleton)
        Hero::updateOrCreate(
            ['id' => 1],
            [
                'title' => "Masa Depan Kerja\nMulai dari Sini.",
                'subtitle' => 'Kami hadir untuk menciptakan ekosistem ketenagakerjaan yang unggul, kompeten, dan menyejahterakan seluruh masyarakat Kabupaten Banjar.',
                'image' => 'heroes/sample1.jpg', // Placeholder path
                'button_text' => 'Jelajahi Layanan',
                'button_url' => '#layanan',
                'order' => 1,
                'is_active' => true,
            ]
        );
    }
}
