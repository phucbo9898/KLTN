<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attribute_Value extends Model
{
    use HasFactory;
    protected $table = 'attribute_value';
    protected $guarded = [];

    public function attribute()
    {
        return $this->belongsTo(Attribute::class, 'attribute_id');
    }

    public function product()
    {
        return $this->belongsToMany(Product::class, 'product_attribute', 'attribute_value_id', 'product_id');
    }
}
