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
        $services = [
            [
                'title' => 'Pencari Kerja',
                'description' => 'Layanan pembuatan Kartu AK-1 (Kartu Kuning) dan bimbingan karir bagi pencari kerja lokal.',
                'icon' => 'fas fa-id-badge',
                'url' => '#',
                'order' => 1,
                'is_active' => true,
            ],
            [
                'title' => 'Pelatihan BLK',
                'description' => 'Kembangkan skill Anda melalui program pelatihan berbasis kompetensi di Balai Latihan Kerja.',
                'icon' => 'fas fa-graduation-cap',
                'url' => '/trainings',
                'order' => 2,
                'is_active' => true,
            ],
            [
                'title' => 'Bursa Kerja',
                'description' => 'Akses informasi lowongan kerja terbaru dari perusahaan terverifikasi di Kabupaten Banjar.',
                'icon' => 'fas fa-briefcase',
                'url' => '/job-vacancies',
                'order' => 3,
                'is_active' => true,
            ],
        ];

        foreach ($services as $service) {
            Service::create($service);
        }
    }
}
