<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $guarded=[''];
    public $timestamps=null;

    protected $attributes = [
        'nombre_vue' =>0 ,
        'nombre_like'=> 0
    ];

    //    Une entreprise detiend plusieurs clients
    public function categories()
    {
        return $this->belongsTo('App\Models\Categorie', 'categorie_id');
    }
}
