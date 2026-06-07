<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Nonaktifkan foreign key checks untuk truncate jika diperlukan
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Service::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $services = [
            [
                'title' => 'Pendaftaran AK-1',
                'description' => 'Layanan pembuatan Kartu Kuning (AK-1) secara online dan offline untuk pendataan pencari kerja resmi.',
                'icon' => 'fas fa-id-card',
                'url' => '#',
                'order' => 1,
                'is_active' => true,
            ],
            [
                'title' => 'Info Pelatihan',
                'description' => 'Program pelatihan kejuruan gratis untuk meningkatkan kompetensi dan daya saing tenaga kerja di berbagai bidang.',
                'icon' => 'fas fa-graduation-cap',
                'url' => '/trainings',
                'order' => 2,
                'is_active' => true,
            ],
            [
                'title' => 'Lowongan Kerja',
                'description' => 'Informasi bursa kerja terbaru dan lowongan pekerjaan terverifikasi dari perusahaan mitra di Kabupaten Banjar.',
                'icon' => 'fas fa-briefcase',
                'url' => '/jobs',
                'order' => 3,
                'is_active' => true,
            ],
            [
                'title' => 'Hubungan Industrial',
                'description' => 'Layanan mediasi perselisihan hubungan industrial, kesejahteraan pekerja, dan konsultasi peraturan perusahaan.',
                'icon' => 'fas fa-handshake',
                'url' => '/departments/hi',
                'order' => 4,
                'is_active' => true,
            ],
            [
                'title' => 'Pengaduan Tenaga Kerja',
                'description' => 'Fasilitas pengaduan terkait pelanggaran hak pekerja dan konsultasi norma ketenagakerjaan.',
                'icon' => 'fas fa-exclamation-circle',
                'url' => '#pengaduan',
                'order' => 5,
                'is_active' => true,
            ],
            [
                'title' => 'Pemagangan Kerja',
                'description' => 'Informasi pendaftaran program pemagangan dalam negeri maupun luar negeri untuk pengalaman kerja nyata.',
                'icon' => 'fas fa-user-graduate',
                'url' => '#',
                'order' => 6,
                'is_active' => true,
            ],
        ];

        foreach ($services as $service) {
            Service::create($service);
        }
    }
}
