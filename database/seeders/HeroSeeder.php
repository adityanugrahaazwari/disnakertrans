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
        // Data sample untuk Hero Section
        // Catatan: Gambar menggunakan path placeholder, Anda perlu mengunggah gambar asli melalui Admin
        
        $heroes = [
            [
                'title' => "Masa Depan Kerja\nMulai dari Sini.",
                'subtitle' => 'Kami hadir untuk menciptakan ekosistem ketenagakerjaan yang unggul, kompeten, dan menyejahterakan seluruh masyarakat Kabupaten Banjar.',
                'image' => 'heroes/sample1.jpg', // Placeholder path
                'button_text' => 'Jelajahi Layanan',
                'button_url' => '#layanan',
                'order' => 1,
                'is_active' => true,
            ],
            [
                'title' => "Pelatihan Berbasis\nKompetensi di BLK.",
                'subtitle' => 'Tingkatkan keahlian Anda melalui program pelatihan gratis di Balai Latihan Kerja Kabupaten Banjar.',
                'image' => 'heroes/sample2.jpg', // Placeholder path
                'button_text' => 'Daftar Pelatihan',
                'button_url' => '/trainings',
                'order' => 2,
                'is_active' => true,
            ],
            [
                'title' => "Bursa Kerja\nTerverifikasi.",
                'subtitle' => 'Temukan lowongan pekerjaan impian Anda dari perusahaan-perusahaan mitra resmi Disnakertrans.',
                'image' => 'heroes/sample3.jpg', // Placeholder path
                'button_text' => 'Cari Lowongan',
                'button_url' => '/job-vacancies',
                'order' => 3,
                'is_active' => true,
            ],
        ];

        foreach ($heroes as $hero) {
            Hero::create($hero);
        }
    }
}
