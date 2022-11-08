<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SocialIcon extends Model
{
    use HasFactory;

    protected $fillable = [
        'name','link','logo'
    ];

    public function getLogoAttribute($value)
    {
        return $value ? url('storage/app/public/logo/'.$value ): null;
    }
}
