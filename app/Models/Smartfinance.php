<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Smartfinance extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id','plan_id','amount','investment_date'
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function plan()
    {
        return $this->belongsTo('App\Models\Plan');
    }

    public function getBillAttribute($value)
    {
        return $value ? url('storage/app/public/'.config('path.bill').$value ): null;
    }
}
