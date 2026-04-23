<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class UsersData extends Authenticatable
{
    protected $table = 'users_data';

    protected $fillable = [
        'name',
        'email',
        'password',
        'userType'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];
}