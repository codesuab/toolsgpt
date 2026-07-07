<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    // protect
    protected $fillable = ['name', 'slug'];
}
