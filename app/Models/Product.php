<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $primaryKey = 'productID';
    protected $fillable = [
        'product_name',
        'product_price',
        'product_stock',
        'product_description'
    ];

    public function orders()
    {
        return $this->hasMany(Order::class, 'productID');
    }

    public function carts()
    {
        return $this->hasMany(Cart::class, 'productID');
    }

    public function productColors()
    {
        return $this->hasMany(ProductColor::class, 'productID');
    }

    public function toneRecords()
    {
        return $this->hasMany(ToneRecord::class, 'productID');
    }
}
