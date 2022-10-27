<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Upload extends Model
{
    use HasFactory;

    protected $fillable = [
        'type','banner','banner_link','youtube_link'
    ];

    public function getBannerAttribute($value)
    {
        return $value ? url('storage/app/public/'.config('path.banner').$value ): null;
    }
}
