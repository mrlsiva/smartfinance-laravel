<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReviewRating extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id','placed_on','review_title','review','rating','is_status'
    ];


    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

}
