<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
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
        DB::table('users')->where('id',$id)->update(['role_id' => $role_id,'is_lock' => $is_lock,'is_active' => $is_active]);

        return redirect('dashboard');
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

        $role_id = Auth::user()->role_id;
        if($role_id == '3'){
            $user = Auth::user();
            return view('user_profile')->with('user',$user);

        }else{
            $user = Auth::user();
            return view('profile')->with('user',$user);
        }
    }

    public function user(){

        return view('user_detail');
        
    }
}
