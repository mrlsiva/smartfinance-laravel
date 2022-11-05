<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
Use \Carbon\Carbon;
use App\Models\Plan;
use App\Models\Smartfinance;
use App\Models\SmartfinancePayment;
use App\Models\SmartfinanceRenewal;
use App\Models\NextMonthPayout;
use App\Models\UserAmount;
use App\Exports\NextMonthPayoutsExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Setting;
use App\Models\Template;
use Image;
use DB;

class smartfinanceController extends Controller
{
    
    public function plan_type(Request $request)
    {
        $plan = $request->plan;
        $plan_type = Plan::where('type',$plan)->get();
        return $plan_type;

    }

    public function store_smart_finance(Request $request)
    {
        $validatedData = $request->validate([
            'amount' => 'required',
            'plan_id' => 'required',
            'bill' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',

        ]);

        $user_id = Auth::user()->id;
        $dt = Carbon::now();
        $investment_date = $dt->toDateString();

        $smartfinance = Smartfinance::create([
            'user_id' => $user_id,
            'plan_id' => $request->plan_id,
            'amount' => $request->amount,
            'investment_date' => $investment_date,
            'no_of_year' => $request->year,
            'is_status' => 2,
            'is_close' => 0,
        ]);

        //Bill
        $image = $request->file('bill');
        $rand_name = time() . Str::random(12);
        $filename = $rand_name . '.jpg';
        $photo = Image::make($image)->encode('jpg', 80);
        Storage::disk('public')->put(config('path.bill').$filename, $photo);
        $smartfinance->bill = $filename;
        $smartfinance->save();

        //Mail

        //To Admin
        $emailsetting = Template::where([['id',12],['is_active',1]])->first(); 
        $admin_email = Setting::where('key','admin_email')->first();
        if($emailsetting != null){
            $email_template = $emailsetting->template;
            $emailContentReplace=['##NAME##'=>$smartfinance->user->first_name.' '.$smartfinance->user->last_name,'##PHONE##'=>$smartfinance->user->phone,'##PLAN##'=>$smartfinance->plan->name,'##AMOUNT##'=>$smartfinance->amount];
            $txt = strtr($email_template,$emailContentReplace);
            $emailId = $admin_email->value;
            $subject = $emailsetting->subject;
            $mailstatus = SMTPController::sendMail($emailId,$subject,$txt);
        }
        //End

        //To User
        $emailsetting = Template::where([['id',13],['is_active',1]])->first(); 
        if($emailsetting != null){
            $email_template = $emailsetting->template;
            $emailContentReplace=['##NAME##'=>$smartfinance->user->first_name.' '.$smartfinance->user->last_name,'##PLAN##'=>$smartfinance->plan->name,'##AMOUNT##'=>$smartfinance->amount];
            $txt = strtr($email_template,$emailContentReplace);
            $emailId = $smartfinance->user->email;
            $subject = $emailsetting->subject;
            $mailstatus = SMTPController::sendMail($emailId,$subject,$txt);
        }
        //End

        //End Mail

        

        return redirect('dashboard');

    }


    public function get_smart_finance(Request $request) 
    { 
        $id=$request->id;  
        $finance = Smartfinance::where('id',$id)->first();
        return $finance;     
    }

    public function approve_smart_finance(Request $request) {
        $finance_id = $request->finance_id;
        $intrest = $request->intrest;
        $is_status = $request->is_status;
        $auth = Auth::user();

        if($is_status != Null){
            if($is_status == 1){

                $mail = Smartfinance::where('id',$finance_id)->first();
                $accepted_date = $request->accepted_date;
                $investment_date = $request->investment_date;

                $smartfinances = DB::table('smartfinances')->where('id',$finance_id)->update(['accepted_by' => $auth->id,'accepted_date' => $accepted_date,'investment_date' => $investment_date,'percentage' => $intrest,'is_status' => 1]);


                $smartfinance_payments = DB::table('smartfinance_payments')->where('smartfinance_id',$finance_id)->get();
                if($smartfinance_payments != NULL){

                    SmartfinancePayment::where('smartfinance_id',$finance_id)->delete();

                }
                // payment table
                $finance = Smartfinance::where('id',$finance_id)->first();
                if($finance->plan->type == 'month'){
                    $date = Carbon::parse($accepted_date)->addMonths(1);
                    $new_date = Carbon::parse($date)->setDay(6)->format('Y-m-d');
                    if($date > $new_date){
                        $date = Carbon::parse($accepted_date)->addMonths(2);
                        $payment_date = Carbon::parse($date)->setDay(6)->format('Y-m-d');
                        // check day
                        $timestamp = strtotime($payment_date);
                        $day = date('l', $timestamp);
                        if($day == 'Tuesday' ||$day == 'Sunday' ||$day == 'Friday'){
                            $payment_date = Carbon::parse($payment_date)->setDay(7)->format('Y-m-d');
                        }
                        else{
                            $payment_date = Carbon::parse($payment_date)->setDay(6)->format('Y-m-d');
                        }
                    }
                    else{
                        $date = Carbon::parse($accepted_date)->addMonths(1);
                        $payment_date = Carbon::parse($date)->setDay(6)->format('Y-m-d');
                        // check day
                        $timestamp = strtotime($payment_date);
                        $day = date('l', $timestamp);
                        if($day == 'Tuesday' ||$day == 'Sunday' ||$day == 'Friday'){
                            $payment_date = Carbon::parse($payment_date)->setDay(7)->format('Y-m-d');
                        }
                        else{
                            $payment_date = Carbon::parse($payment_date)->setDay(6)->format('Y-m-d');
                        }
                    }
                    for ($i = 1; $i <= 12; $i++){

                        $smartfinance = SmartfinancePayment::create([
                            'smartfinance_id' => $finance_id,
                            'month' => $i,
                            'amount' => $finance->percentage/100 * $finance->amount ,
                            'payment_date' => $payment_date,
                            'is_status' => 0,
                        ]);

                        //next-payment
                        $date = Carbon::parse($payment_date)->addMonths(1);
                        $payment_date = Carbon::parse($date)->setDay(6)->format('Y-m-d');
                        $timestamp = strtotime($payment_date);
                        $day = date('l', $timestamp);
                        if($day == 'Tuesday' ||$day == 'Sunday' ||$day == 'Friday'){
                            $payment_date = Carbon::parse($payment_date)->setDay(7)->format('Y-m-d');
                        }
                        else{
                            $payment_date = Carbon::parse($payment_date)->setDay(6)->format('Y-m-d');
                        }
                        //end-next-payment
                    }
                }

                else if($finance->plan->type == 'year' && $finance->plan->name == 'Long Term (S)'){
                    $year = $finance->no_of_year;
                    $amnt = $finance->amount; 

                    //amount-loop
                    for ($i = 1; $i <= $year; $i++){

                        for ($j = 1; $j <= 12; $j++){
                            //amount
                            $profit = $finance->percentage/100 * $amnt;
                            $amnt = $profit+$amnt;
                        }
                    }
                    //amount-loop-end

                    $payment_date = Carbon::parse($accepted_date)->addYears(1);

                    //payment-loop
                    for ($k = 2; $k <= $year; $k++){

                        //next-payment
                        $payment_date = Carbon::parse($payment_date)->addYears(1);
                        
                        //end-next-payment
                        
                    }
                    //payment-loop-end

                    $payment_date = Carbon::parse($payment_date)->addMonths(1);
                    $new_date = Carbon::parse($payment_date)->setDay(6)->format('Y-m-d');
                    if($payment_date > $new_date){
                        $payment_date = Carbon::parse($payment_date)->addMonths(1);
                        $payment_date = Carbon::parse($payment_date)->setDay(6)->format('Y-m-d');
                        // check day
                        $timestamp = strtotime($payment_date);
                        $day = date('l', $timestamp);
                        if($day == 'Tuesday' ||$day == 'Sunday' ||$day == 'Friday'){
                            $payment_date = Carbon::parse($payment_date)->setDay(7)->format('Y-m-d');
                        }
                        else{
                            $payment_date = Carbon::parse($payment_date)->setDay(6)->format('Y-m-d');
                        }
                    }
                    else{

                        $payment_date = Carbon::parse($payment_date)->setDay(6)->format('Y-m-d');
                        // check day
                        $timestamp = strtotime($payment_date);
                        $day = date('l', $timestamp);
                        if($day == 'Tuesday' ||$day == 'Sunday' ||$day == 'Friday'){
                            $payment_date = Carbon::parse($payment_date)->setDay(7)->format('Y-m-d');
                        }
                        else{
                            $payment_date = Carbon::parse($payment_date)->setDay(6)->format('Y-m-d');
                        }
                    }


                    //return $payment_date;
                    //return round($amnt);
                    

                    $smartfinance = SmartfinancePayment::create([
                        'smartfinance_id' => $finance_id,
                        'year' => $year,
                        'amount' => round($amnt),
                        'payment_date' => $payment_date,
                        'is_status' => 0,
                    ]);

                }
                else if($finance->plan->type == 'year' && $finance->plan->name == 'Long Term (M)'){


                    $year = $finance->no_of_year; 

                    $payment_date = Carbon::parse($accepted_date)->addYears(1);

                    //payment-loop
                    for ($k = 2; $k <= $year; $k++){

                        //next-payment
                        $payment_date = Carbon::parse($payment_date)->addYears(1);
                        
                        //end-next-payment
                        
                    }
                    //payment-loop-end

                    $payment_date = Carbon::parse($payment_date)->addMonths(1);
                    $new_date = Carbon::parse($payment_date)->setDay(6)->format('Y-m-d');
                    if($payment_date > $new_date){
                        $payment_date = Carbon::parse($payment_date)->addMonths(1);
                        $payment_date = Carbon::parse($payment_date)->setDay(6)->format('Y-m-d');
                        // check day
                        $timestamp = strtotime($payment_date);
                        $day = date('l', $timestamp);
                        if($day == 'Tuesday' ||$day == 'Sunday' ||$day == 'Friday'){
                            $payment_date = Carbon::parse($payment_date)->setDay(7)->format('Y-m-d');
                        }
                        else{
                            $payment_date = Carbon::parse($payment_date)->setDay(6)->format('Y-m-d');
                        }
                    }
                    else{

                        $payment_date = Carbon::parse($payment_date)->setDay(6)->format('Y-m-d');
                        // check day
                        $timestamp = strtotime($payment_date);
                        $day = date('l', $timestamp);
                        if($day == 'Tuesday' ||$day == 'Sunday' ||$day == 'Friday'){
                            $payment_date = Carbon::parse($payment_date)->setDay(7)->format('Y-m-d');
                        }
                        else{
                            $payment_date = Carbon::parse($payment_date)->setDay(6)->format('Y-m-d');
                        }
                    }



                    $smartfinance = SmartfinancePayment::create([
                        'smartfinance_id' => $finance_id,
                        'investment_date' => $accepted_date,
                        'month' => 1,
                        'year' => $year,
                        'investment_amount' => $finance->amount,
                        'next_amount' => $finance->amount,
                        'payment_date' => $payment_date,
                        'intrest' => 0,
                        'is_status' => 0,
                        'is_approve' => 1,
                    ]);


                }
                // End Payment table

                //Mail

                if($mail->is_status == 2){

                    $emailsetting = Template::where([['id',14],['is_active',1]])->first(); 
                    if($emailsetting != null){
                        $email_template = $emailsetting->template;
                        $emailContentReplace=['##NAME##'=>$finance->user->first_name.' '.$finance->user->last_name,'##PLAN##'=>$finance->plan->name];
                        $txt = strtr($email_template,$emailContentReplace);
                        $emailId = $finance->user->email;
                        $subject = $emailsetting->subject;
                        $mailstatus = SMTPController::sendMail($emailId,$subject,$txt);
                    }
                }

                //End mail
            }
            else{
                $investment_date = $request->investment_date;

                $smartfinances = DB::table('smartfinances')->where('id',$finance_id)->update(['rejected_by' => $auth->id,'is_status' => 0,'investment_date' => $investment_date]); 
                $finance = Smartfinance::where('id',$finance_id)->first();
                //Mail
                $emailsetting = Template::where([['id',19],['is_active',1]])->first(); 
                if($emailsetting != null){
                    $email_template = $emailsetting->template;
                    $emailContentReplace=['##NAME##'=>$finance->user->first_name.' '.$finance->user->last_name,'##PLAN##'=>$finance->plan->name];
                    $txt = strtr($email_template,$emailContentReplace);
                    $emailId = $finance->user->email;
                    $subject = $emailsetting->subject;
                    $mailstatus = SMTPController::sendMail($emailId,$subject,$txt);
                }
                //End Mail
            }
        }
        else{
            $investment_date = $request->investment_date;
            $accepted_date = $request->accepted_date;
            $smartfinances = DB::table('smartfinances')->where('id',$finance_id)->update(['investment_date' => $investment_date,'accepted_date' => $accepted_date]); 

            $smartfinance_payments = DB::table('smartfinance_payments')->where('smartfinance_id',$finance_id)->get();
            if($smartfinance_payments != NULL){

                SmartfinancePayment::where('smartfinance_id',$finance_id)->delete();

            }
                
            // payment table
            $finance = Smartfinance::where('id',$finance_id)->first();
            if($finance->plan->type == 'month'){
                $date = Carbon::parse($accepted_date)->addMonths(1);
                $new_date = Carbon::parse($date)->setDay(6)->format('Y-m-d');
                if($date > $new_date){
                    $date = Carbon::parse($accepted_date)->addMonths(2);
                    $payment_date = Carbon::parse($date)->setDay(6)->format('Y-m-d');
                        // check day
                    $timestamp = strtotime($payment_date);
                    $day = date('l', $timestamp);
                    if($day == 'Tuesday' ||$day == 'Sunday' ||$day == 'Friday'){
                        $payment_date = Carbon::parse($payment_date)->setDay(7)->format('Y-m-d');
                    }
                    else{
                        $payment_date = Carbon::parse($payment_date)->setDay(6)->format('Y-m-d');
                    }
                }
                else{
                    $date = Carbon::parse($accepted_date)->addMonths(1);
                    $payment_date = Carbon::parse($date)->setDay(6)->format('Y-m-d');
                        // check day
                    $timestamp = strtotime($payment_date);
                    $day = date('l', $timestamp);
                    if($day == 'Tuesday' ||$day == 'Sunday' ||$day == 'Friday'){
                        $payment_date = Carbon::parse($payment_date)->setDay(7)->format('Y-m-d');
                    }
                    else{
                        $payment_date = Carbon::parse($payment_date)->setDay(6)->format('Y-m-d');
                    }
                }
                for ($i = 1; $i <= 12; $i++){

                    $smartfinance = SmartfinancePayment::create([
                        'smartfinance_id' => $finance_id,
                        'month' => $i,
                        'amount' => $finance->percentage/100 * $finance->amount ,
                        'payment_date' => $payment_date,
                        'is_status' => 0,
                    ]);

                        //next-payment
                    $date = Carbon::parse($payment_date)->addMonths(1);
                    $payment_date = Carbon::parse($date)->setDay(6)->format('Y-m-d');
                    $timestamp = strtotime($payment_date);
                    $day = date('l', $timestamp);
                    if($day == 'Tuesday' ||$day == 'Sunday' ||$day == 'Friday'){
                        $payment_date = Carbon::parse($payment_date)->setDay(7)->format('Y-m-d');
                    }
                    else{
                        $payment_date = Carbon::parse($payment_date)->setDay(6)->format('Y-m-d');
                    }
                        //end-next-payment
                }
            }

            else if($finance->plan->type == 'year' && $finance->plan->name == 'Long Term (S)'){

                $year = $finance->no_of_year;

               
                $amnt = $finance->amount; 

                //amount-loop
                for ($i = 1; $i <= $year; $i++){

                    for ($j = 1; $j <= 12; $j++){
                            //amount
                        $profit = $finance->percentage/100 * $amnt;
                        $amnt = $profit+$amnt;
                    }
                }
                //amount-loop-end

                 $payment_date = Carbon::parse($accepted_date)->addYears(1);

                //payment-loop
                for ($k = 2; $k <= $year; $k++){

                    //next-payment
                    $payment_date = Carbon::parse($payment_date)->addYears(1);
                    
                    //end-next-payment

                }
                //payment-loop-end

                $payment_date = Carbon::parse($payment_date)->addMonths(1);
                $new_date = Carbon::parse($payment_date)->setDay(6)->format('Y-m-d');
                if($payment_date > $new_date){
                    $payment_date = Carbon::parse($payment_date)->addMonths(1);
                    $payment_date = Carbon::parse($payment_date)->setDay(6)->format('Y-m-d');
                    // check day
                    $timestamp = strtotime($payment_date);
                    $day = date('l', $timestamp);
                    if($day == 'Tuesday' ||$day == 'Sunday' ||$day == 'Friday'){
                        $payment_date = Carbon::parse($payment_date)->setDay(7)->format('Y-m-d');
                    }
                    else{
                        $payment_date = Carbon::parse($payment_date)->setDay(6)->format('Y-m-d');
                    }
                }
                else{

                    $payment_date = Carbon::parse($payment_date)->setDay(6)->format('Y-m-d');
                    // check day
                    $timestamp = strtotime($payment_date);
                    $day = date('l', $timestamp);
                    if($day == 'Tuesday' ||$day == 'Sunday' ||$day == 'Friday'){
                        $payment_date = Carbon::parse($payment_date)->setDay(7)->format('Y-m-d');
                    }
                    else{
                        $payment_date = Carbon::parse($payment_date)->setDay(6)->format('Y-m-d');
                    }
                }

                //return $payment_date;
                //return round($amnt);


                $smartfinance = SmartfinancePayment::create([
                    'smartfinance_id' => $finance_id,
                    'year' => $year,
                    'amount' => round($amnt),
                    'payment_date' => $payment_date,
                    'is_status' => 0,
                ]);
            }

            else if($finance->plan->type == 'year' && $finance->plan->name == 'Long Term (M)'){


                $year = $finance->no_of_year; 

                $payment_date = Carbon::parse($accepted_date)->addYears(1);

                //payment-loop
                for ($k = 2; $k <= $year; $k++){

                    //next-payment
                    $payment_date = Carbon::parse($payment_date)->addYears(1);

                    //end-next-payment

                }
                //payment-loop-end

                $payment_date = Carbon::parse($payment_date)->addMonths(1);
                $new_date = Carbon::parse($payment_date)->setDay(6)->format('Y-m-d');
                if($payment_date > $new_date){
                    $payment_date = Carbon::parse($payment_date)->addMonths(1);
                    $payment_date = Carbon::parse($payment_date)->setDay(6)->format('Y-m-d');
                    // check day
                    $timestamp = strtotime($payment_date);
                    $day = date('l', $timestamp);
                    if($day == 'Tuesday' ||$day == 'Sunday' ||$day == 'Friday'){
                        $payment_date = Carbon::parse($payment_date)->setDay(7)->format('Y-m-d');
                    }
                    else{
                        $payment_date = Carbon::parse($payment_date)->setDay(6)->format('Y-m-d');
                    }
                }
                else{

                    $payment_date = Carbon::parse($payment_date)->setDay(6)->format('Y-m-d');
                    // check day
                    $timestamp = strtotime($payment_date);
                    $day = date('l', $timestamp);
                    if($day == 'Tuesday' ||$day == 'Sunday' ||$day == 'Friday'){
                        $payment_date = Carbon::parse($payment_date)->setDay(7)->format('Y-m-d');
                    }
                    else{
                        $payment_date = Carbon::parse($payment_date)->setDay(6)->format('Y-m-d');
                    }
                }



                $smartfinance = SmartfinancePayment::create([
                    'smartfinance_id' => $finance_id,
                    'investment_date' => $accepted_date,
                    'month' => 1,
                    'year' => $year,
                    'investment_amount' => $finance->amount,
                    'next_amount' => $finance->amount,
                    'payment_date' => $payment_date,
                    'intrest' => 0,
                    'is_status' => 0,
                    'is_approve' => 1,
                ]);


            }      
        }
        return redirect()->back();

    }

    public function reject_smart_finance(Request $request) {

        $user_id = $request->user_id;
        $auth = Auth::user();

        $smartfinances = DB::table('smartfinances')->where('user_id',$user_id)->update(['rejected_by' => $auth->id,'is_status' => 0]);
        return $smartfinances;
        
    }

    public function view_finance($id,Request $request) {

        $today = Carbon::now()->format('Y-m-d');
        $smartfinance_payments = SmartfinancePayment::where([['smartfinance_id',$id],['payment_date','<',$today],['is_status',0]])->get();

        foreach($smartfinance_payments as $smartfinance_payment){
            $smartfinance_payment_status = DB::table('smartfinance_payments')->where('id',$smartfinance_payment->id)->update(['is_status' => 1]);
        }

        


        $smartfinance = Smartfinance::where('id',$id)->first();
        $amount = 0;
        if($smartfinance->plan_id == 3){
            $smartfinance_payments = SmartfinancePayment::where([['smartfinance_id',$id],['is_approve',1]])->get();
            
            foreach ($smartfinance_payments as $smartfinance_payment) {

                $amount = $amount + $smartfinance_payment->investment_amount;
            }
               


        }
        $smartfinance_payments = SmartfinancePayment::where('smartfinance_id',$id)->get();
        $payment = SmartfinancePayment::where('smartfinance_id',$id)->first();
        

        $finances = Smartfinance::where([['user_id',$smartfinance->user_id],['id','!=',$id]])->simplePaginate(10);
        $finances_count = Smartfinance::where([['user_id',$smartfinance->user_id],['id','!=',$id]])->count();
        //return $today;

        return view('smartfinance')->with('smartfinance',$smartfinance)->with('smartfinance_payments',$smartfinance_payments)->with('payment',$payment)->with('finances',$finances)->with('finances_count',$finances_count)->with('amount',$amount)->with('today',$today);
        
    }

    public function payment(Request $request) {

        $payment = $request->payment;
        $payment_id = $request->payment_id;
        $auth = Auth::user();
        $payment = DB::table('smartfinance_payments')->where('id',$payment_id)->update(['is_status' => $payment,'paid_by' => $auth->id]);
        return $payment;

    }

    public function investment_search(Request $request)
    {
        $search = $request->search;

        if($search != NULL){

            $data = Smartfinance::join('users','smartfinances.user_id','=','users.id')->join('plans','smartfinances.plan_id','=','plans.id')->where('users.first_name', 'like', '%'.$search.'%')->orWhere('users.last_name', 'like', '%'.$search.'%')->select('smartfinances.*','users.first_name as user_firstname','users.last_name as user_lastname','users.avatar as user_avatar','users.id as user_id','plans.type as plan_type')->orderBy('id','Desc')->simplePaginate(10);
            
        }
        else{

            $data = Smartfinance::join('users','smartfinances.user_id','=','users.id')->join('plans','smartfinances.plan_id','=','plans.id')->select('smartfinances.*','users.first_name as user_firstname','users.last_name as user_lastname','users.avatar as user_avatar','users.id as user_id','plans.type as plan_type')->orderBy('id','Desc')->simplePaginate(10);
           
        }
        return $data;
    }

    public function investment_status(Request $request)
    {
        $status = $request->status;

        if($status != NULL){

            $data = Smartfinance::join('users','smartfinances.user_id','=','users.id')->join('plans','smartfinances.plan_id','=','plans.id')->where('smartfinances.is_status', 'like', '%'.$status.'%')->select('smartfinances.*','users.first_name as user_firstname','users.last_name as user_lastname','users.avatar as user_avatar','users.id as user_id','plans.type as plan_type')->orderBy('id','Desc')->simplePaginate(10);
            
        }
        else{

            $data = Smartfinance::join('users','smartfinances.user_id','=','users.id')->join('plans','smartfinances.plan_id','=','plans.id')->select('smartfinances.*','users.first_name as user_firstname','users.last_name as user_lastname','users.avatar as user_avatar','users.id as user_id','plans.type as plan_type')->orderBy('id','Desc')->simplePaginate(10);
           
        }
        return $data;
    }

    public function investment_plan(Request $request)
    {
        $plan = $request->plan;

        if($plan != NULL){

            
            $data = Smartfinance::join('users','smartfinances.user_id','=','users.id')->join('plans','smartfinances.plan_id','=','plans.id')->where('plans.type', 'like', '%'.$plan.'%')->select('smartfinances.*','users.first_name as user_firstname','users.last_name as user_lastname','users.avatar as user_avatar','users.id as user_id','plans.type as plan_type')->orderBy('id','Desc')->simplePaginate(10);
            
        }
        else{

            $data = Smartfinance::join('users','smartfinances.user_id','=','users.id')->join('plans','smartfinances.plan_id','=','plans.id')->select('smartfinances.*','users.first_name as user_firstname','users.last_name as user_lastname','users.avatar as user_avatar','users.id as user_id','plans.type as plan_type')->orderBy('id','Desc')->simplePaginate(10);
           
        }
        return $data;
    }

    public function store_next_month_payment(Request $request)
    {
        //return $request;

        $amount = $request->amount;
        $smartfinance_id = $request->smartfinance_id;
        $now = Carbon::now()->format('Y-m-d');
        $smartfinance = Smartfinance::where('id',$smartfinance_id)->first();
        $payment = SmartfinancePayment::where('smartfinance_id', $smartfinance_id)->latest()->take(1)->first();
        $invested_date = $payment->invested_date;
        $next_payment = $payment->next_amount  + $amount;
        $intrest =  $smartfinance->percentage/100 * $payment->next_amount;
        $profit = $payment->intrest + round($intrest);
        $balance = 0;
        while($profit >= 50000){
            $profit = $profit - 50000;
            $balance = $balance + 50000;
        }
        if($payment->balance != null){
            $next_payment = $next_payment + $payment->balance;
        }

        $diff_in_months = Carbon::parse($invested_date)->diffInMonths($now); 

        $smartfinance = SmartfinancePayment::create([
            'smartfinance_id' => $smartfinance_id,
            'invested_date' => $now,
            'month' => $diff_in_months + 1,
            'year' => $payment->year,
            'investment_amount' => $amount,
            'next_amount' => $next_payment,
            'balance' => $balance,
            'payment_date' => $payment->payment_date,
            'intrest' => $profit,
            'is_status' => 0,
            'is_approve' => 2,
        ]);


        //Bill
        $image = $request->file('bill');
        $rand_name = time() . Str::random(12);
        $filename = $rand_name . '.jpg';
        $photo = Image::make($image)->encode('jpg', 80);
        Storage::disk('public')->put(config('path.bill').$filename, $photo);
        $smartfinance->bill = $filename;
        $smartfinance->save();

        //Mail

        //Admin
        $smartfinance = Smartfinance::where('id',$smartfinance_id)->first();
        $emailsetting = Template::where([['id',15],['is_active',1]])->first(); 
        $admin_email = Setting::where('key','admin_email')->first();
        if($emailsetting != null){
            $email_template = $emailsetting->template;
            $date = $user->created_at->toDateString();
            $emailContentReplace=['##NAME##'=>$smartfinance->user->first_name.' '.$smartfinance->user->last_name,'##PLAN##'=>$smartfinance->plan->name,'##AMOUNT##'=>$amount,'##PHONE##'=>$smartfinance->user->phone];
            $txt = strtr($email_template,$emailContentReplace);
            $emailId = $admin_email->value;
            $subject = $emailsetting->subject;
            $mailstatus = SMTPController::sendMail($emailId,$subject,$txt);
        }
        //End admin

        //User
        $emailsetting = Template::where([['id',16],['is_active',1]])->first(); 
        if($emailsetting != null){
            $email_template = $emailsetting->template;
            $emailContentReplace=['##NAME##'=>$smartfinance->user->first_name.' '.$smartfinance->user->last_name,'##PLAN##'=>$smartfinance->plan->name,'##AMOUNT##'=>$amount];
            $txt = strtr($email_template,$emailContentReplace);
            $emailId = $user->email;
            $subject = $emailsetting->subject;
            $mailstatus = SMTPController::sendMail($emailId,$subject,$txt);
        }
        //End user

        //End mail


        return redirect()->back();

    }

    public function renewal_plan(Request $request)
    {
        $plan_id = $request->plan_id; 
        $smartfinance_id = $request->smartfinance_id; 
        $finance = Smartfinance::where('id',$smartfinance_id)->first();
        if($finance->plan->type == 'month')
        {
            $payment = SmartfinancePayment::where('smartfinance_id', $smartfinance_id)->orderBy('id','Desc')->first();
            $date = Carbon::parse($payment->payment_date)->addMonths(1);
            $payment_date = Carbon::parse($date)->setDay(6)->format('Y-m-d');
                        // check day
            $timestamp = strtotime($payment_date);
            $day = date('l', $timestamp);
            if($day == 'Tuesday' ||$day == 'Sunday' ||$day == 'Friday'){
                $payment_date = Carbon::parse($payment_date)->setDay(7)->format('Y-m-d');
            }
            else{
                $payment_date = Carbon::parse($payment_date)->setDay(6)->format('Y-m-d');
            }
            $initial = $payment->month+1;
            $final = $payment->month+12;

            for ($i = $initial; $i <= $final; $i++){

                $smartfinance = SmartfinancePayment::create([
                    'smartfinance_id' => $smartfinance_id,
                    'month' => $i,
                    'amount' => $finance->percentage/100 * $finance->amount ,
                    'payment_date' => $payment_date,
                    'is_status' => 0,
                ]);

                //next-payment
                $date = Carbon::parse($payment_date)->addMonths(1);
                $payment_date = Carbon::parse($date)->setDay(6)->format('Y-m-d');
                $timestamp = strtotime($payment_date);
                $day = date('l', $timestamp);
                if($day == 'Tuesday' ||$day == 'Sunday' ||$day == 'Friday'){
                    $payment_date = Carbon::parse($payment_date)->setDay(7)->format('Y-m-d');
                }
                else{
                    $payment_date = Carbon::parse($payment_date)->setDay(6)->format('Y-m-d');
                }
                //end-next-payment
            }

            $dt = Carbon::now();
            $date = $dt->toDateString();
            $auth = Auth::user();
            $smartfinance = SmartfinanceRenewal::create([
                'smartfinance_id' => $smartfinance_id,
                'date' => $date,
                'renewaled_by' => $auth->id ,
            ]);
            return $smartfinance;

        }
        


    }

    public function renewal_plan_year(Request $request)
    {

        $plan_id = $request->plan_id; 
        $smartfinance_id = $request->smartfinance_id; 
        $finance = Smartfinance::where('id',$smartfinance_id)->first();

        if($finance->plan->type == 'year' && $finance->plan->name == 'Long Term (S)'){
            $payment = SmartfinancePayment::where('smartfinance_id', $smartfinance_id)->orderBy('id','Desc')->first();
            $year = $request->year + $finance->no_of_year ;
            $amnt = $payment->amount;  

            //amount-loop
            for ($i = 1; $i <= $year; $i++){

                for ($j = 1; $j <= 12; $j++){
                    //amount
                    $profit = $finance->percentage/100 * $amnt;
                    $amnt = $profit+$amnt;
                }
            }
            //amount-loop-end

            $payment_date = Carbon::parse($payment->payment_date)->addYears(1);

                    //payment-loop
            for ($k = 2; $k <= $year; $k++){

                        //next-payment
                $payment_date = Carbon::parse($payment_date)->addYears(1);

                        //end-next-payment

            }
                    //payment-loop-end

            $payment_date = Carbon::parse($payment_date)->addMonths(1);
            $new_date = Carbon::parse($payment_date)->setDay(6)->format('Y-m-d');
            if($payment_date > $new_date){
                $payment_date = Carbon::parse($payment_date)->addMonths(1);
                $payment_date = Carbon::parse($payment_date)->setDay(6)->format('Y-m-d');
                        // check day
                $timestamp = strtotime($payment_date);
                $day = date('l', $timestamp);
                if($day == 'Tuesday' ||$day == 'Sunday' ||$day == 'Friday'){
                    $payment_date = Carbon::parse($payment_date)->setDay(7)->format('Y-m-d');
                }
                else{
                    $payment_date = Carbon::parse($payment_date)->setDay(6)->format('Y-m-d');
                }
            }
            else{

                $payment_date = Carbon::parse($payment_date)->setDay(6)->format('Y-m-d');
                        // check day
                $timestamp = strtotime($payment_date);
                $day = date('l', $timestamp);
                if($day == 'Tuesday' ||$day == 'Sunday' ||$day == 'Friday'){
                    $payment_date = Carbon::parse($payment_date)->setDay(7)->format('Y-m-d');
                }
                else{
                    $payment_date = Carbon::parse($payment_date)->setDay(6)->format('Y-m-d');
                }
            }

            SmartfinancePayment::where('smartfinance_id',$smartfinance_id)->delete();

            $smartfinance = SmartfinancePayment::create([
                'smartfinance_id' => $smartfinance_id,
                'year' => $year,
                'amount' => round($amnt),
                'payment_date' => $payment_date,
                'is_status' => 0,
            ]);

            $dt = Carbon::now();
            $date = $dt->toDateString();
            $auth = Auth::user();
            $smartfinance = SmartfinanceRenewal::create([
                'smartfinance_id' => $smartfinance_id,
                'date' => $date,
                'renewaled_by' => $auth->id ,
            ]);

            // $smartfinance_payment = DB::table('smartfinance_payments')->where('smartfinance_id',$smartfinance_id)->update(['payment_date' => $payment_date]);
            $smartfinance_payment = DB::table('smartfinances')->where('id',$smartfinance_id)->update(['no_of_year' => $year]);

        }
        if($finance->plan->type == 'year' && $finance->plan->name == 'Long Term (M)'){


            $year = $request->year; 
            $payment = SmartfinancePayment::where('smartfinance_id', $smartfinance_id)->first();
            //return $payment;
            $payment_date = Carbon::parse($payment->payment_date)->addYears($year);

           
            // for ($k = 2; $k <= $year; $k++){
            //     $payment_date = Carbon::parse($payment_date)->addYears(1);
            // }

            $payment_date = Carbon::parse($payment_date)->addMonths(1);
            $new_date = Carbon::parse($payment_date)->setDay(6)->format('Y-m-d');
            if($payment_date > $new_date){
                $payment_date = Carbon::parse($payment_date)->addMonths(1);
                $payment_date = Carbon::parse($payment_date)->setDay(6)->format('Y-m-d');
                        // check day
                $timestamp = strtotime($payment_date);
                $day = date('l', $timestamp);
                if($day == 'Tuesday' ||$day == 'Sunday' ||$day == 'Friday'){
                    $payment_date = Carbon::parse($payment_date)->setDay(7)->format('Y-m-d');
                }
                else{
                    $payment_date = Carbon::parse($payment_date)->setDay(6)->format('Y-m-d');
                }
            }
            else{

                $payment_date = Carbon::parse($payment_date)->setDay(6)->format('Y-m-d');
                        // check day
                $timestamp = strtotime($payment_date);
                $day = date('l', $timestamp);
                if($day == 'Tuesday' ||$day == 'Sunday' ||$day == 'Friday'){
                    $payment_date = Carbon::parse($payment_date)->setDay(7)->format('Y-m-d');
                }
                else{
                    $payment_date = Carbon::parse($payment_date)->setDay(6)->format('Y-m-d');
                }
            }


            $total_years = $request->year + $finance->no_of_year;

            $smartfinance_payment = DB::table('smartfinance_payments')->where('smartfinance_id',$smartfinance_id)->update(['payment_date' => $payment_date,'year'=> $total_years]);
            $smartfinance_payment = DB::table('smartfinances')->where('id',$smartfinance_id)->update(['no_of_year' => $total_years]);
        }
        return redirect()->back();

    }

    public function payout_plan(Request $request)
    {
        $smartfinance_id = $request->smartfinance_id; 
        $payment = DB::table('smartfinance_payments')->where('smartfinance_id',$smartfinance_id)->update(['is_status' => 1]);
        $smartfinance = DB::table('smartfinances')->where('id',$smartfinance_id)->update(['is_close' => 1]);
        return $smartfinance;

    }

    public function get_smart_finance_payment(Request $request) 
    { 
        $id=$request->id;  
        $finance = SmartfinancePayment::where('id',$id)->first();
        return $finance;     
    }

    public function approve_smart_finance_payment(Request $request) {
        $id=$request->finance_payment_id;
        $approve = $request->is_approve;
        $smartfinances = DB::table('smartfinance_payments')->where('id',$id)->update(['is_approve' => $approve]);

        if($approve == 1){
            //Mail
            $payment = SmartfinancePayment::where('id',$id)->first();
            $finance = Smartfinance::where('id',$payment->smartfinance_id)->first();
            $emailsetting = Template::where([['id',17],['is_active',1]])->first(); 
            if($emailsetting != null){
                $email_template = $emailsetting->template;
                $emailContentReplace=['##NAME##'=>$finance->user->first_name.' '.$finance->user->last_name,'##PLAN##'=>$finance->plan->name,'##AMOUNT##'=>$payment->investment_amount];
                $txt = strtr($email_template,$emailContentReplace);
                $emailId = $finance->user->email;
                $subject = $emailsetting->subject;
                $mailstatus = SMTPController::sendMail($emailId,$subject,$txt);
            }
        }
        else{

            //Mail
            $payment = SmartfinancePayment::where('id',$id)->first();
            $finance = Smartfinance::where('id',$payment->smartfinance_id)->first();
            $emailsetting = Template::where([['id',18],['is_active',1]])->first(); 
            if($emailsetting != null){
                $email_template = $emailsetting->template;
                $emailContentReplace=['##NAME##'=>$finance->user->first_name.' '.$finance->user->last_name,'##PLAN##'=>$finance->plan->name,'##AMOUNT##'=>$payment->investment_amount];
                $txt = strtr($email_template,$emailContentReplace);
                $emailId = $finance->user->email;
                $subject = $emailsetting->subject;
                $mailstatus = SMTPController::sendMail($emailId,$subject,$txt);
            }
        }
        
        //End mail

        return redirect()->back();
    }

    public function pro_book_upload(Request $request) {

        if($files=$request->file('pro_book')){  
            $name=$files->getClientOriginalName();  
            $files->move('storage/app/public/pro_book',$name); 
            DB::table('smartfinances')->where('id',$request->smartfinance_Id)->update(['pro_book' => $name]); 
        }  

        //Pro_file
        // $image = $request->file('pro_book');
        // $rand_name = time() . Str::random(12);
        // $filename = $rand_name . '.jpg';
        // $photo = Image::make($image)->encode('jpg', 80);
        // Storage::disk('public')->put(config('path.pro_book').$filename, $photo);
        // DB::table('smartfinances')->where('id',$request->smartfinance_Id)->update(['pro_book' => $filename]);
        return redirect()->back();
    }

    public function get_pro_book(Request $request) 
    { 
        $id=$request->id;  
        $smartfinance = Smartfinance::where('id',$id)->first();
        return $smartfinance;     
    }

    public function payout_list(Request $request) 
    {
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

        $payouts = NextMonthPayout::all();

        return view('payout_list')->with('payouts',$payouts);

    }

    public function exportExcelCSV($slug) 
    {

        $time = Carbon::now()->toTimeString();
        $date = Carbon::now()->formatLocalized('%d %b %Y');
        $now = $date.'_'.$time;
        $name= $date.'.xlsx';
        //Storage::disk('public')->delete($name);
        //Excel::store(new NextMonthPayoutsExport(2018), $name,'excel');


        //Mail
        $attachment = url('storage/app/public/'.$name);
        $emailsetting = Template::where([['id',20],['is_active',1]])->first(); 
        $admin_email = Setting::where('key','admin_email')->first();
        if($emailsetting != null){
            $txt = $emailsetting->template;
            $emailId = $admin_email->value;
            $subject = $emailsetting->subject;
            $mailstatus = SMTPController::sendMail($emailId,$subject,$txt,$attachment);
        }
        //Mail End

        return Excel::download(new NextMonthPayoutsExport, 'next_month_payouts_'.$now.'.'.$slug);
    }  

}
