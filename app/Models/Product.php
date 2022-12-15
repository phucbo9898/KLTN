<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function productAttributeValue()
    {
        return $this->belongsToMany(Attribute_Value::class, 'product_attribute', 'product_id', 'attribute_value_id');
    }

    public function ratings()
    {
        return $this->hasMany(Rating::class, 'product_id');
    }

    public function favoriteProduct()
    {
        return $this->belongsToMany(User::class, 'favorite_product', 'product_id', 'user_id');
    }

    public function productHitory()
    {
        return $this->hasMany(ProductHistory::class, 'product_id');
    }
}
