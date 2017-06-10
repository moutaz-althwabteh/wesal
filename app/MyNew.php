<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MyNew extends Model
{
    protected $table='news';
    protected $fillable=['title', 'summary', 'tags', 'details', 'categorie_id', 'active', 'main'];

    public function Categorie(){

        return $this->belongsTo('App\Categorie','categorie_id');
    }
}
