<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductQtyPay extends Model
{
    use HasFactory;

    protected $table = 'product_qty_pay';
    protected $guarded = [];
}
