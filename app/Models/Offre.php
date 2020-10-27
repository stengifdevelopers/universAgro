<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Offre extends Model
{
    protected $guarded=[''];

    protected $dates = ['date_fin'];
    
    protected $attributes = [
        'nombre_vue' => 0
    ];

    public function getRouteKeyName()
    {
        return 'id';
    }
}
