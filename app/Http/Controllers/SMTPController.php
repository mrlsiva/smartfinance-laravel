<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Mail;
use App\Models\Setting;

class SMTPController extends Controller
{

    public static function sendMail($emailId,$subject,$txt=null,$attachment=null) {

        Mail::send([], [], function($message) use ($emailId,$subject,$txt,$attachment){
            $cc_email = Setting::where('key','cc_email')->first();
            $message->to($emailId);
            $message->cc($cc_email->value);
            $message->subject($subject);
            $message->setBody($txt, 'text/html');
            if($attachment!=null)
                $message->attach($attachment);
        });
        // check for failures
        if (Mail::failures()) {
            $data['status'] = 0;
             $returndata = array('success' => false, 'err' => true, 'msg' => 'Mail Not Sent');
        }
        else{
            $data['status'] = 1;
            $returndata = array('success' => true, 'err' => false, 'msg' => 'Mail Sent Successfully');
        }
        return $returndata;
    }

    public static function send_mail($emailId,$subject,$txt=null,$attachments=[]) {

        Mail::send([], [], function($message) use ($emailId,$subject,$txt,$attachments){
            $cc_email = Setting::where('key','cc_email')->first();
            $message->to($emailId);
            $message->cc($cc_email->value);
            $message->subject($subject);
            $message->setBody($txt, 'text/html');
            $message->attach($attachments);
        });
        // check for failures
        if (Mail::failures()) {
            $data['status'] = 0;
             $returndata = array('success' => false, 'err' => true, 'msg' => 'Mail Not Sent');
        }
        else{
            $data['status'] = 1;
            $returndata = array('success' => true, 'err' => false, 'msg' => 'Mail Sent Successfully');
        }
        return $returndata;
    }




}
