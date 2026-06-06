<?php

namespace Database\Seeders;

use App\Models\Menu;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class MenuSeeder extends Seeder
{
    public function run(): void
    {
        // Clear existing menus to avoid duplicates
        Menu::truncate();

        // Get permission IDs
        $pManageUsers = Permission::where('name', 'manage-users')->first()?->id;
        $pEditProfil = Permission::where('name', 'edit-profil')->first()?->id;
        $pManageBerita = Permission::where('name', 'manage-berita')->first()?->id;
        $pManagePegawai = Permission::where('name', 'manage-pegawai')->first()?->id;
        $pManagePelatihan = Permission::where('name', 'manage-pelatihan')->first()?->id;
        $pManageLayanan = Permission::where('name', 'manage-layanan')->first()?->id;
        $pViewDashboard = Permission::where('name', 'view-dashboard')->first()?->id;

        // 1. Dashboard
        Menu::create([
            'title' => 'Dashboard',
            'url' => '/dashboard',
            'icon' => 'fas fa-tachometer-alt',
            'order' => 1,
            'permission_id' => $pViewDashboard,
        ]);

        // 2. Profil Instansi
        $profil = Menu::create([
            'title' => 'Profil Instansi',
            'url' => '#',
            'icon' => 'fas fa-building',
            'order' => 2,
            'permission_id' => $pEditProfil,
        ]);

        Menu::create([
            'parent_id' => $profil->id,
            'title' => 'Visi & Misi',
            'url' => '/profile/vision',
            'icon' => 'fas fa-eye',
            'order' => 1,
            'permission_id' => $pEditProfil,
        ]);

        Menu::create([
            'parent_id' => $profil->id,
            'title' => 'Sambutan Kepala',
            'url' => '/profile/greeting',
            'icon' => 'fas fa-comment-dots',
            'order' => 2,
            'permission_id' => $pEditProfil,
        ]);

        Menu::create([
            'parent_id' => $profil->id,
            'title' => 'Sejarah',
            'url' => '/profile/history',
            'icon' => 'fas fa-history',
            'order' => 3,
            'permission_id' => $pEditProfil,
        ]);

        Menu::create([
            'parent_id' => $profil->id,
            'title' => 'Struktur Organisasi',
            'url' => '/profile/structure',
            'icon' => 'fas fa-sitemap',
            'order' => 3,
            'permission_id' => $pManagePegawai,
        ]);

        Menu::create([
            'parent_id' => $profil->id,
            'title' => 'Maklumat Pelayanan',
            'url' => '/profile/maklumat',
            'icon' => 'fas fa-hand-holding-heart',
            'order' => 4,
            'permission_id' => $pEditProfil,
        ]);

        // 3. Informasi & Berita
        $berita = Menu::create([
            'title' => 'Informasi & Berita',
            'url' => '#',
            'icon' => 'fas fa-newspaper',
            'order' => 3,
            'permission_id' => $pManageBerita,
        ]);

        Menu::create([
            'parent_id' => $berita->id,
            'title' => 'Daftar Berita',
            'url' => '/posts',
            'icon' => 'fas fa-edit',
            'order' => 1,
            'permission_id' => $pManageBerita,
        ]);

        Menu::create([
            'parent_id' => $berita->id,
            'title' => 'Kategori Berita',
            'url' => '/categories',
            'icon' => 'fas fa-tags',
            'order' => 2,
            'permission_id' => $pManageBerita,
        ]);

        Menu::create([
            'parent_id' => $berita->id,
            'title' => 'Tag Berita',
            'url' => '/tags',
            'icon' => 'fas fa-hashtag',
            'order' => 3,
            'permission_id' => $pManageBerita,
        ]);

        // 4. Manajemen Pelatihan
        $pelatihan = Menu::create([
            'title' => 'Manajemen Pelatihan',
            'url' => '#',
            'icon' => 'fas fa-graduation-cap',
            'order' => 4,
            'permission_id' => $pManagePelatihan,
        ]);

        Menu::create([
            'parent_id' => $pelatihan->id,
            'title' => 'Daftar Pelatihan',
            'url' => '/trainings',
            'icon' => 'fas fa-list',
            'order' => 1,
            'permission_id' => $pManagePelatihan,
        ]);

        Menu::create([
            'parent_id' => $pelatihan->id,
            'title' => 'Kategori Pelatihan',
            'url' => '/training-categories',
            'icon' => 'fas fa-tags',
            'order' => 2,
            'permission_id' => $pManagePelatihan,
        ]);

        // 5. Layanan & Program
        $layanan = Menu::create([
            'title' => 'Layanan & Program',
            'url' => '#',
            'icon' => 'fas fa-laptop-code',
            'order' => 5,
            'permission_id' => $pManageLayanan,
        ]);

        Menu::create([
            'parent_id' => $layanan->id,
            'title' => 'Lowongan Kerja',
            'url' => '/job-vacancies',
            'icon' => 'fas fa-briefcase',
            'order' => 2,
            'permission_id' => $pManageLayanan,
        ]);

        Menu::create([
            'parent_id' => $layanan->id,
            'title' => 'Daftar Layanan',
            'url' => '/services',
            'icon' => 'fas fa-concierge-bell',
            'order' => 3,
            'permission_id' => $pManageLayanan,
        ]);

        // 6. Komunikasi
        $komunikasi = Menu::create([
            'title' => 'Komunikasi',
            'url' => '#',
            'icon' => 'fas fa-comments',
            'order' => 6,
            'permission_id' => $pManageLayanan,
        ]);

        Menu::create([
            'parent_id' => $komunikasi->id,
            'title' => 'Pesan & Pengaduan',
            'url' => '/messages',
            'icon' => 'fas fa-inbox',
            'order' => 1,
            'permission_id' => $pManageLayanan,
        ]);

        // 7. Pengaturan Tampilan
        $tampilan = Menu::create([
            'title' => 'Pengaturan Tampilan',
            'url' => '#',
            'icon' => 'fas fa-desktop',
            'order' => 7,
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
            'title' => 'Footer & Sosmed',
            'url' => '/profile/footer',
            'icon' => 'fas fa-info-circle',
            'order' => 2,
            'permission_id' => $pEditProfil,
        ]);

        Menu::create([
            'parent_id' => $tampilan->id,
            'title' => 'Layanan Pengaduan',
            'url' => '/profile/complaint',
            'icon' => 'fas fa-exclamation-circle',
            'order' => 3,
            'permission_id' => $pEditProfil,
        ]);

        // 8. Pengaturan Akun
        $akun = Menu::create([
            'title' => 'Pengaturan Akun',
            'url' => '#',
            'icon' => 'fas fa-user-circle',
            'order' => 8,
        ]);

        Menu::create([
            'parent_id' => $akun->id,
            'title' => 'Ubah Password',
            'url' => '/account/password',
            'icon' => 'fas fa-key',
            'order' => 1,
        ]);

        // 8. Keamanan & Sistem
        $system = Menu::create([
            'title' => 'Keamanan & Sistem',
            'url' => '#',
            'icon' => 'fas fa-shield-alt',
            'order' => 99,
            'permission_id' => $pManageUsers,
        ]);

        Menu::create([
            'parent_id' => $system->id,
            'title' => 'Manajemen User',
            'url' => '/users',
            'icon' => 'fas fa-users-cog',
            'order' => 1,
            'permission_id' => $pManageUsers,
        ]);

        Menu::create([
            'parent_id' => $system->id,
            'title' => 'Peran & Izin (RBAC)',
            'url' => '/roles',
            'icon' => 'fas fa-user-lock',
            'order' => 2,
            'permission_id' => $pManageUsers,
        ]);

        Menu::create([
            'parent_id' => $system->id,
            'title' => 'Pengaturan Menu',
            'url' => '/menus',
            'icon' => 'fas fa-list-ul',
            'order' => 3,
            'permission_id' => $pManageUsers,
        ]);
    }
}
