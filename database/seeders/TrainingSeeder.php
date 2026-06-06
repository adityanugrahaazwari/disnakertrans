<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Training;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class TrainingSeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            'TIK' => [
                ['title' => 'Pelatihan Desain Grafis', 'desc' => 'Pelatihan pembuatan desain komunikasi visual menggunakan software profesional.'],
                ['title' => 'Web Development Dasar', 'desc' => 'Belajar membuat website dari nol menggunakan HTML, CSS, dan JavaScript.'],
            ],
            'Tata Busana' => [
                ['title' => 'Menjahit Pakaian Dasar', 'desc' => 'Pelatihan teknik menjahit dasar untuk pemula hingga menghasilkan pakaian siap pakai.'],
            ],
            'Tata Boga' => [
                ['title' => 'Pembuatan Kue dan Roti', 'desc' => 'Pelatihan teknik baking profesional untuk berbagai jenis kue dan roti.'],
            ],
            'Otomotif' => [
                ['title' => 'Mekanik Sepeda Motor', 'desc' => 'Pelatihan pemeliharaan dan perbaikan mesin sepeda motor.'],
            ],
        ];

        foreach ($categories as $catName => $trainings) {
            $category = Category::where('name', $catName)->first();
            
            if ($category) {
                foreach ($trainings as $t) {
                    Training::create([
                        'category_id' => $category->id,
                        'title' => $t['title'],
                        'description' => $t['desc'],
                        'quota' => rand(15, 30),
                        'start_date' => Carbon::now()->addDays(rand(7, 30)),
                        'end_date' => Carbon::now()->addDays(rand(31, 60)),
                        'is_active' => true,
                    ]);
                }
            }
        }
    }
}
