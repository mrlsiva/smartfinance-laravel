<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class TaxDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'tax_id','assessment_year','document','acknowledgement'
    ];

    public function getDocumentAttribute($value)
    {
        $document = new Collection();
        foreach(explode(",",$value) as $copy){
            $document->push(url("storage/app/public/tax_document/"."{$copy}"));
        }
        return $document;
    }

    public function getAcknowledgementAttribute($value)
    {
        return $value ? url('storage/app/public/acknowledgement/'.$value ): null;
    }

    public function tax()
    {
        return $this->belongsTo('App\Models\Tax');
    }
}
