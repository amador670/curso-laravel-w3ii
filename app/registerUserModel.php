<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class registerUserModel extends Model
{
    protected $table = "users";
    protected $fillable = [
        'name', 'email', 'password', 'role',
    ];
}
