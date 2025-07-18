<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;
    protected $table = 'notification';
    protected $guarded = [];

    public function userSender()
    {
        return $this->belongsTo(User::class, 'sender');
    }

    public function userReceiver()
    {
        return $this->belongsTo(User::class, 'receiver');
    }
}
