<?php

namespace App\Http\Controllers;

use App\Http\Controllers\SMTPController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\MutualFund;
use App\Models\Setting;
use App\Models\Template;
use \Carbon\Carbon;


class mutalFundController extends Controller
{
    public function send_enquiry(Request $request)
    {
        $user = Auth::user();
        $now = Carbon::now()->format('Y-m-d');
        $mutal_fund = MutualFund::create([
            'user_id' => $user->id,
            'enquired_on' => $now,
        ]);


        //Mail

        //To Owner
        $emailsetting = Template::where([['id',34],['is_active',1]])->first(); 
        $mutual_fund_email = Setting::where('key','mutual_fund_email')->first();
        if($emailsetting != null){
            $email_template = $emailsetting->template;
            $emailContentReplace=['##NAME##'=>$user->first_name.' '.$user->last_name,'##PHONE##'=>$user->phone,'##EMAIL##'=>$user->email];
            $txt = strtr($email_template,$emailContentReplace);
            $emailId = $mutual_fund_email->value;
            $subject = $emailsetting->subject;
            $mailstatus = SMTPController::sendMail($emailId,$subject,$txt);
        }
        //End

        //To User
        $emailsetting = Template::where([['id',33],['is_active',1]])->first(); 
        $mutual_fund_email = Setting::where('key','mutual_fund_email')->first();
        $mutual_fund_phone = Setting::where('key','mutual_fund_phone')->first();
        $mutual_fund_name = Setting::where('key','mutual_fund_name')->first();
        if($emailsetting != null){
            $email_template = $emailsetting->template;
            $emailContentReplace=['##NAME##'=>$mutual_fund_name->value,'##PHONE##'=>$mutual_fund_phone->value,'##EMAIL##'=>$mutual_fund_email->value];
            $txt = strtr($email_template,$emailContentReplace);
            $emailId = $user->email;
            $subject = $emailsetting->subject;
            $mailstatus = SMTPController::sendMail($emailId,$subject,$txt);
        }
        //End

        return redirect()->back()->with('alert', 'Mail send to your email!!');
    }
}
