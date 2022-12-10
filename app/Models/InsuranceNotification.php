<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InsuranceNotification extends Model
{
    use HasFactory;

    protected $fillable = [
        'insurance_id','date','is_send'
    ];

    public function insurance()
    {
        return $this->belongsTo('App\Models\Insurance');
    }
}
