<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Employee;
use App\Models\JobVacancy;
use App\Models\Message;
use App\Models\Post;
use App\Models\Profile;
use App\Models\Training;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CmsDataSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Profile
        Profile::updateOrCreate(['id' => 1], [
            'nama_dinas' => 'Dinas Tenaga Kerja dan Transmigrasi Kabupaten Banjar',
            'visi' => 'Terwujudnya Tenaga Kerja yang Kompeten, Produktif, dan Sejahtera.',
            'misi' => "1. Meningkatkan kualitas dan kompetensi tenaga kerja.\n2. Memperluas kesempatan kerja dan mengurangi pengangguran.\n3. Meningkatkan perlindungan dan kesejahteraan tenaga kerja.\n4. Meningkatkan tata kelola pemerintahan yang baik.",
            'alamat' => 'Jl. Ahmad Yani No. 123, Martapura, Kabupaten Banjar, Kalimantan Selatan',
            'email' => 'disnakertrans@banjarkab.go.id',
            'telepon' => '(0511) 4721234',
            'nama_kepala' => 'Drs. H. Ahmad Fauzi, M.Si',
            'jabatan_kepala' => 'Kepala Dinas',
            'sambutan_kepala' => 'Selamat datang di website resmi Dinas Tenaga Kerja dan Transmigrasi Kabupaten Banjar. Kami berkomitmen untuk terus meningkatkan kualitas pelayanan publik di bidang ketenagakerjaan dan transmigrasi demi mewujudkan masyarakat Kabupaten Banjar yang lebih sejahtera.',
        ]);

        // 2. Employees (Hierarchy)
        $kadis = Employee::create([
            'nama' => 'Drs. H. Ahmad Fauzi, M.Si',
            'nip' => '197001011995031001',
            'jabatan' => 'Kepala Dinas',
            'order' => 1,
        ]);

        $sekretaris = Employee::create([
            'parent_id' => $kadis->id,
            'nama' => 'Hj. Siti Aminah, S.Sos, M.AP',
            'nip' => '197505122000032002',
            'jabatan' => 'Sekretaris',
            'order' => 2,
        ]);

        Employee::create([
            'parent_id' => $sekretaris->id,
            'nama' => 'Budi Santoso, S.T',
            'nip' => '198010102005011005',
            'jabatan' => 'Kasubag Umum & Kepegawaian',
            'order' => 3,
        ]);

        $bidang1 = Employee::create([
            'parent_id' => $kadis->id,
            'nama' => 'Ir. Heru Prasetyo',
            'nip' => '197208151998031003',
            'jabatan' => 'Kepala Bidang Pelatihan & Penempatan',
            'order' => 4,
        ]);

        // 3. Posts
        $user = User::first();
        $catBerita = Category::where('slug', 'berita-utama')->first();
        $catPengumuman = Category::where('slug', 'pengumuman')->first();

        if ($catBerita && $user) {
            Post::create([
                'category_id' => $catBerita->id,
                'user_id' => $user->id,
                'title' => 'Pembukaan Pelatihan Berbasis Kompetensi Angkatan I Tahun 2026',
                'slug' => Str::slug('Pembukaan Pelatihan Berbasis Kompetensi Angkatan I Tahun 2026'),
                'content' => 'Disnakertrans Kabupaten Banjar resmi membuka Pelatihan Berbasis Kompetensi (PBK) Angkatan I untuk tahun anggaran 2026. Pelatihan ini meliputi kejuruan Menjahit, Otomotif, dan IT.',
                'status' => 'published',
                'views' => rand(50, 200),
            ]);
        }

        if ($catPengumuman && $user) {
            Post::create([
                'category_id' => $catPengumuman->id,
                'user_id' => $user->id,
                'title' => 'Pengumuman Hasil Seleksi Administrasi Pelatihan Menjahit',
                'slug' => Str::slug('Pengumuman Hasil Seleksi Administrasi Pelatihan Menjahit'),
                'content' => 'Berikut adalah daftar nama calon peserta pelatihan menjahit yang dinyatakan lulus seleksi administrasi dan berhak mengikuti tes wawancara...',
                'status' => 'published',
                'views' => rand(100, 300),
            ]);
        }

        // 4. Trainings
        Training::create([
            'title' => 'Pelatihan Menjahit Pakaian Sesuai Style',
            'description' => 'Pelatihan selama 30 hari untuk menguasai teknik menjahit pakaian modern.',
            'quota' => 20,
            'start_date' => '2026-06-15',
            'end_date' => '2026-07-15',
            'is_active' => true,
        ]);

        Training::create([
            'title' => 'Teknisi Sepeda Motor Injeksi',
            'description' => 'Pelatihan pemeliharaan dan perbaikan sistem injeksi sepeda motor masa kini.',
            'quota' => 16,
            'start_date' => '2026-06-20',
            'end_date' => '2026-07-20',
            'is_active' => true,
        ]);

        // 5. Job Vacancies
        JobVacancy::create([
            'perusahaan' => 'PT. Banjar Sejahtera',
            'posisi' => 'Operator Produksi',
            'syarat' => 'Pendidikan minimal SMA/K, usia maksimal 25 tahun, sehat jasmani dan rohani.',
            'deadline' => '2026-06-30',
            'is_verified' => true,
        ]);

        JobVacancy::create([
            'perusahaan' => 'CV. Teknologi Banua',
            'posisi' => 'Junior Programmer',
            'syarat' => 'Menguasai PHP & Laravel, database MySQL, mampu bekerja dalam tim.',
            'deadline' => '2026-07-10',
            'is_verified' => true,
        ]);

        // 6. Messages
        Message::create([
            'name' => 'Budi Utomo',
            'email' => 'budi@example.com',
            'subject' => 'Tanya Jadwal Pelatihan',
            'message' => 'Kapan jadwal pelatihan IT untuk angkatan selanjutnya dibuka?',
            'is_read' => false,
        ]);
    }
}
