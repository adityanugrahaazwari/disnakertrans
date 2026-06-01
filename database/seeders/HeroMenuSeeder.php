<?php

namespace Database\Seeders;

use App\Models\Menu;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class HeroMenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $pEditProfil = Permission::where('name', 'edit-profil')->first()?->id;
        $parent = Menu::where('title', 'Profil Dinas')->first();

        // Remove old menu if it exists under wrong title or parent
        Menu::where('url', '/heroes')->where('title', 'Kelola Hero')->delete();

        if ($parent) {
            Menu::updateOrCreate(
                ['url' => '/heroes'],
                [
                    'parent_id' => $parent->id,
                    'title' => 'Hero Section',
                    'icon' => 'fas fa-image',
                    'order' => 3,
                    'permission_id' => $pEditProfil,
                ]
            );
        }
    }
}
