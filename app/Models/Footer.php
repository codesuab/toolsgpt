<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Footer extends Model
{
    // fillable
    protected $fillable = ['col', 'tool_id', 'status'];

    public function tool()
    {
        return $this->belongsTo(Tool::class, 'tool_id');
    }
}
