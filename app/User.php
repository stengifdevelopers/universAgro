<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
     protected $guarded=[''];
    // protected $fillable = [
    //     'name', 'email', 'password',
    // ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function profile()  {
        return $this->hasOne('App\Models\Profil');
    }

    // public function scopeClose1($query ){
    //     return $query->where('id', $id)->get();
    // }

    public function blog()
    {
        return $this->hasOne('App\Models\Blog', 'sup_id');
    }

    public function comments()
    {
        return $this->hasMany('App\Models\Comment', 'user_id');
    }


}
