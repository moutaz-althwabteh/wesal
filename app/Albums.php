<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Albums extends Model
{
    protected $table='albums';
    protected $fillable = [
        'name'
    ];

   public function image(){

        return $this->hasMany('App\Image','albums_Id');
    }

}
