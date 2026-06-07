<?php

namespace Database\Seeders;

use App\Models\CareerStep;
use Illuminate\Database\Seeder;

class CareerStepSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $steps = [
            [
                'title' => 'Daftar Kartu AK-1',
                'description' => 'Lengkapi profil Anda dan dapatkan Kartu Kuning sebagai syarat resmi pencari kerja.',
                'image' => null, // Use default illustration if null
                'order' => 1,
                'is_active' => true,
            ],
            [
                'title' => 'Tingkatkan Skill',
                'description' => 'Pilih pelatihan yang sesuai dengan minat Anda untuk meningkatkan nilai jual di pasar kerja.',
                'image' => null,
                'order' => 2,
                'is_active' => true,
            ],
            [
                'title' => 'Lamar & Berkarir',
                'description' => 'Cari lowongan yang cocok, kirim lamaran, dan mulai babak baru dalam perjalanan profesional Anda.',
                'image' => null,
                'order' => 3,
                'is_active' => true,
            ],
        ];

        foreach ($steps as $step) {
            CareerStep::create($step);
        }
    }
}
