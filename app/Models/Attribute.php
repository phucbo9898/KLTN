<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Attribute extends Model
{
    use HasFactory, SoftDeletes;
    protected $guarded = [];

    public function attribute_values()
    {
        return $this->hasMany(Attribute_Value::class, 'attribute_id');
    }
}
