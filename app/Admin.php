<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    protected $table = "Admin";
    public $timestamps = false;
    
    protected $fillable = [
        'name', 'email', 'password'
    ];
}
