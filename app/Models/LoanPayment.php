<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoanPayment extends Model
{
    use HasFactory;

    protected $fillable = [
        'loan_id','payment_date','amount','payment_bill','paid_on','is_status'
    ];

    public function loan()
    {
        return $this->belongsTo('App\Models\Loan');
    }

    public function getPaymentBillAttribute($value)
    {
        return $value ? url('storage/app/public/loan_payment/'.$value ): null;
    }
}
