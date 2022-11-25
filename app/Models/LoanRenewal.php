<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoanRenewal extends Model
{
    use HasFactory;

    protected $fillable = [
        'loan_id','date','renewaled_by'
    ];
}
