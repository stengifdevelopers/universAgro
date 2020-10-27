<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Auth;

class UserPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function delete(User $user){
        return Auth::user()->role==4;
    }

    public function update(){
        return Auth::user()->role==3 OR Auth::user()->role==4 ;
    }

    public function deletePresent(User $user){
        if(Auth::user()->id != $user->id){
            return true;
        }
    }
}
