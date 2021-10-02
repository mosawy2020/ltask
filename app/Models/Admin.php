<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laratrust\Traits\LaratrustUserTrait;
class Admin extends Authenticatable
{

   
    use LaratrustUserTrait; 


     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
 
 
    protected $fillable = [
        'name',
        'email',
        'photo',
        'password',
        'created_at',
        'updated_at'
    ];

    protected $hidden = [
        'remember_token',
    ];
    protected $guard = 'admin';
}
