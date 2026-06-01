<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;

class RolePermissionSeeder extends Seeder
{
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // Daftar Permission
        $permissions = [
            'manage-users',
            'edit-profil',
            'manage-berita',
            'manage-pegawai',
            'manage-pelatihan',
            'manage-layanan',
            'view-dashboard',
        ];

        foreach ($permissions as $permission) {
            Permission::findOrCreate($permission, 'web');
        }

        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // Buat Role dan Assign Permission
        $superAdmin = Role::findOrCreate('Super Admin', 'web');
        // Super Admin gets all permissions via Gate::before in AppServiceProvider

        $adminDinas = Role::findOrCreate('Admin Dinas', 'web');
        $adminDinas->syncPermissions([
            'edit-profil',
            'manage-berita',
            'manage-pegawai',
            'view-dashboard',
        ]);

        $operator = Role::findOrCreate('Operator Bidang', 'web');
        $operator->syncPermissions([
            'manage-berita',
            'manage-pelatihan',
            'view-dashboard',
        ]);

        // Buat Akun Default
        $user = User::create([
            'name' => 'Super Admin Disnakertrans',
            'email' => 'admin@banjarkab.go.id',
            'password' => Hash::make('password'),
        ]);
        $user->assignRole($superAdmin);
    }
}
