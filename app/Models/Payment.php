<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = ['order_id', 'amount', 'method', 'status'];

    // Relasi ke order
    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
