<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MutualFund extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id','enquired_on'
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
