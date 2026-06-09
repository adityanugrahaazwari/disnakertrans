<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = [
        'agency_name',
        'footer_description',
        'vision',
        'mission',
        'history',
        'organizational_structure',
        'address',
        'google_maps_url',
        'email',
        'phone',
        'facebook_url',
        'instagram_url',
        'youtube_url',
        'twitter_url',
        'tiktok_url',
        'head_name',
        'head_position',
        'head_greeting',
        'head_photo',
        'complaint_title',
        'complaint_description',
        'complaint_wa',
        'service_charter',
    ];
}
