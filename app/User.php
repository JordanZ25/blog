<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $table = 'students';



    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
   
}
