<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartRecord extends Model
{
    use HasFactory;

    protected $primaryKey = 'cart_recordID';
    protected $fillable = [
        'cartID',
        'productID'
    ];

    public function cart()
    {
        return $this->belongsTo(Cart::class, 'cartID');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'productID');
    }
}