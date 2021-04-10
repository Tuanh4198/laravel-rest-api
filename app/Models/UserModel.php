<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserModel extends Model
{
    
    protected $table = "users";
    
    protected $fillable = [
        'name',
        'email',
        'phone',
        'active',
        'email_verified_at',
        'password',
        'remember_token',
        'created_at',
        'updated_at'
    ];
}
