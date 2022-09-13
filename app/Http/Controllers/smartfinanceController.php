<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
Use \Carbon\Carbon;
use App\Models\Plan;
use App\Models\Smartfinance;
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
        $finance = Smartfinance::where('user_id',$id)->first();
        return $finance;     
    }

    public function approve_smart_finance(Request $request) {
        $user_id = $request->user_id;
        $intrest = $request->intrest;
        $auth = Auth::user();
        $date = Carbon::now();
        $accepted_date = $date->toDateString();

        $smart_finance = Smartfinance::where('user_id',$user_id)->select('plan_id')->first();
        $type = Plan::where('id',$smart_finance->plan_id)->first();
        if($smart_finance->type == 'month'){
           $next_payment_date = Carbon::now()->addMonths(1); 
        }
        else{
            $next_payment_date = Carbon::now()->addYears(1); 
        }
        

        $smartfinances = DB::table('smartfinances')->where('user_id',$user_id)->update(['accepted_by' => $auth->id,'accepted_date' => $accepted_date,'percentage' => $intrest,'next_payment_date' => $next_payment_date,'is_status' => 1]);
        return $smartfinances;

    }

    public function reject_smart_finance(Request $request) {

        $user_id = $request->user_id;
        $auth = Auth::user();

        $smartfinances = DB::table('smartfinances')->where('user_id',$user_id)->update(['rejected_by' => $auth->id,'is_status' => 0]);
        return $smartfinances;
        
    }

}
