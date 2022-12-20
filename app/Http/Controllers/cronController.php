<?php

namespace App\Http\Controllers;

use App\Http\Controllers\SMTPController;
use App\Exports\NextMonthPayoutsExport;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\InsuranceNotification;
use App\Models\SmartfinancePayment;
use App\Models\NextMonthPayout;
use App\Models\Smartfinance;
use Illuminate\Http\Request;
use App\Models\UserAmount;
use App\Models\Template;
use App\Models\Setting;
use Carbon\Carbon;
use DB;

class cronController extends Controller
{
    public function testing(Request $request)
    {
        DB::table("users")->update(["email_verified_at"=>date("Y-m-d h:i:s")]);
        $data = "Working";
        Storage::disk('public')->append('test.txt', $data);
    }

    public function emailToDueUsers(Request $request)
    {

        $now = Carbon::now()->format('Y-m-d');
        $notifications = InsuranceNotification::where([['date',$now],['is_send',0]])->get();
        foreach ($notifications as $notification) {
            $emailsetting = Template::where([['id',39],['is_active',1]])->first(); 
            if($emailsetting != null){
                $email_template = $emailsetting->template;
                $emailContentReplace=['##NAME##'=>$notification->insurance->user->first_name.' '.$notification->insurance->user->last_name];
                $txt = strtr($email_template,$emailContentReplace);
                $emailId = $notification->insurance->user->email;
                $subject = $emailsetting->subject;
                $mailstatus = SMTPController::sendMail($emailId,$subject,$txt);
            }
            $insurance_notification = DB::table('insurance_notifications')->where('id',$notification->id)->update(['is_send' =>1]);

            if($notification->insurance->due == 'Monthly'){

                $date = Carbon::parse($notification->date)->addMonths(1);
            }

            if($notification->insurance->due == 'Yearly'){

                $date = Carbon::parse($notification->date)->addYears(1);
            }

            if($notification->insurance->due == 'Quarterly'){

                $date = Carbon::parse($notification->date)->addMonths(3);
            }


            if($date < $notification->insurance->end_date){

                $insurance_notification = InsuranceNotification::create([
                    'insurance_id' => $notification->insurance_id,
                    'date' => $date,
                    'is_send' => 0,
                ]);
            } 
        }

        $data = $notifications->count()." mails was send in ".$now."\n";
        Storage::disk('public')->append('due_users.txt', $data);
    }

    public function payoutList(Request $request)
    {
        $month_end = Carbon::now()->endOfMonth()->format('Y-m-d');
        $now_time = Carbon::now()->format('H');
        $now = Carbon::now()->format('Y-m-d');

        if($now == $month_end && $now_time == '21'){

            $month = Carbon::now()->addMonth()->format('m');
            $year = Carbon::now()->addMonth()->format('Y');

            $payout_delete = NextMonthPayout::truncate();

            $users = SmartfinancePayment::join('smartfinances','smartfinance_payments.smartfinance_id','=','smartfinances.id')->whereMonth('smartfinance_payments.payment_date',$month)->whereYear('smartfinance_payments.payment_date', $year)->groupBy('smartfinances.user_id')->select('smartfinances.user_id')->get();

            foreach($users as $user){

                $payments = SmartfinancePayment::join('smartfinances','smartfinance_payments.smartfinance_id','=','smartfinances.id')->whereMonth('smartfinance_payments.payment_date',$month)->whereYear('smartfinance_payments.payment_date', $year)->where('smartfinances.user_id',$user->user_id)->where('smartfinances.plan_id','!=',3)->select('smartfinance_payments.*','smartfinances.user_id','smartfinances.plan_id')->get();
                $amount = 0;
                foreach($payments as $payment){

                    $amount = $amount + $payment->amount;
                }
                $payments = SmartfinancePayment::join('smartfinances','smartfinance_payments.smartfinance_id','=','smartfinances.id')->whereMonth('smartfinance_payments.payment_date',$month)->whereYear('smartfinance_payments.payment_date', $year)->where('smartfinances.user_id',$user->user_id)->where('smartfinances.plan_id','=',3)->orderBy('smartfinance_payments.id','Desc')->groupBy('smartfinance_payments.smartfinance_id')->select('smartfinance_payments.*','smartfinances.user_id','smartfinances.plan_id')->get();
                foreach($payments as $payment){

                    $payment_ym = SmartfinancePayment::where('smartfinance_id',$payment->smartfinance_id)->orderBy('id','Desc')->first();
                    $amount = $amount + $payment_ym->next_amount + $payment_ym->intrest + $payment_ym->balance;
                }

                $result=[];
                $smartfinance_ids = Smartfinance::where('user_id',$user->user_id)->get();
                foreach($smartfinance_ids as $smartfinance_id){
                    $result[] = $smartfinance_id->id;
                }
                $next_payment_date = SmartfinancePayment::whereIn('smartfinance_id',$result)->where('is_status',0)->orderBy('payment_date', 'asc')->first();
                $user_amount = UserAmount::where([['user_id',$user->user_id],['is_status',0]])->first();

                if($next_payment_date->payment_date == $payment->payment_date )
                {
                    if($user_amount != NULL){

                        $amount = $amount +  $user_amount->amount;
                    }
                }
                //return $amount;


                $payout = NextMonthPayout::create([

                    'user_id' => $payment->smartfinance->user->id,
                    'name' => $payment->smartfinance->user->first_name.' '.$payment->smartfinance->user->last_name,
                    'date' => $payment->payment_date,
                    'next_payout_amount' => $amount
                ]);
            }

            $user_amounts = UserAmount::whereNotIn('user_id',$users)->where('is_status',0)->get();
            foreach($user_amounts as $user_amount){
                $date = Carbon::parse($user_amount->date)->addMonths(1);
                $new_date = Carbon::parse($date)->setDay(6)->format('Y-m-d');

                $timestamp = strtotime($new_date);
                $day = date('l', $timestamp);
                if($day == 'Tuesday' ||$day == 'Sunday' ||$day == 'Friday'){
                    $date = Carbon::parse($new_date)->setDay(7)->format('Y-m-d');
                }

                $payout = NextMonthPayout::create([

                    'user_id' => $user_amount->user->id,
                    'name' =>  $user_amount->user->first_name.' '. $user_amount->user->last_name,
                    'date' => $date,
                    'next_payout_amount' => $user_amount->amount
                ]);

            } 

            $time = Carbon::now()->toTimeString();
            $date = Carbon::now()->formatLocalized('%d %b %Y');
            $now = $date.'_'.$time;
            $name= $date.'.xlsx';
            Storage::disk('public')->delete('export/'.$name);
            Excel::store(new NextMonthPayoutsExport(2018), $name,'excel');


            //Mail
            $attachment = Storage::path('/public/excel/'.$name);
            $emailsetting = Template::where([['id',20],['is_active',1]])->first(); 
            $admin_email = Setting::where('key','admin_email')->first();
            if($emailsetting != null){
                $txt = $emailsetting->template;
                $emailId = $admin_email->value;
                $subject = $emailsetting->subject;
                $mailstatus = SMTPController::sendMail($emailId,$subject,$txt,$attachment);
            }
            //Mail End 

            $now = Carbon::now()->format('Y-m-d h:i:s');
            $data = "Payout excel send successfully in mail on ".$now."\n";
            Storage::disk('public')->append('payout.txt', $data);
        }
        else{

        }  

        
    }
}
