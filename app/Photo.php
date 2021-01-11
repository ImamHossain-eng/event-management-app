<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $fillable = ['image'];
    protected $dates = ['created_at', 'updated_at'];
}
