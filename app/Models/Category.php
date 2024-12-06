<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name_en',
        'name_ar',
        'description_en',
        'description_ar',
        'image',
    ];

    // A product belongs to a category
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}