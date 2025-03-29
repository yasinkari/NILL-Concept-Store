<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $primaryKey = 'paymentID';
    protected $fillable = [
        'payment_date',
        'payment_status'
    ];

    public function order()
    {
        return $this->hasOne(Order::class, 'paymentID');
    }
}