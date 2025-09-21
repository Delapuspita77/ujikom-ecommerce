<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['user_id', 'address', 'total', 'status', 'status_order'];

    protected $attributes = [
        'status_order' => 'pending',
        'status'       => 'unpaid',
    ];
    
    // Relasi ke user
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relasi ke produk lewat pivot (order_items)
    public function products()
    {
        return $this->belongsToMany(Product::class, 'order_items')
                    ->withPivot('quantity', 'price')
                    ->withTimestamps();
    }

    // Relasi ke pembayaran
    public function payment()
    {
        return $this->hasOne(Payment::class);
    }

    // Relasi ke invoice
    public function invoice()
    {
        return $this->hasOne(Invoice::class);
    }
}
