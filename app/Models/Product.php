<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    // Nama tabel (opsional jika mengikuti konvensi Laravel)
    protected $table = 'products';

    // Kolom yang boleh diisi secara massal
    protected $fillable = [
        'name',
        'description',
        'price',
        'image',
        'category_id',
        // tambahkan kolom lain sesuai kebutuhan
    ];

    /**
     * Relasi ke kategori produk
     */
    public function category()
    {
    return $this->belongsTo(Categories::class, 'category_id');
    }


    /**
     * Relasi ke item keranjang (cart)
     */
    public function carts()
    {
        return $this->hasMany(Cart::class);
    }

    /**
     * Relasi ke item order
     */
    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function feedbacks()
    {
        return $this->hasMany(\App\Models\Feedbacks::class);
    }
}
