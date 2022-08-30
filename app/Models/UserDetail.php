<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id','address','city','pincode','email','phone','aadhaar_no','pan_card_no','avatar','aadhaar_card','pan_card'
    ];
}
