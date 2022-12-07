<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class Insurance extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id','category','sub_category','amount','tenure','start_date','end_date','due','due_date'
    ];

    public function getDocumentAttribute($value)
    {
        $document = new Collection();
        foreach(explode(",",$value) as $copy){
            $document->push(url("storage/app/public/policy_document/"."{$copy}"));
        }
        return $document;
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function commafun($num){

        $explrestunits = "" ;
        if(strlen($num)>3) {
            $lastthree = substr($num, strlen($num)-3, strlen($num));
            $restunits = substr($num, 0, strlen($num)-3); 
            $restunits = (strlen($restunits)%2 == 1)?"0".$restunits:$restunits; 
            $expunit = str_split($restunits, 2);
            for($i=0; $i<sizeof($expunit); $i++) {

                if($i==0) {
                    $explrestunits .= (int)$expunit[$i].",";
                } 
                else {
                    $explrestunits .= $expunit[$i].",";
                }
            }
            $thecash = $explrestunits.$lastthree;
        } 
        else {
            $thecash = $num;
        }
        return $thecash; 
    }
}
