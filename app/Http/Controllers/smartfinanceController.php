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
        $auth = Auth::user();
        $date = Carbon::now();
        $accepted_date = $date->toDateString();

        $smartfinance = DB::table('smartfinances')->where('id',$finance_id)->update(['accepted_by' => $auth->id,'accepted_date' => $accepted_date,'percentage' => $intrest,'is_status' => 1]);

        // payment table
        $finance = Smartfinance::where('id',$finance_id)->first();
        if($finance->plan->type == 'month'){
            $date = Carbon::now()->addMonths(1);
            $new_date = Carbon::parse($date)->setDay(6)->format('Y-m-d');
            if($date > $new_date){
                $date = Carbon::now()->addMonths(2);
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
                $date = Carbon::now()->addMonths(1);
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
                $new_date = Carbon::parse($date)->setDay(6)->format('Y-m-d');
                if($date > $new_date){
                    $date = Carbon::parse($payment_date)->addMonths(2);
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
                    $date = Carbon::parse($payment_date)->addMonths(1);
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
                //end-next-payment
            }
        }
        // End Payment table
        return $smartfinance;

    }

    public function reject_smart_finance(Request $request) {

        $user_id = $request->user_id;
        $auth = Auth::user();

        $smartfinances = DB::table('smartfinances')->where('user_id',$user_id)->update(['rejected_by' => $auth->id,'is_status' => 0]);
        return $smartfinances;
        
    }

    public function view_finance($id,Request $request) {

        $smartfinance = Smartfinance::where('id',$id)->first();
        $smartfinance_payments = SmartfinancePayment::where('smartfinance_id',$id)->get();

        return view('smartfinance')->with('smartfinance',$smartfinance)->with('smartfinance_payments',$smartfinance_payments);
        
    }

    public function payment(Request $request) {

        $payment = $request->payment;
        $payment_id = $request->payment_id;
        $auth = Auth::user();
        $payment = DB::table('smartfinance_payments')->where('id',$payment_id)->update(['is_status' => $payment,'paid_by' => $auth->id]);
        return $payment;

    }

}
