<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SmartfinancePayment extends Model
{
    use HasFactory;

    protected $fillable = [
        'smartfinance_id','invested_date','month','year','intrest','investment_amount','amount','payment_date','paid_by','is_status','next_amount','balance','bill','is_approve'
    ];


    public function smartfinance()
    {
        return $this->belongsTo('App\Models\Smartfinance');
    }

    public function getBillAttribute($value)
    {
        return $value ? url('storage/app/public/'.config('path.bill').$value ): null;
    }
}
