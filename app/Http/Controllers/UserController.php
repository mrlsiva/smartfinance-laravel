<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;
use App\Models\User;
use App\Models\UserDetail;
use App\Models\BankDetail;
use App\Models\NomineeDetail;
use App\Models\Smartfinance;
use App\Models\SmartfinancePayment;
use Image;
use DB;

class UserController extends Controller
{
    public function dashboard(){

        $user = Auth::user();
        if($user->role_id == '3'){

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

            $smartfinances = Smartfinance::where('user_id',$user->id)->orderBy('id','Desc')->simplePaginate(10);
            $smartfinance_count = Smartfinance::where('is_status',2)->count();

            return view('user_dashboard')->with('smartfinances',$smartfinances)->with('smartfinance_count',$smartfinance_count);

        }else{



            $smartfinances = Smartfinance::where([['is_close',0],['is_status',1]])->get();
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
            


            $users = User::where('is_delete',0)->orderBy('id','Desc')->simplePaginate(10);
            $user_count = User::where('is_active',0)->orWhere('is_profile_verified',0)->count();
            $smartfinance_count = Smartfinance::where('is_status',2)->count();
            $smartfinances = Smartfinance::orderBy('id','Desc')->simplePaginate(10);
            $admin_finances = Smartfinance::where('user_id',$user->id)->orderBy('id','Desc')->simplePaginate(10);
            $admin_finance_count = Smartfinance::where('user_id',$user->id)->count();
            return view('dashboard')->with('users',$users)->with('user_count',$user_count)->with('smartfinances',$smartfinances)->with('smartfinance_count',$smartfinance_count)->with('admin_finances',$admin_finances)->with('admin_finance_count',$admin_finance_count);
        }
        
    }

    public function get_user(Request $request) 
    { 
        $id=$request->id;  
        $user = User::where('id',$id)->first();
        return $user;     
    }

     public function change_user_status(Request $request)
    {
        $id = $request->user_id;
        $role_id = $request->role;
        $is_lock = $request->status;
        $is_active = $request->progress;
        $is_profile_verified = $request->profile;

        if($role_id != 3){
            $is_profile_verified = DB::table('users')->where('id',$id)->select('is_profile_verified')->first()->is_profile_verified;
            if($is_profile_verified == 0){

                 return redirect()->back()->with('alert', 'Cant able to change role user to admin, profile completion is not yet done!!');

            }
            else{
                DB::table('users')->where('id',$id)->update(['role_id' => $role_id,'is_lock' => $is_lock,'is_active' => $is_active,'is_profile_verified' => $is_profile_verified]);
                if($is_profile_verified == 1){

                    DB::table('users')->where('id',$id)->update(['is_profile_updated' => 0]);
                }
                return redirect()->back()->with('alert', 'Successfully Updated!!');
            }
        }
        else{
            DB::table('users')->where('id',$id)->update(['role_id' => $role_id,'is_lock' => $is_lock,'is_active' => $is_active,'is_profile_verified' => $is_profile_verified]);
            if($is_profile_verified == 1){

                DB::table('users')->where('id',$id)->update(['is_profile_updated' => 0]);
            }
            return redirect()->back()->with('alert', 'Successfully Updated!!');
        }
        
    }
    public function profile(){

        $user = Auth::user();
        $user_detail = UserDetail::where('user_id',$user->id)->first();
        $bank_detail = BankDetail::where('user_id',$user->id)->first();
        $nominee_detail = NomineeDetail::where('user_id',$user->id)->first();
         $finances = Smartfinance::where('user_id',$user->id)->orderBy('id','Desc')->get();
        $amount= 0;
        foreach ($finances as $finance) {
            $amount += $finance->amount;
        }
        return view('user_profile')->with('user',$user)->with('user_detail',$user_detail)->with('bank_detail',$bank_detail)->with('nominee_detail',$nominee_detail)->with('amount',$amount);
    }

    public function user($id){

        $user = User::where('id', $id)->first();
        $user_detail = UserDetail::where('user_id',$user->id)->first();
        $bank_detail = BankDetail::where('user_id',$user->id)->first();
        $nominee_detail = NomineeDetail::where('user_id',$user->id)->first();
        $smartfinances = Smartfinance::where('user_id',$user->id)->orderBy('id','Desc')->simplePaginate(10);
         $finances = Smartfinance::where('user_id',$user->id)->orderBy('id','Desc')->get();
        $amount= 0;
        foreach ($finances as $finance) {
            $amount += $finance->amount;
        }
        $percentage = 0;
        foreach ($finances as $finance) {
            $percentage += $finance->percentage;
        }

        $month_finances = Smartfinance::where([['user_id',$user->id],['plan_id',1]])->get();
        $m_amount=0;
        foreach($month_finances as $month_finance){
            $month_amounts = SmartfinancePayment::where('smartfinance_id',$month_finance->id)->get();
            foreach($month_amounts as $month_amount){
                $m_amount += $month_amount->amount;

            }
        }

        $y_amount=0;
        $year_finances = Smartfinance::where([['user_id',$user->id],['plan_id',2]])->get();
        foreach($year_finances as $year_finance){
            $year_amount = SmartfinancePayment::where('smartfinance_id',$year_finance->id)->first();
            $year_amount = $year_amount->amount - $year_finance->amount;
            
            $y_amount += $year_amount;
        }

        $earning_amount = $m_amount + $y_amount; 

        $investment_count = Smartfinance::where('user_id',$user->id)->count();

        if($percentage != 0){
            $earning_percentage = $percentage/$investment_count;
        }
        else{
            $earning_percentage = 0;
        }
        


        return view('user_detail')->with('user',$user)->with('user_detail',$user_detail)->with('bank_detail',$bank_detail)->with('nominee_detail',$nominee_detail)->with('smartfinances',$smartfinances)->with('amount',$amount)->with('investment_count',$investment_count)->with('earning_percentage',$earning_percentage)->with('earning_amount',$earning_amount);
        
    }

    public function approve_user($id){

        DB::table('users')->where('id',$id)->update(['is_active' => 1]);

         return redirect(route('user', ['id' => $id]));
        
    }

    public function approve_user_profile($id){

        DB::table('users')->where('id',$id)->update(['is_profile_verified' => 1,'is_profile_updated' => 0]);

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

        DB::table('users')->where('id',$id)->update(['is_profile_verified' => 0]);

        return redirect('dashboard');
    }

    public function edit_profile(Request $request)
    {
        $type = $request->type;
        $user_id = $request->user_id;
        $profile_update = $request->profile_update;

        if($profile_update == 'true'){
            $role = User::where('id',$user_id)->select('role_id')->first()->role_id;
            if($role != 1){
                DB::table('users')->where('id',$user_id)->update(['is_profile_updated' => 1]);
            }
        }

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
            return redirect()->back();
        }
        if($type == 'basic'){
            $validatedData = $request->validate([
                'holder_name' => 'required',
                'account_no' => 'required|numeric',
                'ifsc_code' => 'required|regex:/^[A-Z]{4}0[0-9]{6}$/',
                'branch' => 'required',
                'city' => 'required', 
            ]);

            DB::table('bank_details')->where('user_id',$user_id)->update(['name' => $request->holder_name,'number' => $request->account_no,'ifsc_code' => $request->ifsc_code,'branch' => $request->branch,'city' => $request->city]);
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
            return redirect()->back();
        }

    }

    // public function user_search(Request $request)
    // {
    //     $search = $request->search;
    //     $status = $request->status;
    //     $progress = $request->progress;
    //     $profile = $request->profile;
    //     $role = $request->role;

    //     if($search){
    //         if($status != NULL){
    //             $users = User::join('roles','users.role_id','=','roles.id')->where('users.is_lock',$status)->where('users.first_name', 'like', '%'.$search.'%')->orWhere('users.last_name', 'like', '%'.$search.'%')->where('is_delete',0)->select('users.*','roles.name')->orderBy('id','Desc')->get();
    //         }
    //         elseif($progress != NULL){
    //             $users = User::join('roles','users.role_id','=','roles.id')->where('users.is_active',$progress)->where('users.first_name', 'like', '%'.$search.'%')->orWhere('users.last_name', 'like', '%'.$search.'%')->where('is_delete',0)->select('users.*','roles.name')->orderBy('id','Desc')->get();
    //         }
    //         elseif($profile != NULL){
    //             if($profile == 1){
    //                 $users = User::join('roles','users.role_id','=','roles.id')->where('users.is_profile_verified',$profile)->where('users.is_profile_updated','!=',$profile)->where('users.first_name', 'like', '%'.$search.'%')->orWhere('users.last_name', 'like', '%'.$search.'%')->where('is_delete',0)->select('users.*','roles.name')->orderBy('id','Desc')->get();
    //             }
    //             else{
    //                 $users = User::join('roles','users.role_id','=','roles.id')->where('users.is_profile_verified',$profile)->orWhere('users.is_profile_updated','!=',$profile)->where('users.first_name', 'like', '%'.$search.'%')->orWhere('users.last_name', 'like', '%'.$search.'%')->where('is_delete',0)->select('users.*','roles.name')->orderBy('id','Desc')->get();
    //             }
    //         }
    //         elseif($role != NULL){
    //             $users = User::join('roles','users.role_id','=','roles.id')->where('users.role_id',$role)->where('users.first_name', 'like', '%'.$search.'%')->orWhere('users.last_name', 'like', '%'.$search.'%')->where('is_delete',0)->select('users.*','roles.name')->orderBy('id','Desc')->get();
    //         }
    //         else{
    //             $users = User::join('roles','users.role_id','=','roles.id')->where('users.first_name', 'like', '%'.$search.'%')->orWhere('users.last_name', 'like', '%'.$search.'%')->where('is_delete',0)->select('users.*','roles.name')->orderBy('id','Desc')->get();
    //         }
    //     }
    //     else{
    //         $users = User::join('roles','users.role_id','=','roles.id')->where('is_delete',0)->select('users.*','roles.name')->orderBy('id','Desc')->get();
    //     }
    //     return $users;
    // }

    public function user_search(Request $request)
    {
        $search = $request->search;

        if($search != NULL){
            
            $users = User::join('roles','users.role_id','=','roles.id')->where('users.first_name', 'like', '%'.$search.'%')->orWhere('users.last_name', 'like', '%'.$search.'%')->where('is_delete',0)->select('users.*','roles.name')->orderBy('id','Desc')->get();
            
        }
        else{
            $users = User::join('roles','users.role_id','=','roles.id')->where('is_delete',0)->select('users.*','roles.name')->orderBy('id','Desc')->get();
        }
        return $users;
    }

    public function user_status(Request $request)
    {
        $search = $request->search;
        $status = $request->status;

        if($status != NULL){
            if($search != NULL) {
                $users = User::join('roles','users.role_id','=','roles.id')->where('users.is_lock',$status)->where('users.first_name', 'like', '%'.$search.'%')->orWhere('users.last_name', 'like', '%'.$search.'%')->where('is_delete',0)->select('users.*','roles.name')->orderBy('id','Desc')->get();
            }
            else{
                $users = User::join('roles','users.role_id','=','roles.id')->where('users.is_lock',$status)->where('is_delete',0)->select('users.*','roles.name')->orderBy('id','Desc')->get();
            }
        }
        elseif($search != NULL){
            $users = User::join('roles','users.role_id','=','roles.id')->where('users.first_name', 'like', '%'.$search.'%')->orWhere('users.last_name', 'like', '%'.$search.'%')->where('is_delete',0)->select('users.*','roles.name')->orderBy('id','Desc')->get();
        }
        else{
            $users = User::join('roles','users.role_id','=','roles.id')->where('is_delete',0)->select('users.*','roles.name')->orderBy('id','Desc')->get();
        }

        return $users;
    }

    public function user_progress(Request $request)
    {
        $search = $request->search;
        $progress = $request->progress;

        if($progress != NULL){
            if($search != NULL) {
                $users = User::join('roles','users.role_id','=','roles.id')->where('users.is_active',$progress)->where('users.first_name', 'like', '%'.$search.'%')->orWhere('users.last_name', 'like', '%'.$search.'%')->where('is_delete',0)->select('users.*','roles.name')->orderBy('id','Desc')->get();
            }
            else{
                $users = User::join('roles','users.role_id','=','roles.id')->where('users.is_active',$progress)->where('is_delete',0)->select('users.*','roles.name')->orderBy('id','Desc')->get();
            }
        }
        elseif($search != NULL){
            $users = User::join('roles','users.role_id','=','roles.id')->where('users.first_name', 'like', '%'.$search.'%')->orWhere('users.last_name', 'like', '%'.$search.'%')->where('is_delete',0)->select('users.*','roles.name')->orderBy('id','Desc')->get();
        }
        else{
            $users = User::join('roles','users.role_id','=','roles.id')->where('is_delete',0)->select('users.*','roles.name')->orderBy('id','Desc')->get();
        }

        return $users;
    }

    public function user_profile(Request $request)
    {
        $search = $request->search;
        $profile = $request->profile;

        if($profile != NULL){
            if($search != NULL) {

                if($profile == 2){
                    $users = User::join('roles','users.role_id','=','roles.id')->where('users.is_profile_verified',$profile)->where('users.first_name', 'like', '%'.$search.'%')->orWhere('users.last_name', 'like', '%'.$search.'%')->where('is_delete',0)->select('users.*','roles.name')->orderBy('id','Desc')->get();
                }
                if($profile == 1){
                    $users = User::join('roles','users.role_id','=','roles.id')->where('users.is_profile_verified',$profile)->where('users.is_profile_updated','!=',$profile)->where('users.first_name', 'like', '%'.$search.'%')->orWhere('users.last_name', 'like', '%'.$search.'%')->where('is_delete',0)->select('users.*','roles.name')->orderBy('id','Desc')->get();
                }
                else{
                    $users = User::join('roles','users.role_id','=','roles.id')->where('users.is_profile_verified',$profile)->orWhere('users.is_profile_updated','!=',$profile)->where('users.first_name', 'like', '%'.$search.'%')->orWhere('users.last_name', 'like', '%'.$search.'%')->where('is_delete',0)->select('users.*','roles.name')->orderBy('id','Desc')->get();
                }
            }
            else{
                if($profile == 2){
                    $users = User::join('roles','users.role_id','=','roles.id')->where('users.is_profile_verified',$profile)->where('is_delete',0)->select('users.*','roles.name')->orderBy('id','Desc')->get();
                }
                elseif($profile == 1){
                    $users = User::join('roles','users.role_id','=','roles.id')->where('users.is_profile_verified',$profile)->where('users.is_profile_updated','!=',$profile)->where('is_delete',0)->select('users.*','roles.name')->orderBy('id','Desc')->get();
                }
                else{
                    $users = User::join('roles','users.role_id','=','roles.id')->where('users.is_profile_verified',$profile)->orWhere('users.is_profile_updated','!=',$profile)->where('is_delete',0)->select('users.*','roles.name')->orderBy('id','Desc')->get();
                }
            }
        }
        elseif($search != NULL){
            $users = User::join('roles','users.role_id','=','roles.id')->where('users.first_name', 'like', '%'.$search.'%')->orWhere('users.last_name', 'like', '%'.$search.'%')->where('is_delete',0)->select('users.*','roles.name')->orderBy('id','Desc')->get();
        }
        else{
            $users = User::join('roles','users.role_id','=','roles.id')->where('is_delete',0)->select('users.*','roles.name')->orderBy('id','Desc')->get();
        }

        return $users;
    }

    public function user_role(Request $request)
    {
        $search = $request->search;
        $role = $request->role;

        if($role != NULL){
            if($search != NULL) {
                $users = User::join('roles','users.role_id','=','roles.id')->where('users.role_id',$role)->where('users.first_name', 'like', '%'.$search.'%')->orWhere('users.last_name', 'like', '%'.$search.'%')->where('is_delete',0)->select('users.*','roles.name')->orderBy('id','Desc')->get();
            }
            else{
                $users = User::join('roles','users.role_id','=','roles.id')->where('users.role_id',$role)->where('is_delete',0)->select('users.*','roles.name')->orderBy('id','Desc')->get();
            }
        }
        elseif($search != NULL){
            $users = User::join('roles','users.role_id','=','roles.id')->where('users.first_name', 'like', '%'.$search.'%')->orWhere('users.last_name', 'like', '%'.$search.'%')->where('is_delete',0)->select('users.*','roles.name')->orderBy('id','Desc')->get();
        }
        else{
            $users = User::join('roles','users.role_id','=','roles.id')->where('is_delete',0)->select('users.*','roles.name')->orderBy('id','Desc')->get();
        }

        return $users;
    }
}
