<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class Projet extends Model
{
    protected $guarded=[''];

    protected $dates = ['created_at'];
    protected $date = ['creation'];


    protected $attributes = [
        'nombre_vue' =>0 ,
        'nombre_like'=> 0
    ];

    // public function getRouteKeyName()
    // {
    //     return 'id';
    // }

    public function fichier()  {
        return $this->hasMany('App\Models\Fichier','pro_id');
    }

    public function blog()
    {
        return $this->belongsTo('App\Models\Blog');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function comments()
    {
        return $this->hasMany('App\Models\Comment', 'projet_id');
    }


}
