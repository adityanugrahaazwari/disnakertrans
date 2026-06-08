<?php

namespace Database\Seeders;

use App\Models\Menu;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\DB;

class MenuSeeder extends Seeder
{
    public function run(): void
    {
        // Bersihkan menu lama
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Menu::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        // Ambil ID Permission
        $pManageUsers = Permission::where('name', 'view-users')->first()?->id ?? Permission::where('name', 'manage-users')->first()?->id;
        $pEditProfil = Permission::where('name', 'edit-profile')->first()?->id ?? Permission::where('name', 'edit-profil')->first()?->id;
        $pManageBerita = Permission::where('name', 'view-posts')->first()?->id ?? Permission::where('name', 'manage-berita')->first()?->id;
        $pManagePegawai = Permission::where('name', 'manage-employees')->first()?->id ?? Permission::where('name', 'manage-pegawai')->first()?->id;
        $pManagePelatihan = Permission::where('name', 'view-trainings')->first()?->id ?? Permission::where('name', 'manage-pelatihan')->first()?->id;
        $pManageLayanan = Permission::where('name', 'view-jobs')->first()?->id ?? Permission::where('name', 'manage-layanan')->first()?->id;
        $pViewDashboard = Permission::where('name', 'view-dashboard')->first()?->id ?? null;
        $pManageSecurity = Permission::where('name', 'manage-permissions')->first()?->id ?? $pManageUsers;

        // --- GROUP 1: UTAMA ---
        Menu::create([
            'title' => 'Dashboard',
            'url' => '/dashboard',
            'icon' => 'fas fa-tachometer-alt',
            'order' => 10,
            'permission_id' => $pViewDashboard,
        ]);

        // --- GROUP 2: PUBLIKASI ---
        $publikasi = Menu::create([
            'title' => 'Informasi & Publikasi',
            'url' => '#',
            'icon' => 'fas fa-bullhorn',
            'order' => 20,
            'permission_id' => $pManageBerita,
        ]);

        Menu::create([
            'parent_id' => $publikasi->id,
            'title' => 'Berita & Artikel',
            'url' => '/posts',
            'icon' => 'fas fa-newspaper',
            'order' => 1,
            'permission_id' => $pManageBerita,
        ]);

        Menu::create([
            'parent_id' => $publikasi->id,
            'title' => 'Kategori Berita',
            'url' => '/categories',
            'icon' => 'fas fa-tags',
            'order' => 2,
            'permission_id' => $pManageBerita,
        ]);

        Menu::create([
            'parent_id' => $publikasi->id,
            'title' => 'Tag Berita',
            'url' => '/tags',
            'icon' => 'fas fa-hashtag',
            'order' => 3,
            'permission_id' => $pManageBerita,
        ]);

        Menu::create([
            'parent_id' => $publikasi->id,
            'title' => 'Lowongan Kerja',
            'url' => '/job-vacancies',
            'icon' => 'fas fa-briefcase',
            'order' => 4,
            'permission_id' => $pManageLayanan,
        ]);

        // --- GROUP 3: PELATIHAN ---
        $pelatihan = Menu::create([
            'title' => 'Pusat Pelatihan',
            'url' => '#',
            'icon' => 'fas fa-graduation-cap',
            'order' => 30,
            'permission_id' => $pManagePelatihan,
        ]);

        Menu::create([
            'parent_id' => $pelatihan->id,
            'title' => 'Daftar Pelatihan',
            'url' => '/trainings',
            'icon' => 'fas fa-list-check',
            'order' => 1,
            'permission_id' => $pManagePelatihan,
        ]);

        Menu::create([
            'parent_id' => $pelatihan->id,
            'title' => 'Kategori Pelatihan',
            'url' => '/training-categories',
            'icon' => 'fas fa-folder-tree',
            'order' => 2,
            'permission_id' => $pManagePelatihan,
        ]);

        // --- GROUP 4: INSTANSI & KEPEGAWAIAN ---
        $instansi = Menu::create([
            'title' => 'Profil Instansi',
            'url' => '#',
            'icon' => 'fas fa-building',
            'order' => 40,
            'permission_id' => $pEditProfil,
        ]);

        Menu::create([
            'parent_id' => $instansi->id,
            'title' => 'Visi, Misi & Sejarah',
            'url' => '/profile/vision', // Digabung atau pilih salah satu
            'icon' => 'fas fa-info-circle',
            'order' => 1,
            'permission_id' => $pEditProfil,
        ]);

        Menu::create([
            'parent_id' => $instansi->id,
            'title' => 'Maklumat Pelayanan',
            'url' => '/profile/maklumat',
            'icon' => 'fas fa-hand-holding-heart',
            'order' => 2,
            'permission_id' => $pEditProfil,
        ]);

        Menu::create([
            'parent_id' => $instansi->id,
            'title' => 'Struktur & Pegawai',
            'url' => '/profile/structure',
            'icon' => 'fas fa-sitemap',
            'order' => 3,
            'permission_id' => $pManagePegawai,
        ]);

        // --- GROUP 5: LAYANAN & INTERAKSI ---
        $layanan = Menu::create([
            'title' => 'Layanan & Interaksi',
            'url' => '#',
            'icon' => 'fas fa-concierge-bell',
            'order' => 50,
            'permission_id' => $pManageLayanan,
        ]);

        Menu::create([
            'parent_id' => $layanan->id,
            'title' => 'Manajemen Bidang',
            'url' => '/departments',
            'icon' => 'fas fa-layer-group',
            'order' => 1,
            'permission_id' => $pManageLayanan,
        ]);

        Menu::create([
            'parent_id' => $layanan->id,
            'title' => 'Daftar Layanan (Ikon)',
            'url' => '/services',
            'icon' => 'fas fa-th-large',
            'order' => 2,
            'permission_id' => $pManageLayanan,
        ]);

        Menu::create([
            'parent_id' => $layanan->id,
            'title' => 'Pesan & Pengaduan',
            'url' => '/messages',
            'icon' => 'fas fa-envelope-open-text',
            'order' => 3,
            'permission_id' => $pManageLayanan,
        ]);

        // --- GROUP 6: PENGATURAN WEBSITE ---
        $tampilan = Menu::create([
            'title' => 'Konfigurasi Web',
            'url' => '#',
            'icon' => 'fas fa-desktop',
            'order' => 60,
            'permission_id' => $pEditProfil,
        ]);

        Menu::create([
            'parent_id' => $tampilan->id,
            'title' => 'Hero Banner',
            'url' => '/heroes',
            'icon' => 'fas fa-image',
            'order' => 1,
            'permission_id' => $pEditProfil,
        ]);

        Menu::create([
            'parent_id' => $tampilan->id,
            'title' => 'Panduan Karir',
            'url' => '/career-steps',
            'icon' => 'fas fa-shoe-prints',
            'order' => 2,
            'permission_id' => $pEditProfil,
        ]);

        Menu::create([
            'parent_id' => $tampilan->id,
            'title' => 'Sambutan Kepala',
            'url' => '/profile/greeting',
            'icon' => 'fas fa-comment-dots',
            'order' => 3,
            'permission_id' => $pEditProfil,
        ]);

        Menu::create([
            'parent_id' => $tampilan->id,
            'title' => 'Section Pengaduan',
            'url' => '/profile/complaint',
            'icon' => 'fas fa-exclamation-circle',
            'order' => 4,
            'permission_id' => $pEditProfil,
        ]);

        Menu::create([
            'parent_id' => $tampilan->id,
            'title' => 'Footer & Sosmed',
            'url' => '/profile/footer',
            'icon' => 'fas fa-share-nodes',
            'order' => 5,
            'permission_id' => $pEditProfil,
        ]);

        Menu::create([
            'parent_id' => $tampilan->id,
            'title' => 'Kontak Dinas',
            'url' => '/profile/contact',
            'icon' => 'fas fa-address-book',
            'order' => 6,
            'permission_id' => $pEditProfil,
        ]);

        // --- GROUP 7: SISTEM ---
        $system = Menu::create([
            'title' => 'Keamanan & Sistem',
            'url' => '#',
            'icon' => 'fas fa-shield-halved',
            'order' => 100,
            'permission_id' => $pManageSecurity,
        ]);

        Menu::create([
            'parent_id' => $system->id,
            'title' => 'Manajemen User',
            'url' => '/users',
            'icon' => 'fas fa-users-gear',
            'order' => 1,
            'permission_id' => $pManageSecurity,
        ]);

        Menu::create([
            'parent_id' => $system->id,
            'title' => 'Manajemen Role',
            'url' => '/roles',
            'icon' => 'fas fa-user-lock',
            'order' => 2,
            'permission_id' => $pManageSecurity,
        ]);

        Menu::create([
            'parent_id' => $system->id,
            'title' => 'Grup Permission',
            'url' => '/permission-groups',
            'icon' => 'fas fa-layer-group',
            'order' => 3,
            'permission_id' => $pManageSecurity,
        ]);

        Menu::create([
            'parent_id' => $system->id,
            'title' => 'Daftar Hak Akses',
            'url' => '/permissions',
            'icon' => 'fas fa-key',
            'order' => 4,
            'permission_id' => $pManageSecurity,
        ]);

        Menu::create([
            'parent_id' => $system->id,
            'title' => 'Pengaturan Menu',
            'url' => '/menus',
            'icon' => 'fas fa-list-ul',
            'order' => 5,
            'permission_id' => $pManageSecurity,
        ]);

        // --- GROUP 8: AKUN SAYA ---
        $akun = Menu::create([
            'title' => 'Akun Saya',
            'url' => '#',
            'icon' => 'fas fa-user-circle',
            'order' => 110,
        ]);

        Menu::create([
            'parent_id' => $akun->id,
            'title' => 'Ubah Password',
            'url' => '/account/password',
            'icon' => 'fas fa-key',
            'order' => 1,
        ]);
    }
}
