<?php

namespace Database\Seeders;

use App\Models\Employee;
use Illuminate\Database\Seeder;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Clear existing data
        Employee::truncate();

        // 1. Kepala Dinas (Top Level)
        $kepalaDinas = Employee::create([
            'name' => 'Drs. H. Syahrialluddin, M.Si',
            'nip' => '19680512 199003 1 005',
            'position' => 'Kepala Dinas',
            'order' => 1,
        ]);

        // 2. Sekretaris (Bawah Kepala Dinas)
        $sekretaris = Employee::create([
            'parent_id' => $kepalaDinas->id,
            'name' => 'Hj. Siti Nurhaliza, S.Sos, M.AP',
            'nip' => '19750821 199803 2 003',
            'position' => 'Sekretaris',
            'order' => 2,
        ]);

        // 3. Kasubag (Bawah Sekretaris)
        $kasubags = [
            'Kasubag Umum dan Kepegawaian',
            'Kasubag Keuangan',
            'Kasubag Perencanaan'
        ];

        foreach ($kasubags as $index => $kasubag) {
            Employee::create([
                'parent_id' => $sekretaris->id,
                'name' => 'Pejabat ' . $kasubag,
                'nip' => '198' . rand(0, 9) . rand(1000, 9999) . ' 20' . rand(10, 20) . rand(1, 2) . ' ' . rand(1, 2) . ' 00' . rand(1, 9),
                'position' => $kasubag,
                'order' => 20 + $index,
            ]);
        }

        // 4. Bendahara (Bawah Kepala Dinas)
        Employee::create([
            'parent_id' => $kepalaDinas->id,
            'name' => 'Rina Amalia, SE',
            'nip' => '19850615 201001 2 015',
            'position' => 'Bendahara Pengeluaran',
            'order' => 3,
        ]);

        // Define Departments (Bidang)
        $bidangs = [
            [
                'name' => 'H. Ahmad Syarif, ST, MT',
                'nip' => '19800115 200501 1 012',
                'position' => 'Kepala Bidang Hubungan Industrial',
                'seksis' => [
                    'Seksi Kesejahteraan Pekerja',
                    'Seksi Perselisihan Industrial'
                ]
            ],
            [
                'name' => 'Ir. Hj. Linda Wati, MP',
                'nip' => '19780410 200312 2 005',
                'position' => 'Kepala Bidang Penempatan Tenaga Kerja',
                'seksis' => [
                    'Seksi Informasi Pasar Kerja',
                    'Seksi Perluasan Kesempatan Kerja'
                ]
            ],
            [
                'name' => 'Bambang Irawan, SE, MM',
                'nip' => '19821130 200801 1 008',
                'position' => 'Kepala Bidang Pelatihan dan Produktivitas',
                'seksis' => [
                    'Seksi Standarisasi Kompetensi',
                    'Seksi Kelembagaan Pelatihan'
                ]
            ],
        ];

        foreach ($bidangs as $bIndex => $bidangData) {
            // Create Kepala Bidang
            $kabid = Employee::create([
                'parent_id' => $kepalaDinas->id, // Langsung di bawah kadis atau di bawah sekretaris? Biasanya sejajar struktural tapi garis koordinasi.
                'name' => $bidangData['name'],
                'nip' => $bidangData['nip'],
                'position' => $bidangData['position'],
                'order' => 10 + $bIndex,
            ]);

            foreach ($bidangData['seksis'] as $sIndex => $seksiName) {
                // Create Kepala Seksi
                $kasi = Employee::create([
                    'parent_id' => $kabid->id,
                    'name' => 'Pejabat ' . $seksiName,
                    'nip' => '198' . rand(0, 9) . rand(1000, 9999) . ' 20' . rand(10, 20) . rand(1, 2) . ' ' . rand(1, 2) . ' 00' . rand(1, 9),
                    'position' => 'Kepala ' . $seksiName,
                    'order' => ($bIndex + 1) * 100 + $sIndex,
                ]);

                // Create 3 Staf for each Seksi
                for ($i = 1; $i <= 3; $i++) {
                    Employee::create([
                        'parent_id' => $kasi->id,
                        'name' => 'Staf ' . $i . ' - ' . $seksiName,
                        'nip' => '199' . rand(0, 9) . rand(1000, 9999) . ' 20' . rand(20, 24) . rand(1, 2) . ' ' . rand(1, 2) . ' 00' . rand(1, 9),
                        'position' => 'Staf Pelaksana',
                        'order' => ($bIndex + 1) * 1000 + ($sIndex + 1) * 100 + $i,
                    ]);
                }
            }
        }
    }
}
