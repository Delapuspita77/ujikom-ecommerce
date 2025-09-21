<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    protected $table = 'categories'; // tambahkan biar eksplisit
    protected $fillable = ['name', 'description'];

    public function products()
    {
        // foreign key di tabel products adalah categories_id
        return $this->hasMany(Product::class, 'category_id');
    }
}
