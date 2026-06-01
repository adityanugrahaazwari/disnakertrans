<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JobVacancy extends Model
{
    protected $fillable = [
        'perusahaan',
        'posisi',
        'syarat',
        'deadline',
        'is_verified',
    ];

    protected $casts = [
        'deadline' => 'date',
        'is_verified' => 'boolean',
    ];

    public function images()
    {
        return $this->hasMany(JobVacancyImage::class);
    }
}
