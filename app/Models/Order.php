<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = ['date', 'status', 'room_number', 'user_id', 'admin_id'];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
