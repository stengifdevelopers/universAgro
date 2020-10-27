<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $guarded=[''];

    protected $dates = ['date_fin'];

    public function user()  {
        return $this->belongsTo('App\User');
    }

    public function projet()  {
        return $this->belongsTo('App\Models\Projet');
    }
}
