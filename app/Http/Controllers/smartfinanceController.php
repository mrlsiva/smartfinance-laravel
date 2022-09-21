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
        ]);

        //Bill
        $image = $request->file('bill');
        $rand_name = time() . Str::random(12);
        $filename = $rand_name . '.jpg';
        $photo = Image::make($image)->encode('jpg', 80);
        Storage::disk('public')->put(config('path.bill').$filename, $photo);
        $smartfinance->bill = $filename;
        $smartfinance->save();

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

                else if($finance->plan->type == 'year' && $finance->plan->name == 'One time Invertment'){
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
                // End Payment table
            }
            else{
                $investment_date = $request->investment_date;

                $smartfinances = DB::table('smartfinances')->where('id',$finance_id)->update(['rejected_by' => $auth->id,'is_status' => 0,'investment_date' => $investment_date]); 
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

            else if($finance->plan->type == 'year' && $finance->plan->name == 'One time Invertment'){

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
        $smartfinance_payments = SmartfinancePayment::where('smartfinance_id',$id)->get();
        $payment = SmartfinancePayment::where('smartfinance_id',$id)->first();
        

        $finances = Smartfinance::where([['user_id',$smartfinance->user_id],['id','!=',$id]])->simplePaginate(10);
        $finances_count = Smartfinance::where([['user_id',$smartfinance->user_id],['id','!=',$id]])->count();

        return view('smartfinance')->with('smartfinance',$smartfinance)->with('smartfinance_payments',$smartfinance_payments)->with('payment',$payment)->with('finances',$finances)->with('finances_count',$finances_count);
        
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



    

}
