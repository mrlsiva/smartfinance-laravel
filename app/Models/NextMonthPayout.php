<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NextMonthPayout extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id','name','date','plan','next_payout_amount'
    ];

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
