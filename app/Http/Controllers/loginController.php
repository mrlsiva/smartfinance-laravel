<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Traits\Utility;
use App\Models\User;
use App\Models\Template;
use Session;
use DB;

class loginController extends Controller
{

    use Utility;

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
            return redirect('user_management');  
        }
        else{
            // if failed login
            return redirect('sign_in')->with('error_status', 'Invalid Credential');
        }
    }

    public function forgot_password(Request $request){

        $email = $request->email;
        $user = User::where('email',$email)->first();
        if($user != NULL){

            $password = $this->readable_random_string(10);
            $new_password = \Hash::make($password);
            DB::table('users')->where('email',$email)->update(['password' => $new_password]);

            //Mail
            $emailsetting = Template::where([['id',21],['is_active',1]])->first(); 
            if($emailsetting != null){
                $email_template = $emailsetting->template;
                $emailContentReplace=['##NAME##'=>$user->first_name.' '.$user->last_name, '##PASSWORD##'=>$password];
                $txt = strtr($email_template,$emailContentReplace);
                $emailId = $user->email;
                $subject = $emailsetting->subject;
                $mailstatus = SMTPController::sendMail($emailId,$subject,$txt);
            }
            //End Mail

            return redirect('sign_in')->with('alert', 'Your new password has been send to your email.');
        }
        else{

            return redirect('sign_in')->with('alert', 'Please enter your registered email.');

        }
    }

    public function change_password(){

        return view('change_password');
    }

    public function save_password(Request $request){

        $user = Auth::user();
        if(\Hash::check($request->old_password, $user->password)){
            if($request->new_password == $request->confirm_password){
                User::find(auth()->user()->id)->update(['password'=> Hash::make($request->new_password)]);
            }
            else {
                return redirect('change_password')->with('alert', 'New password and comfirm password should be same.');
            }

            //Mail
            $emailsetting = Template::where([['id',22],['is_active',1]])->first(); 
            if($emailsetting != null){
                $email_template = $emailsetting->template;
                $emailContentReplace=['##NAME##'=>$user->first_name.' '.$user->last_name];
                $txt = strtr($email_template,$emailContentReplace);
                $emailId = $user->email;
                $subject = $emailsetting->subject;
                $mailstatus = SMTPController::sendMail($emailId,$subject,$txt);
            }
            //End mail

            return redirect('change_password')->with('alert', 'New password has been successfully changed.');
        }
        else {
            return redirect('change_password')->with('alert', 'Invalid Credential.');
        }
    }

    public function logout(Request $request){
        auth()->user()->tokens()->delete();
        Session::flush();
        Auth::logout();
        return redirect('/');
    }
}
