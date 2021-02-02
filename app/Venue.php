<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Venue extends Model
{
    protected $fillable = ['name', 'price'];
    protected $dates = ['created_at', 'updated_at'];
}
