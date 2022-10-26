<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SmartfinancePayment extends Model
{
    use HasFactory;

    protected $fillable = [
        'smartfinance_id','invested_date','month','year','intrest','investment_amount','amount','payment_date','paid_by','is_status','next_amount','balance','bill','is_approve'
    ];


    public function smartfinance()
    {
        return $this->belongsTo('App\Models\Smartfinance');
    }

    public function getBillAttribute($value)
    {
        return $value ? url('storage/app/public/'.config('path.bill').$value ): null;
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
