<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tool extends Model
{
    protected $fillable = [
        'category_id',
        'view',
        'name',
        'taq_line',
        'slug',
        'title',
        'short_title',
        'step_title',
        'step_sub_title',
        'step',
        'content',
        'faq',
        'icon',
        'color',
        'status',
        'meta_title',
        'meta_description',
        'meta_keyword',
        'usages',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    protected $casts = [
        'faq' => 'array',
        'step' => 'array',
    ];
}
