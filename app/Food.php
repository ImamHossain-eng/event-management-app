<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    protected $fillable = ['name', 'image'];
    protected $dates = ['created_at', 'updated_at'];
}
