<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tracking extends Model
{
    use HasFactory;

    protected $primaryKey = 'trackingID';
    protected $fillable = [
        'orderID',
        'order_status',
        'timestamp'
    ];

    public function order()
    {
        return $this->belongsTo(Order::class, 'orderID');
    }
}