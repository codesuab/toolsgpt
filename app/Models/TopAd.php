<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TopAd extends Model
{
    protected $fillable = ['text', 'link', 'link_label', 'status'];
}
