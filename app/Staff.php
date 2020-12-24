<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    protected $fillable = ['name', 'email'];
    protected $dates = ['created_at', 'updated_at'];
}
