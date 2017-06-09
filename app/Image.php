<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $table='images';

    protected $fillable = [
        'name','albums_Id'
    ];

    public function Albums(){

        return $this->belongsTo('App\Albums','albums_Id');
    }


}
