<?php

namespace App\Models;

use App\Enums\StatusTransaction;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
    protected $table = 'transaction';
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function orders()
    {
        return $this->hasMany(Order::class, 'transaction_id');
    }

    public function getTypeStatus()
    {
        return StatusTransaction::getTypeStatus($this->status);
    }
}
