<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Session;

class loginController extends Controller
{
    public function sign_in(){

        return view('login');
    }

    public function login(Request $request){
        // Retrive Input
        
        $input = $request->all();
        if(auth()->attempt(array('email' => $input['email'], 'password' => $input['password'])))
        {
            if (auth()->user()->is_active == 0) {

                return redirect('sign_in')->with('error_status', 'Your registeration process is in pending. Please check back in a while');
            }
            if (auth()->user()->is_lock == 1) {

                return redirect('sign_in')->with('error_status', 'Your account has been locked by the  admin');
            }
            return redirect('dashboard');  
        }
        else{
            // if failed login
            return redirect('sign_in')->with('error_status', 'Invalid Credential');
        }
    }

    public function logout(Request $request){
        auth()->user()->tokens()->delete();
        Session::flush();
        Auth::logout();
        return redirect('/');
    }
}
