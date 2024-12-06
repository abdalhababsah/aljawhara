<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name_en',
        'name_ar',
        'description_en',
        'description_ar',
        'image',
        'price',
        'category_id',
    ];

    // A product belongs to a category
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}