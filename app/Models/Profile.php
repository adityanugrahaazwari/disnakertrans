<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = [
        'nama_dinas',
        'footer_description',
        'visi',
        'misi',
        'sejarah',
        'struktur_organisasi',
        'alamat',
        'email',
        'telepon',
        'facebook_url',
        'instagram_url',
        'youtube_url',
        'twitter_url',
        'tiktok_url',
        'nama_kepala',
        'jabatan_kepala',
        'sambutan_kepala',
        'foto_kepala',
        'pengaduan_title',
        'pengaduan_description',
        'pengaduan_wa',
        'maklumat_pelayanan',
    ];
}
