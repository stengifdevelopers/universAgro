<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Annonce extends Model
{

    protected $guarded=[''];
    // public $timestamps=null;

    protected $attributes = [
        'nombre_vue' =>0 ,
        'nombre_like'=> 0
    ];
}
