<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stage extends Model
{
    protected $fillable = ['name', 'price'];
    protected $dates = ['created_at', 'updated_at'];
}
