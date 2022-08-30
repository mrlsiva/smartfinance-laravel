<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NomineeDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id','name','relationship','age','aadhaar_no','aadhar'
    ];

    public function getAadhaarAttribute($value)
    {
        return $value ? url('storage/app/public/'.config('path.aadhaar_card').$value ): null;
    }
}
