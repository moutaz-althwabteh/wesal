<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StaticPage extends Model
{
    //
    protected $table='staticPages';
    protected $fillable=['title_ar', 'title_en', 'desc_ar', 'desc_en', 'active'];
}
