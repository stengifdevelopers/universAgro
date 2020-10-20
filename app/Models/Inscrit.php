<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Inscrit extends Model
{
    protected $guarded=[''];
    // public $timestamps=null;

    public function profile()  {
        return $this->hasOne('App\Models\Profil');
    }

    
}
