<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NextMonthPayout extends Model
{
    use HasFactory;

    protected $fillable = [
        'id','name','date','plan','next_month_payout'
    ];
}
