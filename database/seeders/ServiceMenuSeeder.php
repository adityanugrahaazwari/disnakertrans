<?php

namespace Database\Seeders;

use App\Models\Menu;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class ServiceMenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $pManageLayanan = Permission::where('name', 'manage-layanan')->first()?->id;
        $parent = Menu::where('title', 'Program & Layanan')->first();

        if ($parent) {
            Menu::create([
                'parent_id' => $parent->id,
                'title' => 'Kelola Kartu Layanan',
                'url' => '/services',
                'icon' => 'fas fa-th-large',
                'order' => 0, // Top of the group
                'permission_id' => $pManageLayanan,
            ]);
        }
    }
}
