<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductHistory extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'product_history';

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
