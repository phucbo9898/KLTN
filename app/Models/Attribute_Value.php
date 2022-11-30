<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Attribute_Value extends Model
{
    use HasFactory, SoftDeletes;
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
