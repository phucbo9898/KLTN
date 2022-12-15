<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function attribute()
    {
        return $this->belongsToMany(Attribute::class, 'category_attribute', 'category_id', 'attribute_id');
    }

    public function products()
    {
        return $this->hasMany(Product::class, 'category_id');
    }
}
