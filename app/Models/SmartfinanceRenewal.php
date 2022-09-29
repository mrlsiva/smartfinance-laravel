<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SmartfinanceRenewal extends Model
{
    use HasFactory;

    protected $fillable = [
        'smartfinance_id','date','renewaled_by'
    ];

}
