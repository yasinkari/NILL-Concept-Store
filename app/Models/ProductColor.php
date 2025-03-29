<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductColor extends Model
{
    use HasFactory;

    protected $primaryKey = 'colorID';
    protected $fillable = [
        'productID',
        'color_name'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class, 'productID');
    }

    public function toneRecords()
    {
        return $this->hasMany(ToneRecord::class, 'colorID');
    }
}