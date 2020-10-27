<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $guarded=[''];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function projet(){
        return $this->hasMany('App\Models\Projet', 'blo_id');
    }
}
