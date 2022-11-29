<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tax extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id','pan_card','password'
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
