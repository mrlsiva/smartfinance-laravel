<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserAmount extends Model
{
    use HasFactory;

     protected $fillable = [
        'user_id','date','amount','is_status'
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
