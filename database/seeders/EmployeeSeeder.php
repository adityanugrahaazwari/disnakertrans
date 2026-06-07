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
            'nama' => 'Drs. H. Syahrialluddin, M.Si',
            'nip' => '19680512 199003 1 005',
            'jabatan' => 'Kepala Dinas',
            'order' => 1,
        ]);

        // 2. Sekretaris (Bawah Kepala Dinas)
        $sekretaris = Employee::create([
            'parent_id' => $kepalaDinas->id,
            'nama' => 'Hj. Siti Nurhaliza, S.Sos, M.AP',
            'nip' => '19750821 199803 2 003',
            'jabatan' => 'Sekretaris',
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
                'nama' => 'Pejabat ' . $kasubag,
                'nip' => '198' . rand(0, 9) . rand(1000, 9999) . ' 20' . rand(10, 20) . rand(1, 2) . ' ' . rand(1, 2) . ' 00' . rand(1, 9),
                'jabatan' => $kasubag,
                'order' => 20 + $index,
            ]);
        }

        // 4. Bendahara (Bawah Kepala Dinas)
        Employee::create([
            'parent_id' => $kepalaDinas->id,
            'nama' => 'Rina Amalia, SE',
            'nip' => '19850615 201001 2 015',
            'jabatan' => 'Bendahara Pengeluaran',
            'order' => 3,
        ]);

        // Define Departments (Bidang)
        $bidangs = [
            [
                'nama' => 'H. Ahmad Syarif, ST, MT',
                'nip' => '19800115 200501 1 012',
                'jabatan' => 'Kepala Bidang Hubungan Industrial',
                'seksis' => [
                    'Seksi Kesejahteraan Pekerja',
                    'Seksi Perselisihan Industrial'
                ]
            ],
            [
                'nama' => 'Ir. Hj. Linda Wati, MP',
                'nip' => '19780410 200312 2 005',
                'jabatan' => 'Kepala Bidang Penempatan Tenaga Kerja',
                'seksis' => [
                    'Seksi Informasi Pasar Kerja',
                    'Seksi Perluasan Kesempatan Kerja'
                ]
            ],
            [
                'nama' => 'Bambang Irawan, SE, MM',
                'nip' => '19821130 200801 1 008',
                'jabatan' => 'Kepala Bidang Pelatihan dan Produktivitas',
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
                'nama' => $bidangData['nama'],
                'nip' => $bidangData['nip'],
                'jabatan' => $bidangData['jabatan'],
                'order' => 10 + $bIndex,
            ]);

            foreach ($bidangData['seksis'] as $sIndex => $seksiName) {
                // Create Kepala Seksi
                $kasi = Employee::create([
                    'parent_id' => $kabid->id,
                    'nama' => 'Pejabat ' . $seksiName,
                    'nip' => '198' . rand(0, 9) . rand(1000, 9999) . ' 20' . rand(10, 20) . rand(1, 2) . ' ' . rand(1, 2) . ' 00' . rand(1, 9),
                    'jabatan' => 'Kepala ' . $seksiName,
                    'order' => ($bIndex + 1) * 100 + $sIndex,
                ]);

                // Create 3 Staf for each Seksi
                for ($i = 1; $i <= 3; $i++) {
                    Employee::create([
                        'parent_id' => $kasi->id,
                        'nama' => 'Staf ' . $i . ' - ' . $seksiName,
                        'nip' => '199' . rand(0, 9) . rand(1000, 9999) . ' 20' . rand(20, 24) . rand(1, 2) . ' ' . rand(1, 2) . ' 00' . rand(1, 9),
                        'jabatan' => 'Staf Pelaksana',
                        'order' => ($bIndex + 1) * 1000 + ($sIndex + 1) * 100 + $i,
                    ]);
                }
            }
        }
    }
}
