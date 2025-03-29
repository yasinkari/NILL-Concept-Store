<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ToneRecord extends Model
{
    use HasFactory;

    protected $primaryKey = 'tone_recordID';
    protected $fillable = [
        'toneID',
        'colorID',
        'productID'
    ];

    public function tone()
    {
        return $this->belongsTo(Tone::class, 'toneID');
    }

    public function productColor()
    {
        return $this->belongsTo(ProductColor::class, 'colorID');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'productID');
    }
}