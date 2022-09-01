<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id','address','city','pincode','aadhaar_no','pan_card_no','avatar','aadhaar_card','pan_card'
    ];

    public function getAvatarAttribute($value)
    {
        return $value ? url('storage/app/public/'.config('path.avatar').$value ): null;
    }

    public function getAadhaarAttribute($value)
    {
        return $value ? url('storage/app/public/'.config('path.aadhaar_card').$value ): null;
    }

    public function getPanAttribute($value)
    {
        return $value ? url('storage/app/public/'.config('path.pan_card').$value ): null;
    }
}
