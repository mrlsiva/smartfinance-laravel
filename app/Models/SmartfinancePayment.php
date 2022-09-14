<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SmartfinancePayment extends Model
{
    use HasFactory;

    protected $fillable = [
        'smartfinance_id','month','year','amount','payment_date','paid_by','is_status'
    ];
}
