<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class album extends Model
{
    use HasFactory;



    public function user(){
        return  $this->belongsTo('App\Models\User');
    }


    protected $fillable = [
        'name',
        'photo',
        'old_salary',
        'diccount',
        'created_at',
        'updated_at'
    ];

    protected $hidden = [
        'Public',
    ];

}
