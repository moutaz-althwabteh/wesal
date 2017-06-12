<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Code extends Model
{
    protected $table='Codes';
    protected $fillable=['name_ar', 'name_en', 'active', 'MainCode_id','desc'];

    public function MainCode()
    {
        return $this->belongsTo('App\MainCode','MainCodetb_id');
    }
}
