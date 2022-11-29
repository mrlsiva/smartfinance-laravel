<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class TaxDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'tax_id','start_year','end_year','document'
    ];

    public function getDocumentAttribute($value)
    {
        $document = new Collection();
        foreach(explode(",",$value) as $copy){
            $document->push(url("storage/app/".config('path.tax_document')."{$copy}"));
        }
        return $document;
    }

    public function tax()
    {
        return $this->belongsTo('App\Models\Tax');
    }
}
