<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Insurance;
use App\Models\Setting;
use App\Models\Template;
use DB;


class insuranceController extends Controller
{
    public function save_insurance(Request $request)
    {
        $user = Auth::user();

        if($request->category != 'Other'){
            $insurance = Insurance::create([
                'user_id' =>$user->id,
                'category' => $request->category,
                'sub_category' => $request->sub_category,
                'amount' => $request->amount,
                'tenure' => $request->tenure,
                'start_date' => $request->start_date,
                'end_date' => $request->end_date,
                'due' => $request->payment_due,
                'due_date' => $request->due_date,
            ]);
        }
        else{

            $insurance = Insurance::create([
                'user_id' =>$user->id,
                'category' => $request->other_category,
                'sub_category' => $request->sub_category,
                'amount' => $request->amount,
                'tenure' => $request->tenure,
                'start_date' => $request->start_date,
                'end_date' => $request->end_date,
                'due' => $request->payment_due,
                'due_date' => $request->due_date,
            ]);

        }

        $filenames = "";
        $files = $request->file('policy_document');
        foreach($files as $file){   

            $filename = $file->getClientOriginalName(); 
            $filename = time().$filename;
            $path = $file->storeAs('/public/policy_document/',$filename);
            $filenames .= $filename.",";

        }
        $insurance->document = trim($filenames,",");
        $insurance->save();

        //Mail

        //To auditor
        $insurance = DB::table('insurances')->where('id',$insurance->id)->first();
        $emailsetting = Template::where([['id',36],['is_active',1]])->first(); 
        $insurance_email = Setting::where('key','insurance_email')->first();
        foreach(explode(",",$insurance->document) as $copy){
            $attachments[] = Storage::path('public/policy_document/'.$copy);
        }

        if($emailsetting != null){
            $email_template = $emailsetting->template;
            $emailContentReplace=['##NAME##'=>$user->first_name.' '.$user->last_name];
            $txt = strtr($email_template,$emailContentReplace);
            $emailId = $insurance_email->value;
            $subject = $emailsetting->subject;
            
            $mailstatus = SMTPController::send_mail($emailId,$subject,$txt,$attachments);
            
        }
        //End

        //To admin
        $insurance = DB::table('insurances')->where('id',$insurance->id)->first();
        $emailsetting = Template::where([['id',36],['is_active',1]])->first(); 
        $admin_email = Setting::where('key','admin_email')->first();
        foreach(explode(",",$insurance->document) as $copy){
            $attachments[] = Storage::path('public/policy_document/'.$copy);
        }
        if($emailsetting != null){
            $email_template = $emailsetting->template;
            $emailContentReplace=['##NAME##'=>$user->first_name.' '.$user->last_name];
            $txt = strtr($email_template,$emailContentReplace);
            $emailId = $admin_email->value;
            $subject = $emailsetting->subject;
            $mailstatus = SMTPController::send_mail($emailId,$subject,$txt,$attachments);
        }
        //End

        return redirect()->back()->with('alert', 'Insurance stored successfully!!');
        
    }

    public function view_insurance($id,Request $request){

        $insurance = Insurance::where('id',$id)->first();
        return view('view_insurance')->with('insurance',$insurance);
    }
}
