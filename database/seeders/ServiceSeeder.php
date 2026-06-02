<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Clear existing services to avoid duplicates
        Service::truncate();

        $services = [
            [
                'title' => 'Pencari Kerja (AK-1)',
                'description' => 'Layanan pembuatan Kartu Kuning (AK-1) secara online dan offline untuk pendataan pencari kerja.',
                'icon' => 'fas fa-user-check',
                'url' => '#',
                'order' => 1,
                'is_active' => true,
            ],
            [
                'title' => 'Pelatihan Kerja (BLK)',
                'description' => 'Program pelatihan kejuruan gratis untuk meningkatkan kompetensi dan daya saing tenaga kerja.',
                'icon' => 'fas fa-tools',
                'url' => '/trainings',
                'order' => 2,
                'is_active' => true,
            ],
            [
                'title' => 'Lowongan Kerja',
                'description' => 'Informasi bursa kerja (Job Fair) dan lowongan pekerjaan dari perusahaan mitra resmi.',
                'icon' => 'fas fa-search-dollar',
                'url' => '/job-vacancies',
                'order' => 3,
                'is_active' => true,
            ],
            [
                'title' => 'Hubungan Industrial',
                'description' => 'Mediasi perselisihan hubungan industrial dan konsultasi peraturan perusahaan/PKB.',
                'icon' => 'fas fa-handshake',
                'url' => '#',
                'order' => 4,
                'is_active' => true,
            ],
            [
                'title' => 'Program Transmigrasi',
                'description' => 'Layanan pendaftaran dan pendampingan program transmigrasi bagi masyarakat Kabupaten Banjar.',
                'icon' => 'fas fa-map-marked-alt',
                'url' => '#',
                'order' => 5,
                'is_active' => true,
            ],
            [
                'title' => 'Pengaduan Tenaga Kerja',
                'description' => 'Fasilitas pengaduan terkait pelanggaran hak-hak tenaga kerja dan norma ketenagakerjaan.',
                'icon' => 'fas fa-exclamation-triangle',
                'url' => '/messages',
                'order' => 6,
                'is_active' => true,
            ],
            [
                'title' => 'Pemagangan Kerja',
                'description' => 'Informasi dan pendaftaran program pemagangan dalam negeri maupun luar negeri (Jepang).',
                'icon' => 'fas fa-user-graduate',
                'url' => '#',
                'order' => 7,
                'is_active' => true,
            ],
            [
                'title' => 'Pekerja Migran (CPMI)',
                'description' => 'Layanan rekomendasi paspor dan perlindungan bagi Calon Pekerja Migran Indonesia.',
                'icon' => 'fas fa-passport',
                'url' => '#',
                'order' => 8,
                'is_active' => true,
            ],
        ];

        foreach ($services as $service) {
            Service::create($service);
        }
    }
}
