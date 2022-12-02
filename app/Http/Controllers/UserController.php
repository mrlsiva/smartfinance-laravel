<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Collection;
Use \Carbon\Carbon;
use App\Models\User;
use App\Models\UserDetail;
use App\Models\BankDetail;
use App\Models\NomineeDetail;
use App\Models\Smartfinance;
use App\Models\SmartfinancePayment;
use App\Models\Refferal;
use App\Models\UserAmount;
use App\Models\ReviewRating;
use App\Models\Setting;
use App\Models\Template;
use App\Models\Loan;
use App\Models\LoanPayment;
use App\Models\Tax;
use App\Models\TaxDetail;
use App\Models\MutualFund;
use Image;
use DB;


class UserController extends Controller
{
    public function dashboard(){

        $user = Auth::user();
        if($user == NULL){
            return redirect('sign_in');

        }
        else{
            if($user->role_id == '3'){

                $finance = [];
                $user_amount = UserAmount::where([['user_id',$user->id],['is_status',0]])->first();
                if($user_amount != Null){
                    $smartfinance_ids = Smartfinance::where([['user_id',$user->id],['is_status',1],['is_close',0]])->get();
                    if(count($smartfinance_ids) != 0){
                        foreach($smartfinance_ids as $smartfinance_id){
                            $finance[] = $smartfinance_id->id;
                        }
                        $payment_date = SmartfinancePayment::whereIn('smartfinance_id',$finance)->where('is_status',0)->orderBy('payment_date', 'asc')->first();
                        $closing_date = $payment_date->payment_date;
                        $now = Carbon::now()->format('Y-m-d');
                        if($closing_date < $now){
                            $status = DB::table('user_amounts')->where('user_id',$user->id)->update(['is_status' => 1]);
                        } 
                    }
                    else{

                        $user_amount = UserAmount::where([['is_status',0],['user_id',$user->id]])->first();
                        $now = Carbon::now()->format('Y-m-d');
                        $date = Carbon::parse($user_amount->date)->addMonths(1);
                        $new_date = Carbon::parse($date)->setDay(6)->format('Y-m-d');

                        $timestamp = strtotime($new_date);
                        $day = date('l', $timestamp);
                        if($day == 'Tuesday' ||$day == 'Sunday' ||$day == 'Friday'){
                            $date = Carbon::parse($new_date)->setDay(7)->format('Y-m-d');
                        }
                        if($date < $now){
                            $status = DB::table('user_amounts')->where('user_id',$user->id)->update(['is_status' => 1]);
                        }
                    }
                }


                $today = Carbon::now()->format('Y-m-d');
                $smartfinances = Smartfinance::where([['user_id',$user->id],['is_close',0],['is_status',1]])->get();
                if($smartfinances != NULL){
                    foreach($smartfinances as $smartfinance){
                        $smartfinance_payments = SmartfinancePayment::where([['smartfinance_id',$smartfinance->id],['payment_date','<',$today],['is_status',0]])->get();
                        foreach($smartfinance_payments as $smartfinance_payment){
                            $smartfinance_payment_status = DB::table('smartfinance_payments')->where('id',$smartfinance_payment->id)->update(['is_status' => 1]);
                        }
                    }
                }

                $smartfinances = Smartfinance::where([['user_id',$user->id],['is_close',0],['is_status',1]])->get();
                if($smartfinances != NULL){
                    foreach($smartfinances as $smartfinance){

                        $count = SmartfinancePayment::where('smartfinance_id',$smartfinance->id)->count();
                        $count1 = SmartfinancePayment::where([['smartfinance_id',$smartfinance->id],['is_status',1]])->count();
                        $smartfinance_payment = SmartfinancePayment::where([['smartfinance_id',$smartfinance->id],['is_status',1]])->first();

                        if($count == $count1){

                            DB::table('smartfinances')->where('id',$smartfinance_payment->smartfinance_id)->update(['is_close' => 1]);
                        }
                    }
                }



                $smartfinances = Smartfinance::where('user_id',$user->id)->orderBy('id','Desc')->paginate(10);
                $smartfinance_count = Smartfinance::where([['user_id',$user->id],['is_status',2]])->count();
                $loans = Loan::where('user_id',$user->id)->orderBy('id','Desc')->paginate(10);
                $loan_count = Loan::where([['user_id',$user->id],['is_status',2]])->count();
                $tax = Tax::where('user_id',$user->id)->first();
                if($tax != NULL){
                    $tax_details = TaxDetail::where('tax_id',$tax->id)->paginate(10);
                    $tax_count = TaxDetail::where('tax_id',$tax->id)->count();
                }
                else{
                   $tax_details =[];
                   $tax_count = 0; 
                }
                
                

                return view('user_dashboard')->with('smartfinances',$smartfinances)->with('smartfinance_count',$smartfinance_count)->with('loans',$loans)->with('loan_count',$loan_count)->with('tax',$tax)->with('tax_details',$tax_details)->with('tax_count',$tax_count);

            }
            else{

                // $amount = '100000';
                // $amount = UserController::moneyFormatIndia( $amount );
                //return $amount;

                $finance = [];
                $users = UserAmount::where('is_status',0)->get();
                if($users != Null){
                    foreach($users as $user){
                        $smartfinance_ids = Smartfinance::where([['user_id',$user->user_id],['is_status',1],['is_close',0]])->get();
                        //return $smartfinance_ids; 
                        if(count($smartfinance_ids) != 0){
                            foreach($smartfinance_ids as $smartfinance_id){
                                $finance[] = $smartfinance_id->id;
                            }
                            $payment_date = SmartfinancePayment::whereIn('smartfinance_id',$finance)->where('is_status',0)->orderBy('payment_date', 'asc')->first();
                            $closing_date = $payment_date->payment_date;
                            $now = Carbon::now()->format('Y-m-d');
                            if($closing_date < $now){
                                $status = DB::table('user_amounts')->where('user_id',$user->user_id)->update(['is_status' => 1]);
                            } 
                        }
                        else{

                            $user_amount = UserAmount::where([['is_status',0],['user_id',$user->user_id]])->first();
                            $now = Carbon::now()->format('Y-m-d');
                            $date = Carbon::parse($user_amount->date)->addMonths(1);
                            $new_date = Carbon::parse($date)->setDay(6)->format('Y-m-d');

                            $timestamp = strtotime($new_date);
                            $day = date('l', $timestamp);
                            if($day == 'Tuesday' ||$day == 'Sunday' ||$day == 'Friday'){
                                $date = Carbon::parse($new_date)->setDay(7)->format('Y-m-d');
                            }
                            if($date < $now){
                                $status = DB::table('user_amounts')->where('user_id',$user->user_id)->update(['is_status' => 1]);
                            }
                        }
                    }
                }

                $today = Carbon::now()->format('Y-m-d');
                $users = User::where('is_delete',0)->get();
                foreach($users as $user){
                    $smartfinances = Smartfinance::where([['user_id',$user->id],['is_close',0],['is_status',1]])->get();
                    if($smartfinances != NULL){
                        foreach($smartfinances as $smartfinance){
                            $smartfinance_payments = SmartfinancePayment::where([['smartfinance_id',$smartfinance->id],['payment_date','<',$today],['is_status',0]])->get();
                            foreach($smartfinance_payments as $smartfinance_payment){
                                $smartfinance_payment_status = DB::table('smartfinance_payments')->where('id',$smartfinance_payment->id)->update(['is_status' => 1]);
                            }
                        }
                    }
                }
                
                $smartfinances = Smartfinance::where([['is_close',0],['is_status',1]])->get();
                if($smartfinances != NULL){
                    foreach($smartfinances as $smartfinance){

                        $count = SmartfinancePayment::where('smartfinance_id',$smartfinance->id)->count();

                        $count1 = SmartfinancePayment::where([['smartfinance_id',$smartfinance->id],['is_status',1]])->count();
                        $smartfinance_payment = SmartfinancePayment::where([['smartfinance_id',$smartfinance->id],['is_status',1]])->first();
                        if($smartfinance_payment != NULL){

                            if($count == $count1){

                                DB::table('smartfinances')->where('id',$smartfinance_payment->smartfinance_id)->update(['is_close' => 1]);
                            }
                        }

                    }
                }

                
                
                //admin dashboard
                $users = User::where('is_delete',0)->orderBy('id','Desc')->paginate(10);
                $user_count = User::where('is_active',0)->orWhere('is_profile_verified',0)->count();
                $smartfinance_count = Smartfinance::where('is_status',2)->count();
                $payment_count = SmartfinancePayment::where('is_approve',2)->count();

                $smartfinances = Smartfinance::orderBy('id','Desc')->paginate(10);
                $loans = Loan::orderBy('id','Desc')->paginate(10);
                $loan_count = Loan::where('is_status',2)->count();
                $loan_payment_count = LoanPayment::where('is_status',2)->count();
                $tax_details = TaxDetail::paginate(10);
                $tax_count = Tax::count();
                $mutual_funds = MutualFund::paginate(10);
                $mutual_fund_count = MutualFund::count();


                $user = Auth::user();
                $admin_finances = Smartfinance::where('user_id',$user->id)->orderBy('id','Desc')->paginate(10);
                $admin_finance_count = Smartfinance::where('user_id',$user->id)->count();
                $admin_loans = Loan::where('user_id',$user->id)->orderBy('id','Desc')->paginate(10);
                $admin_loan_count = Loan::where('user_id',$user->id)->count();
                $admin_tax = Tax::where('user_id',$user->id)->first();
                if($admin_tax != NULL){
                    $admin_tax_details = TaxDetail::where('tax_id',$admin_tax->id)->orderBy('id','Desc')->paginate(10);
                }
                else{
                    $admin_tax_details = [];
                }
                $admin_tax_count = Tax::where('user_id',$user->id)->count();
                

                $flag = 'user';
                $role = NULL;
                $profile = NULL;
                $progress = NULL;
                $status = NULL;
                $search = NULL;
                $investment_plan = NULL;
                $investment_status = NULL;
                $investment_search = NULL;
                $loan_status = NULL;
                $loan_search = NULL;
                

                return view('dashboard')->with('users',$users)->with('user_count',$user_count)->with('smartfinances',$smartfinances)->with('smartfinance_count',$smartfinance_count)->with('admin_finances',$admin_finances)->with('admin_finance_count',$admin_finance_count)->with('payment_count',$payment_count)->with('loans',$loans)->with('loan_count',$loan_count)->with('loan_payment_count',$loan_payment_count)->with('admin_loans',$admin_loans)->with('admin_loan_count',$admin_loan_count)->with('admin_tax_details',$admin_tax_details)->with('admin_tax_count',$admin_tax_count)->with('mutual_funds',$mutual_funds)->with('mutual_fund_count',$mutual_fund_count)->with('role',$role)->with('profile',$profile)->with('progress',$progress)->with('status',$status)->with('search',$search)->with('investment_plan',$investment_plan)->with('investment_status',$investment_status)->with('investment_search',$investment_search)->with('loan_search',$loan_search)->with('loan_status',$loan_status)->with('flag',$flag)->with('tax_details',$tax_details)->with('tax_count',$tax_count);
            }
        }
        
    }

    public function user_management(Request $request) 
    {
        $users = User::where('is_delete',0)->orderBy('id','Desc')->paginate(10);
        $user_count = User::where('is_active',0)->orWhere('is_profile_verified',0)->count();
        $smartfinance_count = Smartfinance::where('is_status',2)->count();
        $payment_count = SmartfinancePayment::where('is_approve',2)->count();
        $loan_count = Loan::where('is_status',2)->count();
        $loan_payment_count = LoanPayment::where('is_status',2)->count();
        $tax_count = Tax::count();
        $mutual_fund_count = MutualFund::count();

        $role = NULL;
        $profile = NULL;
        $progress = NULL;
        $status = NULL;
        $search = NULL;

        return view('user_management')->with('users',$users)->with('user_count',$user_count)->with('smartfinance_count',$smartfinance_count)->with('payment_count',$payment_count)->with('loan_count',$loan_count)->with('loan_payment_count',$loan_payment_count)->with('tax_count',$tax_count)->with('mutual_fund_count',$mutual_fund_count)->with('role',$role)->with('profile',$profile)->with('progress',$progress)->with('status',$status)->with('search',$search);
    }

    public function finance(Request $request) 
    {
        
        $user_count = User::where('is_active',0)->orWhere('is_profile_verified',0)->count();
        $smartfinances = Smartfinance::orderBy('id','Desc')->paginate(10);
        $smartfinance_count = Smartfinance::where('is_status',2)->count();
        $payment_count = SmartfinancePayment::where('is_approve',2)->count();
        $loan_count = Loan::where('is_status',2)->count();
        $loan_payment_count = LoanPayment::where('is_status',2)->count();
        $tax_count = Tax::count();
        $mutual_fund_count = MutualFund::count();

        $user = Auth::user();
        $admin_finances = Smartfinance::where('user_id',$user->id)->orderBy('id','Desc')->paginate(10);
        $admin_finance_count = Smartfinance::where('user_id',$user->id)->count();

        $investment_plan = NULL;
        $investment_status = NULL;
        $investment_search = NULL;

        return view('finance')->with('smartfinances',$smartfinances)->with('admin_finances',$admin_finances)->with('admin_finance_count',$admin_finance_count)->with('user_count',$user_count)->with('smartfinance_count',$smartfinance_count)->with('payment_count',$payment_count)->with('loan_count',$loan_count)->with('loan_payment_count',$loan_payment_count)->with('tax_count',$tax_count)->with('mutual_fund_count',$mutual_fund_count)->with('investment_plan',$investment_plan)->with('investment_status',$investment_status)->with('investment_search',$investment_search);
    }

    public function loan(Request $request) 
    {
        
        $user_count = User::where('is_active',0)->orWhere('is_profile_verified',0)->count();
        $smartfinance_count = Smartfinance::where('is_status',2)->count();
        $payment_count = SmartfinancePayment::where('is_approve',2)->count();
        $loans = Loan::orderBy('id','Desc')->paginate(10);
        $loan_count = Loan::where('is_status',2)->count();
        $loan_payment_count = LoanPayment::where('is_status',2)->count();
        $tax_count = Tax::count();
        $mutual_fund_count = MutualFund::count();

        $user = Auth::user();
        $admin_loans = Loan::where('user_id',$user->id)->orderBy('id','Desc')->paginate(10);
        $admin_loan_count = Loan::where('user_id',$user->id)->count();
        

        $loan_status = NULL;
        $loan_search = NULL;

        return view('loan')->with('loans',$loans)->with('admin_loans',$admin_loans)->with('admin_loan_count',$admin_loan_count)->with('user_count',$user_count)->with('smartfinance_count',$smartfinance_count)->with('payment_count',$payment_count)->with('loan_count',$loan_count)->with('loan_payment_count',$loan_payment_count)->with('tax_count',$tax_count)->with('mutual_fund_count',$mutual_fund_count)->with('loan_search',$loan_search)->with('loan_status',$loan_status);
    }

    public function tax(Request $request) 
    {
        
        $user_count = User::where('is_active',0)->orWhere('is_profile_verified',0)->count();
        $smartfinance_count = Smartfinance::where('is_status',2)->count();
        $payment_count = SmartfinancePayment::where('is_approve',2)->count();
        $loan_count = Loan::where('is_status',2)->count();
        $loan_payment_count = LoanPayment::where('is_status',2)->count();
        $tax_details = TaxDetail::paginate(10);
        $tax_count = Tax::count();
        $mutual_fund_count = MutualFund::count();

        $user = Auth::user();
        $admin_tax = Tax::where('user_id',$user->id)->first();
        if($admin_tax != NULL){
            $admin_tax_details = TaxDetail::where('tax_id',$admin_tax->id)->orderBy('id','Desc')->paginate(10);
        }
        else{
            $admin_tax_details = [];
        }
        $admin_tax_count = Tax::where('user_id',$user->id)->count();
        

        return view('tax')->with('tax_details',$tax_details)->with('user_count',$user_count)->with('smartfinance_count',$smartfinance_count)->with('payment_count',$payment_count)->with('loan_count',$loan_count)->with('loan_payment_count',$loan_payment_count)->with('tax_count',$tax_count)->with('mutual_fund_count',$mutual_fund_count)->with('admin_tax_details',$admin_tax_details)->with('admin_tax_count',$admin_tax_count);
    }

    public function mutual_fund(Request $request) 
    {
        
        $user_count = User::where('is_active',0)->orWhere('is_profile_verified',0)->count();
        $smartfinance_count = Smartfinance::where('is_status',2)->count();
        $payment_count = SmartfinancePayment::where('is_approve',2)->count();
        $loan_count = Loan::where('is_status',2)->count();
        $loan_payment_count = LoanPayment::where('is_status',2)->count();
        $tax_count = Tax::count();
        $mutual_funds = MutualFund::paginate(10);
        $mutual_fund_count = MutualFund::count();
        
        

        return view('mutual_fund')->with('mutual_funds',$mutual_funds)->with('user_count',$user_count)->with('smartfinance_count',$smartfinance_count)->with('payment_count',$payment_count)->with('loan_count',$loan_count)->with('loan_payment_count',$loan_payment_count)->with('tax_count',$tax_count)->with('mutual_fund_count',$mutual_fund_count);
    }

    public function get_user(Request $request) 
    { 
        $id=$request->id;  
        $user = User::where('id',$id)->first();
        return $user;     
    }

    public function get_users(Request $request) 
    { 
        $id=$request->id;  
        $users = User::where('id','!=',$id)->get();
        return $users;     
    }

    public function change_user_status(Request $request)
    {

        $id = $request->user_id;
        $role_id = $request->role;
        $is_lock = $request->status;
        $is_active = $request->progress;
        $is_profile_verified = $request->profile;
        $refferal = $request->refferal;


        if($role_id != 3){
            $is_profile_verified = DB::table('users')->where('id',$id)->select('is_profile_verified')->first()->is_profile_verified;
            if($is_profile_verified == 0){

                 return redirect()->back()->with('alert', 'Cant able to change role user to admin, profile completion is not yet done!!');

            }
            else{
                $user = User::where('id',$id)->first();
                DB::table('users')->where('id',$id)->update(['role_id' => $role_id,'is_lock' => $is_lock,'is_active' => $is_active,'is_profile_verified' => $is_profile_verified,'is_reffer' => $refferal]);
                if($is_profile_verified == 1){

                    DB::table('users')->where('id',$id)->update(['is_profile_updated' => 0]);

                    if($user->is_profile_updated == 1){

                        //Mail to user
                        $emailsetting = Template::where([['id',11],['is_active',1]])->first(); 
                        if($emailsetting != null){
                            $email_template = $emailsetting->template;
                            $emailContentReplace=['##NAME##'=>$user->first_name.' '.$user->last_name];
                            $txt = strtr($email_template,$emailContentReplace);
                            $emailId = $user->email;
                            $subject = $emailsetting->subject;
                            $mailstatus = SMTPController::sendMail($emailId,$subject,$txt);
                        }
                        //Mail to user end
                    }
                }
                if($refferal == 0){

                    $refferal = Refferal::where('user_id',$id)->count();
                    if($refferal > 0){
                        $refferal = Refferal::where('user_id',$id)->delete();
                    }
                    $user_amount = UserAmount::where('user_id',$id)->count();
                    if($user_amount > 0){
                        $user_amount = UserAmount::where('user_id',$id)->delete();
                    }
                }
                if($user->is_active == 0 &&  $is_active == 1){
                    //Mail to user
                    $emailsetting = Template::where([['id',3],['is_active',1]])->first(); 
                    if($emailsetting != null){
                        $email_template = $emailsetting->template;
                        $emailContentReplace=['##NAME##'=>$user->first_name.' '.$user->last_name];
                        $txt = strtr($email_template,$emailContentReplace);
                        $emailId = $user->email;
                        $subject = $emailsetting->subject;
                        $mailstatus = SMTPController::sendMail($emailId,$subject,$txt);
                    }
                    //Mail to user end
                }
                if($user->is_active == 3 &&  $is_active == 1){
                    //Mail to user
                    $emailsetting = Template::where([['id',3],['is_active',1]])->first(); 
                    if($emailsetting != null){
                        $email_template = $emailsetting->template;
                        $emailContentReplace=['##NAME##'=>$user->first_name.' '.$user->last_name];
                        $txt = strtr($email_template,$emailContentReplace);
                        $emailId = $user->email;
                        $subject = $emailsetting->subject;
                        $mailstatus = SMTPController::sendMail($emailId,$subject,$txt);
                    }
                    //Mail to user end
                }
                if($user->is_active == 0 &&  $is_active == 3){
                    //Mail to user
                    $emailsetting = Template::where([['id',4],['is_active',1]])->first(); 
                    if($emailsetting != null){
                        $email_template = $emailsetting->template;
                        $emailContentReplace=['##NAME##'=>$user->first_name.' '.$user->last_name];
                        $txt = strtr($email_template,$emailContentReplace);
                        $emailId = $user->email;
                        $subject = $emailsetting->subject;
                        $mailstatus = SMTPController::sendMail($emailId,$subject,$txt);
                    }
                    //Mail to user end
                }
                if($user->is_profile_verified == 0 &&  $is_profile_verified == 1){
                    //Mail to user
                    $emailsetting = Template::where([['id',7],['is_active',1]])->first(); 
                    if($emailsetting != null){
                        $email_template = $emailsetting->template;
                        $emailContentReplace=['##NAME##'=>$user->first_name.' '.$user->last_name];
                        $txt = strtr($email_template,$emailContentReplace);
                        $emailId = $user->email;
                        $subject = $emailsetting->subject;
                        $mailstatus = SMTPController::sendMail($emailId,$subject,$txt);
                    }
                    //Mail to user end
                }
                if($user->is_profile_verified == 3 &&  $is_profile_verified == 1){
                    //Mail to user
                    $emailsetting = Template::where([['id',7],['is_active',1]])->first(); 
                    if($emailsetting != null){
                        $email_template = $emailsetting->template;
                        $emailContentReplace=['##NAME##'=>$user->first_name.' '.$user->last_name];
                        $txt = strtr($email_template,$emailContentReplace);
                        $emailId = $user->email;
                        $subject = $emailsetting->subject;
                        $mailstatus = SMTPController::sendMail($emailId,$subject,$txt);
                    }
                    //Mail to user end
                }
                if($user->is_profile_verified == 0 &&  $is_profile_verified == 3){
                    //Mail to user
                    $emailsetting = Template::where([['id',8],['is_active',1]])->first(); 
                    if($emailsetting != null){
                        $email_template = $emailsetting->template;
                        $emailContentReplace=['##NAME##'=>$user->first_name.' '.$user->last_name];
                        $txt = strtr($email_template,$emailContentReplace);
                        $emailId = $user->email;
                        $subject = $emailsetting->subject;
                        $mailstatus = SMTPController::sendMail($emailId,$subject,$txt);
                    }
                    //Mail to user end
                }
                return redirect()->back()->with('alert', 'Successfully Updated!!');
            }
        }
        else{
            $user = User::where('id',$id)->first();
            DB::table('users')->where('id',$id)->update(['role_id' => $role_id,'is_lock' => $is_lock,'is_active' => $is_active,'is_profile_verified' => $is_profile_verified,'is_reffer' => $refferal]);
            if($is_profile_verified == 1){

                DB::table('users')->where('id',$id)->update(['is_profile_updated' => 0]);
                if($user->is_profile_updated == 1){

                    //Mail to user
                    $emailsetting = Template::where([['id',11],['is_active',1]])->first(); 
                    if($emailsetting != null){
                        $email_template = $emailsetting->template;
                        $emailContentReplace=['##NAME##'=>$user->first_name.' '.$user->last_name];
                        $txt = strtr($email_template,$emailContentReplace);
                        $emailId = $user->email;
                        $subject = $emailsetting->subject;
                        $mailstatus = SMTPController::sendMail($emailId,$subject,$txt);
                    }
                    //Mail to user end
                }
            }
            if($refferal == 0){

                $refferal = Refferal::where('user_id',$id)->count();
                if($refferal > 0){
                    $refferal = Refferal::where('user_id',$id)->delete();
                }
                $user_amount = UserAmount::where('user_id',$id)->count();
                if($user_amount > 0){
                    $user_amount = UserAmount::where('user_id',$id)->delete();
                }
            }
            if($user->is_active == 0 &&  $is_active == 1){
                //Mail to user
                $emailsetting = Template::where([['id',3],['is_active',1]])->first(); 
                if($emailsetting != null){
                    $email_template = $emailsetting->template;
                    $emailContentReplace=['##NAME##'=>$user->first_name.' '.$user->last_name];
                    $txt = strtr($email_template,$emailContentReplace);
                    $emailId = $user->email;
                    $subject = $emailsetting->subject;
                    $mailstatus = SMTPController::sendMail($emailId,$subject,$txt);
                }
                //Mail to user end
            }
            if($user->is_active == 3 &&  $is_active == 1){
                //Mail to user
                $emailsetting = Template::where([['id',3],['is_active',1]])->first(); 
                if($emailsetting != null){
                    $email_template = $emailsetting->template;
                    $emailContentReplace=['##NAME##'=>$user->first_name.' '.$user->last_name];
                    $txt = strtr($email_template,$emailContentReplace);
                    $emailId = $user->email;
                    $subject = $emailsetting->subject;
                    $mailstatus = SMTPController::sendMail($emailId,$subject,$txt);
                }
                //Mail to user end
            }
            if($user->is_active == 0 &&  $is_active == 3){
                //Mail to user
                $emailsetting = Template::where([['id',4],['is_active',1]])->first(); 
                if($emailsetting != null){
                    $email_template = $emailsetting->template;
                    $emailContentReplace=['##NAME##'=>$user->first_name.' '.$user->last_name];
                    $txt = strtr($email_template,$emailContentReplace);
                    $emailId = $user->email;
                    $subject = $emailsetting->subject;
                    $mailstatus = SMTPController::sendMail($emailId,$subject,$txt);
                }
                //Mail to user end
            }
            if($user->is_profile_verified == 0 &&  $is_profile_verified == 1){
                //Mail to user
                $emailsetting = Template::where([['id',7],['is_active',1]])->first(); 
                if($emailsetting != null){
                    $email_template = $emailsetting->template;
                    $emailContentReplace=['##NAME##'=>$user->first_name.' '.$user->last_name];
                    $txt = strtr($email_template,$emailContentReplace);
                    $emailId = $user->email;
                    $subject = $emailsetting->subject;
                    $mailstatus = SMTPController::sendMail($emailId,$subject,$txt);
                }
                //Mail to user end
            }
            if($user->is_profile_verified == 3 &&  $is_profile_verified == 1){
                //Mail to user
                $emailsetting = Template::where([['id',7],['is_active',1]])->first(); 
                if($emailsetting != null){
                    $email_template = $emailsetting->template;
                    $emailContentReplace=['##NAME##'=>$user->first_name.' '.$user->last_name];
                    $txt = strtr($email_template,$emailContentReplace);
                    $emailId = $user->email;
                    $subject = $emailsetting->subject;
                    $mailstatus = SMTPController::sendMail($emailId,$subject,$txt);
                }
                //Mail to user end
            }
            if($user->is_profile_verified == 0 &&  $is_profile_verified == 3){
                //Mail to user
                $emailsetting = Template::where([['id',8],['is_active',1]])->first(); 
                if($emailsetting != null){
                    $email_template = $emailsetting->template;
                    $emailContentReplace=['##NAME##'=>$user->first_name.' '.$user->last_name];
                    $txt = strtr($email_template,$emailContentReplace);
                    $emailId = $user->email;
                    $subject = $emailsetting->subject;
                    $mailstatus = SMTPController::sendMail($emailId,$subject,$txt);
                }
                //Mail to user end
            }

            return redirect()->back()->with('alert', 'Successfully Updated!!');
        }
        
    }
    public function profile(){ 

        $user = Auth::user();
        $user_detail = UserDetail::where('user_id',$user->id)->first();
        $bank_detail = BankDetail::where('user_id',$user->id)->first();
        $nominee_detail = NomineeDetail::where('user_id',$user->id)->first();
        $finances = Smartfinance::where([['user_id',$user->id],['plan_id','!=',3],['is_status',1]])->orderBy('id','Desc')->get();
        $amount= 0;
        foreach ($finances as $finance) {
            $amount += $finance->amount;
        }
        $finances = Smartfinance::where([['user_id',$user->id],['plan_id',3],['is_status',1]])->orderBy('id','Desc')->get();
        foreach ($finances as $finance) {
            $payments = SmartfinancePayment::where([['smartfinance_id',$finance->id],['is_approve',1]])->get();
            foreach ($payments as $payment) {
                $amount += $payment->investment_amount;
            }
        }


        $m_amount=0;
        $month_finances = Smartfinance::where([['user_id',$user->id],['plan_id',1],['is_status',1]])->get();
        foreach($month_finances as $month_finance){
            $month_amounts = SmartfinancePayment::where([['smartfinance_id',$month_finance->id],['is_status',1]])->get();
            foreach($month_amounts as $month_amount){
                $m_amount += $month_amount->amount;

            }
        }


        $y_amount=0;
        $year_finances = Smartfinance::where([['user_id',$user->id],['plan_id',2],['is_status',1]])->get();
        if($year_finances != NULL){
            foreach($year_finances as $year_finance){
                $year_amount = SmartfinancePayment::where([['smartfinance_id',$year_finance->id],['is_status',1]])->first();
                if($year_amount != NULL){
                    $year_amount = $year_amount->amount - $year_finance->amount;
                    $y_amount += $year_amount;
                }
            }
        }
        

        $ym_amount=0;
        $year_month_finances = Smartfinance::where([['user_id',$user->id],['plan_id',3],['is_status',1]])->get();
        foreach($year_month_finances as $year_month_finance){
            $year_month_amounts = SmartfinancePayment::where([['smartfinance_id', $year_month_finance->id],['is_approve',1],['is_status',1]])->get();

            foreach($year_month_amounts as $year_month_amount){
                $ym_amount += $year_month_amount->intrest;
            }
            
            
        }

        $refferal_amount = UserAmount::where([['user_id',$user->id],['is_status',1]])->first();
        if($refferal_amount != NULL){
            $earning_amount = $m_amount + $y_amount + $ym_amount + $refferal_amount->amount; 
        }
        else{
            $earning_amount = $m_amount + $y_amount + $ym_amount; 
        }
        

        $percentage = 0;
        $investment_count = Smartfinance::where([['user_id',$user->id],['is_status',1]])->count();
        $intrests = Smartfinance::where([['user_id',$user->id],['is_status',1]])->get();
        foreach ($intrests as $intrest) {
            $percentage += $intrest->percentage;
        }
        if($percentage != 0){
            $earning_percentage = round($percentage/$investment_count);
        }
        else{
            $earning_percentage = 0;
        }

        $refferals = Refferal::where('user_id',$user->id)->get();
        $refferal_amounts = UserAmount::where('user_id',$user->id)->get();
        $review_rating = ReviewRating::where('user_id',$user->id)->first();



        return view('user_profile')->with('user',$user)->with('user_detail',$user_detail)->with('bank_detail',$bank_detail)->with('nominee_detail',$nominee_detail)->with('amount',$amount)->with('investment_count',$investment_count)->with('earning_percentage',$earning_percentage)->with('earning_amount',$earning_amount)->with('refferals',$refferals)->with('refferal_amounts',$refferal_amounts)->with('review_rating',$review_rating);
    }

    public function user($id){
        $user = User::where('id', $id)->first();
        $user_detail = UserDetail::where('user_id',$user->id)->first();
        $bank_detail = BankDetail::where('user_id',$user->id)->first();
        $nominee_detail = NomineeDetail::where('user_id',$user->id)->first();
        $smartfinances = Smartfinance::where('user_id',$user->id)->orderBy('id','Desc')->simplePaginate(10);
         $finances = Smartfinance::where([['user_id',$user->id],['plan_id','!=',3],['is_status',1]])->orderBy('id','Desc')->get();
        $amount= 0;
        foreach ($finances as $finance) {
            $amount += $finance->amount;
        }
        $finances = Smartfinance::where([['user_id',$user->id],['plan_id',3],['is_status',1]])->orderBy('id','Desc')->get();
        foreach ($finances as $finance) {
            $payments = SmartfinancePayment::where([['smartfinance_id',$finance->id],['is_approve',1]])->get();
            foreach ($payments as $payment) {
                $amount += $payment->investment_amount;
            }

        }



        $m_amount=0;
        $month_finances = Smartfinance::where([['user_id',$user->id],['plan_id',1],['is_status',1]])->get();
        foreach($month_finances as $month_finance){
            $month_amounts = SmartfinancePayment::where([['smartfinance_id',$month_finance->id],['is_status',1]])->get();
            foreach($month_amounts as $month_amount){
                $m_amount += $month_amount->amount;

            }
        }

        $y_amount=0;
        $year_finances = Smartfinance::where([['user_id',$user->id],['plan_id',2],['is_status',1]])->get();
        if($year_finances != NULL){
            foreach($year_finances as $year_finance){
                $year_amount = SmartfinancePayment::where([['smartfinance_id',$year_finance->id],['is_status',1]])->first();
                if($year_amount != NULL){
                    $year_amount = $year_amount->amount - $year_finance->amount;
                    
                    $y_amount += $year_amount;
                }
            }
        }

        $ym_amount=0;
        $year_month_finances = Smartfinance::where([['user_id',$user->id],['plan_id',3],['is_status',1]])->get();
        foreach($year_month_finances as $year_month_finance){
            $year_month_amounts = SmartfinancePayment::where([['smartfinance_id', $year_month_finance->id],['is_approve',1],['is_status',1]])->get();

            foreach($year_month_amounts as $year_month_amount){
                $ym_amount += $year_month_amount->intrest;
            }
            
            
        }

        $refferal_amount = UserAmount::where([['user_id',$user->id],['is_status',1]])->first();
        if($refferal_amount != NULL){
            $earning_amount = $m_amount + $y_amount + $ym_amount + $refferal_amount->amount; 
        }
        else{
            $earning_amount = $m_amount + $y_amount + $ym_amount; 
        } 

        $percentage = 0;
        $investment_count = Smartfinance::where([['user_id',$user->id],['is_status',1]])->count();
        $intrests = Smartfinance::where([['user_id',$user->id],['is_status',1]])->get();
        foreach ($intrests as $intrest) {
            $percentage += $intrest->percentage;
        }
        if($percentage != 0){
            $earning_percentage = round($percentage/$investment_count);
        }
        else{
            $earning_percentage = 0;
        }


        $refferals = Refferal::where('user_id',$id)->get();
        $refferal_amounts = UserAmount::where('user_id',$id)->get();
        $review_rating = ReviewRating::where('user_id',$user->id)->first();
        


        return view('user_detail')->with('user',$user)->with('user_detail',$user_detail)->with('bank_detail',$bank_detail)->with('nominee_detail',$nominee_detail)->with('smartfinances',$smartfinances)->with('amount',$amount)->with('investment_count',$investment_count)->with('earning_percentage',$earning_percentage)->with('earning_amount',$earning_amount)->with('refferals',$refferals)->with('refferal_amounts',$refferal_amounts)->with('review_rating',$review_rating);
        
    }

    public function approve_user($id){

        DB::table('users')->where('id',$id)->update(['is_active' => 1]);

        //Mail
        $emailsetting = Template::where([['id',3],['is_active',1]])->first(); 
        if($emailsetting != null){
            $email_template = $emailsetting->template;
            $emailContentReplace=['##NAME##'=>$user->first_name.' '.$user->last_name];
            $txt = strtr($email_template,$emailContentReplace);
            $emailId = $user->email;
            $subject = $emailsetting->subject;
            $mailstatus = SMTPController::sendMail($emailId,$subject,$txt);
        }
        //End mail

         return redirect(route('user', ['id' => $id]));
        
    }

    public function approve_user_profile($id){

        DB::table('users')->where('id',$id)->update(['is_profile_verified' => 1,'is_profile_updated' => 0]);

        //Mail

        $emailsetting = Template::where([['id',7],['is_active',1]])->first(); 
        if($emailsetting != null){
            $email_template = $emailsetting->template;
            $emailContentReplace=['##NAME##'=>$user->first_name.' '.$user->last_name];
            $txt = strtr($email_template,$emailContentReplace);
            $emailId = $user->email;
            $subject = $emailsetting->subject;
            $mailstatus = SMTPController::sendMail($emailId,$subject,$txt);
        }

        //End mail

         return redirect(route('user', ['id' => $id]));
        
    }

    public function save_profile(Request $request)
    {
        $aadhaar_no = implode("-", str_split($request->aadhaar_no, 4));
        $nominee_aadhaar_no = implode("-", str_split($request->nominee_aadhaar_no, 4));

        $id = Auth::user()->id;
        $user_detail = UserDetail::create([
            'user_id' => $id,
            'address' => $request->address,
            'city' => $request->city,
            'pincode' => $request->pincode,
            'aadhaar_no' => $request->aadhaar_no,
            'pan_card_no' => $request->pan_card_no,
        ]);
        //Avatar
        $image = $request->file('avatar');
        $rand_name = time() . Str::random(12);
        $filename = $rand_name . '.jpg';
        $photo = Image::make($image)->encode('jpg', 80);
        Storage::disk('public')->put(config('path.avatar').$filename, $photo);
        $user_detail->avatar = $filename;
        $user_detail->save();

        DB::table('users')->where('id',$id)->update(['avatar' => $filename]);



        //Aadhar Card
        $image = $request->file('aadhaar_card');
        $rand_name = time() . Str::random(12);
        $filename = $rand_name . '.jpg';
        $photo = Image::make($image)->encode('jpg', 80);
        Storage::disk('public')->put(config('path.aadhaar_card').$filename, $photo);
        $user_detail->aadhaar = $filename;
        $user_detail->save();
        
        //Pan Card
        $image = $request->file('pan_card');
        $rand_name = time() . Str::random(12);
        $filename = $rand_name . '.jpg';
        $photo = Image::make($image)->encode('jpg', 80);
        Storage::disk('public')->put(config('path.pan_card').$filename, $photo);
        $user_detail->pan = $filename;
        $user_detail->save();

        $bank_detail = BankDetail::create([
            'user_id' => $id,
            'name' => $request->holder_name,
            'number' => $request->account_no,
            'ifsc_code' => $request->ifsc_code,
            'branch' => $request->branch,
            'city' => $request->city,
        ]);

        $nominee_detail = NomineeDetail::create([
            'user_id' => $id,
            'name' => $request->nominee_name,
            'relationship' => $request->relationship,
            'age' => $request->age,
            'aadhaar_no' => $request->nominee_aadhaar_no,
        ]);

        //Aadhar Card
        $image = $request->file('nominee_aadhar');
        $rand_name = time() . Str::random(12);
        $filename = $rand_name . '.jpg';
        $photo = Image::make($image)->encode('jpg', 80);
        Storage::disk('public')->put(config('path.aadhaar_card').$filename, $photo);
        $nominee_detail->aadhaar = $filename;
        $nominee_detail->save();

        $role_id = Auth::user()->role_id;
        if($role_id == 1){
           DB::table('users')->where('id',$id)->update(['is_profile_verified' => 1]); 
        }
        else{
            DB::table('users')->where('id',$id)->update(['is_profile_verified' => 0]);
        }
        
        //Mail
        $user = User::where('id',$id)->first();
        //admin
        $emailsetting = Template::where([['id',5],['is_active',1]])->first(); 
        $admin_email = Setting::where('key','admin_email')->first();
        if($emailsetting != null){
            $email_template = $emailsetting->template;
            $emailContentReplace=['##NAME##'=>$user->first_name.' '.$user->last_name,'##PHONE##'=>$user->phone];
            $txt = strtr($email_template,$emailContentReplace);
            $emailId = $admin_email->value;
            $subject = $emailsetting->subject;
            $mailstatus = SMTPController::sendMail($emailId,$subject,$txt);
        }
        //end admin

        $emailsetting = Template::where([['id',6],['is_active',1]])->first(); 
        if($emailsetting != null){
            $email_template = $emailsetting->template;
            $emailContentReplace=['##NAME##'=>$user->first_name.' '.$user->last_name];
            $txt = strtr($email_template,$emailContentReplace);
            $emailId = $user->email;
            $subject = $emailsetting->subject;
            $mailstatus = SMTPController::sendMail($emailId,$subject,$txt);
        }

        //End mail

        return redirect('dashboard');
    }

    public function edit_profile(Request $request)
    {
        $type = $request->type;
        $user_id = $request->user_id;
        $profile_update = $request->profile_update;

        // if($profile_update == 'true'){
        //     $role = User::where('id',$user_id)->select('role_id')->first()->role_id;
        //     if($role != 1){
        //         DB::table('users')->where('id',$user_id)->update(['is_profile_updated' => 1]);
        //     }
        // }

        if($type == 'basic'){
            $validatedData = $request->validate([
                'first_name' => 'required',
                'email' => 'required|email',
                'phone' => 'required|numeric|digits:10',
                'address' => 'required',
                'city' => 'required',
                'pincode' => 'required|digits:6',
            ]);
            DB::table('users')->where('id',$user_id)->update(['first_name' => $request->first_name,'last_name' => $request->last_name,'email' => $request->email,'phone' => $request->phone]);

            DB::table('user_details')->where('user_id',$user_id)->update(['address' => $request->address,'city' => $request->city,'pincode' => $request->pincode]);

            $user = User::where('id',$user_id)->first();
            DB::table('users')->where('id',$user_id)->update(['is_profile_updated' => 1]);
            if($user->is_profile_updated == 0 && $profile_update == 'true'){

                //Mail
                
                //Admin
                $emailsetting = Template::where([['id',9],['is_active',1]])->first(); 
                $admin_email = Setting::where('key','admin_email')->first();
                if($emailsetting != null){
                    $email_template = $emailsetting->template;
                    $date = $user->created_at->toDateString();
                    $emailContentReplace=['##NAME##'=>$user->first_name.' '.$user->last_name,'##PHONE##'=>$user->phone,'##DATE##'=>$date];
                    $txt = strtr($email_template,$emailContentReplace);
                    $emailId = $admin_email->value;
                    $subject = $emailsetting->subject;
                    $mailstatus = SMTPController::sendMail($emailId,$subject,$txt);
                }
                //End

                //User
                $emailsetting = Template::where([['id',10],['is_active',1]])->first(); 
                if($emailsetting != null){
                    $email_template = $emailsetting->template;
                    $emailContentReplace=['##NAME##'=>$user->first_name.' '.$user->last_name];
                    $txt = strtr($email_template,$emailContentReplace);
                    $emailId = $user->email;
                    $subject = $emailsetting->subject;
                    $mailstatus = SMTPController::sendMail($emailId,$subject,$txt);
                }
                //End

                //End mail
            }
            return redirect()->back();
        }
        if($type == 'additional'){
            $validatedData = $request->validate([
                'aadhaar_no' => 'required|numeric|digits:12',
                'pan_card_no' => 'required|regex:/([A-Z]){5}([0-9]){4}([A-Z]){1}$/',
                'avatar' => 'image|mimes:jpg,png,jpeg,svg',
                'aadhaar_card' => 'image|mimes:jpg,png,jpeg,svg',
                'pan_card' => 'image|mimes:jpg,png,jpeg,svg',
            ]);
            

            DB::table('user_details')->where('user_id',$user_id)->update(['aadhaar_no' => $request->aadhaar_no,'pan_card_no' => $request->pan_card_no]);

            if($request->avatar != NULL){
                $image = $request->file('avatar');
                $rand_name = time() . Str::random(12);
                $filename = $rand_name . '.jpg';
                $photo = Image::make($image)->encode('jpg', 80);
                Storage::disk('public')->put(config('path.avatar').$filename, $photo);
                DB::table('user_details')->where('user_id',$user_id)->update(['avatar' => $filename]);
                DB::table('users')->where('id',$user_id)->update(['avatar' => $filename]);
            }

            if($request->aadhaar_card != NULL) {  
                //Aadhar Card
                $image = $request->file('aadhaar_card');
                $rand_name = time() . Str::random(12);
                $filename = $rand_name . '.jpg';
                $photo = Image::make($image)->encode('jpg', 80);
                Storage::disk('public')->put(config('path.aadhaar_card').$filename, $photo);
                DB::table('user_details')->where('user_id',$user_id)->update(['aadhaar' => $filename]);
            }
            
            if($request->pan_card != NULL){
                //Pan Card
                $image = $request->file('pan_card');
                $rand_name = time() . Str::random(12);
                $filename = $rand_name . '.jpg';
                $photo = Image::make($image)->encode('jpg', 80);
                Storage::disk('public')->put(config('path.pan_card').$filename, $photo);
                DB::table('user_details')->where('user_id',$user_id)->update(['pan' => $filename]);
            }

            $user = User::where('id',$user_id)->first();
            DB::table('users')->where('id',$user_id)->update(['is_profile_updated' => 1]);
            if($user->is_profile_updated == 0 && $profile_update == 'true'){

                //Mail
                
                //Admin
                $emailsetting = Template::where([['id',9],['is_active',1]])->first(); 
                $admin_email = Setting::where('key','admin_email')->first();
                if($emailsetting != null){
                    $email_template = $emailsetting->template;
                    $date = $user->created_at->toDateString();
                    $emailContentReplace=['##NAME##'=>$user->first_name.' '.$user->last_name,'##PHONE##'=>$user->phone,'##DATE##'=>$date];
                    $txt = strtr($email_template,$emailContentReplace);
                    $emailId = $admin_email->value;
                    $subject = $emailsetting->subject;
                    $mailstatus = SMTPController::sendMail($emailId,$subject,$txt);
                }
                //End

                //User
                $emailsetting = Template::where([['id',10],['is_active',1]])->first(); 
                if($emailsetting != null){
                    $email_template = $emailsetting->template;
                    $emailContentReplace=['##NAME##'=>$user->first_name.' '.$user->last_name];
                    $txt = strtr($email_template,$emailContentReplace);
                    $emailId = $user->email;
                    $subject = $emailsetting->subject;
                    $mailstatus = SMTPController::sendMail($emailId,$subject,$txt);
                }
                //End

                //End mail
            }
            return redirect()->back();
        }
        if($type == 'bank'){
            $validatedData = $request->validate([
                'holder_name' => 'required',
                'account_no' => 'required|numeric',
                'ifsc_code' => 'required|regex:/^[A-Z]{4}0[0-9]{6}$/',
                'branch' => 'required',
                'city' => 'required', 
            ]);

            DB::table('bank_details')->where('user_id',$user_id)->update(['name' => $request->holder_name,'number' => $request->account_no,'ifsc_code' => $request->ifsc_code,'branch' => $request->branch,'city' => $request->city]);
            $user = User::where('id',$user_id)->first();
            DB::table('users')->where('id',$user_id)->update(['is_profile_updated' => 1]);
            if($user->is_profile_updated == 0 && $profile_update == 'true'){

                //Mail
                
                //Admin
                $emailsetting = Template::where([['id',9],['is_active',1]])->first(); 
                $admin_email = Setting::where('key','admin_email')->first();
                if($emailsetting != null){
                    $email_template = $emailsetting->template;
                    $date = $user->created_at->toDateString();
                    $emailContentReplace=['##NAME##'=>$user->first_name.' '.$user->last_name,'##PHONE##'=>$user->phone,'##DATE##'=>$date];
                    $txt = strtr($email_template,$emailContentReplace);
                    $emailId = $admin_email->value;
                    $subject = $emailsetting->subject;
                    $mailstatus = SMTPController::sendMail($emailId,$subject,$txt);
                }
                //End

                //User
                $emailsetting = Template::where([['id',10],['is_active',1]])->first(); 
                if($emailsetting != null){
                    $email_template = $emailsetting->template;
                    $emailContentReplace=['##NAME##'=>$user->first_name.' '.$user->last_name];
                    $txt = strtr($email_template,$emailContentReplace);
                    $emailId = $user->email;
                    $subject = $emailsetting->subject;
                    $mailstatus = SMTPController::sendMail($emailId,$subject,$txt);
                }
                //End

                //End mail
            }
            return redirect()->back();
        } 
        if($type == 'nominee'){
            $validatedData = $request->validate([
                'nominee_name' => 'required',
                'relationship' => 'required',
                'age' => 'required|numeric',
                'nominee_aadhaar_no' => 'required|numeric|digits:12',
                'nominee_aadhar' => 'image|mimes:jpg,png,jpeg,svg', 
            ]);

            DB::table('nominee_details')->where('user_id',$user_id)->update(['name' => $request->nominee_name,'relationship' => $request->relationship,'age' => $request->age,'aadhaar_no' => $request->nominee_aadhaar_no]);

            if($request->nominee_aadhar != NULL){
                //Aadhar Card
                $image = $request->file('nominee_aadhar');
                $rand_name = time() . Str::random(12);
                $filename = $rand_name . '.jpg';
                $photo = Image::make($image)->encode('jpg', 80);
                Storage::disk('public')->put(config('path.aadhaar_card').$filename, $photo);
                DB::table('nominee_details')->where('user_id',$user_id)->update(['aadhaar' => $filename]);
                
            }
            $user = User::where('id',$user_id)->first();
            DB::table('users')->where('id',$user_id)->update(['is_profile_updated' => 1]);
            if($user->is_profile_updated == 0 && $profile_update == 'true'){

                //Mail
                
                //Admin
                $emailsetting = Template::where([['id',9],['is_active',1]])->first(); 
                $admin_email = Setting::where('key','admin_email')->first();
                if($emailsetting != null){
                    $email_template = $emailsetting->template;
                    $date = $user->created_at->toDateString();
                    $emailContentReplace=['##NAME##'=>$user->first_name.' '.$user->last_name,'##PHONE##'=>$user->phone,'##DATE##'=>$date];
                    $txt = strtr($email_template,$emailContentReplace);
                    $emailId = $admin_email->value;
                    $subject = $emailsetting->subject;
                    $mailstatus = SMTPController::sendMail($emailId,$subject,$txt);
                }
                //End

                //User
                $emailsetting = Template::where([['id',10],['is_active',1]])->first(); 
                if($emailsetting != null){
                    $email_template = $emailsetting->template;
                    $emailContentReplace=['##NAME##'=>$user->first_name.' '.$user->last_name];
                    $txt = strtr($email_template,$emailContentReplace);
                    $emailId = $user->email;
                    $subject = $emailsetting->subject;
                    $mailstatus = SMTPController::sendMail($emailId,$subject,$txt);
                }
                //End

                //End mail
            }
            return redirect()->back();
        }

    }

    public function user_search($type,Request $request)
    {
        $users = User::where('first_name', 'like', '%'.$type.'%')->orWhere('last_name', 'like', '%'.$type.'%')->where('is_delete',0)->orderBy('id','Desc')->paginate(10);
        $user_count = User::where('is_active',0)->orWhere('is_profile_verified',0)->count();
        $smartfinance_count = Smartfinance::where('is_status',2)->count();
        $payment_count = SmartfinancePayment::where('is_approve',2)->count();
        $loan_count = Loan::where('is_status',2)->count();
        $loan_payment_count = LoanPayment::where('is_status',2)->count();
        $tax_count = Tax::count();
        $mutual_fund_count = MutualFund::count();

        $role = NULL;
        $profile = NULL;
        $progress = NULL;
        $status = NULL;
        $search = $type;

        return view('user_management')->with('users',$users)->with('user_count',$user_count)->with('smartfinance_count',$smartfinance_count)->with('payment_count',$payment_count)->with('loan_count',$loan_count)->with('loan_payment_count',$loan_payment_count)->with('tax_count',$tax_count)->with('mutual_fund_count',$mutual_fund_count)->with('role',$role)->with('profile',$profile)->with('progress',$progress)->with('status',$status)->with('search',$search);
    }

    public function user_status($type,Request $request)
    {
        $users = User::where([['is_delete',0],['is_lock',$type]])->orderBy('id','Desc')->paginate(10);
        $user_count = User::where('is_active',0)->orWhere('is_profile_verified',0)->count();
        $smartfinance_count = Smartfinance::where('is_status',2)->count();
        $payment_count = SmartfinancePayment::where('is_approve',2)->count();
        $loan_count = Loan::where('is_status',2)->count();
        $loan_payment_count = LoanPayment::where('is_status',2)->count();
        $tax_count = Tax::count();
        $mutual_fund_count = MutualFund::count();

        $role = NULL;
        $profile = NULL;
        $progress = NULL;
        $status = $type;
        $search = NULL;

        return view('user_management')->with('users',$users)->with('user_count',$user_count)->with('smartfinance_count',$smartfinance_count)->with('payment_count',$payment_count)->with('loan_count',$loan_count)->with('loan_payment_count',$loan_payment_count)->with('tax_count',$tax_count)->with('mutual_fund_count',$mutual_fund_count)->with('role',$role)->with('profile',$profile)->with('progress',$progress)->with('status',$status)->with('search',$search);
    }

    public function user_progress($type,Request $request)
    {

        $users = User::where([['is_delete',0],['is_active',$type]])->orderBy('id','Desc')->paginate(10);
        $user_count = User::where('is_active',0)->orWhere('is_profile_verified',0)->count();
        $smartfinance_count = Smartfinance::where('is_status',2)->count();
        $payment_count = SmartfinancePayment::where('is_approve',2)->count();
        $loan_count = Loan::where('is_status',2)->count();
        $loan_payment_count = LoanPayment::where('is_status',2)->count();
        $tax_count = Tax::count();
        $mutual_fund_count = MutualFund::count();

        $role = NULL;
        $profile = NULL;
        $progress = $type;
        $status = NULL;
        $search = NULL;

        return view('user_management')->with('users',$users)->with('user_count',$user_count)->with('smartfinance_count',$smartfinance_count)->with('payment_count',$payment_count)->with('loan_count',$loan_count)->with('loan_payment_count',$loan_payment_count)->with('tax_count',$tax_count)->with('mutual_fund_count',$mutual_fund_count)->with('role',$role)->with('profile',$profile)->with('progress',$progress)->with('status',$status)->with('search',$search);
    }

    public function user_profile($type,Request $request)
    {
        if($type == 2){
            $users = User::where([['is_delete',0],['is_profile_verified',$type]])->orderBy('id','Desc')->paginate(10);
            $user_count = User::where('is_active',0)->orWhere('is_profile_verified',0)->count();
            $smartfinance_count = Smartfinance::where('is_status',2)->count();
            $payment_count = SmartfinancePayment::where('is_approve',2)->count();
            $loan_count = Loan::where('is_status',2)->count();
            $loan_payment_count = LoanPayment::where('is_status',2)->count();
            $tax_count = Tax::count();
            $mutual_fund_count = MutualFund::count();

            $role = NULL;
            $profile = $type;
            $progress = NULL;
            $status = NULL;
            $search = NULL;

            return view('user_management')->with('users',$users)->with('user_count',$user_count)->with('smartfinance_count',$smartfinance_count)->with('payment_count',$payment_count)->with('loan_count',$loan_count)->with('loan_payment_count',$loan_payment_count)->with('tax_count',$tax_count)->with('mutual_fund_count',$mutual_fund_count)->with('role',$role)->with('profile',$profile)->with('progress',$progress)->with('status',$status)->with('search',$search);
        }
        elseif($type == 1){

            $users = User::where([['is_delete',0],['is_profile_verified',$type]])->orWhere('is_profile_updated','!=',$type)->orderBy('id','Desc')->paginate(10);
            $user_count = User::where('is_active',0)->orWhere('is_profile_verified',0)->count();
            $smartfinance_count = Smartfinance::where('is_status',2)->count();
            $payment_count = SmartfinancePayment::where('is_approve',2)->count();
            $loan_count = Loan::where('is_status',2)->count();
            $loan_payment_count = LoanPayment::where('is_status',2)->count();
            $tax_count = Tax::count();
            $mutual_fund_count = MutualFund::count();

            $role = NULL;
            $profile = $type;
            $progress = NULL;
            $status = NULL;
            $search = NULL;

            return view('user_management')->with('users',$users)->with('user_count',$user_count)->with('smartfinance_count',$smartfinance_count)->with('payment_count',$payment_count)->with('loan_count',$loan_count)->with('loan_payment_count',$loan_payment_count)->with('tax_count',$tax_count)->with('mutual_fund_count',$mutual_fund_count)->with('role',$role)->with('profile',$profile)->with('progress',$progress)->with('status',$status)->with('search',$search);
        }
        elseif($type == 0){

            $users = User::where([['is_delete',0],['is_profile_verified',$type]])->orWhere('is_profile_updated','!=',$type)->orderBy('id','Desc')->paginate(10);
            $user_count = User::where('is_active',0)->orWhere('is_profile_verified',0)->count();
            $smartfinance_count = Smartfinance::where('is_status',2)->count();
            $payment_count = SmartfinancePayment::where('is_approve',2)->count();
            $loan_count = Loan::where('is_status',2)->count();
            $loan_payment_count = LoanPayment::where('is_status',2)->count();
            $tax_count = Tax::count();
            $mutual_fund_count = MutualFund::count();

            $role = NULL;
            $profile = $type;
            $progress = NULL;
            $status = NULL;
            $search = NULL;

            return view('user_management')->with('users',$users)->with('user_count',$user_count)->with('smartfinance_count',$smartfinance_count)->with('payment_count',$payment_count)->with('loan_count',$loan_count)->with('loan_payment_count',$loan_payment_count)->with('tax_count',$tax_count)->with('mutual_fund_count',$mutual_fund_count)->with('role',$role)->with('profile',$profile)->with('progress',$progress)->with('status',$status)->with('search',$search);
        }
        else{

            $users = User::where([['is_delete',0],['is_profile_verified',$type]])->orderBy('id','Desc')->paginate(10);
            $user_count = User::where('is_active',0)->orWhere('is_profile_verified',0)->count();
            $smartfinance_count = Smartfinance::where('is_status',2)->count();
            $payment_count = SmartfinancePayment::where('is_approve',2)->count();
            $loan_count = Loan::where('is_status',2)->count();
            $loan_payment_count = LoanPayment::where('is_status',2)->count();
            $tax_count = Tax::count();
            $mutual_fund_count = MutualFund::count();

            $role = NULL;
            $profile = $type;
            $progress = NULL;
            $status = NULL;
            $search = NULL;

            return view('user_management')->with('users',$users)->with('user_count',$user_count)->with('smartfinance_count',$smartfinance_count)->with('payment_count',$payment_count)->with('loan_count',$loan_count)->with('loan_payment_count',$loan_payment_count)->with('tax_count',$tax_count)->with('mutual_fund_count',$mutual_fund_count)->with('role',$role)->with('profile',$profile)->with('progress',$progress)->with('status',$status)->with('search',$search);
        }
    }

    public function user_role($type,Request $request)
    {


        $users = User::where([['is_delete',0],['role_id',$type]])->orderBy('id','Desc')->paginate(10);
        $user_count = User::where('is_active',0)->orWhere('is_profile_verified',0)->count();
        $smartfinance_count = Smartfinance::where('is_status',2)->count();
        $payment_count = SmartfinancePayment::where('is_approve',2)->count();
        $loan_count = Loan::where('is_status',2)->count();
        $loan_payment_count = LoanPayment::where('is_status',2)->count();
        $tax_count = Tax::count();
        $mutual_fund_count = MutualFund::count();

        $role = $type;
        $profile = NULL;
        $progress = NULL;
        $status = NULL;
        $search = NULL;

        return view('user_management')->with('users',$users)->with('user_count',$user_count)->with('smartfinance_count',$smartfinance_count)->with('payment_count',$payment_count)->with('loan_count',$loan_count)->with('loan_payment_count',$loan_payment_count)->with('tax_count',$tax_count)->with('mutual_fund_count',$mutual_fund_count)->with('role',$role)->with('profile',$profile)->with('progress',$progress)->with('status',$status)->with('search',$search);
        
    }

    public function refferal(Request $request) 
    {
        //return $request;
        $refferal = Refferal::create([
            'user_id' => $request->userId,
            'reffered' => $request->user,
        ]);

        return redirect()->back()->with('alert', 'Refferal Added Successfully!!');

    }

    public function refferal_amount(Request $request) 
    {
        $user_id = $request->user_id;
        $amount = $request->amount;
        $user_amount = UserAmount::where([['user_id',$user_id],['is_status',0]])->first();
        if($user_amount != NULL){

            $status = DB::table('user_amounts')->where('user_id',$user_id)->update(['amount' => $amount]);
        }
        else{

            $date = Carbon::now()->format('Y-m-d');
            $user_amount = UserAmount::create([
                'user_id' => $user_id,
                'amount' => $amount,
                'date' => $date,
                'is_status' => 0
            ]);
        }

        return $user_amount;

    }


    public function store_review_rating(Request $request)
    {
        //return $request;
        $validatedData = $request->validate([
            'user' => 'required',
            'review_title' => 'required',
            'review' => 'required',
            'star' => 'required',
        ]);

        $now = Carbon::now()->format('Y-m-d');
        $review_rating = ReviewRating::create([
            'user_id' => $request->user,
            'placed_on' => $now,
            'review_title' => $request->review_title,
            'review' => $request->review,
            'rating' => $request->star,
            'is_status' => 2,
        ]);

        return redirect()->back();

    }


    public function edit_review_rating(Request $request)
    {
        //return $request;
        $validatedData = $request->validate([
            'review_id' => 'required',
            'review_title' => 'required',
            'review' => 'required',
            'star' => 'required',
        ]);

        $smartfinances = DB::table('review_ratings')->where('id',$request->review_id)->update(['review_title' => $request->review_title,'review' => $request->review,'rating' => $request->star]);

        return redirect()->back();

    }

    public function accept_review_rating($id,Request $request)
    {

        $smartfinances = DB::table('review_ratings')->where('id',$id)->update(['is_status' => 1]);

        return redirect()->back();

    }

    public function decline_review_rating($id,Request $request)
    {
        $smartfinances = DB::table('review_ratings')->where('id',$id)->delete();
        return redirect()->back();
    }

    public function review_rating(Request $request)
    {

        $reviews = ReviewRating::where('is_status', 1)->orderBy('id','Desc')->get();
        return view('review_rating')->with('reviews',$reviews);


    }


    function moneyFormatIndia($num) {
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
