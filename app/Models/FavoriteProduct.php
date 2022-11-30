<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FavoriteProduct extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'favorite_product';
    protected $guarded = [];
}
