<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    // protect
    protected $fillable = ['name', 'slug', 'icon', 'taq_line', 'color'];

    public function tools()
    {
        return $this->hasMany(Tool::class, 'category_id');
    }
}
