<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use App\Models\PermissionGroup;

class GroupedPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        $data = [
            'Berita' => [
                'view-posts', 'create-posts', 'edit-posts', 'delete-posts'
            ],
            'Pelatihan' => [
                'view-trainings', 'create-trainings', 'edit-trainings', 'delete-trainings'
            ],
            'Lowongan Kerja' => [
                'view-jobs', 'create-jobs', 'edit-jobs', 'delete-jobs'
            ],
            'User & Security' => [
                'view-users', 'create-users', 'edit-users', 'delete-users', 'manage-roles', 'manage-permissions', 'manage-menus'
            ],
            'Profil Dinas' => [
                'edit-profile', 'manage-employees', 'manage-messages'
            ],
        ];

        $allPermissionIds = [];
        $order = 1;
        foreach ($data as $groupName => $perms) {
            $group = PermissionGroup::updateOrCreate(
                ['name' => $groupName],
                ['order' => $order++]
            );

            foreach ($perms as $permName) {
                $permission = Permission::updateOrCreate(
                    ['name' => $permName, 'guard_name' => 'web'],
                    ['permission_group_id' => $group->id]
                );
                $allPermissionIds[] = $permission->name;
            }
        }

        // Roles Creation
        $superAdmin = Role::findOrCreate('Super Admin', 'web');
        // Super Admin typically gets all through Gate::before, but we can sync for clarity
        $superAdmin->syncPermissions($allPermissionIds);

        $adminDinas = Role::findOrCreate('Admin Dinas', 'web');
        $adminDinas->syncPermissions([
            'view-posts', 'create-posts', 'edit-posts',
            'view-trainings', 'create-trainings',
            'view-jobs', 'create-jobs',
            'edit-profile', 'manage-employees', 'manage-messages'
        ]);

        $operator = Role::findOrCreate('Operator Bidang', 'web');
        $operator->syncPermissions([
            'view-posts', 'create-posts',
            'view-trainings', 'create-trainings',
            'view-jobs'
        ]);

        // Create Default Admin User
        $adminEmail = 'admin@banjarkab.go.id';
        $user = \App\Models\User::where('email', $adminEmail)->first();
        
        if (!$user) {
            $user = \App\Models\User::create([
                'name' => 'Super Admin Disnakertrans',
                'email' => $adminEmail,
                'password' => \Illuminate\Support\Facades\Hash::make('password'),
            ]);
        }
        
        $user->assignRole($superAdmin);
    }
}
