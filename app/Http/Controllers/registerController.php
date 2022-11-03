<?php

namespace App\Http\Controllers;

use App\Http\Controllers\SMTPController;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use App\Models\ReviewRating;
use App\Models\Upload;
use App\Models\User;
use App\Models\Setting;
use App\Models\Template;
use Image;

class registerController extends Controller
{
    public function home(){

        $reviews = ReviewRating::where('is_status', 1)->latest()->take(3)->get();
        $banners = Upload::where('type','banner')->get();
        $youtubes = Upload::where('type','youtube')->latest()->take(2)->get();
        return view('home')->with('reviews',$reviews)->with('banners',$banners)->with('youtubes',$youtubes);
    }

    public function sign_up(){

        return view('register');
    }

    public function register(Request $request)
    {
        //return $request;
        $validatedData = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required|numeric|unique:users,phone|digits:10',
            'password' => 'required|confirmed|string',
            'terms_and_conditions' =>'accepted'
        ]);


        $user = User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'role_id' => 3,
            'is_finanace' => 0,
            'is_tax' => 0,
            'is_active' => 0,
            'is_lock' => 0,
            'is_delete' => 0,
            'is_profile_verified' => 2,
            'is_profile_updated' => 0,
            'is_reffer' => 0,
            'password' => \Hash::make($request->password),
        ]);

        //Mail

        //To admin
        $emailsetting = Template::where([['id',1],['is_active',1]])->first(); 
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
        //To admin end

        //To user
        $emailsetting = Template::where([['id',2],['is_active',1]])->first(); 
        if($emailsetting != null){
            $email_template = $emailsetting->template;
            $emailContentReplace=['##NAME##'=>$user->first_name.' '.$user->last_name];
            $txt = strtr($email_template,$emailContentReplace);
            $emailId = $user->email;
            $subject = $emailsetting->subject;
            $mailstatus = SMTPController::sendMail($emailId,$subject,$txt);
        }
        //To user end

        //End Mail

        return redirect('sign_in');
    }

    
}
