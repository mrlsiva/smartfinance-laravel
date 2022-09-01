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
use Image;
use DB;

class UserController extends Controller
{
    public function dashboard(){

        $role_id = Auth::user()->role_id;
        if($role_id == '3'){

            return view('user_dashboard');

        }else{
            $users = User::where('is_delete',0)->orderBy('id','Desc')->simplePaginate(10);
            return view('dashboard')->with('users',$users);
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
                return redirect()->back()->with('alert', 'Successfully Updated!!');
            }
        }
        else{
            DB::table('users')->where('id',$id)->update(['role_id' => $role_id,'is_lock' => $is_lock,'is_active' => $is_active,'is_profile_verified' => $is_profile_verified]);
            return redirect()->back()->with('alert', 'Successfully Updated!!');
        }
        
    }

    public function user_search(Request $request) 
    { 
        $search=$request->search; 
        if($search) {
            $users = User::where('first_name', 'like', '%'.$search.'%')->orWhere('last_name', 'like', '%'.$search.'%')->where('is_delete',0)->orderBy('id','Desc')->simplePaginate(10);
        }
        else{
            $users = User::where('is_delete',0)->orderBy('id','Desc')->simplePaginate(10);
        }


        return view('dashboard')->with('users',$users);     
    }

    public function profile(){

        $user = Auth::user();
        $user_detail = UserDetail::where('user_id',$user->id)->first();
        $bank_detail = BankDetail::where('user_id',$user->id)->first();
        $nominee_detail = NomineeDetail::where('user_id',$user->id)->first();
        return view('user_profile')->with('user',$user)->with('user_detail',$user_detail)->with('bank_detail',$bank_detail)->with('nominee_detail',$nominee_detail);
    }

    public function user($id){

        $user = User::where('id', $id)->first();
        $user_detail = UserDetail::where('user_id',$user->id)->first();
        $bank_detail = BankDetail::where('user_id',$user->id)->first();
        $nominee_detail = NomineeDetail::where('user_id',$user->id)->first();

        return view('user_detail')->with('user',$user)->with('user_detail',$user_detail)->with('bank_detail',$bank_detail)->with('nominee_detail',$nominee_detail);
        
    }

    public function approve_user($id){

        DB::table('users')->where('id',$id)->update(['is_active' => 1]);

         return redirect(route('user', ['id' => $id]));
        
    }

    public function approve_user_profile($id){

        DB::table('users')->where('id',$id)->update(['is_profile_verified' => 1]);

         return redirect(route('user', ['id' => $id]));
        
    }

    public function save_profile(Request $request)
    {
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

        return redirect('dashboard');
    }
}
