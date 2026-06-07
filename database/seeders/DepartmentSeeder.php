<?php

namespace Database\Seeders;

use App\Models\Department;
use Illuminate\Database\Seeder;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $departments = [
            [
                'title' => 'Bidang Tenaga Kerja',
                'description' => 'Mengelola penempatan tenaga kerja, perluasan kesempatan kerja, dan pendataan pencari kerja (AK-1).',
                'icon' => 'fas fa-users',
                'color' => '#3b82f6',
                'url' => '/departments/tk',
                'order' => 1,
                'is_active' => true,
            ],
            [
                'title' => 'Bidang Pelatihan',
                'description' => 'Menyelenggarakan pelatihan kerja, standardisasi kompetensi, dan peningkatan produktivitas tenaga kerja.',
                'icon' => 'fas fa-tools',
                'color' => '#f59e0b',
                'url' => '/departments/training',
                'order' => 2,
                'is_active' => true,
            ],
            [
                'title' => 'Bidang Hubungan Industrial',
                'description' => 'Menangani kesejahteraan pekerja, perselisihan hubungan industrial, dan pengawasan ketenagakerjaan.',
                'icon' => 'fas fa-handshake',
                'color' => '#ef4444',
                'url' => '/departments/hi',
                'order' => 3,
                'is_active' => true,
            ],
        ];

        foreach ($departments as $dept) {
            Department::create($dept);
        }
    }
}
