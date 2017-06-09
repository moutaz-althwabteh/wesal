<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $table='settings';
    protected $fillable = [
        'title_ar', 'title_en', 'about_ar', 'about_en', 'facebook', 'twitter', 'youtube', 'email', 'fax', 'tel', 'mobile', 'Longtude', 'Latitude', 'title_place', 'maintenance'
    ];
}
