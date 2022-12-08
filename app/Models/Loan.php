<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class Loan extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id','amount','property_type','property_value','property_copy','intrest','requested_on','approved_on','is_status','is_close'
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function getPropertyCopyAttribute($value)
    {
        $property_copy = new Collection();
        foreach(explode(",",$value) as $copy){
            $property_copy->push(url("storage/app/public/property/"."{$copy}"));
        }
        return $property_copy;
    }

    public function getApprovePaymentCopyAttribute($value)
    {
        $approve_payment_copy = new Collection();
        foreach(explode(",",$value) as $copy){
            $approve_payment_copy->push(url("storage/app/public/approve_payment_copy/"."{$copy}"));
        }
        return $approve_payment_copy;
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
